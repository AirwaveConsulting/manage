<?php
// THE LOGIN.PHP FILE
// handles user logins
session_start();

include "db/db_init.php";

// unset the current session auth and user variables
session_unset();

// unset cookies
$past = time() - 3600;
foreach($_COOKIE as $key => $val) {
    setcookie($key, $val, $past);
    setcookie($key, $val, $past, '/');
}

// send back to login page
header("Location: https://m.airwave.consulting/");

?>
