<?php

/**
 *
 */
class Deck {

  private $db;
  private $base_url;

  public function __construct() {
    $this->db = new Database();
    $this->config = new Config();
    $this->base_url = $this->config->getURL();
  }

  public function run($action) {
    switch($action) {
      case "redirect":
        $this->redirect();
        break;
        case "creation":
          $this->creation();
          break;
      case "create_deck":
        $this->create_deck();
        break;
      case "add_entry":
        $this->add_entry();
    default:
      $this->redirect();
    }
  }

  public function redirect(){
    include "views/deck_creation.php";
  }

  public function creation(){
    include "views/creating_deck.php";
  }
  public function create_deck(){
    if(!isset($_SESSION['username'])){
      header("Location: {$this->base_url}/");
    } else{
      // create entry in db;
      $title = $_POST["deck_title"];
      $this->db->query("insert into f_deck (title, public) values (?,?);", "ss", $title,0);
      $deck_id = $this->db->query("SELECT max(deck_id) FROM f_deck;");
      $deck_id = $deck_id[0]['max(deck_id)'];
      $_SESSION['deck_id'] = $deck_id;
      $_SESSION['title'] = $title;
      $this->db->query("insert into creates_deck (deck_id,user_id) values (?,?);", "ss", $deck_id,$_SESSION['user_id']);
      header("Location: {$this->base_url}/deck/creation");
    }
  }

  public function add_entry(){
    if(!isset($_SESSION['username'])){
      header("Location: {$this->base_url}/");
    } else{
      $entry_def = $_GET['entry_def'];
      $entry_answer = $_GET['entry_answer'];
      $this->db->query("insert into f_entry (deck_id,entry_def,entry_answer) values (?,?,?);", "sss",
      $_SESSION['deck_id'],$entry_def,$entry_answer);
      header("Location: {$this->base_url}/deck/creation");
    }
  }
}








 ?>
