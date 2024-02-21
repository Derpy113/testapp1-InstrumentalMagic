<?php

class UserDAO
{
    private Connection $con;

    function __construct(Connection $con)
    {
        $this->con = $con;
    }

    public function countByName($username) //JOSEF TO-DO Add parameters here too
    {
        $sql = "select COUNT(*) as total from userprofile where Username = '$username'";
        
        $statement = $this->con->getPDO()->prepare($sql); 
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserByUsername($username)
    {
        $statement = $this->con->getPDO()->prepare('SELECT * FROM userprofile WHERE Username = :username');
        $statement->execute([ 'username' => $username ]);
        $statement->setFetchMode(PDO::FETCH_CLASS, 'userprofile');
        $user = $statement->fetch();
        if ($user == false )
        {
            return NULL;
        }
        else
        {
            return $user;
        }
    }

    public function createUser(string $Username, string $UserPassword) //JOSEF TO-DO Add parameters here too
    {
        //Note that the validation of data is done in CreateAccount, as that is the role of that controller class.
        //Also, at some point the functionality to add a profile picture might need to be added to this method.
        $sql = "INSERT INTO userprofile (Username, UserPassword) VALUES ('$Username', '$UserPassword')";
        
        $statement = $this->con->getPDO()->prepare($sql); 
        $statement->execute();
    }
}

?>