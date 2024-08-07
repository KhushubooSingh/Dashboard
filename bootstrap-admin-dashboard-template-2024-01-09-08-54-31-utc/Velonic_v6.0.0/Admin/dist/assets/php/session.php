<?php
session_start(); // Start the session


if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    $username = $_SESSION['username']; // Get username from session
} else {
    $username = 'Guest'; // Default if not logged in
}

// Function to check if the user is logged in
function check_login() {
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header('Location: ../../auth-login.php'); // Redirect to login page if not logged in
        exit;
    }
}

// Function to log out and destroy the session
function logout() {
    $_SESSION = array(); // Clear all session variables
    session_destroy(); // Destroy the session
    header('Location: ../../auth-login.php'); // Redirect to login page
    exit;
}
?>