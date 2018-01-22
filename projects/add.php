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
if(isset($_POST['status'])){
  if($_POST['status'] == 'select'){
    $status = 'current';
  }
  else{
    $status = $_POST['status'];
  }
}

// others that we need
$username = $_SESSION['username'];

// see if it's an edit (id will be present if it is)
if(isset($_POST['project_id'])){
  $project_id = $_POST['project_id'];
  $update = $db_handler->project_update($name,$start_date,$end_date,$status,$description,$client,$project_id);
  header("Location: http://m.airwave.consulting/projects/index.php?update=good");
}
else{
  $add = $db_handler->project_insert($name,$username,$start_date,$end_date,$status,$description,$client);
  header("Location: http://m.airwave.consulting/projects/index.php?add=good");
}


?>
