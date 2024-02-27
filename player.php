<?php
  include_once("autoload.php");

  $playerController = new PlayerController();
  $songDAO = $playerController->getSongDAO();
  //$song = $songDAO->getSongByID(5);
  $test2 = $playerController->getSongIDByURL();
  $song = $songDAO->getSongByID($test2);
// $notes = $controller->getSongEvent();
// $songtest = $controller->getSongByID(5);

$info = var_dump($song);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instrumental Magic Player</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="style.css">
    <style>

        body {
            background-color: black !important;
        }
        html {
            background-color: black !important;
        }

    </style>
</head>
<body>
<!-- <?php echo $info ?> -->

    <!-- Header/Menu -->
    <nav class="navbar is-black" role="navigation" aria-label="main navigation">
        <div class="navbar-menu">
            <div class="navbar-start">
            <a class="navbar-item" href="index.php">
            <img src="img/homebutton.png" alt="Home"></a>
                <a class="navbar-item" href="player.php">Player</a>
                <a class="navbar-item" href="library.php">Library</a>
                <a class="navbar-item" href="profile.php">Profile</a>
            </div>
        </div>
    </nav>
    <main>

    <div class="content-container">
    <div class="songname"> <?php if($song !== null){ echo $song->getTitle(); } else { echo "No song loaded!"; }?> </div>
        <div class="control-buttons">
            <button class="button">STEP FORWARD</button>
            <button class="button">STEP BACKWARD</button>
            <button class="button">TO START</button>
        </div>







        <figure class="image">
                    <object data="img/guitar_fretboard.svg" type="image/svg+xml"></object>
                    </figure>
                    <svg>Your SVG code here</svg>
    </div>
    
    </main>
</body>
</html>