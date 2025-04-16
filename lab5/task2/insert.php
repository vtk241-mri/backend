<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Додавання товару</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form method="post">
        <label>Назва: <input type="text" name="title" required></label>
        <label>Опис: <textarea name="description" required></textarea></label>
        <label>Кількість: <input type="number" name="number" required></label>
        <label>Ціна: <input type="number" step="0.01" name="price" required><br></label>

        <input type="submit" value="Додати товар">
    </form>
</body>

</html>


<?php
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=lab5', 'homeuser', '1234');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO tov (title, description, price, number) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $_POST['title'],
            $_POST['description'],
            $_POST['price'],
            $_POST['number'] ?? 0
        ]);
    } catch (PDOException $e) {
        echo "Помилка підключення: " . $e->getMessage();
    }
}
?>
<a href="index.php">Назад</a>