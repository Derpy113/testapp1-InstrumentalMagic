<?php
include_once("autoload.php");
$profileController = new ProfileController();
$userDAO = new UserDAO(new Connection());

// if (!isset($_SESSION['user_id'])) {
//     header("Location: loginpage.php");
//     exit;
// }

// $UserProfile_ID = $_SESSION['user_id'];

// Kontrollera om formuläret har skickats
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $UserProfile_ID = 2; // hårdkodat -> kommer ersättas med sessionsvariabeln efter inlogg.
    $textContent = $_POST['textContent'];
    $rating = $_POST['rating'];

    $profileController->addReview($UserProfile_ID, $textContent, $rating);

    // ger input tack för recension
    echo "<script>alert('Tack för din recension!');</script>";
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
            <form method="post">
            <div class="field">
                <label class="label"><h1>Rating (1-5)</h1></label>
                <div class="control">
                    <input class="input" type="number" name="rating" min="1" max="5" required>
                </div>
            </div>
            <div class="field">
                <label class="label"><h1>Recension</h1></label>
                <div class="control">
                    <textarea class="textarea" name="textContent" required></textarea>
                </div>
            </div>
            <div class="control">
                <button class="button is-link" type="submit">Lämna en recension om appen!</button>
            </div>
        </form>


            </div>

            </div>
        </main>

    </body>
    </html>