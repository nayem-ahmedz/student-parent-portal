<?php
// Include database configuration file
include('../includes/db-config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['regi-name']);
    $studentId = trim($_POST['student-id']);
    $email = trim($_POST['regi-email']);
    $password = trim($_POST['regi-psw']);

    // Hash the password before saving it in the database
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO users (name, student_id, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $studentId, $email, $hashed_password);

    if ($stmt->execute()) {
        echo 'Sign-up successful!';
    } else {
        echo 'Error: ' . $stmt->error;
    }

    $stmt->close();
} else {
    echo 'Invalid request method.';
}

$conn->close();
?>