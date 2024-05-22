<?php
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page after logout
header("Location: index.php");
exit; // Make sure to exit after redirection to prevent further script execution
?>