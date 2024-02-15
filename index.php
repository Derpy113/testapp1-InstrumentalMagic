<?php
    include("login.php")
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
        <h1>Login form</h1>
        <form name="form" method="POST">
            <label>Username: </label>
            <input type="text" id="user" name="user">
            <br>
            <label>Password: </label>
            <input type="password" id="pass" name="pass">
            <br>
            <input type="submit" id="btn" value="Login" name="submit">
            <button class="login-button">button</button>
            <button type="button" onclick="location.href='createaccountpage.php'"></button>
        </form>
    </div>
</body>
</html>