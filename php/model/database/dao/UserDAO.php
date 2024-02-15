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
        $sql = "select COUNT(*) as total from login where username = '$username'";
        
        $statement = $this->con->getPDO()->prepare($sql); 
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}

?>