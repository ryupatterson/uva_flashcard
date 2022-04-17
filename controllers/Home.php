<?php
/*
 * Author(s): Sehoan Choi (sc8zt), Ryu Patterson (rjp5cc)
 */

class Home {

  private $db;

  private $base_url;

  public function __construct() {
    $this->db = new Database();
    $this->config = new Config();
    $this->base_url = $this->config->getURL();
  }

  public function run($action) {
    // run appropriate functions based on the action passed in
    switch($action) {
      case "go_to_home":
        $this->go_to_home();
        break;
      default:
        $this->go_to_home();
        break;
    }

  }

  public function go_to_home() {
    $my_decks = $this->db->query(
      "select * from f_deck WHERE deck_id in (select deck_id from recent where user_id = ?) group by deck_id;"
    , "s", $_SESSION['user_id']);

    $fav_decks = $this->db->query(
      "select * from f_deck WHERE deck_id in (select deck_id from favorites where user_id = ?) group by deck_id;"
    , "s", $_SESSION['user_id']);

    include "views/home.php";
  }

}
