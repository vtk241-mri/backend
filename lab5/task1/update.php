<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['user'])) {
    die("Ви не авторизовані.");
}

$user = $_SESSION['user'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $conn->prepare("UPDATE users SET first_name = ?, last_name = ?, email = ?, password = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password'], $user['id']);
    $stmt->execute();

    $_SESSION['user']['first_name'] = $_POST['first_name'];
    $_SESSION['user']['last_name'] = $_POST['last_name'];
    $_SESSION['user']['email'] = $_POST['email'];
    $_SESSION['user']['password'] = $_POST['password'];

    echo "Дані оновлено! <a href='index.php'>На головну</a>";
} else {
    ?>
    <h2>Редагування даних</h2>
    <form method="post">
        <label for="first_name">Ім’я користувача: </label>
        <input type="text" name="first_name" id="first_name" value="<?= $user['first_name'] ?>"><br>
        <label for="last_name">Прізвище користувача: </label>
        <input type="text" name="last_name" id="last_name" value="<?= $user['last_name'] ?>"><br>
        <label for="email">Електронна пошта: </label>
        <input type="email" name="email" id="email" value="<?= $user['email'] ?>"><br>
        <label for="password">Пароль: </label>
        <input type="password" name="password" id="password"><br>
        <button type="submit">Оновити</button>
    </form>

    <p><a href="index.php">На головну</a></p>
    <p><a href="delete.php">Видалити профіль</a></p>
<?php } ?>