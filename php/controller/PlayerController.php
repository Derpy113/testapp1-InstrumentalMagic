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
        $song = $this->songDAO->getSongByID($id);
        if ($song !== null) {
            // Använder 'song' egenskapen från Song-klassen
            $this->currentSongNotes = explode(',', $song->getSong());
            $this->songPosition = 0;
        }
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
        if (isset($this->currentSongNotes[$this->songPosition])) {
            return $this->currentSongNotes[$this->songPosition];
        }
        return ''; // Inga noter laddade eller positionen är utanför intervallet
    }


    public function handleAjaxRequest() {
        $action = $_POST['action'] ?? '';
        if (method_exists($this, $action)) {
            $this->$action(); // Kör metoden baserat på 'action' värde (t.ex. 'stepForward')
    
            // Svara med den nya positionen och noten
            echo json_encode([
                'currentNote' => $this->getCurrentNote(),
                'position' => $this->songPosition,
            ]);
            exit;
        }
    }

}