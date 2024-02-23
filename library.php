<?php
  include_once("autoload.php");
  //require_once 'Connection.php'; // Antag att denna fil definierar din Connection-klass
//require_once 'SongDAO.php'; // Antag att denna fil definierar din SongDAO-klass
//require_once 'Song.php'; // Antag att denna fil definierar din Song-klass
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
        <a class="navbar-item" href="#">Player</a>
        <a class="navbar-item" href="library.php">Library</a>
        <a class="navbar-item" href="#">Profile</a>
      </div>
    </div>
  </nav>

  <!-- Innehåll på sidan -->
  <main>
    

  <?php $con = new Connection();
$songdao = new SongDAO($con); // Notera att $con nu korrekt passas till konstruktören

$songs = $songdao->findAll();
foreach ($songs as $song) {
    // Anta att $song->title är en publik egenskap i din Song-klass
    echo "<div><button><p>Artist: " . htmlspecialchars($song->Artist) . ($song->Rating) . "</p></button></div>";
    echo "<div><p>Genre: " . htmlspecialchars($song->Genre) . "</p></div>";
}
?>

<?php foreach ($numbers as $number): ?>
   <div class="container"><button><?= htmlspecialchars($number) ?></button></div>
<?php endforeach; ?>

    <!-- <div class="container">
      ?php foreach ($fruits as $fruit): ?>
        <button>?php echo $fruit; ?></button>
      ?php endforeach; ?>
    </div> -->

  </main>
</body>
</html>