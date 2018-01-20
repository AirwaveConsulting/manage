<?php
// THE ADD.PHP FILE FOR INVOICE APP
// handles adding new project to database

session_start();

include "../db/db_init.php";
include "../include/user_handler.php";

// grab form data
if(isset($_POST['name'])){
  $name = $_POST['name'];
}
if(isset($_POST['description'])){
  $description = $_POST['description'];
}
if(isset($_POST['client'])){
  $client = $_POST['client'];
}
if(isset($_POST['start_date'])){
  $start_date = $_POST['start_date'];
}
if(isset($_POST['end_date'])){
  $end_date = $_POST['end_date'];
}

// others that we need
$username = $_SESSION['username'];

// figure out the status (1 for current, 0 for ended)
if($end_date){
  $status = 0;
}
else{
  $status = 1;
}

$add = $db_handler->project_insert($name,$username,$start_date,$end_date,$status,$description,$client);

header("Location: http://tools.airwaveconsult.com/manage/project/index.php?add=good");
?>
