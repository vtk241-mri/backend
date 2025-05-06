<?php
include 'db.php';
$data = json_decode(file_get_contents("php://input"), true);

$name = trim($data['name']);
$email = trim($data['email']);
$password = $data['password'];

if (!$name || !$email || strlen($password) < 6) {
    echo json_encode(['success' => false, 'message' => 'Некоректні дані']);
    exit;
}

$stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
$stmt->execute([$email]);

if ($stmt->fetch()) {
    echo json_encode(['success' => false, 'message' => 'Email вже існує']);
    exit;
}

$hashed = password_hash($password, PASSWORD_DEFAULT);
$stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
$stmt->execute([$name, $email, $hashed]);

echo json_encode(['success' => true, 'message' => 'Користувача зареєстровано']);
