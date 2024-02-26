<?php
  include_once("autoload.php");

  $songController = new SongController();
  $songs = $songController->getSongs();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Library</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
  <link rel="stylesheet" href="style.css">
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
    
    <?php foreach ($songs as $song): ?>
        <div class="container">
        <form method="GET" action="player.php">
          <input type="submit" name="$songID" id=$song class="button" 
          value=<?php echo htmlspecialchars($song->Title) ." - " .
                      htmlspecialchars($song->Artist) . "<br>" .
                      "Genre: " . htmlspecialchars($song->Genre); ?> >
        </form>
    <?php endforeach; ?>

  </main>
</body>
</html>