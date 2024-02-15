<?php
    //include("php/Controller/createaccount.php");
    $cao = new CreateAccount();
    if(isset($_POST['submit']))
    {
        $cao->TryToCreateAccount();
    }
    else
    {
        echo "(User input not yet received)";
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
            <input type="text" id="user" name="user">
            <label style="color: red"><?php echo $cao->GetUsernameError(); ?></label> <br>
            
            <label>Password: </label>
            <input type="password" id="pass" name="pass">
            <label style="color: red"><?php echo $cao->GetPasswordError(); ?></label> <br>
            
            <input type="submit" id="btn" value="Login" name="submit">
            <button type="button" onclick="location.href='index.php'">Go back</button>
        </form>
    </div>
</body>
</html>