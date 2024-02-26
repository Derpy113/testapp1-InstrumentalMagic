<?php
  
  include_once("autoload.php");

  class SongController
  {
    private $loadSongs;

    public function __construct() //
    {
      $con = new Connection();
      $this->loadSongs = new SongDAO($con);
    }
    
    public function getSongs() //
    {
      $songs = $this->loadSongs->findAll();
      return $songs;
    }
      
    // public function loadSongs() //ändra namnet, fundera om den behövs
    // {
    //   $con = new Connection();
    //   $songDAO = new SongDAO($con);
    //   $songs = $songDAO->findAll();
    //   $this->songs = $songs;
    // }



  }





