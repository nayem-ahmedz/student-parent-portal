<?php
// Start the session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the home page or any other page after sign out
header("Location: ../index.php");
exit();
?>