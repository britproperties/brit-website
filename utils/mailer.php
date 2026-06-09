<?php
/**
 * Lightweight Resend mailer for the public website.
 *
 * Uses the same Resend account/credentials as the brit-user project, but talks
 * to the Resend REST API directly via cURL so the marketing site needs no
 * Composer/vendor dependency. The RESEND_API_KEY is read from .env (loaded by
 * config/db.php into $_ENV).
 *
 * Signature matches brit-user/utils/mailer.php for familiarity.
 */
/**
 * Wrap inner content in the default Brit Properties email template
 * (matches the layout used across the brit-user project's transactional emails).
 */
function emailTemplate(string $heading, string $contentHtml): string {
    $year = date('Y');
    return "
    <table style='width:100%;background:#f5f6fa;font-family:Arial,sans-serif;padding:20px;'>
        <tbody>
            <tr>
                <td>
                    <table style='margin:0 auto;max-width:600px;background:#fff;border-radius:8px;overflow:hidden;'>
                        <tbody>
                            <tr>
                                <td style='text-align:center;padding-top:30px;'>
                                    <a href='https://britproperties.ng/'>
                                        <img src='https://res.cloudinary.com/dhowyyjht/image/upload/v1775808044/brit-logo_wxccdp.png' alt='Brit' width='100'>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td style='padding:30px 30px 10px 30px;text-align:left;color:#444;'>
                                    <h2 style='font-size:20px;margin:0 0 15px;text-align:center;color:#000;'>{$heading}</h2>
                                    {$contentHtml}
                                </td>
                            </tr>
                            <tr>
                                <td style='text-align:center;padding:20px 30px 40px 30px;'>
                                    <p style='font-size:12px;color:#aaa;margin-top:20px;'>&copy; {$year} Brit Properties. All rights reserved.</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    ";
}

function sendMail(string $to, string $subject, string $bodyHtml, string $bodyAlt = ''): bool {
    $apiKey = $_ENV['RESEND_API_KEY'] ?? getenv('RESEND_API_KEY') ?: '';

    if (!$apiKey) {
        error_log('Resend mailer error — RESEND_API_KEY is not set in .env');
        return false;
    }

    $payload = json_encode([
        'from'    => 'Brit Properties <noreply@britproperties.ng>',
        'to'      => [$to],
        'subject' => $subject,
        'html'    => $bodyHtml,
        'text'    => $bodyAlt !== '' ? $bodyAlt : strip_tags($bodyHtml),
    ]);

    $ch = curl_init('https://api.resend.com/emails');
    curl_setopt_array($ch, [
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => $payload,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => 15,
        CURLOPT_HTTPHEADER     => [
            'Authorization: Bearer ' . $apiKey,
            'Content-Type: application/json',
        ],
    ]);

    $response = curl_exec($ch);
    $status   = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlErr  = curl_error($ch);
    curl_close($ch);

    if ($curlErr) {
        error_log("Resend mailer error — To: {$to} | cURL: {$curlErr}");
        return false;
    }

    if ($status < 200 || $status >= 300) {
        error_log("Resend mailer error — To: {$to} | HTTP {$status} | {$response}");
        return false;
    }

    return true;
}
