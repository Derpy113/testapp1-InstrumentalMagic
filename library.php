<?php
  include_once("autoload.php");

  $songController = new SongController();
  $songs = $songController->getSongs();

  // foreach ($songs as $song):
  //   if(array_key_exists('bwaaa',$_GET)){
  //     echo $song->title;
  //  }
  // endforeach;
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Library</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&display=swap" rel="stylesheet">
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
        <a class="navbar-item button-image index mr-2" href="index.php">Home</a>
        <a class="navbar-item button-image player mr-2" href="player.php">Player</a>
        <a class="navbar-item button-image library mr-2" href="library.php">Library</a>
        <a class="navbar-item button-image profile" href="profile.php">Profile</a>
      </div>
    </div>
  </nav>

  <!-- Innehåll på sidan -->
  <main>
    <div class="container">
      <?php foreach ($songs as $song){?> 
         <form action='player.php' method='get'>
            <input type='hidden' name='Song_ID' value="<?php echo htmlspecialchars($song->getSongId())?>">
            <button class="button" type="submit"> <?php echo htmlspecialchars($song->getTitle())?></button>
          </form>
      <?php }?>
    </div>
  </main>
</body>
</html>