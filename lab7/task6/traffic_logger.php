<?php
function log_traffic()
{
    $ip = $_SERVER['REMOTE_ADDR'];
    $time = date('Y-m-d H:i:s');
    $url = $_SERVER['REQUEST_URI'];
    $status = http_response_code();

    $pdo = new PDO("mysql:host=localhost;dbname=lab7;charset=utf8", "root", "");
    $stmt = $pdo->prepare("INSERT INTO traffic_logs (ip_address, request_time, request_url, status_code) VALUES (?, ?, ?, ?)");
    $stmt->execute([$ip, $time, $url, $status]);
}
