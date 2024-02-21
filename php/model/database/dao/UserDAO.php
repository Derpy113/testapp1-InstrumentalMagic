<?php

class UserDAO
{
    private Connection $con;

    function __construct(Connection $con)
    {
        $this->con = $con;
    }

    public function getUserByUsername($username)
    {
        $sqlQuery = 'SELECT * FROM userprofile WHERE Username = :username';
        $statement = $this->con->getPDO()->prepare($sqlQuery);
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

    public function countByName($username)
    {
        $sqlQuery = 'SELECT COUNT(*) AS total FROM userprofile WHERE Username = :username';
        $statement = $this->con->getPDO()->prepare($sqlQuery); 
        $statement->execute([ 'username' => $username ]);
        return $statement->fetch(PDO::FETCH_ASSOC);
        
    }

    public function createUser(string $username, string $userPassword)
    {
        //Note that the validation of data is done in CreateAccount, as that is the role of that controller class.
        //Also, at some point the functionality to add a profile picture might need to be added to this method.
        $sqlQuery = 'INSERT INTO userprofile (Username, UserPassword) VALUES (:username, :userPassword)';
        $statement = $this->con->getPDO()->prepare($sqlQuery); 
        $statement->execute([ 'username' => $username, 'userPassword' => $userPassword ]);
    }
}

?>