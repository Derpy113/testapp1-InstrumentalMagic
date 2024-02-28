<?php
// echo 1;
  include_once("autoload.php");

// echo 2;
  $playerController = new PlayerController();


  $songTitle = "No song loaded!";

  // Ladda låten baserat på Song_ID från URL
  if (isset($_GET['Song_ID'])) {
      $songID = $_GET['Song_ID'];
      $song = $playerController->getSongByID($songID);
    //   $songEvents = $playerController->loadSongEvents($song);

      if ($song !== null) {
          $songTitle = $song->getTitle();
          $eventsString = $song->getSong();
          $currentSongNotes = explode(',', $eventsString);
        
          print_r($currentSongNotes);
      }



  }



  //$songDAO = $playerController->getSongDAO();
  //$song = $songDAO->getSongByID(5);
  //$test2 = $playerController->getSongIDByURL();
  //$song = $songDAO->getSongByID($test2);

// $notes = $controller->getSongEvent();
// $songtest = $controller->getSongByID(5);

// $info = var_dump($song);
// if($song !== null)
// { 
//     echo $song->getTitle();

// } 
// else 
// { 
//     echo "Pick a song in Library!";

// }

//$songData = $playerController->getSongByID(5);

  
// echo 5;
// $notes = $controller->getSongEvent();
// $songtest = $controller->getSongByID(5);

 //$info = var_dump($songData);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instrumental Magic Player</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&display=swap" rel="stylesheet">
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
    <div class="songname"> <?php echo $songTitle; ?> </div>    

<div class="control-buttons">
    <button id="stepForward">STEP FORWARD</button>
    <button id="stepBackward">STEP BACKWARD</button>
    <button id="toStart">TO START</button>
    <button id="play">PLAY</button>
    <button id="stop">STOP</button>
</div>

<script>
$(document).ready(function() {
    notes = [];
    songPosition = 0;
    <?php foreach ($currentSongNotes as $songEvent) { ?>
    notes.push("<?php echo $songEvent ?>")

    <?php } ?>
    // alert(notes);
    // document.querySelectorAll('["id"='c1_2'")
    // alert(document.querySelector('[id="korv"]'))

    var stepForward = function() {
        // alert("Stepping forward!")
        if (songPosition > 0) {
            $("#" + notes[songPosition-1]).css("opacity", 0);
        }
        $("#" + notes[songPosition++]).css("opacity", 1)
    };

    $("#stepForward").on("click", stepForward);

    var stepBackward = function() {
    if (songPosition > 1) {
        $("#" + notes[songPosition-1]).css("opacity", 0);
        songPosition--;
        $("#" + notes[songPosition-1]).css("opacity", 1);
    }
};


$("#stepBackward").on("click", stepBackward);

    var interval;
    // $("#play").on("click", interval);

    $("#play").on("click", function() {
        interval = setInterval(function() {
            stepForward();
        }, 1000);
    });

    $("#stop").on("click", function() {
        clearInterval(interval);
    });

});

// function sendAction(action) {
//     fetch('player.php', {
//         method: 'POST',
//         headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
//         body: 'action=' + action
//     })
//     .then(response => response.json())
//     .then(data => {
//         document.getElementById('currentNote').textContent = 'Current Note: ' + data.currentNote;
//     })
//     .catch(error => console.error('Error:', error));
// }

</script>




        <figure class="image">
                    <!-- <object data="img/guitar_fretboard.svg" type="image/svg+xml"></object> -->
                    <?php include("img/guitar_fretboard.svg") ?>
                    </figure>
                    <svg>Your SVG code here</svg>
    </div>
    
    </main>
</body>
</html>
