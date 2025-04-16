<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=lab5', 'homeuser', '1234');
    $pdo->setAttribute((PDO::ATTR_ERRMODE), PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM tov";
    $result = $pdo->query($sql);

    echo "<h2>Список товарів:</h2>";
    echo "<table border='1'>
            <tr><th>ID</th><th>Назва</th><th>Опис</th><th>Ціна</th><th>Кількість</th></tr>";
    foreach ($result as $row) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['title']}</td>
                <td>{$row['description']}</td>
                <td>{$row['price']} грн</td>
                <td>{$row['number']}</td>
              </tr>";
    }
    echo "</table>";

} catch (PDOException $e) {
    echo "Помилка підключення: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Головна</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <a href='insert.php'>Додати запис</a><br><br>
    <form action='delete.php' method='post'>
        <label for="id_tovar">Введіть ID товару для видалення:<input type='number' name='id_tovar' id="id_tovar"
                required></label>

        <input type='submit' value='Видалити'>
    </form>
</body>

</html>