<?php
// THE HEADER.PHP FILE
// sets up basic header for every front-end page

session_start();

// include db connect
include "/var/www/tools.airwaveconsult.com/manage/db/db_init.php";

include "/var/www/tools.airwaveconsult.com/manage/include/user_handler.php";
?>

<!DOCTYPE html>
<html>
<head>
<title><?php echo $page_title; ?> // AW Manage</title>
<link href="http://tools.airwaveconsult.com/manage/css/style.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="icon" href="http://tools.airwaveconsult.com/manage/img/favicon.png" type="image/png">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<header class="page_header">
  <div class="inner">
    <a href="http://tools.airwaveconsult.com/manage"><img class="logo" src="http://tools.airwaveconsult.com/manage/img/logoblack.png"></a>
    <nav>
      <ul>

        <?php
        // setup apps list to autogen menu w/ active links
        $apps = array('Project','Time','Invoice');

        foreach($apps as $app){
          if($app == $page_title){
            echo '<li class="active"><a href="http://tools.airwaveconsult.com/manage/' . strtolower($app) . '/">' . strtoupper($app) . '</a></li>';
          }
          else{
            echo '<li><a href="http://tools.airwaveconsult.com/manage/' . strtolower($app) . '/">' . strtoupper($app) . '</a></li>';
          }
        }
        ?>

        <li class="user"><?php echo $_SESSION['user_display_name']; ?></li>
      </ul>
    </nav>
  </div>
</header>
<section class="page">
