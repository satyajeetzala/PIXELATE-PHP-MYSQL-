<?php
session_start(); // Start or resume the session

// Check if user is logged in
if (isset($_SESSION['user_email'])) {
    // Unset all session variables
    session_unset();

    // Destroy the session
    session_destroy();
}

// Redirect to the login page after logout
header('Location: login.php');
exit;
?>
