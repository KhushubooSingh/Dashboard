<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('db_connection.php'); // Ensure this file sets up the $con connection
// include('session.php'); 
// Include the session management file

session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['pf_no']) && isset($_POST['password'])) {
        $pf_no = $_POST['pf_no'];
        $password = $_POST['password'];

        // Sanitize input
        $pf_no = stripcslashes($pf_no);
        $password = stripcslashes($password);

        // Use prepared statements for security
        $sql = "SELECT * FROM emp WHERE pf_no = ? AND password = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $pf_no, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) == 1) {
            // Fetch user details
            $user = mysqli_fetch_assoc($result);

            // Set session variables
            $_SESSION['loggedin'] = true;
            $_SESSION['pf_no'] = $user['pf_no']; // Store the PF No. in the session

            // echo "<h1>Login Successfull.</h1>";

            // Redirect to update task page
            header("Location: ../../emp-update-task-status.php"); 
            // Redirect to the task update page
            exit();
        } else {
            echo "<h1>Login failed. Invalid PF No. or password.</h1>";
        }
    }
}
?>
