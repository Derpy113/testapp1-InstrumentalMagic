<?php
    session_start();
    include_once ("autoload.php");
    $login = new Login();
    if(isset($_POST['submit']))
    {
        $login->SetLoginError();
        if ($login->GetLoginError() == "")
        {
            $_SESSION['username'] = $login->GetUsernameInput();
            $_SESSION['password'] = $login->GetPasswordInput();
            //If this doesn't work, then someone forgot to change
            //this variable on a different page.
            header("Location: " . $_SESSION['pageBeforeLogin']);
        }
    }

    if(array_key_exists('createAccountButton', $_POST)) {
        header("Location: createaccountpage.php");
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
        <h1>Log in</h1>
        <form name="loginform" method="POST">
            <label>Username: </label>
            <input type="text" id="user" name="user" required value=<?php echo $login->GetUsernameInput(); ?>> <br>
            
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