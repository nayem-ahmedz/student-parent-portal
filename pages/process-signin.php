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

    // Query to check if the user exists
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
            // Password is correct, start session and redirect to user-interface.php
            $_SESSION['email'] = $email;
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
