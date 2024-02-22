<?php
    session_start();
    include_once ("autoload.php");
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
        <form name="loginform" method="POST" action="php/controller/login.php">
            <label>Username: </label>
            <input type="text" id="user" name="user" required value=<?php echo $login->GetUsernameInput(); ?>> <br> <!-- get $_SESSION variables here instead now that login no longer exists -->
            
            <label>Password: </label>
            <input type="password" id="pass" name="pass" required value=<?php echo $login->GetPasswordInput(); ?>> <br>
            
            <label style="color: red"><?php echo $login->GetLoginError(); ?></label> <br>

            <input type="submit" id="btn" value="Login" name="submit">
        </form>
        <form name="otherForm" method="POST">
        <input type="submit" name="createAccountButton" class="button" value="Create new account" /> <br>
        <input type="submit" name="goBackButton" class="button" value="Go Back" />
        </form>
    </div>
</body>
</html>