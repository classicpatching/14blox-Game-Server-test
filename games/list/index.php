<?php
// ===============================
// BASE CONFIG (YOUR DOMAIN)
// ===============================
$baseUrl = "https://rbx.pii.at";

// Correct absolute-safe path for hosting
$jsonFile = __DIR__ . "/data/games.json";

// Games array
$games = [];

// ===============================
// LOAD JSON SAFELY
// ===============================
if (file_exists($jsonFile)) {
    $json = file_get_contents($jsonFile);
    $decoded = json_decode($json, true);

    // Ensure JSON is valid
    if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
        $games = $decoded;
    }
}

// ===============================
// SPLIT GAMES
// ===============================
$freeGames = array_slice($games, 0, 9);
$allGames = array_slice($games, 9);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>rbx.pii.at Games</title>

<style>
body {
    font-family: Arial;
    background: #fff;
    margin: 0;
    padding: 10px 15px;
    color: #000;
}

h2 {
    font-size: 22px;
    margin: 10px 0;
}

.games-grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 12px;
}

.game-card {
    border: 1px solid #ccc;
    text-decoration: none;
    color: inherit;
    background: #fff;
    display: flex;
    flex-direction: column;
}

.thumb-container {
    aspect-ratio: 16/10;
    background: #eee;
}

.thumb-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.game-title {
    font-size: 11px;
    padding: 6px;
    text-align: center;
    background: #f2f2f2;
    font-weight: bold;
}
</style>
</head>

<body>

<h2>Free Games</h2>

<div class="games-grid">
<?php foreach ($freeGames as $game): ?>
    <a class="game-card" href="/games/start?placeid=<?php echo $game['id']; ?>">

        <div class="thumb-container">
            <img 
                src="<?php echo $baseUrl; ?>/thumbs/games/<?php echo $game['id']; ?>.png"
                onerror="this.src='<?php echo $baseUrl; ?>/thumbs/default.png'"
            >
        </div>

        <div class="game-title">
            <?php echo htmlspecialchars($game['name']); ?>
        </div>

    </a>
<?php endforeach; ?>
</div>

<h2>All Games</h2>

<div class="games-grid">
<?php foreach ($allGames as $game): ?>
    <a class="game-card" href="/games/start?placeid=<?php echo $game['id']; ?>">

        <div class="thumb-container">
            <img 
                src="<?php echo $baseUrl; ?>/thumbs/games/<?php echo $game['id']; ?>.png"
                onerror="this.src='<?php echo $baseUrl; ?>/thumbs/default.png'"
            >
        </div>

        <div class="game-title">
            <?php echo htmlspecialchars($game['name']); ?>
        </div>

    </a>
<?php endforeach; ?>
</div>

</body>
</html>
