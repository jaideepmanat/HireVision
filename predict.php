<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

// Capture form data
$age = $_POST['age'];
$gender = $_POST['gender'];
$stream = $_POST['stream'];
$internships = $_POST['internships'];
$cgpa = $_POST['cgpa'];
$hostel = $_POST['hostel'];
$backpapers = $_POST['backpapers'];

// Escape the stream parameter to handle spaces properly
$escaped_stream = escapeshellarg($stream);

// Create a command to call the Python script
$command = escapeshellcmd("python placementpred.py $age $gender $escaped_stream $internships $cgpa $hostel $backpapers");
$output = shell_exec($command);

// Output only the prediction result with styling
if (strpos($output, 'MIGHT NOT GET PLACED') === false) {
    echo '<span style="font-weight: bold; color: green;">' . $output . '</span>';
} else {
    echo '<span style="font-weight: bold; color: red;">' . $output . '</span>';
}
?>
