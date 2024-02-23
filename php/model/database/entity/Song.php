<?php
    include_once("autoload.php");

class Song
{
  private ?string $artist = "Johan";
  private ?string $genre = "Rock";
  private ?int $rating = 1;
  private ?string $song = "abc";
  private int $song_id = 1;
  private ?int $timesPlayed = 3;
  private ?string $title = "Dum Movie!";


    public function __construct(?string $artist, ?string $genre, ?int $rating, 
    ?string $song, int $song_id, ?int $timesPlayed, ?string $title)
    {
        $this->artist = $artist;
        $this->genre = $genre;
        $this->rating = $rating;
        $this->song = $song;
        $this->song_id = $song_id;
        $this->timesPlayed = $timesPlayed;
        $this->title = $title;
    }

    public function getArtist(): string
    {
        return $this->artist;
    }

    public function setArtist(string $artist): void
    {
        // Validation can be added here to ensure non-empty and appropriate length
        // (can be customized based on your requirements)
        $this->artist = trim($artist);
    }

    public function getGenre(): string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): void
    {
        // Validation can be added here to ensure non-empty and appropriate values
        $this->genre = trim($genre);
    }

    public function getRating(): ?int // Use nullable int to represent possible null value
    {
        return $this->rating;
    }

    public function setRating(?int $rating): void // Allow null for invalid/unspecified rating
    {
        if ($rating === null || $rating >= 0) { // Enforce non-negative rating
            $this->rating = $rating;
        }
    }

    public function getSong(): string
    {
        return $this->song;
    }

    public function setSong(string $song): void
    {
        // Validation can be added here to ensure non-empty and appropriate length
        $this->song = trim($song);
    }

    public function getSongId(): int
    {
        return $this->song_id;
    }

    // No setter for song_id as it should typically be unique and assigned on creation

    public function getTimesPlayed(): int
    {
        return $this->timesPlayed;
    }

    public function increaseTimesPlayed(int $increment = 1): void
    {
        $this->timesPlayed += $increment;
    }

    // No setter for timesPlayed as it's primarily incremented

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        // Validation can be added here to ensure non-empty and appropriate length
        $this->title = trim($title);
    }


}


