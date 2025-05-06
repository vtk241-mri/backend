<?php
include 'db.php';
$stmt = $pdo->query("SELECT id, name, email FROM users ORDER BY id ASC");
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
