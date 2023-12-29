<?php
$host = "localhost";  // Replace with your host
$username = "root";  // Replace with your username
$password = "";  // Replace with your password
$dbname = "pixelate_db";    // Replace with your database name

// Create a database connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
