<?php
session_start();

// Check if user is logged in

if (!isset($_SESSION['user_email'])) {
     echo '<script>window.location.href = "login.php";</script>';
    exit;
 }
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P I X E L A T E</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include your custom CSS for dark mode -->
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include Bootstrap JS and Popper.js (required for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Include Font Awesome (optional) for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="icon" href="images/favicon/favicon.ico" type="image/x-icon">
    <!-- Custom CSS -->







<body id="body-pd" style="background-image: url(&quot;images/artifact.gif&quot;);color:#fff">
    <header class="header" id="header" style="color:#000;">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"> <i class='bx bx-user'></i> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="index.php" class="nav_logo"> <img src="images/logo (2).png" alt=""
                        style="width:2.2rem; height:2.2rem;margin-left:-8px;margin-top:-6px;">
                    <span class="nav_logo-name">P I X E L A T E</span>
                </a>
                <div class="nav_list"> <a href="index.php" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">&nbsp;&nbsp;&nbsp;Dashboard</span> </a>
                    <a href="managecategories.php" class="nav_link"> <i class='fas fa-list'></i> <span
                            class="nav_name">&nbsp;&nbsp;&nbsp;Categories</span>
                    </a>
                    <a href="manageartworks.php" class="nav_link"> <i class='fas fa-image'></i> <span
                            class="nav_name">&nbsp;&nbsp;&nbsp;Artworks</span>
                    </a>
                </div>
            </div> <a href="logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span
                    class="nav_name">&nbsp;&nbsp;&nbsp;SignOut</span> </a>
        </nav>
    </div>











    <script>
        document.addEventListener("DOMContentLoaded", function (event) {

            const showNavbar = (toggleId, navId, bodyId, headerId) => {
                const toggle = document.getElementById(toggleId),
                    nav = document.getElementById(navId),
                    bodypd = document.getElementById(bodyId),
                    headerpd = document.getElementById(headerId)

                // Validate that all variables exist
                if (toggle && nav && bodypd && headerpd) {
                    toggle.addEventListener('click', () => {
                        // show navbar
                        nav.classList.toggle('show')
                        // change icon
                        toggle.classList.toggle('bx-x')
                        // add padding to body
                        bodypd.classList.toggle('body-pd')
                        // add padding to header
                        headerpd.classList.toggle('body-pd')
                    })
                }
            }

            showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

            /*===== LINK ACTIVE =====*/
            const linkColor = document.querySelectorAll('.nav_link')

            function colorLink() {
                if (linkColor) {
                    linkColor.forEach(l => l.classList.remove('active'))
                    this.classList.add('active')
                }
            }
            linkColor.forEach(l => l.addEventListener('click', colorLink))

            // Your code to run since DOM is loaded and ready
        });

    </script>
    </head>