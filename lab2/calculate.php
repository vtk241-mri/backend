<?php
require 'Function/func.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $x = isset($_POST['x']) ? floatval($_POST['x']) : 0;
    $y = isset($_POST['y']) ? floatval($_POST['y']) : 0;

    $results = [
        "sin($x)" => my_sin($x),
        "cos($x)" => my_cos($x),
        "tg($x)" => my_tg($x),
        "my_tg($x)" => my_custom_tg($x),
        "$x ^ $y" => xy($x, $y),
        "$x!" => factorial($x)
    ];
}
?>
<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <title>Результат обчислень</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h2>Результат обчислення</h2>
    <table>
        <thead>
            <tr>
                <?php foreach ($results as $operation => $result): ?>
                    <th><?php echo $operation; ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php foreach ($results as $result): ?>
                    <td><?php echo $result; ?></td>
                <?php endforeach; ?>
            </tr>
        </tbody>
    </table>
    <a href="index.php">Назад</a>
</body>

</html>