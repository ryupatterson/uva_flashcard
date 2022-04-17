<?php
/*
 * Author(s): Ryu Patterson (rjp5cc), Maven Kim (mmk6xnb), Quang  Lam (qnl8ey)
  url: https://uva-flashcard.herokuapp.com/
 */

class Main {

  public function __construct() {
    $this->db = new Database();
  }

  public function run($parts) {
    // break down the parsed url into page and action in the page
    $page = $parts[0];

    switch($page) {
    case "account":
      $this->account($parts[1]);
      break;
    case "home":
      $this->account($parts[1]);
      break;
    case "deck":
      $this->deck($parts[1]);
      break;
    default:
      if (isset($_SESSION["username"])) { // user is already logged in, redirect to the search page
        $this->home("go_to_home");
      } else {
        $this->account("login"); // else redirect to the login page
      }
    }

  }

  public function account($action) {
    // forward the action to account controller
    $account = new Account();
    $account->run($action);
  }

  public function home($action){
    $home = new Home();
    $home->run($action);
  }

  public function deck($action){
    $deck = new Deck();
    $deck->run($action);
  }
}
