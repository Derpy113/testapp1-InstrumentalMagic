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
    public function handleRequest($userId, $postData, $fileData = null) {
        if (isset($postData['action'])) {
            switch ($postData['action']) {
                case 'changeProfilePic':
                    if ($fileData && !empty($fileData['profilePicture']['tmp_name'])) {
                        $this->changeProfilePic($userId, $fileData['profilePicture']);
                    }
                    break;

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

    private function changeProfilePic($userId, $fileData){
        if (!empty($fileData['tmp_name'])) {
            $newPic = file_get_contents($fileData['tmp_name']);
            $this->userDAO->updateProfilePic($userId, $newPic);
        } 
    }
    
    public function getUserProfileInfo($userId) {
        $userInfo = $this->userDAO->getUserById($userId);
        // Omvandla profilbilden till en base64-kodad sträng om den inte redan är det
        if ($userInfo && $userInfo['ProfilePic']) {
            $userInfo['ProfilePic'] = base64_encode($userInfo['ProfilePic']);
        }
        return $userInfo;
    }

    private function logout() {
        session_destroy();
        header("Location: loginpage.php");
        exit;
    }



}
