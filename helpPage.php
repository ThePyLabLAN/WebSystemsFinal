<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'supportDB');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phoneNumber'];
    $problem = $_POST['problem'];
    $comms = $_POST['comms'];

    $query = $conn->prepare("INSERT INTO support_requests (firstName, lastName, email, phoneNumber, problem, comms) VALUES (?, ?, ?, ?, ?, ?)");
    $query->bind_param("ssssss", $firstName, $lastName, $email, $phone, $problem, $comms);
    $query->execute();
    $query->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-364JK7ZM7R"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-364JK7ZM7R');
    </script>
    <meta charset="UTF-8">
    <meta name="description" content="The Texts Online Textbook is a one stop shop for everything Human-COmputer Interaction">
    <meta name="keywords" content="HTML, CSS, Human-Computer Interaction">
    <meta name="author" content="Solomon Jacobs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Texts</title>
    <link rel="icon" type="image/png" href="images\TextsLogo.JPG">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header class="header">
        <div class="left-section">
          <h1>Texts</h1>
          <button class="search-box">Placeholder for Search Button</button>
        </div>
        <div class="dropdown">
          <button class="dropdown-btn">Menu</button>
          <div class="dropdown-content">
            <a href="index.html">Home</a>
            <a href="textPage.html">Textbook</a>
            <a href="helpPage.html">Help</a>
          </div>
        </div>
    </header> 
    <div class="havingtrouble">
        <p class="httext">Having Trouble? Leave your information below and we will get back with you as soon as possible.</p>
    </div>
    <form class="middleform" action="" method="POST">

        <div class="spacing">
            <label for="firstName" class="visually-hidden">First Name:</label>
            <input type="text" id="firstName" name="firstName" placeholder="Type your first name..." required>
        </div>

        <div class="spacing">
            <label for="lastName" class="visually-hidden">Last Name:</label>
            <input type="text" id="lastName" name="lastName" placeholder="Type your last name..." required>
        </div>

        <div class="spacing">
            <label for="email" class="visually-hidden">Email:</label>
            <input type="text" id="email" name="email" placeholder="Type your email..." required>
        </div>


        <div class="spacing">
            <label for="phoneNumber" class="visually-hidden">Phone Number:</label>
            <input type="text" id="phoneNumber" name="phoneNumber" placeholder="Type your phone number..." required>
        </div>

        <div class="spacing">
            <label for="problem" class="visually-hidden">Problem:</label>
            <input type="text" id="problem" name="problem" placeholder="What is the problem..." required>
            </div>

        <div class="spacing">
            <label for="comms" class="visually-hidden">Prefered Communication:</label>
            <input type="text" id="comms" name="comms" placeholder="Prefered Communication..." required>
            </div>

        <input type="submit" value="Submit">
    </form>
    <div class="footer">
        <footer>Copyright © Solomon Jacobs 2025</footer>
    </div>

    <div class="bigbox">
        <div class="helpbox">
            <div>
                <h1 class="tophelpbox">
                    FAQ
                </h1>
                <div>
                    <div class="generalhelp">
                        <p class="generalhelptext">
                            General
                        </p>
                    </div>
                    <div class="textbookhelp">
                        <p class="textbookhelptext">
                            Textbook
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="generalhelpbox">
            <div>
                <h1 class="topgeneralhelpbox">
                    General
                </h1>
                <div>
                    <div class="generalhelpwrapper">
                        <p class="generalhelptext1">
                            How to Complete Multiple Choice Assessments
                        </p>
                    </div>
                    <div class="textbookhelpwrapper">
                        <p class="textbookhelptext1">
                            How to Login with Google
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>
</html>
