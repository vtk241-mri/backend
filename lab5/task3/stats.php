<?php include 'db.php'; ?>

<h2>Статистика</h2>

<?php
$avg = $pdo->query("SELECT AVG(salary) as avg_salary FROM employees")->fetchColumn();
echo "<p>Середня зарплата: <strong>" . round($avg, 2) . "</strong> грн</p>";

echo "<h3>Кількість працівників по посадах</h3>";
$stmt = $pdo->query("SELECT position, COUNT(*) as total FROM employees GROUP BY position");

echo "<ul>";
foreach ($stmt as $row) {
    echo "<li>{$row['position']}: {$row['total']} чол.</li>";
}
echo "</ul>";
?>
<a href="index.php">Назад</a>