<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Marks</title>
    <link rel="stylesheet" href="/student-parent-portal/styles.css">
    <link rel="stylesheet" href="/student-parent-portal/pages/styles.css">
    <script src="https://kit.fontawesome.com/e54598ab59.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include('../includes/header-nav.php'); ?>
    <section>
        <div class="marks-box">
            <div class="marks-form">
                <form action="view-results.php" method="post">
                    <h2 class="cent">Fill out the form below to view marks</h2>
                    <div class="row">
                        <div class="col1">
                            <label for="fullname">Full Name :</label>
                        </div>
                        <div class="col2">
                            <input type="text" id="fullame" name="fullName" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col1">
                            <label for="studentid">Student ID :</lable>
                        </div>
                        <div class="col2">
                            <input type="text" id="studentid" name="studentId" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col1">
                            <label for="dateofbirth">Date of Birth :</label>
                        </div>
                        <div class="col2">
                            <input type="date" id="dateofbirth" name="dateOfBirth" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col1">
                            <label for="fathername">Father Name :</label>
                        </div>
                        <div class="col2">
                            <input type="text" id="fathername" name="fatherName" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col1">
                            <label for="phone">Phone :</label>
                        </div>
                        <div class="col2">
                            <input type="number" id="phone" name="phone" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col1">
                            <label for="dept">Department :</label>
                        </div>
                        <div class="col2">
                            <select id="dept" name="dept">
                                <option value="english">English</option>
                                <option value="economics">Economics</option>
                                <option value="llb">LLB</option>
                                <option value="cse" selected>CSE</option>
                                <option value="se">SE</option>
                                <option value="eee">EEE</option>
                                <option value="bba">BBA</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col1">
                            <label for="batch">Batch :</label>
                        </div>
                        <div class="col2">
                            <input type="number" id="batch" name="batch" required> 
                        </div>
                    </div>
                    <div class="row">
                        <input type="reset" value="Clear" class="clear-btn btn">
                        <input type="submit" value="Submit" class="submit-btn2 btn">
                    </div>
                </form>
            </div>
        </div>
    </section>
    <?php include('../includes/footer.php'); ?>
    <script src="/student-parent-portal/script.js"></script>
</body>
</html>