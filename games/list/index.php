<?php
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Games</title>
    <style>
        body { background: #111; color: #fff; font-family: sans-serif; text-align: center; }
        .box { border: 1px solid #444; padding: 20px; margin: 10px; background: #222; border-radius: 8px; }
        .play { 
            display: block; background: #06f; color: #fff; padding: 15px; 
            text-decoration: none; border-radius: 5px; font-weight: bold; 
        }
    </style>
</head>
<body>

<div class="box">
    <h3>Игра просто</h3>
    <p>Нажми кнопку ниже</p>
    <a href="javascript:void(0)" onclick="start()" class="play">ИГРАТЬ</a>
</div>

<script>
function start() {
    var placeId = 1;
    var joinUrl = "http://rbx.pii.at/game/join.ashx";

    // Пытаемся вызвать внутренний мост приложения
    try {
        if (window.external && window.external.StartGame) {
            window.external.StartGame(placeId, joinUrl);
            return;
        }
    } catch(e) {}

    // Если мост не сработал, пробуем тупо перейти по ссылке
    // Некоторые патчи перехватывают именно переход на .ashx
    window.location.href = joinUrl;
}
</script>

</body>
</html>
