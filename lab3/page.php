<?php
$fontSize = isset($_COOKIE['font_size']) ? $_COOKIE['font_size'] : '16px';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-size:
                <?= $fontSize ?>
            ;
        }
    </style>
</head>

<body>
    <h1>Сторінка тестування</h1>
    <a href="index.php">Повернутися на головну</a>
</body>