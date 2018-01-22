<?php
// THE INDEX.PHP FILE
// lucas@airwave

// this page doesn't include header.php because its only for logged-in pages
session_start();

// include db connect
include "../db/db_init.php";

// update session details from cookies if they aren't already
if($_SESSION['auth'] == ''){
  $_SESSION['auth'] = $_COOKIE['auth'];
  $_SESSION['username'] = $_COOKIE['username'];
}

if($_SESSION['auth'] == 'yes'){
  header("Location: http://m.airwave.consulting/dashboard.php");
}
?>


<!DOCTYPE html>
<html>
<head>
<title>Login // AW Manage</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/login.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
</head>
<body>

<!-- login wrapper -->
<section class="login">
<h1><img src="img/logo.png"></h1>
<form action="login.php" method="post">
  <div class="login_wrap">
  <input required name="username" id=" username" type="text" placeholder="username">
  <input required name="password" id="password" type="password" placeholder="password">
  <label class="stay" for="stay"><input name="stay" id="stay" type="checkbox" value="stay">Stay logged in?</label>
  <input id="submit" type="submit" value="&rarr;">
</div>


  <?php
  // if login deets are bad talk about it
  if($_GET['login'] == 'no'):
  ?>

  <span class="error">Login details incorrect. Try again.</span>

  <?php endif; ?>

</form>
</section>

<?php

?>
