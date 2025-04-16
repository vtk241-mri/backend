<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Головна</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>


    <?php include 'db.php'; ?>

    <h2>Список працівників</h2>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Ім’я</th>
            <th>Посада</th>
            <th>Зарплата</th>
            <th>Дії</th>
        </tr>

        <?php
        $stmt = $pdo->query("SELECT * FROM employees");
        foreach ($stmt as $row) {
            echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['name']}</td>
        <td>{$row['position']}</td>
        <td>{$row['salary']}</td>
        <td>
            <a href='edit.php?id={$row['id']}'>Редагувати</a> |
            <a href='delete.php?id={$row['id']}'>Видалити</a>
        </td>
    </tr>";
        }
        ?>
    </table>

    <h2>Додати працівника</h2>
    <form method="post">
        <input type="text" name="name" placeholder="Ім’я" required>
        <input type="text" name="position" placeholder="Посада" required>
        <input type="number" step="0.01" name="salary" placeholder="Зарплата" required>
        <button type="submit" name="add">Додати</button>
    </form>

    <a href="stats.php">Статистика</a>

    <?php
    if (isset($_POST['add'])) {
        $stmt = $pdo->prepare("INSERT INTO employees (name, position, salary) VALUES (?, ?, ?)");
        $stmt->execute([$_POST['name'], $_POST['position'], $_POST['salary']]);
        header("Location: index.php");
    }
    ?>
</body>

</html>