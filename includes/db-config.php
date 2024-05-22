<?php
// Database configuration
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'sp_portal';

// Create database connection
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    // If connection fails, send an error response
    http_response_code(500);
    die("Connection failed: " . $conn->connect_error);
}
?>