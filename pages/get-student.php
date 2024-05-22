<?php

// Check if the user is logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $student_id = $_SESSION['student_id'];
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

    // Fetch student information
    $query = "SELECT * FROM student WHERE student_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a student record was found
    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();
    } else {
        // If no student record found, set default values to 'not set'
        $student = array(
            'id' => 'not set',
            'student_id' => 'not set',
            'full_name' => 'not set',
            'date_of_birth' => 'not set',
            'father_name' => 'not set',
            'mother_name' => 'not set',
            'address' => 'not set',
            'phone' => 'not set',
            'department' => 'not set',
            'section' => 'not set',
            'batch' => 'not set'
        );
        
        // Use session variables for name and student ID
        $student['full_name'] = $_SESSION['username'];
        $student['student_id'] = $_SESSION['student_id'];
    }
} else {
    echo "User is not logged in.";
    // Handle the case where the user is not logged in
}
?>