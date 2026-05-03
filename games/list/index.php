<?php
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { background: #222; color: #fff; font-family: Arial; text-align: center; margin: 0; padding: 20px; }
        .card { background: #333; border-radius: 10px; padding: 20px; box-shadow: 0 4px 10px rgba(0,0,0,0.5); }
        h1 { font-size: 24px; }
        p { color: #ccc; }
        .btn { 
            display: block; width: 100%; background: #007bff; color: white; 
            padding: 15px 0; text-decoration: none; border-radius: 5px; 
            font-weight: bold; font-size: 20px; margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="card">
    <h1>Игра</h1>
    <p>Описание: игра просто.</p>
    
    <!-- Кнопка вызова движка через window.external -->
    <a href="javascript:void(0)" onclick="play()" class="btn">ИГРАТЬ</a>
</div>

<script>
function play() {
    var placeId = 1;
    var joinUrl = "http://rbx.pii.at/game/join.ashx";
    
    // Стандартный метод для старых APK, чтобы закрыть WebView и начать игру
    if (window.external && typeof window.external.StartGame !== "undefined") {
        window.external.StartGame(placeId, joinUrl);
    } else {
        // Запасной вариант через протокол, если window.external заблокирован
        window.location.href = "robloxmobile://placeID=" + placeId + "&joinlocation=" + encodeURIComponent(joinUrl);
    }
}
</script>

</body>
</html>
