<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
</head>

<body>
    <a href="./NotesApp/index.php">Notes App</a>
    <h2>Реєстрація користувача</h2>
    <form id="registerForm">
        <input type="text" name="name" placeholder="Ім'я" required /><br />
        <input type="email" name="email" placeholder="Email" required /><br />
        <input type="password" name="password" placeholder="Пароль (мін. 6 символів)" required /><br />
        <button type="submit">Зареєструвати</button>
    </form>

    <h2>Вхід</h2>
    <form id="loginForm">
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Пароль" required><br>
        <button type="submit">Увійти</button>
    </form>
    <div id="loginInfo"></div>


    <h2>Користувачі</h2>
    <button onclick="loadUsers()">Завантажити список</button>
    <ul id="userList"></ul>

    <script src="js/main.js"></script>
</body>

</html>