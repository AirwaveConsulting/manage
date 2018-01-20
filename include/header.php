<?php
// THE HEADER.PHP FILE
// sets up basic header for every front-end page

session_start();

// include db connect
include "db/db_init.php";

include 'include/user_handler.php';
?>

<!DOCTYPE html>
<html>
<head>
<title><?php echo $page_title; ?> // AW Manage</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
</head>
<body>
<header class="page_header">
  <div class="inner">
    <img class="logo" src="img/logo.png">
    <nav>
      <ul>
        <li><a href="#">PROJECTS</a></li>
        <li><a href="#">TIME</a></li>
        <li><a href="#">INVOICE</a></li>
        <li class="user"><?php echo $_SESSION['user_display_name']; ?></li>
      </ul>
    </nav>
  </div>
</header>
