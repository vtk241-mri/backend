<?php
session_start();
$_SESSION['form_data'] = $_POST;
$_SESSION['form_data']['games'] = $_POST['games'] ?? [];

if (!empty($_FILES['photo']['name'])) {
    $uploadDir = 'uploads/';
    $uploadFile = $uploadDir . basename($_FILES['photo']['name']);
    move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile);
    $_SESSION['form_data']['photo'] = $uploadFile;
}
?>
<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <title>Дані форми</title>
</head>

<body>
    <h2>Введені дані:</h2>
    <p>Логін: <?= htmlspecialchars($_POST['login']) ?></p>
    <p>Стать: <?= $_POST['gender'] == 'male' ? 'Чоловік' : 'Жінка' ?></p>
    <p>Місто:
        <?php
        switch ($_POST['city']) {
            case 'kyiv':
                echo 'Київ';
                break;
            case 'zhytomyr':
                echo 'Житомир';
                break;
            case 'lviv':
                echo 'Львів';
                break;
            default:
                echo 'Невідоме місто';
        }
        ?>
    </p>
    <p>Улюблені ігри: <?php
    if (isset($_POST['games']) && !empty($_POST['games'])) {
        $games = array_map(function ($game) {
            switch ($game) {
                case 'football':
                    return 'футбол';
                case 'basketball':
                    return 'баскетбол';
                case 'chess':
                    return 'шахи';
                case 'volleyball':
                    return 'волейбол';
                case 'worldoftanks':
                    return 'World Of Tanks';
                default:
                    return $game;
            }
        }, $_POST['games']);
        echo implode(', ', $games);
    } else {
        echo 'Немає';
    }
    ?></p>
    <p>Про себе: <?= nl2br(htmlspecialchars($_POST['about'])) ?></p>
    <?php if (!empty($_FILES['photo']['name'])): ?>
        <p>Фотографія:<br><img src="<?= $uploadFile ?>" width="150"></p>
    <?php endif; ?>
    <a href="index.php">Повернутися на головну</a>
</body>

</html>