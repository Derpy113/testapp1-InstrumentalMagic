<?php

 include_once("autoload.php");

class Login
{
    private $usernameInput = "";
    private $passwordInput = "";

    private $loginError = "";

    public function SetLoginError()
    {
        if(isset($_POST['submit'])) //this "if" is always be true. Can be removed if it 
        {                           //will only ever be used when the statement is true.
            $this->usernameInput = $_POST['user'];
            $this->passwordInput = $_POST['pass']; //change 'user' and 'pass' later

            $this->loginError = $this->validateUsername($this->usernameInput, $this->passwordInput);
        }
    }


    private function validateUsername($username, $password) //maybe make this public?
    {
        $con = new Connection();
        $userDAO = new UserDAO($con);
        $user = $userDAO->getUserByUsername($username);
        if (is_null($user))
        {
            return "* Password is incorrect";
        }
        $actualPassword = $user->UserPassword;
        if ($password == $actualPassword && $password != "")
        {   
            return "";
        }
        else
        {
            return "* Password is incorrect";
        }
    }

    public function GetUsernameInput()
    {
        return $this->usernameInput;
    }

    public function GetPasswordInput()
    {
        return $this->passwordInput;
    }

    public function GetLoginError()
    {
        return $this->loginError;
    }
}

?>