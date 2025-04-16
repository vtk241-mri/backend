<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=company_db', 'homeuser', '1234');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Помилка підключення: ' . $e->getMessage();
}