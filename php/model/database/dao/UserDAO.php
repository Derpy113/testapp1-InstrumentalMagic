<?php

class UserDAO
{
    private Connection $con;

    function __construct(Connection $con)
    {
        $this->con = $con;
    }

    private function getDefaultProfilePic()
    {
        $defaultImage = 'img/ProfilePic/anonymous.jpg';
        return file_get_contents($defaultImage);
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
        $imageContent = $this->getDefaultProfilePic();

        $sqlQuery = 'INSERT INTO userprofile (Username, UserPassword, ProfilePic) VALUES (:username, :userPassword, :profilePic)';
        $statement = $this->con->getPDO()->prepare($sqlQuery);        
        $statement->bindParam(':username', $username);
        $statement->bindParam(':userPassword', $userPassword); // Antag att lösenordet redan är säkert hashat
        $statement->bindParam(':profilePic', $imageContent, PDO::PARAM_LOB);
        
        $statement->execute();
        
        return $this->con->getPDO()->lastInsertId(); // Returnera ID för det nyligen skapade kontot
    }

    public function updateUsername($userId, $newUsername) {
        $sqlQuery = 'UPDATE userprofile SET Username = :newUsername WHERE UserProfile_ID = :userId';
        $statement = $this->con->getPDO()->prepare($sqlQuery);
        $statement->execute(['newUsername' => $newUsername, 'userId' => $userId]);
    }
    
    public function updateUserPassword($userId, $newPassword) {
        $sqlQuery = 'UPDATE userprofile SET UserPassword = :newPassword WHERE UserProfile_ID = :userId';
        $statement = $this->con->getPDO()->prepare($sqlQuery);
        $statement->execute(['newPassword' => $newPassword, 'userId' => $userId]);
    }
}

?>