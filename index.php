<?php
// THE INDEX.PHP FILE
// lucas@airwave

// this page doesn't include header.php because its only for logged-in pages
session_start();

// include db connect
include "db/db_init.php";

// if they are logged in send to dashboard
if(isset($_SESSION['username'])){
  header("Location: http://m.airwave.consulting/dashboard.php");
  exit;
}
?>


<!DOCTYPE html>
<html>
<head>
<title>AW Manage</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/login.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
</head>
<body>

<!-- login wrapper -->
<section class="login">
<h1><img src="img/logo.png"></h1>
<form action="user/login.php" method="post">
  <div class="login_wrap">
  <input required name="username" id=" username" type="text" placeholder="username">
  <input required name="password" id="password" type="password" placeholder="password">
  <label class="stay" for="stay"><input name="stay" id="stay" type="checkbox" value="stay">Stay logged in?</label>
  <input id="submit" type="submit" value="&rarr;">
</div>


  <?php
  // if login deets are bad talk about it
  if(isset($_GET['login'])){
    if($_GET['login'] == 'no'){
      echo '<span class="error">Login details incorrect. Try again.</span>';
    }
  }
  ?>

</form>
</section>

<?php

?>
