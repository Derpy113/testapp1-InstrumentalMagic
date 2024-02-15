<?php

//include("connection.php");

class CreateAccount
{
    private $usernameError = "";
    private $passwordError = "";

    function __construct()
    {
        // echo "a";
    }


    public function TryToCreateAccount()
    {
        if(isset($_POST['submit'])) //maybe remove this if statement, it's redundant
        {
            $username = $_POST['user'];
            $password = $_POST['pass'];

            $this->usernameError = $this->validateUsername($username);
            $this->passwordError = $this->validatePassword($password);
        }
    }


    private function validateUsername($username) //maybe make this public?
    {
        $co = new connectionObject();
        $count = $co->GetUserCOUNTByName($username);
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

    public function GetUsernameError()
    {
        return $this->usernameError;
    }

    public function GetPasswordError()
    {
        return $this->passwordError;
    }

    public function DummyFunction()
    {
        echo "Y";
    }
}

?>