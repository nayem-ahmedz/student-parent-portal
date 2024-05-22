<?php
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: signin-up.php");
    exit;
}

// Include the get-student.php to fetch student information
include('get-student.php');

// If form is submitted, update user's information in the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database configuration
    $db_host = 'localhost';
    $db_username = 'root';
    $db_password = '';
    $db_name = 'sp_portal';

    // Create database connection
    $conn = new mysqli($db_host, $db_username, $db_password, $db_name);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve and sanitize form data
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    // Update user's information in the database
    $update_query = "UPDATE student SET address=?, phone=? WHERE student_id=?";
    $update_stmt = $conn->prepare($update_query);
    $update_stmt->bind_param("sss", $address, $phone, $_SESSION['student_id']);
    $update_stmt->execute();
    $update_stmt->close();

    // Close connection
    $conn->close();

    // Redirect back to user-interface.php after updating
    header("Location: user-interface.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Marks</title>
    <link rel="stylesheet" href="/p300/styles.css">
    <link rel="stylesheet" href="/p300/pages/styles.css">
    <script src="https://kit.fontawesome.com/e54598ab59.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        h2 {
            text-align: center;
            margin-top: 20px;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            width: 40%;
        }
        input[type="text"] {
            width: calc(100% - 20px); /* Adjusted width to accommodate padding */
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }
        input[readonly] {
            background-color: #f8f8f8;
            color: #777;
        }
        button[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button[type="submit"]:hover {
            background-color: #45a049;
        }
        .editable-field {
            color: #4caf50;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php include('../includes/header-nav.php'); ?>
    <section style="padding-top: 40px; padding-bottom: 100px;">
    <h2>Edit User Information (Only for Students)</h2>
    <form method="post">
        <div class="user-details">
            <table>
                <tr>
                    <th>Student Name :</th>
                    <td><input type="text" name="full_name" value="<?php echo htmlspecialchars($student['full_name']); ?>" readonly></td>
                </tr>
                <tr>
                    <th>Student ID :</th>
                    <td><input type="text" name="student_id" value="<?php echo htmlspecialchars($student['student_id']); ?>" readonly></td>
                </tr>
                <tr>
                    <th>Father's Name :</th>
                    <td><input type="text" name="father_name" value="<?php echo htmlspecialchars($student['father_name']); ?>" readonly></td>
                </tr>
                <tr>
                    <th>Mother's Name :</th>
                    <td><input type="text" name="mother_name" value="<?php echo htmlspecialchars($student['mother_name']); ?>" readonly></td>
                </tr>
                <tr>
                    <th>Update Address :</th>
                    <td><input type="text" name="address" value="<?php echo htmlspecialchars($student['address']); ?>"></td>
                </tr>
                <tr>
                    <th>Department :</th>
                    <td><input type="text" name="department" value="<?php echo htmlspecialchars($student['department']); ?>" readonly></td>
                </tr>
                <tr>
                    <th>Section :</th>
                    <td><input type="text" name="section" value="<?php echo htmlspecialchars($student['section']); ?>" readonly></td>
                </tr>
                <tr>
                    <th>Batch :</th>
                    <td><input type="text" name="batch" value="<?php echo htmlspecialchars($student['batch']); ?>" readonly></td>
                </tr>
                <tr>
                    <th>Update Phone :</th>
                    <td><input type="text" name="phone" value="<?php echo htmlspecialchars($student['phone']); ?>"></td>
                </tr>
            </table>
        </div>
        <button type="submit">Save Changes</button>
    </form>
    </section>
    <?php include('../includes/footer.php'); ?>
    <script src="/script.js"></script>
</body>
</html>
