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

  

}