<?php
include 'db.php';

$data = json_decode(file_get_contents("php://input"), true);
$email = trim($data['email']);
$password = $data['password'];

$stmt = $pdo->prepare("SELECT id, name, email, password FROM users WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['password'])) {
    echo json_encode([
        'success' => true,
        'message' => 'Успішний вхід',
        'user' => [
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email']
        ]
    ]);
} else {
    echo json_encode(['success' => false, 'message' => 'Невірний email або пароль']);
}
