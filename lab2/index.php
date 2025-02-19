<?php
session_start();
if (!isset($_SESSION['form_data'])) {
    $_SESSION['form_data'] = [];
}

$lang = $_GET['lang'] ?? ($_COOKIE['lang'] ?? 'ukr');
setcookie('lang', $lang, time() + 180 * 24 * 60 * 60);
$languages = ['ukr' => 'Українська', 'eng' => 'English', 'france' => 'France', 'pl' => "Poland", 'germany' => "Germany"];

$formData = $_SESSION['form_data'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Головна</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <a href="lab2.php">Завдання 1-2</a>

    <p>Вибрана мова: <?= $languages[$lang] ?></p>
    <div class="langs">
        <a href="index.php?lang=ukr">
            <img src="img/ukraine.jpg" alt="Ukraine language">
        </a>
        <a href="index.php?lang=eng">
            <img src="img/america.png" alt="">
        </a>
        <a href="index.php?lang=france">
            <img src="img/france.png" alt="">
        </a>
        <a href="index.php?lang=germany">
            <img src="img/germany.png" alt="">
        </a>
        <a href="index.php?lang=pl">
            <img src="img/poland.png" alt="">
        </a>
    </div>
    <form action="submit.php" method="post" enctype="multipart/form-data">
        <label>Логін: <input type="text" name="login" value="<?= $formData['login'] ?? '' ?>" required></label><br>
        <label>Пароль: <input type="password" name="password" required></label><br>
        <label>Повтор паролю: <input type="password" name="password_repeat" required></label><br>
        <label>Стать:
            <input type="radio" name="gender" value="male" <?= isset($formData['gender']) && $formData['gender'] == 'male' ? 'checked' : '' ?>> Чоловік
            <input type="radio" name="gender" value="female" <?= isset($formData['gender']) && $formData['gender'] == 'female' ? 'checked' : '' ?>> Жінка
        </label><br>
        <label>Місто:
            <select name="city">
                <option value="kyiv" <?= isset($formData['city']) && $formData['city'] == 'kyiv' ? 'selected' : '' ?>>Київ
                </option>
                <option value="zhytomyr" <?= isset($formData['city']) && $formData['city'] == 'zhytomyr' ? 'selected' : '' ?>>Житомир
                </option>
                <option value="lviv" <?= isset($formData['city']) && $formData['city'] == 'lviv' ? 'selected' : '' ?>>Львів
                </option>
            </select>
        </label><br>
        <label>Улюблені ігри:<br>
            <input type="checkbox" name="games[]" value="chess" <?= isset($formData['games']) && in_array('chess', $formData['games']) ? 'checked' : '' ?>> шахи<br>
            <input type="checkbox" name="games[]" value="football" <?= isset($formData['games']) && in_array('football', $formData['games']) ? 'checked' : '' ?>> футбол
            <input type="checkbox" name="games[]" value="basketball" <?= isset($formData['games']) && in_array('basketball', $formData['games']) ? 'checked' : '' ?>> баскетбол
            <input type="checkbox" name="games[]" value="volleyball" <?= isset($formData['games']) && in_array('volleyball', $formData['games']) ? 'checked' : '' ?>> волейбол
            <input type="checkbox" name="games[]" value="worldoftanks" <?= isset($formData['games']) && in_array('worldoftanks', $formData['games']) ? 'checked' : '' ?>> World Of Tanks
        </label><br>
        <label>Про себе:<br>
            <textarea name="about"><?= $formData['about'] ?? '' ?></textarea>
        </label><br>
        <label>Фотографія: <input type="file" name="photo"></label><br>
        <button type="submit">Реєстрація</button>
    </form>

    <?php
    require 'Function/func.php';
    ?>
    <h2>Робота з функціями</h2>
    <form action="calculate.php" method="post">
        <label for="x">Введіть x:</label>
        <input type="number" name="x" step="any" required>
        <br>

        <label for="y">Введіть y (для xy):</label>
        <input type="number" name="y" step="any">
        <br>

        <button type="submit">Обчислити</button>
    </form>
</body>

</html>