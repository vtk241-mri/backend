<a href="./index.php">Home</a>
<a href="stats.php">Статистика</a>
<a href="?page=404">Not Found</a>
<?php
ob_start();
require_once 'traffic_logger.php';

$page = $_GET['page'] ?? 'home';

if ($page === 'home') {
    http_response_code(200);
    echo "<h1>Головна сторінка</h1><p>Вітаємо!</p>";
} else {
    http_response_code(404);
    echo "<h1>404</h1><p>Сторінку не знайдено.</p>";
}


log_traffic();
ob_end_flush();

