<?php
// THE CONNECT.PHP FILE
// connects to the db

// turn errors on
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// db info
$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'Qw3rty2$$';
$db_name = 'timeapp';

// connect
$db = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// setup the db_handler class
require_once 'db_handler.php';
$db_handler = new db_handler();

 ?>
