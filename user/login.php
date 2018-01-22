<?php
// THE LOGIN.PHP FILE
// handles user logins
session_start();

// turn errors on
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "/var/www/m.airwave.consulting/db/db_init.php";

// grab the deets
$username = $_POST['username'];
$password = $_POST['password'];

if(isset($_POST['stay'])){
  $stay = $_POST['stay'];
}

// check db for deet match
$check = $db_handler->check_login($username);

// check if it matches, if so start session and redirect, if not, send back to login page w/ error
if($password == $check['password']){
  $_SESSION['username'] = $username;

  // check if they wanna stay logged in and set cookie if so
  if(isset($stay) && $stay == 'stay'){
    setcookie('auth','yes',time()+864000);
    setcookie('username',$username,time()+864000);
  }

  header("Location: https://m.airwave.consulting/dashboard.php");
}
else{
  header("Location: https://m.airwave.consulting/index.php?login=no");
}

?>
