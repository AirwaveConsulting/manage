<?php
// THE DELETE.PHP FILE FOR INVOICE APP
// handles deleting a project from db

session_start();

include "../db/db_init.php";
include "../include/user_handler.php";

// grab form data
if(isset($_GET['project'])){
  $project = $_GET['project'];
}
else{
  header("Location: http://m.airwave.consulting/project/index.php?delete=bad");
  exit;
}

$delete = $db_handler->project_delete($project);

header("Location: http://m.airwave.consulting/project/index.php?delete=good");
?>
