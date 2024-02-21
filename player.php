<?php
    //include("login.php")
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
            background-color: black;
        }

    </style>
</head>
<body>
    <!-- Header/Menu -->
    <nav class="navbar is-black" role="navigation" aria-label="main navigation">
        <div class="navbar-menu">
            <div class="navbar-start">
            <a class="navbar-item" href="#">
            <img src="img/homebutton.png" alt="Home"></a>
                <a class="navbar-item" href="#">Player</a>
                <a class="navbar-item" href="#">Library</a>
                <a class="navbar-item" href="#">Profile</a>
            </div>
        </div>
    </nav>
    <main>

    <div class="content-container">
        <div class="control-buttons">
            <button class="button is-primary">PLAY</button>
            <button class="button is-link">PAUSE</button>
            <button class="button is-info">NEXT</button>
        </div>

        <figure class="image">
                    <object data="img/guitar_fretboard.svg" type="image/svg+xml">
                    </figure>
                    <svg>Your SVG code here</svg>
    </div>
    
    </main>
</body>
</html>