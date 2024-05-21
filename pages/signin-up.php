<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/e54598ab59.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include('../includes/header-nav.php'); ?>
    <section>
        <div class="centered">
            <div class="box">
                <h1 class="cent welcome-txt">Welcome</h1>
                <div class="top-box">
                    <button type="button" onclick="signinFun()" id="signin-btn">Sign in</button>
                    <button type="button" onclick="signupFun()" id="signup-btn">Sign up</button>
                </div>
                <div id="signin-eq" class="forms">
                    <form id="signinForm" action="process-signin.php" method="post">
                        <input type="email" id="user-email" name="user-email" placeholder="Email Address">
                        <input type="password" id="user-psw" name="user-psw" placeholder="Password">
                        <a href="#" id="forgot-btn">Forgot Password?</a>
                        <p id="errorMessage2">
                        <?php
            if (isset($_GET['error'])) {
                echo htmlspecialchars($_GET['error']);
            }
            ?>
                        </p>
                        <input type="submit" value="Sign In" class="submit-btn">
                    </form>
                    <p class="cent b-end">Not a user? <button type="button" onclick="signupFun()">Sign up now</button> </p>
                </div>
                <div id="signup-eq" class="forms">
                    <form id="signupForm" method="post">
                        <input type="text" id="regi-name" name="regi-name" placeholder="Full Name">
                        <input type="text" id="student-id" name="student-id" placeholder="Student ID">
                        <input type="email" id="regi-email" name="regi-email" placeholder="Email Address">
                        <input type="password" id="regi-psw" name="regi-psw" placeholder="Password">
                        <input type="password" id="regi-psw-repeat" name="regi-psw-repeat" placeholder="Repeat Password">
                        <p id="errorMessage1"></p>
                        <input type="submit" value="Sign Up" class="submit-btn">
                    </form>
                    <p class="cent b-end">Already have a account? <button type="button" onclick="signinFun()">Sign in now</button> </p>
                </div>
            </div>
        </div>
    </section>
    <div id="messageBOX">
        <p id="mB-username"></p>
        <p id="mB-message">Account created succesfully!</p>
        <button id="mB-link" onclick="document.location='signin-up.php'">Sign in now</button>
    </div>
    <?php include('../includes/footer.php'); ?>
    <script src="../script.js"></script>
    <script src="signinUp.js"></script>
        
        <script>
            //sign in validation
    document.addEventListener("DOMContentLoaded", function() {
        var signinForm = document.getElementById("signinForm");
        var userEmailInput = document.getElementById("user-email");
        var userPswInput = document.getElementById("user-psw");
        var errorMessage = document.getElementById("errorMessage2");

            signinForm.addEventListener("submit", function(event) {
                // Prevent the default form submission
                event.preventDefault();

                // Reset error message
                errorMessage.textContent = "";

                // Perform basic validation
                if (userEmailInput.value.trim() === "") {
                    errorMessage.textContent = "Please enter your email address.";
                    return false; // Prevent form submission
                }

                if (userPswInput.value.trim() === "") {
                    errorMessage.textContent = "Please enter your password.";
                    return false; // Prevent form submission
                }

                // If validation passes, submit the form
                this.submit();
            });
        });
</script>

</body>
</html>