<?php
  include_once("autoload.php");

  class Review
  {
    private int $Review_ID;
    private int $Userprofile_ID;
    private ?string $textContent;
    private ?int $rating;
    private ?string $Username;
    private ?string $ProfilePic;

    // Getter för Review_ID
    public function getReviewID(): int
    {
      return $this->Review_ID;
    }
    
    // Setter för Review_ID
    public function setReviewID(int $Review_ID): void
    {
      $this->Review_ID = $Review_ID;
    }
    
    // Getter för Userprofile_ID
    public function getUserprofileID(): int
    {
      return $this->Userprofile_ID;
    }
    
    // Setter för Userprofile_ID
    public function setUserprofileID(int $Userprofile_ID): void
    {
      $this->Userprofile_ID = $Userprofile_ID;
    }

    // Getter för textContent
    public function getTextContent(): string
    {
      return $this->textContent;
    }
    
    // Setter för textContent
    public function setTextContent(string $textContent): void
    {
      $this->textContent = $textContent;
    }
    
    // Getter för rating
    public function getRating(): int
    {
      return $this->rating;
    }
    
   // Setter för rating
    public function setRating(int $rating): void
    {
      $this->rating = $rating;
    }

    public function getUsername(): ?string
    {
      return $this->Username;
    }
    
    // Setter för Username
    public function setUsername(?string $Username): void
    {
      $this->Username = $Username;
    }

    public function getProfilePic(): ?string
    {
        // Kontrollera om det finns någon bilddata och returnera den som en base64-kodad sträng
        return $this->ProfilePic !== null ? base64_encode($this->ProfilePic) : null;
    }
    
    // Setter för ProfilePic
    public function setProfilePic(?string $ProfilePic): void
    {
        $this->ProfilePic = $ProfilePic;
    }

  }