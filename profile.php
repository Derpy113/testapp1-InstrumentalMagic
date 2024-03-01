<?php
        session_start();
        include_once("autoload.php");
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Instrumental Magic</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
        <link rel="stylesheet" href="style.css">
        <style>

        </style>    
    </head>
    <body>
        <!-- logga -->
        <header class="hero is-black">
            <div class="hero-body">
                <div class="container">
                    <img src="img/logo.PNG" alt="Min Logotyp" class="logo">
                </div>
            </div>
        </header>

        <!-- menyN -->
        <nav class="navbar is-black" role="navigation" aria-label="main navigation">
            <div class="navbar-menu">
                <div class="navbar-start">
                    <a class="navbar-item" href="index.php">Home</a>
                    <a class="navbar-item" href="player.php">Player</a>
                    <a class="navbar-item" href="library.php">Library</a>
                    <a class="navbar-item" href="profile.php">Profile</a>
                </div>
            </div>
        </nav>

        <!-- Innehåll på sidan -->
        <main>
            <div class="container">
                <p>Detta är din Profile hihi...</p>
                <p>text på hemsida, gitarr e bra!</p>
                <?php
                $_SESSION['username'] = NULL;
                //$_SESSION['username'] = "hallå";
                if ($_SESSION['username'] == NULL || $_SESSION['password'] == NULL)
                {
                    echo "Du är inte inloggad";
                }
                else
                {
                    echo nl2br("Namn: " . $_SESSION['username'] . "\n" . "Lösenord (woops :3): " . $_SESSION['password']);
                }
                ?>




            </div>
        </main>

    </body>
    </html>