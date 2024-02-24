<?php
  
  include_once("autoload.php");

  class SongController
  {
    private $songs;

    public function getSongs() //
    {
      return $this->songs;
    }
      
    public function loadSongs() //ändra namnet, fundera om den behövs
    {
      $con = new Connection();
      $songDAO = new SongDAO($con);
      $songs = $songDAO->findAll();
      $this->songs = $songs;
    }

    public function __construct() //
    {
      $this->loadSongs();
    }

  }





