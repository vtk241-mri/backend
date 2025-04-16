<?php
include 'db.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM employees WHERE id = ?");
$stmt->execute([$id]);
$emp = $stmt->fetch();

if (isset($_POST['update'])) {
    $stmt = $pdo->prepare("UPDATE employees SET name=?, position=?, salary=? WHERE id=?");
    $stmt->execute([$_POST['name'], $_POST['position'], $_POST['salary'], $id]);
    header("Location: index.php");
}
?>

<h2>Редагувати працівника</h2>
<form method="post">
    <input type="text" name="name" value="<?= $emp['name'] ?>" required>
    <input type="text" name="position" value="<?= $emp['position'] ?>" required>
    <input type="number" step="0.01" name="salary" value="<?= $emp['salary'] ?>" required>
    <button type="submit" name="update">Оновити</button>
</form>