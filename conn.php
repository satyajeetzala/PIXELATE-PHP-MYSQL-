<?php
$host = "localhost";  
$username = "root";  
$password = "";  
$dbname = "pixelate_db";    


$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

 <link rel="stylesheet" href="admin/sources/bootstrap.min.css"> 
 <link rel="stylesheet" href="styles.css" >
<link rel="stylesheet" href="admin/sources/all.min.css"/>
<script src="sources/bootstrap.bundle.min.js"></script>
<script src="sources/jquery-3.5.1.slim.min.js"></script>
<script src="sources/popper.min.js"></script>
<script src="sources/bootstrap.min.js"></script>