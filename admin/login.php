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
<!--header -->

<?php
//  require 'conn.php'; 
 ?>

<?php
// session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["login"])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate user input and authenticate
    $sql = "SELECT email, password FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verify password (you should use password hashing here)
        if ($password == $row['password']) {
            // Valid credentials, create session
            $_SESSION['user_email'] = $row['email'];
           
            echo '<script>window.location.href = "index.php";</script>';
            exit;
        } else {
            $error = "Invalid password";
            echo $error;
        }
    } else {
        $error = "Invalid email";
        echo $error;
    }
}

?>   
      <br>
   <div class="container">
      <div class="login-form container mt-5">
         <div class="text">
            Log In for Admin
         </div>
         <form method="post">
            <div class="field">
            
               <input type="text" name="email" placeholder="Email or Phone">
            </div>
            <div class="field">
            
               <input type="password" name="password" placeholder="Password">
            </div>
            <br>
            <button type="submit" name="login">LOGIN</button>
            <div class="link">
               Not a member?
               <a href="registration.php">Signup now</a>
            </div>
         </form>
      </div>
   </div>


</body>


   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>



<script src="sources/jquery.min.js"></script>
<script src="sources/popper.min.js"></script>
<script src="sources/bootstrap.min.js"></script>





