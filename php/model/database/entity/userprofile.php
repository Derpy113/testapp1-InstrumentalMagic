<?php

class userprofile
{
    public ?string $UserProfile_ID; //Temporary!
    public ?string $Username;
    public ?string $UserPassword;
    public ?string $ProfilePic;

    public function GetUsername()
    {
        return $this->Username;    
    }
}

?>