<?php
session_start();
include 'db.php';

if (isset($_POST['login'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE login = ? AND password = ?");
    $stmt->bind_param("ss", $login, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $_SESSION['user'] = $result->fetch_assoc();
    } else {
        echo "<p>Неправильний логін або пароль</p>";
    }
}

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    echo "<p>Вітаємо, {$user['first_name']} . </p>";
    echo "<a href='update.php'>Редагувати дані</a> | 
          <a href='delete.php'>Видалити профіль</a> | 
          <a href='logout.php'>Вийти</a>";
} else {
    ?>
    <h2>Вхід</h2>
    <form method="post">
        <input type="text" name="login" required placeholder="Логін"><br>
        <input type="password" name="password" required placeholder="Пароль"><br>
        <button type="submit">Увійти</button>
    </form>
    <p>Немає акаунту? <a href="register.php">Зареєструватися</a></p>
    <?php
}
?>