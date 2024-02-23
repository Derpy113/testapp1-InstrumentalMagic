<?php

class Song
{
  private ?string $artist;
  private ?string $genre;
  private ?int $rating;
  private ?string $note;
  private int $song_id;
  private ?int $timesPlayed;
  // private ?string $title;

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

    public function getNote(): string
    {
        return $this->note;
    }

    public function setNote(string $note): void
    {
        // Validation can be added here to ensure non-empty and appropriate length
        $this->note = trim($note);
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

/*     public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        // Validation can be added here to ensure non-empty and appropriate length
        $this->title = trim($title);
    } */
}


