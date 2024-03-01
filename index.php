    <?php
        include_once("autoload.php");
       // require 'router.php';

        $reviewController = new ReviewController();
        $reviews = $reviewController->showReviews();
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Instrumental Magic</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="home.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&display=swap" rel="stylesheet">
        <style>

        </style>    
    </head>
    <body>
        <!-- logga -->
        <div>
            <h1 class="text-title-h1">InstrumentalMagic</h1>
        </div>

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
                    <!-- <a class="navbar-item" href="index.php">Home</a> -->
                    <a class="navbar-item button-image player mr-2" href="player.php">Player</a>
                    <a class="navbar-item button-image library mr-2" href="library.php">Library</a>
                    <a class="navbar-item button-image profile" href="profile.php">Profile</a>
                </div>
            </div>
        </nav>

        <!-- Innehåll på sidan -->
    <main>
        <div class="container">
        <?php if (empty($reviews)): ?>
            <div class="notification is-warning">
                <p>There are no reviews.</p>
            </div>
            <?php else: ?>
                <?php foreach ($reviews as $review): ?>
                    <div class="box limited-box">
                        <article class="media"> <!-- Korrekt stavning av article här -->
                            <figure class="media-left">
                                <p class="image is-64x64">
                                    <?php if ($review->getProfilePic() !== null): ?>
                                        <!-- Lägg till echo för att skriva ut base64-strängen -->
                                        <img src="data:image/jpeg;base64,<?php echo $review->getProfilePic() ?>" alt="ProfilePic">
                                    <?php endif; ?>
                                </p>
                            </figure>
                            <div class="media-content">
                                <p><strong><?= htmlspecialchars($review->getUsername()) ?>:</strong></p>
                                    <div class="star-rating">
                                        <?php for ($i = 1; $i <= $review->getRating(); $i++): ?>
                                            <span>★</span>
                                        <?php endfor; ?>
                                    </div>
                                <p><?= htmlspecialchars($review->getTextContent()) ?></p>
                            </div>
                        </article>                              
                    </div> 
                <?php endforeach; ?>
            <?php endif; ?> 
        </div>
    </main>

    </body>
    </html>