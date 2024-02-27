    <?php
  include_once("autoload.php");

    class PlayerController {
    private $songDAO;

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
}
        