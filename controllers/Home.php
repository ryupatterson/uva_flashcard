<?php
/*
 * Author(s): Sehoan Choi (sc8zt), Ryu Patterson (rjp5cc)
 */

class Home {

  private $db;

  private $base_url;

  public function __construct() {
    $this->db = new Database();
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
    include "views/home.php";
  }

}
