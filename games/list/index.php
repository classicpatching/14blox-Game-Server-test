<?php
// Base URL for assets
$baseUrl = "http://rbx.pii.at";

// Load games from local JSON file
// Example file: data/games.json
$jsonFile = __DIR__ . "/data/games.json";

if (file_exists($jsonFile)) {
    $dbGames = json_decode(file_get_contents($jsonFile), true);
    if (!is_array($dbGames)) {
        $dbGames = [];
    }
} else {
    $dbGames = [];
}

// Split games into two sections:
// First 9 → Free Games
// Rest → All Games
$freeGames = array_slice($dbGames, 0, 9);
$allGames = array_slice($dbGames, 9);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Library</title>

    <style>
        body { font-family: Arial, sans-serif; background-color: #ffffff; margin: 0; padding: 10px 15px; color: #000; }

        h2 { font-size: 22px; font-weight: bold; margin: 10px 0; }

        .section-header { display: flex; align-items: center; border-bottom: 1px solid #c0c0c0; padding-bottom: 6px; margin: 25px 0 15px 0; }

        .games-grid { display: grid; grid-template-columns: repeat(5, 1fr); gap: 12px; }

        .game-card { border: 1px solid #d0d0d0; text-decoration: none; background: #fff; display: flex; flex-direction: column; overflow: hidden; color: inherit; }

        .thumb-container { width: 100%; aspect-ratio: 1.6 / 1; background: #f0f0f0; overflow: hidden; }

        .thumb-container img { width: 100%; height: 100%; object-fit: cover; }

        .game-title { background-color: #f2f2f2; border-top: 1px solid #d0d0d0; padding: 6px 4px; text-align: center; font-size: 11px; font-weight: bold; min-height: 28px; display: flex; align-items: center; justify-content: center; }

        .see-more-card { border: 1px solid #d0d0d0; display: flex; align-items: center; justify-content: center; background-color: #fff; }
    </style>
</head>

<body>

<h2>Free Games</h2>

<div class="games-grid">
    <?php foreach ($freeGames as $game): ?>
        <a href="/games/start?placeid=<?php echo $game['id']; ?>" class="game-card">

            <!-- Game thumbnail -->
            <div class="thumb-container">
                <img 
                    src="<?php echo $baseUrl; ?>/thumbs/games/<?php echo $game['id']; ?>.png"
                    onerror="this.src='<?php echo $baseUrl; ?>/thumbs/default.png'"
                >
            </div>

            <!-- Game name -->
            <div class="game-title">
                <?php echo htmlspecialchars($game['name']); ?>
            </div>

        </a>
    <?php endforeach; ?>

    <div class="see-more-card">
        <img src="../images/lol.png" alt="See More">
    </div>
</div>

<!-- ALL GAMES SECTION -->
<div class="section-header">
    <h2>All Games</h2>
</div>

<div class="games-grid">
    <?php foreach ($allGames as $game): ?>
        <a href="/games/start?placeid=<?php echo $game['id']; ?>" class="game-card">

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

    <?php if (count($allGames) > 0): ?>
    <div class="see-more-card">
        <img src="../images/lol.png" alt="See More">
    </div>
    <?php endif; ?>
</div>

</body>
</html>
