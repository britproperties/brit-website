<?php
ob_start(); header('Content-Type: application/json'); session_start();
require_once __DIR__ . '/../config/db.php';

function j(bool $ok, string $m): void { ob_clean(); echo json_encode(['success' => $ok, 'message' => $m]); exit; }

if ($_SERVER['REQUEST_METHOD'] !== 'POST') j(false, 'Invalid request method.');

$fname          = trim($_POST['fname']             ?? '');
$lname          = trim($_POST['lname']              ?? '');
$email          = trim($_POST['email']              ?? '');
$phone          = trim($_POST['phone']              ?? '');
$branch         = trim($_POST['branch']             ?? '');
$referral_name  = trim($_POST['referral_name']      ?? '');
$referral_phone = trim($_POST['referral_phone']     ?? '');
$property       = trim($_POST['property_interest']  ?? '');
$preferred_date = trim($_POST['preferred_date']     ?? '');
$message        = trim($_POST['message']            ?? '');

if ($fname === '' || $lname === '' || $email === '' || $phone === '' || $branch === '' || $referral_name === '' || $referral_phone === '' || $preferred_date === '') {
    j(false, 'Please fill in all required fields.');
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    j(false, 'Please enter a valid email address.');
}

$date = DateTime::createFromFormat('Y-m-d', $preferred_date);
if (!$date || $date->format('Y-m-d') !== $preferred_date) {
    j(false, 'Please choose a valid inspection date.');
}

$allowed_days = ['Sunday', 'Wednesday', 'Thursday'];
if (!in_array($date->format('l'), $allowed_days, true)) {
    j(false, 'Inspections only hold on Wednesdays, Thursdays & Sundays. Please choose one of those days.');
}

try {
    $stmt = $pdo->prepare(
        "INSERT INTO site_inspection_requests (first_name, last_name, email, phone, branch, referral_name, referral_phone, property_interest, preferred_date, message)
         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
    );
    $stmt->execute([$fname, $lname, $email, $phone, $branch, $referral_name, $referral_phone, $property ?: null, $preferred_date, $message]);
} catch (Throwable $e) {
    error_log('site_inspection_auth: ' . $e->getMessage());
    j(false, 'A database error occurred. Please try again later.');
}

j(true, 'Inspection request sent successfully!');
