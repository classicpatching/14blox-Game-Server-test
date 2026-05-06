<?php
include($_SERVER['DOCUMENT_ROOT'] . '/game/ProdRBX/Configuration.php');
include($_SERVER['DOCUMENT_ROOT'] . '/game/ProdRBX/FuncTypes.php');

header("Content-Type: application/json");

// Убираем лишние проверки, чтобы не было "Cannot process"
$placeId = isset($_GET['placeId']) ? (int)$_GET['placeId'] : 1818;
$UserId = rand(1, 5000);

// Формируем четкий JSON-ответ для клиента 2015
$data = [
    "jobId" => "TestJob" . rand(1, 999),
    "status" => 2, // Статус 2 — это "Joining", самый важный для старта
    "joinScriptUrl" => $baseUrl . "/Game/join.ashx?placeId=" . $placeId . "&user=" . $UserId,
    "authenticationUrl" => $baseUrl . "/Login/Negotiate.ashx",
    "authenticationTicket" => "Guest:" . $UserId,
    "message" => null
];

echo json_encode($data, JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
?>
