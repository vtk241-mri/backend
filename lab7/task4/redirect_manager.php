<?php
ob_start();

$config = __DIR__ . '/redirects.json';
$map = json_decode(file_get_contents($config), true);

$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (isset($map[$requestPath])) {
    $target = $map[$requestPath];
    if ($target === '/404') {
        http_response_code(404);
        header('Content-Type: text/html; charset=UTF-8');
        echo "<!DOCTYPE html>
<html lang='uk'>
<head><meta charset='UTF-8'><title>404 Not Found</title></head>
<body>
  <h1>404 Not Found</h1>
  <p>Сторінку {$requestPath} було видалено або переміщено.</p>
</body>
</html>";
        ob_end_flush();
        exit;
    } else {
        header("Location: {$target}", true, 301);
        ob_end_flush();
        exit;
    }
}

ob_end_flush();
