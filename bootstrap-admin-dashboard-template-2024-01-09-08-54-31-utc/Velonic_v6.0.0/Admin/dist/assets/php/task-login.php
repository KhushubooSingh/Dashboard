<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('db_connection.php'); // Ensure this file sets up the $con connection
include('session.php'); // Include the session management file

check_login(); // Ensure the user is logged in

session_start(); 
// Start the session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Sanitize input
        $username = stripcslashes($username);
        $password = stripcslashes($password);

        // Use prepared statements for security
        $sql = "SELECT * FROM login WHERE username = ? AND password = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) == 1) {
            // Fetch user details
            $user = mysqli_fetch_assoc($result);

            // Set session variables
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $user['username']; // Use the correct username field
            header("Location: ../../auth-emp-assign-task.php"); // Redirect to registration page
            exit();
        } else {
            echo "<h1>Login failed. Invalid username or password.</h1>";
        }
    }
}
?>