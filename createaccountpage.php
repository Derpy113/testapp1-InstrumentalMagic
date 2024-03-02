<?php
    session_start();
    include_once ("autoload.php");
    $ca = new CreateAccount(); //Istället för att ha ett controller objekt här så ska det ligga en Action i forms som pekar på den.
    $user_id = $ca->TryToCreateAccount();
    if ($user_id) {
        // Spara UserProfile_ID i session och omdirigera till profile.php
        $_SESSION['user_id'] = $user_id;
        header("Location: profile.php");
        exit();
    }

    if(array_key_exists('loginButton', $_POST)) { //JOSEF TODO Controller är oftast den som använder Header, ha det som allmän regel
        header("Location: profile.php");        //Lägg dessa två i Controller (I router?)
     }
    if(array_key_exists('goBackButton', $_POST)) {
        header("Location: " . $_SESSION['pageBeforeLogin']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        h1 {
            color: white;
        }
        h2 {
            color: white;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="form">
        <h1>Create account</h1>
        <form name="form" method="POST">
            <label><h2>Username: </h2></label>
            <input type="text" id="user" required name="user" value=<?php echo $ca->GetUsernameInput(); ?>>
            <label style="color: red"><?php echo $ca->GetUsernameError(); ?></label> <br>
            
            <label><h2>Password: </h2></label>
            <input type="password" id="pass" required name="pass" value=<?php echo $ca->GetPasswordInput(); ?>>
            <label style="color: red"><?php echo $ca->GetPasswordError(); ?></label> <br> <br>
            
            <input type="submit" id="btn" value="Create Account" name="submit">
        </form>
        <form name="otherForm" method="POST">
        <input type="submit" name="loginButton" class="button" value="Log in on existing account" /> <br>
        <input type="submit" name="goBackButton" class="button" value="Go Back" />
        </form>
    </div>
</body>
</html>