<?php
if (isset($_GET['font'])) {
    $font = $_GET['font'];
    switch ($font) {
        case 'big':
            $fontSize = '24px';
            break;
        case 'medium':
            $fontSize = '16px';
            break;
        case 'small':
            $fontSize = '12px';
            break;
        default:
            $fontSize = '16px';
            break;
    }
    setcookie('font_size', $fontSize, time() + 60 * 60 * 24 * 30, '/');
    header('Location: index.php');
    exit;
}

$fontSize = isset($_COOKIE['font_size']) ? $_COOKIE['font_size'] : '16px';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 3</title>
    <style>
        body {
            font-size:
                <?= $fontSize ?>
            ;
        }
    </style>
</head>

<body>
    <h2>Виберіть розмір шрифту:</h2>
    <a href="?font=big">Великий шрифт</a>
    <br>
    <a href="?font=medium">Середній шрифт</a>
    <br>
    <a href="?font=small">Маленький шрифт</a>
    <p>Перейти на <a href="page.php">іншу сторінку</a> для перевірки.</p>

    <p>Перейти на сторінку <a href="auth.php">авторизації</a></p>
    <p>Перейти на сторінку <a href="comments.php">коментарів</a></p>
    <p>Перейти на сторінку <a href="files.php">файлів</a></p>
    <p>Перейти на сторінку <a href="sort_words.php">слів</a></p>
    <p>Перейти на сторінку <a href="upload.php">відправки зображень на сервер</a></p>
    <p>Перейти на сторінку <a href="create_folder.php">створення папки</a></p>
    <p>Перейти на сторінку <a href="delete.php">видалення папки</a></p>

    <a href="/">Home Page</a>
</body>

</html>