<?php
include_once("autoload.php");

class ProfileController {
    private $reviewDAO;

    public function __construct(){
        $con = new Connection();
        $this->reviewDAO = new ReviewDAO($con);
    }

    public function addReview($UserProfile_ID, $textContent, $rating) {
        return $this->reviewDAO->insertReview($UserProfile_ID, $textContent, $rating);
    }

    // Du kan lägga till fler metoder här för att hantera andra aspekter av profilsidan om det behövs.
}