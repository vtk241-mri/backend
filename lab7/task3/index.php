<?php
require __DIR__ . '/error_handler.php';

if (isset($_GET['crash'])) {
    undefined_function();
}

?>
<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <title>Головна сторінка</title>
</head>

<body>
    <h1>Вітаємо на нашому сайті!</h1>
    <p>Це звичайна сторінка без фатальних помилок.</p>
    <p>Для тесту помилки: <a href="?crash=1">натисніть сюди</a></p>
</body>

</html>