<?php
  
  include_once("autoload.php");

  class SongController
  {
    private $loadSongs; 

    //automatiskt skapar en songDAO och hämtar all information som den innehåller och lägger det i loadSongs
    public function __construct() 
    {
      $con = new Connection();
      $this->loadSongs = new SongDAO($con);
    }
    
    //Denna publik metod är avsedd att anropas utifrån för att hämta information i getsSongs().
    //Genom att den anropar metoden findAll()
    public function getSongs()
    {
      $songs = $this->loadSongs->findAll();
      return $songs;
    }      

  }





