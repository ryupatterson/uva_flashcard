<?php
/*
 * Author(s): Ryu Patterson, Maven Kim, Quang Lam
 * url: http://cs.virginia.edu/~rjp5cc/uva_flashcard/
 */

spl_autoload_register(function($classname) {
  include "controllers/$classname.php";
});

// Join session or start one
session_start();

// general config option for setting base_url
// Parse the URL
$config = new Config();
$base_url = $config->getURL();

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$path = substr($path,1,-1);
#$path = str_replace($base_url."/", "", $path);
$parts = explode("/", $path);

// path has a form "/account/login", "search/search_form", "quiz/quiz_form"
// parts[0] => determines which controller (account, search, quiz)
// parts[1] => determines which action/page

// if username is not set, user hasn't logged in yet, take him to the login page
if (!isset($_SESSION["username"])) {
  $parts[0] = "account";
  $parts[1] = "login";
}

// pass the parsed url to main controller
$main = new Main();
$main->run($parts);
