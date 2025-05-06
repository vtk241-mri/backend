<?php
require 'db.php';

$data = json_decode(file_get_contents('php://input'), true);
$id = (int) $data['id'];

if ($id <= 0) {
    http_response_code(400);
    echo json_encode(['error' => 'Некоректний ID']);
    exit;
}

$stmt = $pdo->prepare("DELETE FROM notes WHERE id = ?");
$stmt->execute([$id]);

echo json_encode(['success' => true]);
?>