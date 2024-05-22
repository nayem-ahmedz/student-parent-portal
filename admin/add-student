<?php
// Include the database configuration file
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

// Function to sanitize input data
function sanitize_input($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize each form field
    $student_id = sanitize_input($_POST['student_id']);
    $full_name = sanitize_input($_POST['full_name']);
    $date_of_birth = sanitize_input($_POST['date_of_birth']);
    $father_name = sanitize_input($_POST['father_name']);
    $mother_name = sanitize_input($_POST['mother_name']);
    $address = sanitize_input($_POST['address']);
    $phone = sanitize_input($_POST['phone']);
    $department = sanitize_input($_POST['department']);
    $section = sanitize_input($_POST['section']);
    $batch = sanitize_input($_POST['batch']);

    // SQL query to insert data into the database
    $sql = "INSERT INTO student (student_id, full_name, date_of_birth, father_name, mother_name, address, phone, department, section, batch) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);

    // Bind parameters to the SQL statement and execute
    if ($stmt) {
        $stmt->bind_param("ssssssssss", $student_id, $full_name, $date_of_birth, $father_name, $mother_name, $address, $phone, $department, $section, $batch);
        if ($stmt->execute()) {
            // Data inserted successfully
            // Redirect back to admin interface with success message
            header("Location: admin-interface.php?success=Student added successfully.");
            exit();
        } else {
            // Error inserting data
            echo "Error: " . $stmt->error;
        }
    } else {
        // Error in preparing SQL statement
        echo "Error: " . $conn->error;
    }
}
?>
