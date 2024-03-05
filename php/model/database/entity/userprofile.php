<?php

class UserProfile
{
    public ?string $UserProfile_ID; //Temporary!
    public ?string $Username;
    public ?string $UserPassword;
    public ?string $ProfilePic;
    
    // Getters
    public function getUserProfileID(): ?string {
        return $this->UserProfile_ID;
    }

    public function getUsername(): ?string {
        return $this->Username;
    }

    public function getUserPassword(): ?string {
        return $this->UserPassword;
    }

    public function getProfilePic(): ?string {
        return $this->ProfilePic;
    }

    // Setters
    public function setUserProfileID(?string $UserProfile_ID): void {
        $this->UserProfile_ID = $UserProfile_ID;
    }

    public function setUsername(?string $Username): void {
        $this->Username = $Username;
    }

    public function setUserPassword(?string $UserPassword): void {
        $this->UserPassword = $UserPassword;
    }

    public function setProfilePic(?string $ProfilePic): void {
        $this->ProfilePic = $ProfilePic;
    }
}

?>
