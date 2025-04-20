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

    echo "✅ Your support request has been submitted!";
}
?>
