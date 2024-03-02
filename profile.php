<?php
session_start();

include_once("autoload.php");
$userDAO = new UserDAO(new Connection());
$profileController = new ProfileController($userDAO);

if (!isset($_SESSION['user_id'])) {
    header("Location: loginpage.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_SESSION['user_id'];
    $profileController->handleRequest($userId, $_POST);
}

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
        h1 {
            color:white;
        }
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
            <div class="forms">
            <div class="field">
<!-- Ändra användaruppgifter formulär -->
<form method="post">
    <h2><br>Here you can change your username, update your password, and leave a review about the site! <br><br></h2>
    <div class="field">
        <label class="label"><h1>New username:</h1></label>
        <div class="control">
            <input class="input" type="text" name="newUsername">
        </div>
    </div>
    <div class="field">
        <label class="label"><h1>New password:</h1></label>
        <div class="control">
            <input class="input" type="password" name="newPassword">
        </div>
    </div>
    <div class="control">
        <button class="button is-link" type="submit" name="action" value="changeUsername">Change username</button>
        <button class="button is-link" type="submit" name="action" value="changePassword">Change password</button>
    </div>
</form>

<!-- Lämna en recension formulär -->
<form method="post">
    <div class="field" style="margin-top: 100px";>
        <label class="label"><h1>Rating (1-5):</h1></label>
        <div class="control">
            <input class="input" type="number" name="rating" min="1" max="5">
        </div>
    </div>
    <div class="field">
        <label class="label"><h1>Review the app:</h1></label>
        <div class="control">
            <textarea class="textarea" name="textContent"></textarea>
        </div>
    </div>
    <div class="control">
        <button class="button is-link" type="submit" name="action" value="leaveReview">Leave review!</button>
    </div>

    <form method="post">
    <div class="control">
        <button class="button is-danger" style="margin-top: 100px;" type="submit" name="action" value="logout">Log out</button>
    </div>
</form>
</form>

        </main>

    </body>
    </html>