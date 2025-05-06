<?php
$pdo = new PDO("mysql:host=localhost;dbname=lab7;charset=utf8", "root", "");

$since = date('Y-m-d H:i:s', strtotime('-1 day'));

$stmt404 = $pdo->prepare("SELECT COUNT(*) FROM traffic_logs WHERE status_code = 404 AND request_time > ?");
$stmt404->execute([$since]);
$count404 = $stmt404->fetchColumn();

$stmtTotal = $pdo->prepare("SELECT COUNT(*) FROM traffic_logs WHERE request_time > ?");
$stmtTotal->execute([$since]);
$total = $stmtTotal->fetchColumn();

$percentage = $total > 0 ? round(($count404 / $total) * 100, 2) : 0;

echo "<h2>Статистика трафіку за останню добу</h2>";
echo "<p>Всього запитів: $total</p>";
echo "<p>404 помилок: $count404</p>";
echo "<p>Відсоток 404: $percentage%</p>";

if ($percentage > 10) {
    echo "<p style='color: red;'>УВАГА: надто багато 404! Повідомлення адміністратору відправлено.</p>";
}
