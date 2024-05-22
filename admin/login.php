<?php
session_start();

// Define your correct username and password
$correctUsername = "admin";
$correctPassword = "dev-default"; // You should use a more secure method for storing passwords in production, like hashing.

// Retrieve the submitted username and password
$submittedUsername = $_POST["username"];
$submittedPassword = $_POST["password"];

// Validate the submitted credentials
if ($submittedUsername === $correctUsername && $submittedPassword === $correctPassword) {
    // Credentials are correct, start a session and redirect to admin-interface.php
    $_SESSION["admin"] = true;
    header("Location: admin-interface.php");
    exit; // Make sure to exit after redirection to prevent further script execution
} else {
    // Credentials are incorrect, set error message in session variable
    $_SESSION["errorMessage"] = "Invalid username or password. Please try again.";
    header("Location: index.php");
    exit; // Make sure to exit after redirection to prevent further script execution
}
?>
