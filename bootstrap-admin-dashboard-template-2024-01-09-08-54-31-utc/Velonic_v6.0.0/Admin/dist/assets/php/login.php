<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
    <style>
        .centered-box {
            max-width: 800px;
            margin: 20px auto;
        }
        .card-header {
            background-color: #3bc0c3;
            color: white;
            text-align: center;
        }
        .card-body {
            background-color: #f8f9fa;
        }
        .details-row {
            border-bottom: 1px solid #dee2e6;
            padding: 10px 0;
        }
        .details-row:last-child {
            border-bottom: none;
        }
        .back-button {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
    </style>
</head>
<body style="background: linear-gradient(90deg, rgba(214,213,223,1) 0%, rgba(219,210,210,1) 1%, rgba(138,180,204,1) 100%);">
    <div class="container pt-5">

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('db_connection.php'); // Ensure this file sets up the $con connection
include('session.php'); // Include the session management file

// session_start(); 
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
            header("Location: ../../emp-management-access.php"); // Redirect to registration page
            exit();
        } else {
            echo "<div class='alert text-center' style='background: radial-gradient(circle, rgba(247,247,247,1) 0%, rgba(124,150,172,1) 34%);''>Login failed. Invalid username or password.</div>";
        }
        }
    }
?>

</body>
</html>