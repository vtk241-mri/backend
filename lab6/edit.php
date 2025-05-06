<?php
include 'db.php';
$data = json_decode(file_get_contents("php://input"), true);

$id = $data['id'];
$name = trim($data['name']);
$email = trim($data['email']);

$stmt = $pdo->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
$stmt->execute([$name, $email, $id]);

echo json_encode(['success' => true, 'message' => 'Користувача оновлено']);
