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
                    FROM appreviews 
                    JOIN userprofile ON appreviews.UserProfile_ID = userprofile.UserProfile_ID 
                    ORDER BY RAND() LIMIT 4';
      $stmt = $this->con->getPDO()->prepare($sqlQuery);
      $stmt->execute();
      
      return $stmt->fetchAll(PDO::FETCH_CLASS, Review::class);
    }

    public function insertReview($UserProfile_ID, $textContent, $rating) {
      $sqlQuery = "INSERT INTO appreviews (UserProfile_ID, textContent, rating) VALUES (:UserProfile_ID, :textContent, :rating)";
      $stmt = $this->con->getPDO()->prepare($sqlQuery);
      $stmt->bindParam(':UserProfile_ID', $UserProfile_ID);
      $stmt->bindParam(':textContent', $textContent);
      $stmt->bindParam(':rating', $rating);
      $stmt->execute();
      return $this->con->getPDO()->lastInsertId();
  }


  }

