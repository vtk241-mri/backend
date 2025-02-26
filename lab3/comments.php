<?php
$commentsFile = 'comments.txt';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name'] ?? '');
    $comment = trim($_POST['comment'] ?? '');

    if ($name !== '' && $comment !== '') {
        $line = $name . '||' . $comment . PHP_EOL;
        file_put_contents($commentsFile, $line, FILE_APPEND);
    }
}

$comments = [];
if (file_exists($commentsFile)) {
    $handle = fopen($commentsFile, 'r');
    if ($handle) {
        while (($line = fgets($handle)) !== false) {
            $line = trim($line);
            if ($line !== '') {
                $parts = explode('||', $line);
                if (count($parts) === 2) {
                    $comments[] = $parts;
                }
            }
        }
        fclose($handle);
    }
}

$fontSize = isset($_COOKIE['font_size']) ? $_COOKIE['font_size'] : '16px';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Коментарі</title>
    <style>
        body {
            font-size:
                <?= $fontSize ?>
            ;
        }

        table,
        th,
        td {
            border: 1px solid #555;
            border-collapse: collapse;
            padding: 5px;
        }
    </style>
</head>

<body>
    <h2>Залиште свій коментар</h2>
    <form action="comments.php" method="post">
        <label>Ім’я: <input type="text" name="name" required></label><br><br>
        <label>Коментар:<br>
            <textarea name="comment" rows="4" cols="50" required></textarea>
        </label><br><br>
        <button type="submit">Надіслати</button>
    </form>

    <h2>Поточні коментарі</h2>
    <?php if (count($comments) > 0): ?>
        <table>
            <tr>
                <th>Ім’я</th>
                <th>Коментар</th>
            </tr>
            <?php foreach ($comments as $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item[0]) ?></td>
                    <td><?= htmlspecialchars($item[1]) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>Коментарів поки немає.</p>
    <?php endif; ?>

    <a href="index.php">Повернутись на головну</a>
</body>

</html>