<?php
/*
 * Author(s): Ryu Patterson
 */

class Config {
  /*public $proj_id;

  public function __construct() {
    $this->proj_id = $_SERVER["HOST_NAME"];
  }*/

  public $proj_id;

  public function __construct() {
    $this->proj_id = "/uva_flashcard";
    #$this->proj_id = "";
  }

  public function getURL() {
    return "{$this->proj_id}";
  }
}
