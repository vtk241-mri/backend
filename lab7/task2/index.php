<?php
require __DIR__ . '/rate_limit.php';

http_response_code(200);
header('Content-Type: text/html; charset=UTF-8');

ob_start();
?>
<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <title>Rate Limiting Demo</title>
</head>

<body>
    <h1>Вітаємо!</h1>
    <p>Ваш запит оброблено о <?= date('H:i:s') ?>.</p>
    <p>Ви використали <?= min(MAX_REQUESTS, $count + 1) ?> із <?= MAX_REQUESTS ?> дозволених запитів за останню хвилину.
    </p>
</body>

</html>
<?php
echo ob_get_clean();
