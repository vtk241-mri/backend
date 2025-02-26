<?php
session_start();

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: auth.php");
    exit();
}

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($login === 'Admin' && $password === 'password') {
        $_SESSION['logged_in'] = true;
        $_SESSION['user'] = $login;
    } else {
        $error = 'Невірно введено логін або пароль';
    }
}

$fontSize = isset($_COOKIE['font_size']) ? $_COOKIE['font_size'] : '16px';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизація</title>
    <style>
        body {
            font-size:
                <?= $fontSize ?>
            ;
        }
    </style>
</head>

<body>
    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
        <h2>Добрий день, <?= htmlspecialchars($_SESSION['user']) ?>!</h2>
        <p><a href="auth.php?logout=1">Вийти</a></p>
    <?php else: ?>
        <?php if (!empty($error)): ?>
            <p style="color: red;"><?= $error ?></p>
        <?php endif; ?>
        <form action="auth.php" method="post">
            <label>Логін: <input type="text" name="login" required></label><br><br>
            <label>Пароль: <input type="password" name="password" required></label><br><br>
            <button type="submit">Увійти</button>
        </form>
    <?php endif; ?>
    <a href="index.php">Повернутись на головну</a>
</body>

</html>