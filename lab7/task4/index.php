<?php
require __DIR__ . '/redirect_manager.php';

$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

http_response_code(200);
header('Content-Type: text/html; charset=UTF-8');

switch ($requestPath) {
    case '/':
        $title = 'Головна';
        $body = '<p>Це головна сторінка.</p>';
        break;

    case '/new-page':
        $title = 'Нова сторінка';
        $body = '<p>Ви потрапили на нову сторінку.</p>';
        break;

    default:
        http_response_code(404);
        $title = '404 Not Found';
        $body = '<h1>404 Not Found</h1><p>Сторінку не знайдено.</p>';
        break;
}

echo "<!DOCTYPE html>
<html lang='uk'>
<head><meta charset='UTF-8'><title>{$title}</title></head>
<body>
  <h1>{$title}</h1>
  {$body}
  <p><a href='/'>На головну</a></p>
</body>
</html>";
