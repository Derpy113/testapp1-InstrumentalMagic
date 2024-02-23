<?php
  
  include_once("autoload.php");

  class SongController
  {
    private $songs;

    // public function setSongs(){
    //   $this->songs 
    // }

    public function getSongs(){
      return $this->songs;
    }
      
    public function displaySongs()
    {
      $con = new Connection();
      $songDAO = new SongDAO($con);
      $songs = $songDAO->findAll();
      $this->songs = $songs;
    }

    

  }





