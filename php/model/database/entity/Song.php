<?php
    include_once("autoload.php");

    class Song
    {
      private ?string $Artist;
      private ?string $Genre;
      private ?float $AverageRating;
      private ?string $Song;
      private int $Song_ID;
      private ?int $TimesPlayed;
      private ?string $Title;
    
      // Getters
      public function getArtist(): ?string
      {
        return $this->Artist;
      }
    
      public function getGenre(): ?string
      {
        return $this->Genre;
      }
    
      public function getAverageRating(): ?float
      {
        return $this->AverageRating;
      }
    
      public function getSong(): ?string
      {
        return $this->Song;
      }
    
      public function getSongId(): int
      {
        return $this->Song_ID;
      }
    
      public function getTimesPlayed(): ?int
      {
        return $this->TimesPlayed;
      }
    
      public function getTitle(): ?string
      {
        return $this->Title;
      }
    
      // Setters
      public function setArtist(?string $artist): void
      {
        $this->Artist = $artist;
      }
    
      public function setGenre(?string $genre): void
      {
        $this->Genre = $genre;
      }
    
      public function setAverageRating(?float $averageRating): void
      {
        $this->AverageRating = $averageRating;
      }
    
      public function setSong(?string $song): void
      {
        $this->Song = $song;
      }
    
      // Cannot set song_id as it's defined as private (immutable)
    
      public function setTimesPlayed(?int $timesPlayed): void
      {
        $this->TimesPlayed = $timesPlayed;
      }
    
      public function setTitle(?string $title): void
      {
        $this->Title = $title;
      }
    }

// class Song
// {
//   private ?string $artist;
//   private ?string $genre;
//   private ?float $averageRating;
//   private ?string $song;
//   private int $song_id;
//   private ?int $timesPlayed;
//   private ?string $title;


//     // public function __construct(?string $artist, ?string $genre, ?int $rating, 
//     // ?string $song, int $song_id, ?int $timesPlayed, ?string $title)
//     // {
//     //     $this->artist = $artist;
//     //     $this->genre = $genre;
//     //     $this->rating = $rating;
//     //     $this->song = $song;
//     //     $this->song_id = $song_id;
//     //     $this->timesPlayed = $timesPlayed;
//     //     $this->title = $title;
//     // }

//     public function getArtist(): string
//     {
//         return $this->artist;
//     }

//     public function setArtist(string $artist): void
//     {
//         // Validation can be added here to ensure non-empty and appropriate length
//         // (can be customized based on your requirements)
//         $this->artist = trim($artist);
//     }

//     public function getGenre(): string
//     {
//         return $this->genre;
//     }

//     public function setGenre(string $genre): void
//     {
//         // Validation can be added here to ensure non-empty and appropriate values
//         $this->genre = trim($genre);
//     }

//     public function getRating(): ?float // Use nullable int to represent possible null value
//     {
//         return $this->averageRating;
//     }

//     public function setRating(?float $averageRating): void // Allow null for invalid/unspecified rating
//     {
//         if ($averageRating === null || $averageRating >= 0) { // Enforce non-negative rating
//             $this->averageRating = $averageRating;
//         }
//     }

//     public function getSong(): string
//     {
//         return $this->song;
//     }

//     public function setSong(string $song): void
//     {
//         // Validation can be added here to ensure non-empty and appropriate length
//         $this->song = trim($song);
//     }

//     public function getSongId(): int
//     {
//         return $this->song_id;
//     }

//     // No setter for song_id as it should typically be unique and assigned on creation

//     public function getTimesPlayed(): int
//     {
//         return $this->timesPlayed;
//     }

//     public function increaseTimesPlayed(int $increment = 1): void
//     {
//         $this->timesPlayed += $increment;
//     }

//     // No setter for timesPlayed as it's primarily incremented

//     public function getTitle(): string
//     {
//         return $this->title;
//     }

//     public function setTitle(string $title): void
//     {
//         // Validation can be added here to ensure non-empty and appropriate length
//         $this->title = trim($title);
//     }


// }


