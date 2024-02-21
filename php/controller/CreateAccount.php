<?php

 include_once("autoload.php");

class CreateAccount
{
    private $usernameInput = "";
    private $passwordInput = "";

    private $usernameError = "";
    private $passwordError = "";

    public function TryToCreateAccount()
    {
        if(isset($_POST['submit'])) //maybe remove this if statement, it will currently always be true
        {
            $this->validateInput();
            if ($this->usernameError == "" && $this->passwordError == "")
            {
                $con = new Connection();
                $userDAO = new UserDAO($con);
                $userDAO->createUser($this->usernameInput, $this->passwordInput);
            }
        }
    }

    private function validateInput()
    {
        $this->usernameInput = $_POST['user'];
        $this->passwordInput = $_POST['pass'];

        $this->usernameError = $this->validateUsername($this->usernameInput);
        $this->passwordError = $this->validatePassword($this->passwordInput);
    }

    private function validateUsername($username) //maybe make this public?
    {
        $con = new Connection();
        $userDAO = new UserDAO($con);
        $count = $userDAO->countByName($username);
        if ($count['total'] > 0)
        {
            return "* Username is already in use";
        }
        else
        {
            return "";
        }
    }

    private function validatePassword($password) //ditto
    {
        if (strlen($password) < 8)
        {
            return "* Password must be at least 8 characters long";
        }
        else if(!preg_match('/[A-Z]/', $password))
        {
            return "* Password must contain at least one UPPERCASE letter";
        }
        else if(!preg_match('/[a-z]/', $password))
        {
            return "* Password must contain at least one lowercase letter";
        }
        else if (!preg_match('/[\'^£$%&*()}{@#~?><>,.|=_+¬-]/', $password))
        {
            return "* Password must contain at least one special character";
        }
        else
        {
            return "";
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

    public function GetUsernameError()
    {
        return $this->usernameError;
    }

    public function GetPasswordError()
    {
        return $this->passwordError;
    }
}

?>