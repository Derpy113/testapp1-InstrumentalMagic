<?php
  include_once("autoload.php");

  class ReviewDAO
  {
    private Connection $con;

    public function __construct(Connection $con)
    {
      $this->con = $con;      
    }

    public function getAllReviews()
    {
      $sqlQuery = 'SELECT appreviews.*, userprofile.Username, userprofile.ProfilePic 
                          FROM appreviews JOIN userprofile on appreviews.UserProfile_ID = userprofile.UserProfile_ID';
      $stmt = $this->con->getPDO()->prepare($sqlQuery);
      $stmt->execute();
      
      return $stmt->fetchAll(PDO::FETCH_CLASS, Review::class);
    }


  }

