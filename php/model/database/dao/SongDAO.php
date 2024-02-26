<?php
  include_once("autoload.php");

Class SongDAO
{
  private Connection $con;
  

  public function __construct(Connection $con)
  {
    $this->con = $con;  
  }

  public function findAll()
  {
    $sqlQuery = 'SELECT * FROM Songs';
    $stmt = $this->con->getPDO()->prepare($sqlQuery);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_CLASS, Song::class);
    
  }
  public function getSongByID($songid) {
    
    $sqlQuery = "SELECT * FROM Songs WHERE Song_ID = :songID";
    $stmt = $this->con->getPDO()->prepare($sqlQuery);
    $stmt->execute([ 'songID' => $songid ]);
    // $stmt->setFetchMode(PDO::FETCH_CLASS, 'Song');
    //$stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_CLASS, Song::class);
}


// public function getUserByUsername($username)
// {
//     $sqlQuery = 'SELECT * FROM userprofile WHERE Username = :username';
//     $statement = $this->con->getPDO()->prepare($sqlQuery);
//     $statement->execute([ 'username' => $username ]);
//     $statement->setFetchMode(PDO::FETCH_CLASS, 'userprofile');
//     $user = $statement->fetch();
//     if ($user == false )
//     {
//         return NULL;
//     }
//     else
//     {
//         return $user;
//     }
// }


// public function songID() {
//   $sqlQuery = "SELECT Song_ID FROM Songs";
//   $stmt = $this->con->getPDO()->prepare($sqlQuery);
//   $stmt->execute();
//   return $stmt->fetchAll(PDO::FETCH_CLASS, Song::class);
// }



}