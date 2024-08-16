<?php
session_start(); 

// Get PF No. from session if logged in, otherwise default to 'Guest'
$pf_no = isset($_SESSION['pf_no']) ? $_SESSION['pf_no'] : 'Guest';

// Function to check if the user is logged in
function check_login()
{
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        // Redirect to login page if not logged in
        header('Location: ../../auth-emp-login.php');
        exit;
    }
}

// Function to log out and destroy the session
function logout()
{
    // Clear all session variables
    $_SESSION = array();

    // If the session was started with cookies, clear the session cookie
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, 
            $params["path"], $params["domain"], 
            $params["secure"], $params["httponly"]
        );
    }

    // Destroy the session
    session_destroy();

    // Redirect to login page
    header('Location: ../../auth-emp-login.php');
    exit;
}
?>
