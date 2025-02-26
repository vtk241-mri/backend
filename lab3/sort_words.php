<?php
$filename = 'words.txt';

if (!file_exists($filename)) {
    die('Файл words.txt не знайдено.');
}

$content = file_get_contents($filename);
$words = preg_split('/\s+/', trim($content));

sort($words, SORT_STRING | SORT_FLAG_CASE);

$fontSize = isset($_COOKIE['font_size']) ? $_COOKIE['font_size'] : '16px';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сортування слів</title>
    <style>
        body {
            font-size:
                <?= $fontSize ?>
            ;
        }
    </style>
</head>

<body>
    <h2>Слова впорядковані за алфавітом</h2>
    <p><?= htmlspecialchars(implode(' ', $words)) ?></p>
    <a href="index.php">Повернутись на головну</a>
</body>

</html>