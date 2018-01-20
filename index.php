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
  header("Location: http://tools.airwaveconsult.com/manage/dashboard.php");
}
?>


<!DOCTYPE html>
<html>
<head>
<title><?php echo $page_title; ?> // AW Manage</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/login.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
</head>
<body>

<!-- login wrapper -->
<section class="login">
<h1><img src="img/logoblack.png"></h1>
<form action="login.php" method="post">
  <input name="username" id=" username" type="text" placeholder="username">
  <input name="password" id="password" type="password" placeholder="password">
  <span class="stay"><input name="stay" id="stay" type="checkbox" value="stay">Stay logged in?</span>
  <input type="submit" style="display:none;">

  <?php
  // if login deets are bad talk about it
  if($_GET['login'] == 'no'):
  ?>

  <span class="error">Login details incorrect. Try again.</span>

  <?php endif; ?>

</form>
</section>

<?php
// grab the footer
include "include/footer.php";
?>
