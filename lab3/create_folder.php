<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = trim($_POST["login"] ?? '');
    $password = trim($_POST["password"] ?? '');

    if ($login === '' || $password === '') {
        echo "Будь ласка, заповніть усі поля!";
        exit();
    }

    $userDir = $login;

    if (is_dir($userDir)) {
        echo "Папка з логіном '$login' вже існує!";
    } else {
        if (mkdir($userDir, 0777, true)) {
            $subdirs = ["video", "music", "photo"];
            foreach ($subdirs as $subdir) {
                $subdirPath = $userDir . DIRECTORY_SEPARATOR . $subdir;
                if (mkdir($subdirPath, 0777, true)) {

                    $file1 = $subdirPath . DIRECTORY_SEPARATOR . "file1.txt";
                    $file2 = $subdirPath . DIRECTORY_SEPARATOR . "file2.txt";
                    file_put_contents($file1, "файл 1 у папці $subdir");
                    file_put_contents($file2, "файл 2 у папці $subdir");
                } else {
                    echo "Не вдалося створити підпапку $subdirPath<br>";
                }
            }
            echo "Папка з логіном '$login' створена успішно!";
        } else {
            echo "Не вдалося створити папку '$login'";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Створення папки користувача</title>
</head>

<body>
    <h2>Створення папки користувача</h2>
    <form action="create_folder.php" method="post">
        <label>Логін: <input type="text" name="login" required></label><br><br>
        <label>Пароль: <input type="password" name="password" required></label><br><br>
        <button type="submit">Створити папку</button>
    </form>
    <a href="index.php">Повернутися на головну</a>
</body>

</html>