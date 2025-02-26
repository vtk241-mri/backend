<?php
$file1 = 'file1.txt';
$file2 = 'file2.txt';

if (!file_exists($file1) || !file_exists($file2)) {
    die('Один або обидва файли file1.txt та file2.txt не знайдені.');
}


$content1 = file_get_contents($file1);
$content2 = file_get_contents($file2);

$words1 = preg_split('/\s+/', trim($content1));
$words2 = preg_split('/\s+/', trim($content2));

$count1 = array_count_values($words1);
$count2 = array_count_values($words2);

$onlyFirst = array_diff(array_keys($count1), array_keys($count2));

$common = array_intersect(array_keys($count1), array_keys($count2));

$moreThanTwo = [];
foreach ($count1 as $word => $cnt) {
    if ($cnt > 2 && isset($count2[$word]) && $count2[$word] > 2) {
        $moreThanTwo[] = $word;
    }
}

file_put_contents('only_first.txt', implode(PHP_EOL, $onlyFirst));
file_put_contents('common.txt', implode(PHP_EOL, $common));
file_put_contents('more_than_two.txt', implode(PHP_EOL, $moreThanTwo));

$deleteMessage = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['filename'])) {
    $filename = $_POST['filename'];
    $allowedFiles = ['only_first.txt', 'common.txt', 'more_than_two.txt'];
    if (in_array($filename, $allowedFiles) && file_exists($filename)) {
        if (unlink($filename)) {
            $deleteMessage = "Файл '$filename' успішно видалено.";
        } else {
            $deleteMessage = "Не вдалося видалити файл '$filename'.";
        }
    } else {
        $deleteMessage = "Невірне ім'я файлу або файл не існує.";
    }
}

$fontSize = isset($_COOKIE['font_size']) ? $_COOKIE['font_size'] : '16px';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Дії з файлами</title>
    <style>
        body {
            font-size:
                <?= $fontSize ?>
            ;
        }
    </style>
</head>

<body>
    <h2>Нові файли створені успішно</h2>
    <p><strong>only_first.txt</strong> містить слова, які зустрічаються тільки в першому файлі.</p>
    <p><strong>common.txt</strong> містить слова, які зустрічаються в обох файлах.</p>
    <p><strong>more_than_two.txt</strong> містить слова, які зустрічаються в кожному файлі більше двох разів.</p>

    <?php if ($deleteMessage): ?>
        <p style="color: red;"><?= htmlspecialchars($deleteMessage) ?></p>
    <?php endif; ?>

    <h3>Видалення файлу</h3>
    <form action="files.php" method="post">
        <label>Введіть ім'я файлу для видалення (наприклад: only_first.txt, common.txt, more_than_two.txt):</label><br>
        <input type="text" name="filename" required>
        <button type="submit">Видалити файл</button>
    </form>
    <a href="index.php">Повернутись на головну</a>
</body>

</html>