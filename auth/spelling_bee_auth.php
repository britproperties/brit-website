<?php
ob_start(); header('Content-Type: application/json'); session_start();
require_once __DIR__ . '/../config/db.php';

function j(bool $ok, string $m, array $extra = []): void {
    ob_clean();
    echo json_encode(array_merge(['success' => $ok, 'message' => $m], $extra));
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') j(false, 'Invalid request method.');

$fname    = trim($_POST['fname']    ?? '');
$lname    = trim($_POST['lname']    ?? '');
$gender   = trim($_POST['gender']   ?? '');
$age      = trim($_POST['age']      ?? '');
$school   = trim($_POST['school']   ?? '');
$grade    = trim($_POST['grade']    ?? '');
$guardian = trim($_POST['guardian'] ?? '');
$phone    = trim($_POST['phone']    ?? '');
$email    = trim($_POST['email']    ?? '');
$address  = trim($_POST['address']  ?? '');

$consent      = (($_POST['consent'] ?? '') === 'yes') ? 1 : 0;
$mediaCapture = (($_POST['consent_media_capture'] ?? '') === 'yes') ? 1 : 0;
$mediaUsage   = (($_POST['consent_media_usage'] ?? '') === 'yes') ? 1 : 0;
$mediaDetails = (($_POST['consent_media_details'] ?? '') === 'yes') ? 1 : 0;
$mediaNoComp  = (($_POST['consent_media_no_compensation'] ?? '') === 'yes') ? 1 : 0;

if ($fname === '' || $lname === '' || $gender === '' || $age === '' ||
    $school === '' || $grade === '' || $guardian === '' || $phone === '' ||
    $email === '' || $address === '') {
    j(false, 'Please fill in all required fields.');
}
if (!in_array($gender, ['Male', 'Female'], true)) {
    j(false, 'Please select a valid gender.');
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    j(false, 'Please enter a valid email address.');
}
if (!ctype_digit($age) || (int)$age < 8 || (int)$age > 12) {
    j(false, 'Please select a valid age (8–12).');
}
$age = (int)$age;
$validGrades = [];
for ($g = 1; $g <= 12; $g++) { $validGrades[] = 'Grade ' . $g; }
if (!in_array($grade, $validGrades, true)) {
    j(false, 'Please select a valid grade.');
}
if (!$consent) {
    j(false, 'Parent/guardian consent is required to register.');
}

// Prevent duplicate entries — same first name, last name and email.
// (utf8mb4_general_ci collation makes this match case-insensitively.)
try {
    $dup = $pdo->prepare(
        "SELECT 1 FROM spelling_bee_registrations
         WHERE first_name = ? AND last_name = ? AND email = ? LIMIT 1"
    );
    $dup->execute([$fname, $lname, $email]);
    if ($dup->fetchColumn()) {
        j(false, 'This candidate has already been registered with that name and email address.');
    }
} catch (Throwable $e) {
    error_log('spelling_bee_auth duplicate-check: ' . $e->getMessage());
    j(false, 'A database error occurred. Please try again later.');
}

$stmt = $pdo->prepare(
    "INSERT INTO spelling_bee_registrations
        (reg_number, first_name, last_name, gender, age, school, grade, guardian_name,
         phone, email, address, consent, consent_media_capture,
         consent_media_usage, consent_media_details, consent_media_no_compensation)
     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
);

// Auto-generate a unique 3-digit registration number (100–999).
// Retry on the rare UNIQUE collision; give up if the range is exhausted.
$regNumber = null;
$maxAttempts = 50;

for ($attempt = 0; $attempt < $maxAttempts; $attempt++) {
    $candidate = (string) random_int(100, 999);
    try {
        $stmt->execute([
            $candidate, $fname, $lname, $gender, $age, $school, $grade, $guardian,
            $phone, $email, $address, $consent, $mediaCapture,
            $mediaUsage, $mediaDetails, $mediaNoComp,
        ]);
        $regNumber = $candidate;
        break;
    } catch (PDOException $e) {
        // 23000 = integrity constraint violation.
        if ($e->getCode() === '23000') {
            // Candidate already registered (race with the pre-insert check) → stop.
            if (stripos($e->getMessage(), 'uq_candidate') !== false) {
                j(false, 'This candidate has already been registered with that name and email address.');
            }
            // Otherwise it's a reg_number collision → retry with a new number.
            continue;
        }
        error_log('spelling_bee_auth: ' . $e->getMessage());
        j(false, 'A database error occurred. Please try again later.');
    } catch (Throwable $e) {
        error_log('spelling_bee_auth: ' . $e->getMessage());
        j(false, 'A database error occurred. Please try again later.');
    }
}

if ($regNumber === null) {
    error_log('spelling_bee_auth: unable to allocate a unique reg_number (range exhausted).');
    j(false, 'Registration is currently full. Please contact us at hello@britproperties.ng.');
}

// Registrations are stored in the database only — no email is sent.

j(true, 'Registration submitted successfully! Your registration number is ' . $regNumber . '.', ['reg_number' => $regNumber]);
