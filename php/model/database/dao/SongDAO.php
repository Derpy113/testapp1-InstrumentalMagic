<?php
  include_once("autoload.php");

Class SongDAO
{
  private Connection $con;
  

  public function __construct(Connection $con) //skapar databas connection 
  {
    $this->con = $con;  
  }

  // findAll() Skickar min query till Songs-tabellen i databasen där den sen hämtar 
  // informationen som en array av Song-objekt, där varje objekt repsresterar en rad i tabellen.
  public function findAll()  
  {
    $sqlQuery = 'SELECT * FROM Songs';
    $stmt = $this->con->getPDO()->prepare($sqlQuery);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_CLASS, Song::class); 
    
  }

  public function getSongByID($songid) {
  
    try {
      $sqlQuery = "SELECT * FROM songs WHERE Song_ID = :songID";
      $stmt = $this->con->getPDO()->prepare($sqlQuery);
      $stmt->bindParam(':songID', $songid);
      $stmt->execute();
      $stmt->setFetchMode(PDO::FETCH_CLASS, Song::class);
      return $stmt->fetch();
    }
    catch (Exception $ex) {
      echo $ex;
    }
    // return $stmt->fetch(PDO::FETCH_CLASS, Song::class);
  }

  // public function getSongByID($songid)
  // {
  //     $sqlQuery = 'SELECT * FROM Songs WHERE Song_ID = :songID';
  //     $statement = $this->con->getPDO()->prepare($sqlQuery);
  //     $statement->execute([ 'songID' => $songid ]);
  //     $statement->setFetchMode(PDO::FETCH_CLASS, 'Song');
  //     $songid = $statement->fetch();
  //     if ($songid == false )
  //     {
  //       return NULL;
  //     }
  //     else
  //     {
  //       return $songid;
  //     }
  // }




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