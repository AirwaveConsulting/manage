<?php
// THE COMPLETE.PHP FILE FOR INVOICE APP
// handles marking projects as complete

session_start();

include "../db/db_init.php";

// grab form data
if(isset($_GET['project_id'])){
  $project_id = $_GET['project_id'];
  $status = $_GET['project_status'];
}

// figure out what date to insert
if($status == 'archive'){
  $current_date = date('Y-m-d');
}
else{
  $current_date = '0000-00-00';
}

// run the call boy
if($_SERVER['REQUEST_METHOD'] === 'GET'){
  $db_handler->update_project_status($project_id,$status,$current_date);
  header("Location: https://m.airwave.consulting/projects/index.php?complete=$status");
}

?>
