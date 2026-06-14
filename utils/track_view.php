<?php
// utils/track_view.php
// Records one page view into the shared `site_traffic` table (read by the
// backoffice dashboard "Website Traffic" chart). Server-side, so it can't be
// missed by ad-blockers or disabled JS. Never throws — tracking must never
// break a page render.

if (!function_exists('record_site_view')) {

    function classify_site_source(?string $referrer): string
    {
        $medium = strtolower((string) ($_GET['utm_medium'] ?? ''));
        if (in_array($medium, ['cpc', 'ppc', 'paid', 'paidsearch', 'paid-search'], true)) {
            return 'paid';
        }

        $referrer = trim((string) $referrer);
        if ($referrer === '') {
            return 'direct';
        }

        $host = strtolower((string) parse_url($referrer, PHP_URL_HOST));
        if ($host === '' || $host === strtolower((string) ($_SERVER['HTTP_HOST'] ?? ''))) {
            return 'direct'; // no referrer or internal navigation
        }

        foreach (['google.', 'bing.', 'yahoo.', 'duckduckgo.', 'yandex.', 'baidu.', 'ecosia.'] as $needle) {
            if (strpos($host, $needle) !== false) return 'organic';
        }
        foreach (['facebook.', 'fb.', 'instagram.', 'twitter.', 'x.com', 't.co', 'linkedin.', 'lnkd.in', 'tiktok.', 'youtube.', 'whatsapp.', 'wa.me', 'pinterest.', 'reddit.'] as $needle) {
            if (strpos($host, $needle) !== false) return 'social';
        }
        return 'referral';
    }

    function record_site_view(PDO $pdo): void
    {
        try {
            $ua = $_SERVER['HTTP_USER_AGENT'] ?? '';

            // Skip obvious bots/crawlers so the numbers reflect real visitors.
            if ($ua !== '' && preg_match('/bot|crawl|spider|slurp|bingpreview|facebookexternalhit|headless|monitor|uptime|curl|wget|python-requests/i', $ua)) {
                return;
            }

            $path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
            $referrer = $_SERVER['HTTP_REFERER'] ?? '';

            // Client IP (best-effort, proxy-aware).
            $ip = '0.0.0.0';
            foreach (['HTTP_CF_CONNECTING_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_CLIENT_IP', 'REMOTE_ADDR'] as $k) {
                if (!empty($_SERVER[$k])) {
                    $candidate = trim(explode(',', $_SERVER[$k])[0]);
                    if (filter_var($candidate, FILTER_VALIDATE_IP)) { $ip = $candidate; break; }
                }
            }

            $stmt = $pdo->prepare(
                "INSERT INTO site_traffic (path, source, referrer, ip_address, user_agent, session_id)
                 VALUES (:path, :source, :referrer, :ip, :ua, :sid)"
            );
            $stmt->execute([
                ':path'     => substr($path, 0, 255),
                ':source'   => classify_site_source($referrer),
                ':referrer' => $referrer !== '' ? substr($referrer, 0, 512) : null,
                ':ip'       => substr($ip, 0, 45),
                ':ua'       => substr($ua, 0, 512),
                ':sid'      => substr(session_id() ?: '', 0, 64) ?: null,
            ]);
        } catch (Throwable $e) {
            // swallow — never break the page over analytics
        }
    }
}
