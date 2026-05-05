<?php
// ===============================
// CONFIGURATION
// ===============================

// Base URL for images and assets
$baseUrl = "http://rbx.pii.at";

// Path to JSON file (must exist in /data/games.json)
$jsonFile = __DIR__ . "/data/games.json";

// Initialize games array
$games = [];

// ===============================
// LOAD JSON DATA
// ===============================
if (file_exists($jsonFile)) {
    $json = file_get_contents($jsonFile);

    // Decode JSON into PHP array
    $decoded = json_decode($json, true);

    // Check if JSON is valid
    if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
        $games = $decoded;
    }
}

// ===============================
// SPLIT GAMES
// ===============================

// First 9 games → Free Games section
$freeGames = array_slice($games, 0, 9);

// Remaining games → All Games section
$allGames = array_slice($games, 9);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Library</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            margin: 0;
            padding: 10px 15px;
            color: #000;
        }

        h2 {
            font-size: 22px;
            font-weight: bold;
            margin: 10px 0;
        }

        .section-header {
            display: flex;
            align-items: center;
            border-bottom: 1px solid #c0c0c0;
            padding-bottom: 6px;
            margin: 25px 0 15px 0;
        }

        .games-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 12px;
        }

        .game-card {
            border: 1px solid #d0d0d0;
            text-decoration: none;
            background: #fff;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            color: inherit;
        }

        .thumb-container {
            width: 100%;
            aspect-ratio: 1.6 / 1;
            background: #f0f0f0;
            overflow: hidden;
        }

        .thumb-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .game-title {
            background-color: #f2f2f2;
            border-top: 1px solid #d0d0d0;
            padding: 6px 4px;
            text-align: center;
            font-size: 11px;
            font-weight: bold;
            min-height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .see-more-card {
            border: 1px solid #d0d0d0;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #fff;
        }

        .error {
            color: red;
            font-size: 14px;
            margin: 10px 0;
        }
    </style>
</head>

<body>

<h2>Free Games</h2>

<?php if (empty($games)): ?>
    <div class="error">
        No games found. Check if data/games.json exists and is valid.
    </div>
<?php endif; ?>

<div class="games-grid">
    <?php foreach ($freeGames as $game): ?>
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
</div>

<!-- ALL GAMES -->
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
</div>

</body>
</html>
