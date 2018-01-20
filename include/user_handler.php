<?php
// THE USER_HANDLER.PHP FILE
// handles user/session etc

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// update session details from cookies if they aren't already
if(!isset($_SESSION['auth'])){
  $_SESSION['auth'] = $_COOKIE['auth'];
  $_SESSION['username'] = $_COOKIE['username'];
}

// if they aren't logged in kick em out
if($_SESSION['auth'] != 'yes'){
  header("Location: http://tools.airwaveconsult.com/manage/index.php");
}

$username = $_SESSION['username'];

// grab the user's display name and store it in session
$display = $db_handler->get_user_display_name($username);
$_SESSION['user_display_name'] = $display['display_name'];
