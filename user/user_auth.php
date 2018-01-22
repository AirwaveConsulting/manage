<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// update session details from cookies if they aren't already
if(!isset($_SESSION['username'])){
  if(isset($_COOKIE['username'])){
    $_SESSION['username'] = $_COOKIE['username'];
  }
}

// if they aren't logged in kick em out
if(!isset($_SESSION['username'])){
  header("Location: http://m.airwave.consulting/index.php");
  exit;
}

$username = $_SESSION['username'];
$user_display_name = $db_handler->get_user_display_name($username)['display_name'];
?>
