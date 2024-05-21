<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student-Parent Portal</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/e54598ab59.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include('includes/header-nav.php'); ?>
    <section>
        <article class="top-panel">
            <a href="#" onclick="alert('Link goes to University\'s Website')">Home</a>
            <i class="fa-solid fa-angle-right"></i>
            <a href="#" onclick="alert('Link goes to University\'s all Portal')">Portal</a>
            <i class="fa-solid fa-angle-right"></i>
            <a href="#" onclick="alert('You\'re already in Student-Parent Portal')">Student-Parent Portal</a>
            <h1>Parent-Student Portal</h1>
        </article>
        <article class="main">
            <div class="main-center">
                <p>Welcome to</p>
                <h2>Parent Student Portal</h2>
            </div>
            <button type="button" onclick="regiFun()">Register Here</button>
            <p>
                Already have a account? <a href="pages/signin-up.php" id="h-centersign">Sign in</a>
            </p>
        </article>
        <article class="bottom">
            <div class="map-frame">
                <h3>Bateshwar Campus</h3>
                <iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3618.0565631143168!2d91.9704422740145!3d24.930142942468215!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3750552bc71c899d%3A0x804e438bcc32b390!2sMetropolitan%20University%20Sylhet!5e0!3m2!1sen!2sbd!4v1713805935491!5m2!1sen!2sbd" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="b-panel">
                <h3>Quick Links</h3>
                <ul class="links-list">
                    <li> <a href="pages/about-us.php#campus">Our Campus</a> </li>
                    <li> <a href="pages/academics.php#academic-calendar">Academic Calender</a> </li>
                    <li> <a href="pages/academics.php#notice-events">Exam Schedule</a> </li>
                    <li> <a href="pages/results.php">View Results</a> </li>
                    <li> <a href="pages/fees.php">Track Tution Fees</a> </li>
                    <li> <a href="pages/about-us.php#contact">Contact Us</a> </li>
                </ul>
            </div>
            <div class="b-panel">
                <h3>Useful Links</h3>
                <ul class="links-list">
                    <li> <a href="http://www.ugc.gov.bd">University Grant Commision</a> </li>
                    <li> <a href="https://moedu.gov.bd">Ministery of Education</a> </li>
                    <li> <a href="http://www.educationboard.gov.bd">Education Board Bangladesh</a> </li>
                    <li> <a href="http://www.stamforduniversity.edu.bd/asset/download/Sexual_Harassement-Bang1.pdf">Director Against Sexual Harasment</a> </li>
                    <li> <a href="https://metrouni.edu.bd/">Metropolitan University</a> </li>
                    <li> <a href="#">MU Portals</a> </li>
                </ul>
            </div>
        </articel>
    </section>
    <?php include('includes/footer.php'); ?>
    <script src="script.js"></script>
</body>
</html>