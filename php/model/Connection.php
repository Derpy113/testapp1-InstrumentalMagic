<?php

class Connection
{
  private $con;

  function __construct()
  {
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $db_name = "instrumental_magicdb";
    $this->con = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);


    try
    {
      // set the PDO error mode to exception
      $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
      echo "Connection failed: " . $e->getMessage();
    }
    return $this->con; //It get's really ugly from here if connection fails
  }
  

  public function getPDO():PDO
  {
      return $this->con;
  }

}

?> 