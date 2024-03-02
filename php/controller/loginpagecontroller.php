<?php
 
 //header("Location: " . "http://localhost/testapp1-InstrumentalMagic/index.php");

 session_start();

 $rootDir = dirname(dirname(getcwd()));
 include_once ("$rootDir\\autoload.php");

 if(isset($_POST['submit']))
 {
    echo "111";
    if(isset($_POST['submit'])) //this "if" is always be true. Can be removed if it 
    {                           //will only ever be used when the statement is true.
        $loginService = new LoginService($_POST['user'], $_POST['pass']);
    }
     if ($loginService->login() == true)
     {
         //$_SESSION['username'] = $loginService->GetUsername();
         //$_SESSION['password'] = $loginService->GetPassword();

         $_SESSION['user_id'] = $loginService->getUserProfileID();
         $rootDir = dirname(dirname(getcwd()));

         header("Location: " . "http://localhost/testapp1-InstrumentalMagic/profile.php");
     }
     else
     {
        http_response_code(500);
        header("Status: Username is required");
        header("Location: " . "http://localhost/testapp1-InstrumentalMagic/loginpage.php");
     }
 }



 if(array_key_exists('createAccountButton', $_POST)) { //JOSEF TODO Controller är oftast den som använder Header, ha det som allmän regel
     header("Location: createaccountpage.php");        //Lägg dessa två i Controller (I router?)
 }
 if(array_key_exists('goBackButton', $_POST)) {
     header("Location: " . $_SESSION['pageBeforeLogin']);
 }
?>