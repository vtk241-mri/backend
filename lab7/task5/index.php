<?php
require_once 'Response.php';

$response = new Response();
$response->setStatus(200);
$response->addHeader("Content-Type: text/html; charset=UTF-8");

$html = "<h1>Перевірка!</h1><p>DevTools -> Network</p>";
$response->send($html);
