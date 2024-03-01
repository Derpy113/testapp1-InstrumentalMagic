    <?php
  include_once("autoload.php");

    class PlayerController {
    private $songDAO;
    private $currentSongNotes = [];
    private $songPosition = 0;

    public function __construct() //
    {
      $con = new Connection();
      $this->songDAO = new SongDAO($con);
    }

    // public function getSongEvent() {
    //     $notes = $this->songDAO->songEvent();
    //     return $notes;
    // }

    public function getSongDAO() {
        return $this->songDAO;
    }


    public function getSongIDByURL() {
        if(isset($_GET['Song_ID'])){
          return $_GET['Song_ID'];
        } 
    }    
    public function getSongNotesByID($id) {
        $currentSongNotes = [];
        $song = $this->songDAO->getSongByID($id);
        if ($song !== null) {
            $eventsString = $song->getSong();
            $currentSongNotes = explode(',', $eventsString);
        }
        return $currentSongNotes;
    }

    public function getSongTitleByID($id) {
        $song = $this->songDAO->getSongByID($id);
        if ($song !== null) {
            return $song->getTitle();
        }
    }


    public function getSongByID($id) {
        return $this->songDAO->getSongByID($id);
    }

    public function loadSongEvents($id) {
        $song = $this->songDAO->getSongByID($id);
        if ($song !== null) {
            // Använder 'song' egenskapen från Song-klassen
            $this->currentSongNotes = explode(',', $song->getSong());
            $this->songPosition = 0;
        }
    }


}