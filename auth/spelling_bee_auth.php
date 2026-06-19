<?php
ob_start(); header('Content-Type: application/json'); session_start();
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../utils/mailer.php';

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

// One email may be used for multiple registrations — no candidate-level
// uniqueness is enforced.

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
        // 23000 = integrity constraint violation → reg_number collision; retry.
        if ($e->getCode() === '23000') {
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

// ── Confirmation email to the applicant (Resend, default template) ───────────
$applicantContent =
    "<p style='font-size:14px;margin:0 0 15px;'>Dear " . htmlspecialchars($guardian) . ",</p>" .
    "<p style='font-size:14px;margin:0 0 20px;'>Thank you for registering <strong>" . htmlspecialchars($fname . ' ' . $lname) . "</strong> for the Brit Spelling Bee Competition. The registration has been received successfully.</p>" .
    "<div style='text-align:center;margin:25px 0;'>" .
        "<p style='font-size:14px;margin:0 0 6px;color:#444;'>Your Registration Number</p>" .
        "<div style='display:inline-block;background-color:#ed1c24;color:#fff;font-size:24px;letter-spacing:4px;padding:12px 28px;border-radius:5px;'>" . htmlspecialchars($regNumber) . "</div>" .
    "</div>" .
    "<p style='font-size:14px;margin:0 0 20px;'>Please keep this number safe — it will be required on the day of the competition.</p>" .
    "<table style='font-size:14px;margin:0 0 20px;'>" .
        "<tr><td style='padding:4px 12px 4px 0;color:#888;'>Candidate</td><td><strong>" . htmlspecialchars($fname . ' ' . $lname) . "</strong></td></tr>" .
        "<tr><td style='padding:4px 12px 4px 0;color:#888;'>School</td><td>" . htmlspecialchars($school) . "</td></tr>" .
        "<tr><td style='padding:4px 12px 4px 0;color:#888;'>Class / Grade</td><td>" . htmlspecialchars($grade) . "</td></tr>" .
    "</table>" .
    "<p style='font-size:14px;margin:0 0 20px;'>If you have any questions, please reach out to <a href='mailto:hello@britproperties.ng'>our team</a>. We look forward to seeing you there!</p>";

sendMail(
    $email,
    'Brit Spelling Bee — Registration Successful (No. ' . $regNumber . ')',
    emailTemplate('Registration Successful', $applicantContent)
);

j(true, 'Registration submitted successfully! Your registration number is ' . $regNumber . '.', ['reg_number' => $regNumber]);
