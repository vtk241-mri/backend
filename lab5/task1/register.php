<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fields = ['first_name', 'last_name', 'login', 'password'];
    foreach ($fields as $field) {
        if (empty($_POST[$field])) {
            die("Поле $field не може бути пустим.");
        }
    }

    $stmt = $conn->prepare("SELECT id FROM users WHERE login =? OR email =?");
    $stmt->bind_param("ss", $_POST['login'], $_POST['email']);
    $stmt->execute();

    if ($stmt->get_result()->num_rows > 0) {
        die("Користувач з таким логіном або електронною поштою вже існує.");
    }

    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, login, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['login'], $_POST['password']);
    $stmt->execute();
    header("Location: index.php");
}
?>
<h2>Реєстрація</h2>
<form method="post">
    <input type="text" name="first_name" placeholder="Ім’я"><br>
    <input type="text" name="last_name" placeholder="Прізвище" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="text" name="login" placeholder="Логін" required><br>
    <input type="password" name="password" placeholder="Пароль" required><br>
    <button type="submit">Зареєструватися</button>
</form>

<p>Вже є акаунт? <a href="index.php">Увійти</a></p>