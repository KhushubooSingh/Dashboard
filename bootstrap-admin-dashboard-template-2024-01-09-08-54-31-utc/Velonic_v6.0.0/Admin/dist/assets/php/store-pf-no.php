<?php
include('db_connection.php');
session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['pf_no']) && isset($_POST['password'])) {
        $username = $_POST['pf_no'];
        $password = $_POST['password'];

        // Sanitize input
        $username = stripcslashes($username);
        $password = stripcslashes($password);

        // Use prepared statements for security
        $sql = "SELECT * FROM emp WHERE pf_no = ? AND password = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) == 1) {
            // Fetch user details
            $user = mysqli_fetch_assoc($result);

            // Set session variables
            $_SESSION['loggedin'] = true;
            $_SESSION['pf_no'] = $user['pf_no'];
            $_SESSION['pf_no'] = $user['pf_no']; // Store PF No. in session

            header("Location: ../../emp-management-access.php"); // Redirect to registration page
            exit();
        } else {
            echo "<h1>Login failed. Invalid username or password.</h1>";
        }
    }
}
?>
