<?php
ob_start(); header('Content-Type: application/json'); session_start();
require_once __DIR__ . '/../config/db.php';

function j(bool $ok, string $m): void { ob_clean(); echo json_encode(['success' => $ok, 'message' => $m]); exit; }

if ($_SERVER['REQUEST_METHOD'] !== 'POST') j(false, 'Invalid request method.');

$fname   = trim($_POST['fname']   ?? '');
$lname   = trim($_POST['lname']   ?? '');
$email   = trim($_POST['email']   ?? '');
$phone   = trim($_POST['phone']   ?? '');
$message = trim($_POST['message'] ?? '');

if ($fname === '' || $lname === '' || $email === '' || $phone === '') {
    j(false, 'Please fill in all required fields.');
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    j(false, 'Please enter a valid email address.');
}

try {
    $stmt = $pdo->prepare(
        "INSERT INTO contact_messages (first_name, last_name, email, phone, message)
         VALUES (?, ?, ?, ?, ?)"
    );
    $stmt->execute([$fname, $lname, $email, $phone, $message]);
} catch (Throwable $e) {
    error_log('contact_auth: ' . $e->getMessage());
    j(false, 'A database error occurred. Please try again later.');
}

// Best-effort notification — never blocks the success response.
$to      = 'hello@britproperties.ng';
$subject = 'New contact message from ' . $fname . ' ' . $lname;
$body    = "Name: {$fname} {$lname}\nEmail: {$email}\nPhone: {$phone}\n\nMessage:\n{$message}\n";
$headers = "From: noreply@britproperties.ng\r\nReply-To: {$email}\r\n";
@mail($to, $subject, $body, $headers);

j(true, 'Message sent successfully!');
