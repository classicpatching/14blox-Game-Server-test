<?php
header('Content-Type: application/json');

// Здесь ты можешь добавить свои плейсы (карты)
$games = [
    [
        "PlaceId" => 1,
        "Name" => "игра",
        "Description" => "игра просто.",
        "Creator" => "N.User-1",
        "PlayerCount" => rand(50, 150), // Накручиваем онлайн для вида
        "Thumbnail" => "http://" . $_SERVER['HTTP_HOST'] . "/assets/thumb1.png"
    ]
];

echo json_encode($games);
?>
