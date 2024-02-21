<?php

class UserDAO
{
    private Connection $con;

    function __construct(Connection $con)
    {
        $this->con = $con;
    }

    public function countByName($username)
    {
        $sql = "select COUNT(*) as total from userprofile where Username = '$username'";
        
        $statement = $this->con->getPDO()->prepare($sql); 
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function getPasswordOfUser($username) //redundant when getUser is implemented
    {
        //$sql = "select UserPassword from userprofile where Username = '$username'";
        
        //$statement = $this->con->getPDO()->prepare($sql); 
        //$statement->execute();
        //$result = $statement->fetch(PDO::FETCH_ASSOC); //Använd fetchClass istället så mycket som möjligt.
        //if ($result == false )
        //{
        //    return "";
        //}
        //else
        //{
        //    return $result["UserPassword"];
        //}

        $sql = "select * from userprofile where Username = '$username'";
        
        $statement = $this->con->getPDO()->prepare($sql); 
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, 'userprofile');
        $result = $statement->fetch(); //Använd fetchClass istället så mycket som möjligt.
        echo $result->UserProfile_ID;
        //if ($result == false )
        //{
        //    return "";
        //}
        //else
        //{
        //    return $result["UserPassword"];
        //}
    }

    public function createUser(string $Username, string $UserPassword)
    {
        //Note that the validation of data is done in CreateAccount, as that is the role of that controller class.
        //Also, at some point the functionality to add a profile picture might need to be added to this method.
        $sql = "INSERT INTO userprofile (Username, UserPassword) VALUES ('$Username', '$UserPassword')";
        
        $statement = $this->con->getPDO()->prepare($sql); 
        $statement->execute();
    }
}

?>