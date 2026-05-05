<?php
// Base URL for assets
$baseUrl = "https://rbx.pii.at";

// Path to JSON file
$jsonFile = __DIR__ . "/data/games.json";

// Games array (start empty)
$games = [];

// Load ONLY from JSON file
if (file_exists($jsonFile)) {
    $json = file_get_contents($jsonFile);
    $decoded = json_decode($json, true);

    // Accept only valid JSON array
    if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
        $games = $decoded;
    }
}

// Split games
$freeGames = array_slice($games, 0, 9);
$allGames = array_slice($games, 9);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>rbx.pii.at Games</title>

<style>
body {
    font-family: Arial;
    margin: 0;
    padding: 10px 15px;
    background: white;
}

h2 {
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
    color: black;
    display: flex;
    flex-direction: column;
}

.thumb {
    aspect-ratio: 16/10;
    background: #eee;
}

.thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.title {
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

        <div class="thumb">
            <img 
                src="<?php echo $baseUrl; ?>/thumbs/games/<?php echo $game['id']; ?>.png"
                onerror="this.src='<?php echo $baseUrl; ?>/thumbs/default.png'"
            >
        </div>

        <div class="title">
            <?php echo htmlspecialchars($game['name']); ?>
        </div>

    </a>
<?php endforeach; ?>
</div>

<h2>All Games</h2>

<div class="games-grid">
<?php foreach ($allGames as $game): ?>
    <a class="game-card" href="/games/start?placeid=<?php echo $game['id']; ?>">

        <div class="thumb">
            <img 
                src="<?php echo $baseUrl; ?>/thumbs/games/<?php echo $game['id']; ?>.png"
                onerror="this.src='<?php echo $baseUrl; ?>/thumbs/default.png'"
            >
        </div>

        <div class="title">
            <?php echo htmlspecialchars($game['name']); ?>
        </div>

    </a>
<?php endforeach; ?>
</div>

</body>
</html>
