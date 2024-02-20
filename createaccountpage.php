<?php
    session_start();
    include_once ("autoload.php");
    $ca = new CreateAccount(); //Istället för att ha en controller här så ska det ligga en Action i forms som pekar på den.
    if(isset($_POST['submit']))
    {
        $ca->TryToCreateAccount();
        if ($ca->GetPasswordError() == "" && $ca->GetUsernameError() == "")
        {
            $_SESSION['username'] = $ca->GetUsernameInput();
            $_SESSION['password'] = $ca->GetPasswordInput();
            //If this doesn't work, then someone forgot to change
            //this variable on a different page.
            header("Location: " . $_SESSION['pageBeforeLogin']);
        }
    }

    if(array_key_exists('loginButton', $_POST)) { //Controller är oftast den som använder Header, ha det som allmän regel
        header("Location: loginpage.php");        //Använd Router.
    }
    if(array_key_exists('goBackButton', $_POST)) {
        header("Location: " . $_SESSION['pageBeforeLogin']);
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
        <h1>Create account</h1>
        <form name="form" method="POST">
            <label>Username: </label>
            <input type="text" id="user" required name="user" value=<?php echo $ca->GetUsernameInput(); ?>>
            <label style="color: red"><?php echo $ca->GetUsernameError(); ?></label> <br>
            
            <label>Password: </label>
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