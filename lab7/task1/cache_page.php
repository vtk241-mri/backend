<?php
$cacheFile = __DIR__ . '/cache.html';

if (file_exists($cacheFile) && !(isset($_GET['page']) && $_GET['page'] === 'notfound')) {
    header('X-Cache: HIT');
    echo file_get_contents($cacheFile);
    exit;
}

ob_start();

if (isset($_GET['page']) && $_GET['page'] === 'notfound') {
    http_response_code(404);
    echo "<h1>404 Not Found</h1><p>Сторінку не знайдено.</p>";
} else {
    http_response_code(200);
    echo "<h1>Завдання 1!</h1>";
    echo "<p>Динамічна сторінка, згенерована о " . date('H:i:s') . "</p>";
}

$status = http_response_code();
$content = ob_get_contents();
ob_end_flush();

if ($status === 200) {
    file_put_contents($cacheFile, $content);
} elseif ($status === 404 && file_exists($cacheFile)) {
    unlink($cacheFile);
}
