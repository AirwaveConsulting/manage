<?php
// THE DASHBOARD.PHP FILE
// main landing page

// set the page title for header
$page_title = 'Dashboard';

// grab the header
include "include/header.php";

// check user session
if($_SESSION['auth'] != 'yes'){
  header("Location: http://tools.airwaveconsult.com/manage/index.php");
}

?>

<?php
// grab the footer
include "include/footer.php";
?>
