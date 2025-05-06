<?php
require 'db.php';

$data = json_decode(file_get_contents('php://input'), true);
$title = trim($data['title']);
$content = trim($data['content']);

if ($title === '' || $content === '') {
    http_response_code(400);
    echo json_encode(['error' => 'Поля не повинні бути порожні']);
    exit;
}

$stmt = $pdo->prepare("INSERT INTO notes (title, content) VALUES (?, ?)");
$stmt->execute([$title, $content]);

echo json_encode(['success' => true]);
?>