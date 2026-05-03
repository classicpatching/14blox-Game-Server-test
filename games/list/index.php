<?php
// Если запрос идет от обычного браузера или WebView клиента
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { background: #333; color: white; font-family: sans-serif; text-align: center; }
        .game-card { border: 1px solid #555; padding: 20px; margin: 20px; border-radius: 10px; background: #444; }
        .play-button { 
            display: inline-block; padding: 15px 30px; 
            background: #0084ff; color: white; text-decoration: none; 
            font-weight: bold; border-radius: 5px; font-size: 20px;
        }
    </style>
</head>
<body>
    <h1>Roblox</h1>
    <div class="game-card">
        <h2>Игра просто</h2>
        <p>Описание: Игра просто.</p>
        <!-- КНОПКА МАГИИ -->
        <a href="#" onclick="window.external.StartGame('1', 'http://rbx.pii.at/game/join.ashx')" class="play-button">ИГРАТЬ</a>
    </div>

    <script>
        // Старый метод для вызова игрового ядра из WebView
        function startGame(placeId, joinUrl) {
            if (window.external && window.external.StartGame) {
                window.external.StartGame(placeId, joinUrl);
            } else {
                // Если мы в обычном браузере, просто покажем инфо
                alert("Это должно быть открыто в APK!");
            }
        }
    </script>
</body>
</html>
