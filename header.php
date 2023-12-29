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
<body>




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
    <a class="navbar-brand" href="index.php">
      <img src="images/logo (2).png" alt="Logo" height="40">  P I X E L A T E
    </a>
    <button class="navbar-toggler" type="button" style="color:#FFF;" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon btn-secondary"  style="border-radius:3px;"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="moreproducts.php?cat_name=Nature">Nature</a></li>
            <li><a class="dropdown-item" href="moreproducts.php?cat_name=Futuristic">Futuristic</a></li>
            <li><a class="dropdown-item" href="moreproducts.php?cat_name=GamingAssets">Gaming Assets</a></li>
            <li><a class="dropdown-item" href="exploremore.php">More</a></li>
          </ul>
        </li>
      </ul>
    </div>
        

    <div class="header-right">

    <?php if ($loggedIn) { ?>
        
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="images\profile-icon.jpg" alt="Profile Icon" width="30" height="30" class="rounded-circle">
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
            <!-- <a class="dropdown-item" href="admin/index.php">Admin Panel</a> -->
            <a class="dropdown-item" href="order.php">My Orders</a>
            
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
       </li>



    <?php } else { ?>
         <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
    <?php } ?>
</div>
          
        <!-- </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Log out</a>
        </li>
        
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="images\profile-icon.jpg" alt="Profile Icon" width="30" height="30" class="rounded-circle">
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
          <a class="dropdown-item" href="admin/index.php">Admin Panel</a>
          
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Logout</a>
        </div>
      </li> -->
    

      </ul>
    </div>
  </div>
</nav>