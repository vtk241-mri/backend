<?php
require 'db.php';

$data = json_decode(file_get_contents('php://input'), true);
$id = (int) $data['id'];
$title = trim($data['title']);
$content = trim($data['content']);

if ($id <= 0 || $title === '' || $content === '') {
    http_response_code(400);
    echo json_encode(['error' => 'Некоректні дані']);
    exit;
}

$stmt = $pdo->prepare("UPDATE notes SET title = ?, content = ? WHERE id = ?");
$stmt->execute([$title, $content, $id]);

echo json_encode(['success' => true]);
?>