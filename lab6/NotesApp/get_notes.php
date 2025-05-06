<?php
require 'db.php';

$stmt = $pdo->query("SELECT * FROM notes ORDER BY id DESC");
$notes = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($notes);
?>