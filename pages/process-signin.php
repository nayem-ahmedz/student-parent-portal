<?php
// Include database configuration file
include('../includes/db-config.php');
// Start the session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs to prevent SQL injection
    $email = $conn->real_escape_string(trim($_POST['user-email']));
    $password = trim($_POST['user-psw']); // Do not escape the password, as it needs to be verified as is

    // Query to check if the user exists and fetch user data
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User found, fetch the user data
        $user = $result->fetch_assoc();

        // Verify the hashed password
        if (password_verify($password, $user['password'])) {
            // Password is correct, start session and set session variables
            $_SESSION['email'] = $email;
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $user['name']; // Set the name field from the database as username

            // Fetch student_id from the users table and store it in session
            $student_id = $user['student_id'];
            $_SESSION['student_id'] = $student_id;

            // Fetch id from the users table and store it in session as user_id
            $user_id = $user['id'];
            $_SESSION['user_id'] = $user_id;

            // Redirect to user-interface.php
            header("Location: user-interface.php");
            exit();
        } else {
            // Invalid password
            $error = "Invalid email or password. Please try again.";
            // Redirect back to signin.php with error message
            header("Location: signin-up.php?error=" . urlencode($error));
            exit();
        }
    } else {
        // User not found
        $error = "Invalid email or password. Please try again.";
        // Redirect back to signin.php with error message
        header("Location: signin-up.php?error=" . urlencode($error));
        exit();
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>