<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PIXELATE</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <link rel="stylesheet" href="sources/bootstrap.min.css">
  <link rel="stylesheet" href="sources/all.min.css"/>
  <link rel="stylesheet" href="styles.css">
  <link rel="icon" href="images/favicon/favicon.ico" type="image/x-icon">
  <link rel="shortcut icon" href="images/favicon/favicon.ico" type="image/x-icon">
</head>
<body style="margin: 0; padding: 0;">




<?php
session_start();// Start or resume the session

include 'conn.php'; // Include your database connection code

// Check if user is logged in
if (isset($_SESSION['user_email'])) {
    // User is logged in
    $loggedIn = true;
} else {
    // User is not logged in
    $loggedIn = false;
}
?>







<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container">
    <a class="navbar-brand" href="..\index.php">
      <img src="..\images/logo (2).png" alt="Logo" height="40">  P I X E L A T E
    </a>
   
          


      </ul>
    </div>
  </div>
</nav>



<?php


// Handle registration form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST['password'];

    // Check if fullname or email already exists
    $checkQuery = "SELECT fullname FROM users WHERE fullname='$fullname' OR email='$email' OR  phone='$phone'";
   $checkResult = mysqli_query($conn,$checkQuery);  
    //  $conn->query($checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
        echo "fullname or email or phone already exists.";
    } else {
        // Insert user data into the database
        $insertQuery = "INSERT INTO users (fullname,email,phone, password) VALUES ('$fullname', '$email','$phone', '$password')";
        if ($conn->query($insertQuery) === TRUE) {
         echo "<br>";
         echo "<br>";
         echo "<br>";
         echo "<br>";
            echo "Registration successful!";
        } else {
            echo '"Error: " . $conn->error';
        }
    }
}
?>

      


      

   <br>
   <br>
      <div class="login-form container mt-5">
         <div class="text">
            REGISTER
         </div>
         <form method="post">
            <div class="field">
               
               <input type="text" name="fullname" placeholder="Full Name">
            </div>
            <div class="field">
               
               <input type="text" name="phone" placeholder="Phone">
            </div>
            <div class="field">
               
               <input type="text" name="email" placeholder="Email">
            </div>
            <div class="field">
              
               <input type="password" name="password" placeholder="Set Password">
            </div>
            
           
            <button type="submit" name="register">REGISTER</button>
            
            <div class="link">
             Already Logged In ? <a href="login.php">Log In</a>
            </div>
         </form>
      </div>
   

