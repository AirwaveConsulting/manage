<?php
// THE HEADER.PHP FILE
// sets up basic header for every front-end page

session_start();

// include db connect
include "/var/www/m.airwave.consulting/db/db_init.php";

include "/var/www/m.airwave.consulting/include/user_handler.php";
?>

<!DOCTYPE html>
<html>
<head>
<title><?php echo $page_title; ?> // AW Manage</title>
<link href="https://m.airwave.consulting/css/style.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="icon" href="https://m.airwave.consulting/img/favicon.png" type="image/png">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<header class="page_header">
  <div class="inner">
    <a href="https://m.airwave.consulting"><img class="logo" src="https://m.airwave.consulting/img/logo.png"></a>
    <nav>
      <ul>

        <?php
        // setup apps list to autogen menu w/ active links
        $apps = array('Projects','Time','Invoice');

        foreach($apps as $app){

          // see what app we are in (get the first directory on the url and match it to the app name)
          $url = $_SERVER['REQUEST_URI'];
          $urlParts = explode('/', str_ireplace(array('http://', 'https://'), '', $url));
          $app_url = $urlParts[1];

          if(strtolower($app) == strtolower($app_url)){
            echo '<li class="active"><a href="https://m.airwave.consulting/' . strtolower($app) . '/">' . strtoupper($app) . '</a></li>';
          }
          else{
            echo '<li><a href="https://m.airwave.consulting/' . strtolower($app) . '/">' . strtoupper($app) . '</a></li>';
          }
        }
        ?>
      </ul>
    </nav>
    <div class="user"><?php echo $_SESSION['user_display_name']; ?></div>
  </div>
</header>
<section class="page">
