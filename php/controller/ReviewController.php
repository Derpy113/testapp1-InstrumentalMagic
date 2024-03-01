<?php
  include_once("autoload.php");

  class ReviewController
  {
    private $getReviews;

    public function __construct(){
      $con = new Connection();
      $this->getReviews = new ReviewDAO($con);
    }

    public function showReviews(){
      $allReviews = $this->getReviews->getAllReviews();
      $reviewsToShow = array_slice($allReviews,0,4);
      return $reviewsToShow;
    }
    public function addReview($UserProfile_ID, $textContent, $rating) {
      return $this->getReviews->insertReview($UserProfile_ID, $textContent, $rating);
  }

  }