<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Fees</title>
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/e54598ab59.js" crossorigin="anonymous"></script>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .student-info {
            text-align: center;
        }

        h1, h2 {
            text-align: center;
        }
        .view-error-message{
            color: red; padding-top: 50px;
        }
    </style>
</head>
<body>
    <?php include('../includes/header-nav.php'); ?>
    <section style="padding-bottom: 50px; min-height: 600px;">
    <?php
    session_start();
    include('../includes/db-config.php');

    function displayStudentInfo($studentInfo) {
        echo "<div class='student-info'>";
        echo "<h1>Student Information:</h1>";
        echo "<p><strong>Full Name:</strong> " . $studentInfo['full_name'] . "</p>";
        echo "<p><strong>Student ID:</strong> " . $studentInfo['student_id'] . "</p>";
        echo "<p><strong>Department:</strong> " . $studentInfo['department'] . "</p>";
        echo "<p><strong>Batch:</strong> " . $studentInfo['batch'] . "</p>";
        echo "<p><strong>Section:</strong> " . $studentInfo['section'] . "</p>"; // Assuming there is a 'section' field in the student table
        echo "<hr>";
        echo "</div>";
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Form submission logic
        $fullName = $_POST['fullName'];
        $studentId = $_POST['studentId'];
        $phone = $_POST['phone'];
        $dept = $_POST['dept'];
        $batch = $_POST['batch'];

        $sql = "SELECT * FROM student WHERE full_name='$fullName' AND student_id='$studentId' AND phone='$phone' AND department='$dept' AND batch='$batch'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $studentInfo = $result->fetch_assoc();
            displayStudentInfo($studentInfo);

            echo '<h2>Fees Information</h2>';
            echo "<table>";
            echo "<tr><th>Semester</th><th>Academic Year</th><th>Month</th><th>Tuition Fee</th><th>Total Amount Due</th><th>Amount Paid</th><th>Due Date</th><th>Payment Date</th><th>Status</th></tr>";

            $feesQuery = "SELECT * FROM fees WHERE student_id='$studentId'";
            $feesResult = $conn->query($feesQuery);

            if ($feesResult->num_rows > 0) {
                while($row = $feesResult->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['semester'] . "</td>";
                    echo "<td>" . $row['academic_year'] . "</td>";
                    echo "<td>" . $row['month'] . "</td>";
                    echo "<td>" . $row['tuition_fee'] . "</td>";
                    echo "<td>" . $row['total_amount_due'] . "</td>";
                    echo "<td>" . $row['amount_paid'] . "</td>";
                    echo "<td>" . $row['due_date'] . "</td>";
                    echo "<td>" . $row['payment_date'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9'>No fee records found</td></tr>";
            }

            echo "</table>";

        } else {
            echo "Error: Data not found.";
        }
    } elseif (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
        // Logic for logged-in users to view their results
        $studentId = $_SESSION['student_id'];

        $studentInfoQuery = "SELECT * FROM student WHERE student_id='$studentId'";
        $studentInfoResult = $conn->query($studentInfoQuery);

        if ($studentInfoResult->num_rows > 0) {
            $studentInfo = $studentInfoResult->fetch_assoc();
            displayStudentInfo($studentInfo);

            echo '<h2>Fees Information</h2>';
            echo "<table>";
            echo "<tr><th>Semester</th><th>Academic Year</th><th>Month</th><th>Tuition Fee</th><th>Total Amount Due</th><th>Amount Paid</th><th>Due Date</th><th>Payment Date</th><th>Status</th></tr>";

            $feesQuery = "SELECT * FROM fees WHERE student_id='$studentId'";
            $feesResult = $conn->query($feesQuery);

            if ($feesResult->num_rows > 0) {
                while($row = $feesResult->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['semester'] . "</td>";
                    echo "<td>" . $row['academic_year'] . "</td>";
                    echo "<td>" . $row['month'] . "</td>";
                    echo "<td>" . $row['tuition_fee'] . "</td>";
                    echo "<td>" . $row['total_amount_due'] . "</td>";
                    echo "<td>" . $row['amount_paid'] . "</td>";
                    echo "<td>" . $row['due_date'] . "</td>";
                    echo "<td>" . $row['payment_date'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9'>No fee records found</td></tr>";
            }

            echo "</table>";

        } else {
            echo '<h2 class="view-error-message">Error: Student information not found.</h2>';
        }
    } else {
        // If not logged in and no form submission, redirect to fees.php
        header("Location: fees.php");
        exit;
    }

    $conn->close();
    ?>
    </section>
    <?php include('../includes/footer.php'); ?>
</body>
</html>