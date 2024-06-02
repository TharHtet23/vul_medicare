<?php
$servername = "localhost";
$username = "root";
$password = ""; // Default password for root is empty in XAMPP
$dbname = "vulnerable_healthcare";
$port = 3308; 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname,$port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
