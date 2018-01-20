<?php
// THE LOGIN.PHP FILE
// handles user logins
session_start();

include "db/db_init.php";

// grab the deets
$username = $_POST['username'];
$password = $_POST['password'];
$stay = $_POST['stay'];

// check for empty inputs
if(!$username){

}
if(!$password){

}

// check db for deet match
$check = $db_handler->check_login($username);

// check if it matches, if so start session and redirect, if not, send back to login page w/ error
if($password == $check['password']){
  $_SESSION['auth'] = 'yes';
  $_SESSION['username'] = $username;
  header("Location: http://tools.airwaveconsult.com/manage/dashboard.php");

  // check if they wanna stay logged in and set cookie if so
  if($stay == 'stay'){
    setcookie('auth','yes',time()+864000);
    setcookie('username',$username,time()+864000);
  }
}
else{
  header("Location: http://tools.airwaveconsult.com/manage/index.php?login=no");
}

?>
