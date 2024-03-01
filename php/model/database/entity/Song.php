<?php
    include_once("autoload.php");

    class Song
    {
      private ?string $artist;
      private ?string $genre;
      private ?float $averageRating;
      private ?string $song;
      private int $song_id;
      private ?int $timesPlayed;
      private ?string $title;
    
      // Getters
      public function getArtist(): ?string
      {
        return $this->artist;
      }
    
      public function getGenre(): ?string
      {
        return $this->genre;
      }
    
      public function getAverageRating(): ?float
      {
        return $this->averageRating;
      }
    
      public function getSong(): ?string
      {
        return $this->song;
      }
    
      public function getSongId(): int
      {
        return $this->song_id;
      }
    
      public function getTimesPlayed(): ?int
      {
        return $this->timesPlayed;
      }
    
      public function getTitle(): ?string
      {
        return $this->title;
      }
    
      // Setters
      public function setArtist(?string $artist): void
      {
        $this->artist = $artist;
      }
    
      public function setGenre(?string $genre): void
      {
        $this->genre = $genre;
      }
    
      public function setAverageRating(?float $averageRating): void
      {
        $this->averageRating = $averageRating;
      }
    
      public function setSong(?string $song): void
      {
        $this->song = $song;
      }
        
      public function setTimesPlayed(?int $timesPlayed): void
      {
        $this->timesPlayed = $timesPlayed;
      }
    
      public function setTitle(?string $title): void
      {
        $this->title = $title;
      }
    }

