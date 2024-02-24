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


}