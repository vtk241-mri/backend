<?php
session_start();
require_once 'db.php';
if (!isset($_SESSION['user'])) {
    die("Ви не авторизовані.");
}

$user_id = $_SESSION['user']['id'];

$stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();

session_destroy();
echo "Профіль видалено. <a href='index.php'>На головну</a>";