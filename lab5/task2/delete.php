<?php
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $id = $_POST['id_tovar'];

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=lab5', 'homeuser', '1234');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM tov WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);

        echo "Товар з ID $id видалено.";
    } catch (PDOException $e) {
        echo "Помилка підключення: " . $e->getMessage();
    }
}
?>

<a href="index.php">Назад</a>