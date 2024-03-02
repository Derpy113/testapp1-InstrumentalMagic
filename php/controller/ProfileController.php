<?php
include_once("autoload.php");

class ProfileController {
    private $reviewDAO;
    private $userDAO;

    public function __construct() {
        $con = new Connection();
        $this->reviewDAO = new ReviewDAO($con);
        $this->userDAO = new UserDAO($con); // Lägg till detta
    }

    public function addReview($UserProfile_ID, $textContent, $rating) {
        return $this->reviewDAO->insertReview($UserProfile_ID, $textContent, $rating);
    }

    // Hantera begäran baserat på användarinput
    public function handleRequest($userId, $postData) {
        switch ($postData['action']) {
            case 'changeUsername':
                $this->changeUsername($userId, $postData['newUsername']);
                break;
            
            case 'changePassword':
                $this->changePassword($userId, $postData['newPassword']);
                break;
    
            case 'leaveReview':
                $this->addReview($userId, $postData['textContent'], $postData['rating']);
                break;

            case 'logout':
                    $this->logout();
                    break;
        }
    }

    // Ändra användarnamn
    private function changeUsername($userId, $newUsername) {
        if (!empty($newUsername)) {
            $this->userDAO->updateUsername($userId, $newUsername);
            echo "<script>alert('Ditt användarnamn har uppdaterats.');</script>";
        }
    }

    // Ändra lösenord
    private function changePassword($userId, $newPassword) {
        if (!empty($newPassword)) {
            $this->userDAO->updateUserPassword($userId, $newPassword);
            echo "<script>alert('Ditt lösenord har uppdaterats.');</script>";
        }
    }
    private function logout() {
        session_destroy();
        header("Location: loginpage.php");
        exit;
    }
}
