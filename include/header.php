<?php
// THE HEADER.PHP FILE
// sets up basic header for every front-end page

// include db connect
include "../db/db_init.php";
?>

<!DOCTYPE html>
<html>
<head>
<title><?php echo $page_title; ?> // AW Manage</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
</head>
<body>
