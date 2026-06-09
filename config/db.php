<?php
// ─── Load .env into $_ENV (no Composer required) ─────────────────────────────
(function () {
    $envFile = dirname(__DIR__) . '/.env';
    if (!file_exists($envFile)) return;

    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $line = trim($line);
        if ($line === '' || $line[0] === '#') continue;

        $eqPos = strpos($line, '=');
        if ($eqPos === false) continue;

        $key   = trim(substr($line, 0, $eqPos));
        $value = trim(substr($line, $eqPos + 1));

        if (strlen($value) >= 2) {
            $first = $value[0];
            $last  = $value[strlen($value) - 1];
            if (($first === '"' && $last === '"') || ($first === "'" && $last === "'")) {
                $value = substr($value, 1, -1);
            }
        }

        if ($key === '') continue;

        if (!isset($_ENV[$key])) {
            $_ENV[$key] = $value;
            putenv("{$key}={$value}");
        }
    }
})();

date_default_timezone_set('Africa/Lagos');

// Environment Detection
$env = (isset($_SERVER['HTTP_HOST']) && strpos($_SERVER['HTTP_HOST'], 'localhost') !== false)
    ? 'development'
    : 'production';

// Error reporting — verbose locally, silent (logged) in production
if ($env === 'development') {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    ini_set('log_errors', 1);
    error_reporting(E_ALL);
}

// Database Settings — credentials come from .env (see .env.example).
// Safe local-development defaults are used only when a variable is not set,
// so production must define DB_HOST / DB_NAME / DB_USER / DB_PASS in its .env.
$config = [
    'host' => getenv('DB_HOST') ?: 'localhost',
    'name' => getenv('DB_NAME') ?: 'brit_app',
    'user' => getenv('DB_USER') ?: 'root',
    'pass' => (getenv('DB_PASS') !== false) ? getenv('DB_PASS') : '',
];

// PDO Configuration
$dsn = "mysql:host={$config['host']};dbname={$config['name']};charset=utf8mb4";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $config['user'], $config['pass'], $options);
} catch (PDOException $e) {
    error_log('Database connection failed: ' . $e->getMessage());
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Database connection failed.'
    ]);
    exit;
}
