<?php
ob_start();

register_shutdown_function(function () {
    $error = error_get_last();
    $fatalTypes = [E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR];

    if ($error && in_array($error['type'], $fatalTypes)) {
        if (ob_get_length()) {
            ob_clean();
        }
        http_response_code(500);
        header('Content-Type: text/html; charset=UTF-8');

        $fixTime = date('H:i:s', time() + 3600);
        echo "<!DOCTYPE html>
<html lang='uk'>
<head><meta charset='UTF-8'><title>Помилка 500</title></head>
<body>
  <h1>Вибачте, сталася помилка сервера (500)</h1>
  <p>Ми вже працюємо над виправленням.</p>
  <p>Очікуваний час відновлення: {$fixTime}</p>
</body>
</html>";
    } else {
        if (ob_get_length()) {
            ob_end_flush();
        }
        http_response_code(200);
    }
});
