<?php

class userprofile
{
    public ?string $UserProfile_ID; //temp public
    public ?string $Username;
    public ?string $UserPassword;
    public ?string $ProfilePic;

    public function GetUsername()
    {
        return $this->Username;    
    }
}

?>