<?php
function rrmdir($dir)
{
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                $path = $dir . DIRECTORY_SEPARATOR . $object;
                if (is_dir($path))
                    rrmdir($path);
                else
                    unlink($path);
            }
        }
        rmdir($dir);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = trim($_POST["login"] ?? '');
    $password = trim($_POST["password"] ?? '');

    if ($login === '' || $password === '') {
        echo "Будь ласка, заповніть усі поля!";
        exit();
    }

    $userDir = $login;

    if (!is_dir($userDir)) {
        echo "Папка з логіном '$login' не існує!";
    } else {
        rrmdir($userDir);
        echo "Папку '$login' було успішно видалено!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Видалення папки користувача</title>
</head>

<body>
    <h2>Видалення папки користувача</h2>
    <form action="delete.php" method="post">
        <label>Логін: <input type="text" name="login" required></label><br><br>
        <label>Пароль: <input type="password" name="password" required></label><br><br>
        <button type="submit">Видалити папку</button>
    </form>
    <a href="index.php">Повернутися на головну</a>
</body>

</html>