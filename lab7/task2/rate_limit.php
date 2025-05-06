<?php

define('MAX_REQUESTS', 5);
define('WINDOW_SECONDS', 60);

$logFile = __DIR__ . '/requests.log';

$ip = $_SERVER['REMOTE_ADDR'];

$now = time();

$entries = [];
if (file_exists($logFile)) {
    foreach (file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
        list($entryIp, $ts) = explode('|', $line);
        if ($now - (int) $ts <= WINDOW_SECONDS) {
            $entries[] = [$entryIp, (int) $ts];
        }
    }
}

$count = 0;
foreach ($entries as $e) {
    if ($e[0] === $ip) {
        $count++;
    }
}

if ($count < MAX_REQUESTS) {
    $entries[] = [$ip, $now];
}

file_put_contents(
    $logFile,
    implode("\n", array_map(
        fn($e) => "{$e[0]}|{$e[1]}",
        $entries
    )) . "\n"
);

if ($count >= MAX_REQUESTS) {
    http_response_code(429);
    header('Content-Type: text/plain; charset=UTF-8');
    echo "429 Too Many Requests\nБудь ласка, спробуйте пізніше.";
    exit;
}
