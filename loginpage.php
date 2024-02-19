<?php
    //include("php/Controller/createaccount.php");
    include_once ("autoload.php");
    $cao = new Login();
    if(isset($_GET['location']))
    {
        echo "HAIIIIIIII";
        header("Location:loginpage.php?location=" . urlencode($_SERVER['REQUEST_URI']));
    }
    if(isset($_POST['submit']))
    {
        $cao->SetLoginError();
        if ($cao->GetLoginError() == "")
        {
            header("Location:loginpage.php?location=" . urlencode($_SERVER['REQUEST_URI']));
            //header("Location: index.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body>
    <div id="form">
        <h1>Log in</h1>
        <form name="form" method="POST">
            <label>Username: </label>
            <input type="text" id="user" name="user" required value=<?php echo $cao->GetUsernameInput(); ?>> <br>
            
            <label>Password: </label>
            <input type="password" id="pass" name="pass" required value=<?php echo $cao->GetPasswordInput(); ?>> <br>
            
            <label style="color: red"><?php echo $cao->GetLoginError(); ?></label> <br>

            <input type="submit" id="btn" value="Login" name="submit">
            <button type="button" onclick="location.href='index.php'">Go back</button>
        </form>
        <label>Emotional support eevee believes in you </label>
        <div class="tenor-gif-embed" data-postid="20928577" data-share-method="host" data-aspect-ratio="0.846875" data-width="20%"><a href="https://tenor.com/view/eevee-rasputin-gif-20928577">Eevee Rasputin GIF</a>from <a href="https://tenor.com/search/eevee-gifs">Eevee GIFs</a></div> <script type="text/javascript" async src="https://tenor.com/embed.js"></script>
    </div>
</body>
</html>