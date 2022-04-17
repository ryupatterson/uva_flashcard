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
      case "view":
        $this->view_deck();
        break;
      case "add_entry":
        $this->add_entry();
        break;
      case "remove_entry":
        $this->remove_entry();
        break;
      case "edit_entry":
        $this->edit_entry();
        break;
      case "quiz":
        $this->quiz();
        break;
      case "share":
        $this->share();
        break;
    default:
      $this->redirect();
    }
  }

  public function redirect(){
    include "views/deck_creation.php";
  }

  public function creation(){
    $_SESSION['deck_id'] = $_GET['deck_id'];
    $_SESSION['title'] = $this->db->query('select title from f_deck WHERE deck_id=?;',"s",$_SESSION['deck_id'])[0]['title'];
    include "views/creating_deck.php";
  }
  public function create_deck(){
    if(!isset($_SESSION['username'])){
      header("Location: {$this->base_url}/");
    } else{
      // create entry in db;
      $title = $_POST["deck_title"];
      $public = $_POST["make_public"];
      if($public == 'on'){
        $public = 1;
      } else{
        $public = 0;
      }
      $this->db->query("insert into f_deck (title, public) values (?,?);", "ss", $title,$public);
      $deck_id = $this->db->query("SELECT max(deck_id) FROM f_deck;");
      $deck_id = $deck_id[0]['max(deck_id)'];
      $_SESSION['deck_id'] = $deck_id;
      $_SESSION['title'] = $title;
      $this->db->query("insert into creates_deck (deck_id,user_id) values (?,?);", "ss", $deck_id,$_SESSION['user_id']);
      if(isset($_POST['uva_course'])){
        $uva_course = $_POST["uva_course"];
        $uva_course = explode(" ",$uva_course,2);
        $data = $this->db->query('select * from uva_course where course_pn = ? and course_nbr = ?;',"ss",$uva_course[0],$uva_course[1]);
        if($data){
          $this->db->query('insert into assigned_to_course (deck_id,course_pn,course_nbr) values (?,?,?);',"sss",$deck_id,$uva_course[0],$uva_course[1]);
        }
      }

      header("Location: {$this->base_url}/deck/creation/?deck_id={$_GET['deck_id']}");
    }
  }

  public function view_deck(){
    $deck_id = $_GET['deck_id'];
    $deck = $this->db->query("select * from f_deck where deck_id=?;","s",$deck_id);
    $user = $this->db->query('select user_id from creates_deck where deck_id=?;',"s",$deck_id)[0]['user_id'];
    if($user == $_SESSION['user_id']){
      header("Location: {$this->base_url}/deck/creation/?deck_id={$deck_id}");
    } else if($deck[0]['public'] == 0){
      header("Location: {$this->base_url}/");
    } else{

      $_SESSION['deck_id'] = $_GET['deck_id'];
      $_SESSION['title'] = $this->db->query('select title from f_deck WHERE deck_id=?;',"s",$_SESSION['deck_id'])[0]['title'];
      include "views/viewing_deck.php";
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
      header("Location: {$this->base_url}/deck/creation/?deck_id={$_SESSION['deck_id']}");
    }
  }

  public function remove_entry(){
    if(!isset($_SESSION['username'])){
      header("Location: {$this->base_url}/");
    } else{
      $entry_id = $_GET['entry_id'];
      $this->db->query("delete from f_entry where entry_id = ?;", "s",
      $entry_id);
      header("Location: {$this->base_url}/deck/creation/?deck_id={$_SESSION['deck_id']}");
    }
  }
  public function edit_entry(){
    if(!isset($_SESSION['username'])){
      header("Location: {$this->base_url}/");
    } else{
      $entry_id = $_GET['entry_id'];
      $this->db->query("delete from f_entry where entry_id = ?;", "s",
      $entry_id);
      header("Location: {$this->base_url}/deck/creation/?deck_id={$_SESSION['deck_id']}");
    }
  }

  public function quiz(){
    $entries = $this->db->query("select * FROM f_entry WHERE deck_id=?;","s",$_SESSION['deck_id']);
    shuffle($entries);
    $_SESSION['deck_id'] = $_GET['deck_id'];
    $this->db->query("INSERT INTO `recent` (`deck_id`, `user_id`) VALUES (?,?)","ss",$_SESSION['deck_id'],$_SESSION['user_id']);
    include "views/quiz.php";
  }

  public function share(){
    $deck_id = $_GET['deck_id'];
    include "views/share.php";
  }
}








 ?>
