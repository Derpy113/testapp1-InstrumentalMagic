<?php

 include_once("autoload.php");
 if(isset($_POST['submit']))
 {
    if(isset($_POST['submit'])) //this "if" is always be true. Can be removed if it 
    {                           //will only ever be used when the statement is true.
        $loginService = new LoginService($_POST['user'], $_POST['pass']);
    }
     if ($loginService->login() == true)
     {
         $_SESSION['username'] = $login->GetUsernameInput();
         $_SESSION['password'] = $login->GetPasswordInput();
         //If this doesn't work, then someone forgot to change
         //this variable on a different page.
         header("Location: " . $_SESSION['pageBeforeLogin']);
     }
 }

 if(array_key_exists('createAccountButton', $_POST)) { //JOSEF TODO Controller är oftast den som använder Header, ha det som allmän regel
     header("Location: createaccountpage.php");        //Lägg dessa två i Controller (I router?)
 }
 if(array_key_exists('goBackButton', $_POST)) {
     header("Location: " . $_SESSION['pageBeforeLogin']);
 }
?>