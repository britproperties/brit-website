<?php
ob_start(); header('Content-Type: application/json'); session_start();
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../utils/mailer.php';

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

// ── Notify the team (Resend, default template) ───────────────────────────────
$teamContent =
    "<p style='font-size:14px;margin:0 0 15px;'>A new message was submitted through the website contact form.</p>" .
    "<table style='font-size:14px;margin:0 0 15px;'>" .
        "<tr><td style='padding:4px 12px 4px 0;color:#888;'>Name</td><td><strong>" . htmlspecialchars($fname . ' ' . $lname) . "</strong></td></tr>" .
        "<tr><td style='padding:4px 12px 4px 0;color:#888;'>Email</td><td>" . htmlspecialchars($email) . "</td></tr>" .
        "<tr><td style='padding:4px 12px 4px 0;color:#888;'>Phone</td><td>" . htmlspecialchars($phone) . "</td></tr>" .
    "</table>" .
    "<p style='font-size:14px;margin:0 0 6px;color:#888;'>Message:</p>" .
    "<p style='font-size:14px;margin:0;white-space:pre-line;'>" . htmlspecialchars($message !== '' ? $message : '(no message provided)') . "</p>";

sendMail(
    'hello@britproperties.ng',
    'New contact message from ' . $fname . ' ' . $lname,
    emailTemplate('New Contact Message', $teamContent)
);

// ── Acknowledgement to the sender (Resend, default template) ─────────────────
$ackContent =
    "<p style='font-size:14px;margin:0 0 15px;'>Hi " . htmlspecialchars($fname) . ",</p>" .
    "<p style='font-size:14px;margin:0 0 20px;'>Thank you for reaching out to Brit Properties. We have received your message and a member of our team will get back to you shortly.</p>" .
    "<p style='font-size:14px;margin:0 0 20px;'>If your enquiry is urgent, call us on <a href='tel:+2349164449990'>+234 916 444 9990</a>.</p>" .
    "<p style='font-size:14px;margin:0;'>Warm regards,<br>The Brit Properties Team</p>";

sendMail(
    $email,
    'We received your message — Brit Properties',
    emailTemplate('Thanks for contacting us', $ackContent)
);

j(true, 'Message sent successfully!');
