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



    public function getSongByID($id) {
        return $this->songDAO->getSongByID($id);
    }

    public function loadSongEvents($id) {
        $currentSongNotes = $this->songDAO->getSongByID($id);
        if ($currentSongNotes) {
            $this->currentSongNotes = explode(',' , $currentSongNotes[0]->Song);
            $this->songPosition = 0;
        }
        // else {
        //     $this->currentSongNotes = [];
        //     $this->songPosition = 0;
        // }
        }

    public function stepForward() {
        if ($this->songPosition < count($this->currentSongNotes) - 1) {
            $this->songPosition++;
        }
    }
    public function stepBackward() {
        if ($this->songPosition > 0) {
            $this->songPosition--;
        }
    }
    public function toStart() {
        $this->songPosition = 0;

    }
    public function getCurrentNote() {
        return $this->currentSongNotes[$this->songPosition];
        
    }
}