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

<!--  Ifall användarens enhetsbredd är större än : 500px -> Så skall header vara "uppe på", dvs desktopläge -->

    <!-- meny -->
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

            <div class="text">
                <p>Play</p>
                <p>Pause</p>
                <p>Step Forward</p>
                <p>Step Backward</p>
                <p><br>Blind Ill - Smoke on The Water</p>
            </div>
            <div class="content">
                <!-- Lägg till ditt innehåll här -->
                <p>PLAYER!</p>
            </div>
        </div>
    </main>
</body>
</html>
