<?php
// Start the session
session_start();

// Check if the 'admin' session variable is not set or is set to false
if (!isset($_SESSION["admin"]) || $_SESSION["admin"] !== true) {
    // Redirect to the login page
    header("Location: login.php");
    exit; // Make sure to exit after redirection to prevent further script execution
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Interface</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#add-student-tab" class="tab-link">Add Student</a>
        <a href="#remove-student-tab" class="tab-link">Remove Student</a>
        <a href="#update-results-tab" class="tab-link">Update Results</a>
        <a href="#update-fees-tab" class="tab-link">Update Fees</a>
    </div>

    <!-- Main Content -->
    <?php
$active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'default-tab'; // Set default tab if tab parameter is not provided
?>
    <div class="content">
        <div class="welcome-message">
            <?php
    // Check if there is a success message parameter in the URL
    if (isset($_GET['success'])) {
        // Display the success message
        echo '<h3>' . htmlspecialchars($_GET['success']) . '</h3>';
    } else {
        // If no success message, display default welcome message
        echo '<h2>Welcome to Metropolitan University, Bangladesh Admin Interface!</h2>';
        echo '<p>We are glad to have you here. Please select an action from the tabs below.</p>';
        echo '<button onclick="location.href=\'logout.php\';" style="background-color: red; color: white; border: none; padding: 10px 20px; cursor: pointer; border-radius: 5px;">Log out</button>';
    }
    ?>
        </div>
        <!-- Add Student Tab -->
        <div id="add-student-tab" class="tab-content">
            <h2>Add Student</h2>
            <!-- Add Student Form -->
            <form action="add-student.php" method="POST" class="basic-form" id="add-student">
                <div class="form-group">
                    <label for="student_id">Student ID:</label>
                    <input type="text" id="student_id" name="student_id">
                </div>
                <div class="form-group">
                    <label for="full_name">Full Name:</label>
                    <input type="text" id="full_name" name="full_name">
                </div>
                <div class="form-group">
                    <label for="date_of_birth">Date of Birth:</label>
                    <input type="date" id="date_of_birth" name="date_of_birth">
                </div>
                <div class="form-group">
                    <label for="father_name">Father's Name:</label>
                    <input type="text" id="father_name" name="father_name">
                </div>
                <div class="form-group">
                    <label for="mother_name">Mother's Name:</label>
                    <input type="text" id="mother_name" name="mother_name">
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address">
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" id="phone" name="phone">
                </div>
                <div class="form-group">
                    <label for="department">Department:</label>
                    <input type="text" id="department" name="department">
                </div>
                <div class="form-group">
                    <label for="section">Section:</label>
                    <input type="text" id="section" name="section">
                </div>
                <div class="form-group">
                    <label for="batch">Batch:</label>
                    <input type="text" id="batch" name="batch">
                </div>
                <p id="error-message"></p>
                <div class="form-group">
                    <input type="submit" value="Add Student">
                </div>
            </form>
        </div>


        <!-- Remove Student Tab -->
        <div id="remove-student-tab" class="tab-content">
            <!-- Remove Student Form -->
            <form action="remove-student.php" method="POST" class="basic-form" id="remove-student">
                <h2>Remove Student</h2>
                <div class="form-group">
                    <label for="student_id">Student ID:</label>
                    <input type="text" id="student_id" name="student_id">
                </div>
                <div class="form-group">
                    <label for="full_name">Student Name:</label>
                    <input type="text" id="full_name" name="full_name">
                </div>
                <div class="form-group">
                    <p id="error-message2"></p>
                </div>
                <div class="form-group">
                    <input type="submit" value="Remove Student">
                </div>
            </form>
        </div>


        <!-- Update Results Tab -->
        <div id="update-results-tab" class="tab-content">
            <!-- Update Results Form -->
            <form action="update-results.php" method="POST" class="basic-form" id="update-results-form">
                <h2>Update Result</h2>
                <div class="form-group">
                    <label for="student_id">Student ID:</label>
                    <input type="text" id="student_id" name="student_id">
                </div>
                <div class="form-group">
                    <label for="course_code">Course Code:</label>
                    <input type="text" id="course_code" name="course_code">
                </div>
                <div class="form-group">
                    <label for="course_name">Course Name:</label>
                    <input type="text" id="course_name" name="course_name">
                </div>
                <div class="form-group">
                    <label for="marks_obtained">Marks Obtained:</label>
                    <input type="text" id="marks_obtained" name="marks_obtained">
                </div>
                <div class="form-group">
                    <label for="total_marks">Total Marks:</label>
                    <input type="text" id="total_marks" name="total_marks">
                </div>
                <div class="form-group">
                    <label for="exam_date">Exam Date:</label>
                    <input type="date" id="exam_date" name="exam_date">
                </div>
                <div class="form-group">
                    <label for="grade">Grade:</label>
                    <input type="text" id="grade" name="grade">
                </div>
                <div class="form-group">
                    <label for="semester">Semester:</label>
                    <input type="text" id="semester" name="semester">
                </div>
                <div class="form-group">
                    <label for="academic_year">Academic Year:</label>
                    <input type="text" id="academic_year" name="academic_year">
                </div>
                <p id="error-message"></p>
                <div class="form-group">
                    <input type="submit" value="Update Results">
                </div>
            </form>
        </div>


        <!-- Update Fees Tab -->
        <div id="update-fees-tab" class="tab-content">
            <!-- Update Fees Form -->
            <form action="update-fees.php" method="POST" class="basic-form" id="update-fees-form">
                <h2>Update Fees</h2>
                <div class="form-group">
                    <label for="student_id">Student ID:</label>
                    <input type="text" id="student_id" name="student_id">
                </div>
                <div class="form-group">
                    <label for="semester">Semester:</label>
                    <input type="text" id="semester" name="semester">
                </div>
                <div class="form-group">
                    <label for="academic_year">Academic Year:</label>
                    <input type="text" id="academic_year" name="academic_year">
                </div>
                <div class="form-group">
                    <label for="month">Month:</label>
                    <input type="text" id="month" name="month">
                </div>
                <div class="form-group">
                    <label for="tuition_fee">Tuition Fee:</label>
                    <input type="text" id="tuition_fee" name="tuition_fee">
                </div>
                <div class="form-group">
                    <label for="total_amount_due">Total Amount Due:</label>
                    <input type="text" id="total_amount_due" name="total_amount_due">
                </div>
                <div class="form-group">
                    <label for="amount_paid">Amount Paid:</label>
                    <input type="text" id="amount_paid" name="amount_paid">
                </div>
                <div class="form-group">
                    <label for="due_date">Due Date:</label>
                    <input type="date" id="due_date" name="due_date">
                </div>
                <div class="form-group">
                    <label for="payment_date">Payment Date:</label>
                    <input type="date" id="payment_date" name="payment_date">
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <input type="text" id="status" name="status">
                </div>
                <p id="error-message"></p>
                <div class="form-group">
                    <input type="submit" value="Update Fees">
                </div>
            </form>
        </div>
    </div>
    <script src="scripts.js"></script>
</body>
</html>
