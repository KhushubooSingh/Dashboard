<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

ob_start(); // Start output buffering
session_start();

include('db_connection.php'); // Ensure this file sets up the $con connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['pf_no']) && isset($_POST['password'])) {
        $pf_no = trim($_POST['pf_no']);
        $password = trim($_POST['password']);

        error_log("PF No: " . $pf_no);
        error_log("Password: " . $password);

        if (empty($pf_no) || empty($password)) {
            $_SESSION['error'] = 'PF No. and password cannot be empty.';
            error_log('Redirecting to login page due to empty input');
            header("Location: ../../auth-emp-login.php");
            exit();
        }

        $sql = "SELECT password FROM emp WHERE pf_no = ?";
        if ($stmt = mysqli_prepare($con, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $pf_no);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($result) {
                if (mysqli_num_rows($result) == 1) {
                    $user = mysqli_fetch_assoc($result);
                    $hashed_password = $user['password'];

                    if (password_verify($password, $hashed_password)) {
                        session_regenerate_id(true);
                        $_SESSION['loggedin'] = true;
                        $_SESSION['pf_no'] = $pf_no;
                        error_log('Redirecting to update page');
                        header("Location: ../../auth-emp-update.php");
                        exit();
                    } else {
                        $_SESSION['error'] = 'Invalid PF No. or password.';
                        error_log('Redirecting to login page due to incorrect password');
                        header("Location: ../../auth-emp-login.php");
                        exit();
                    }
                } else {
                    $_SESSION['error'] = 'Invalid PF No. or password.';
                    error_log('Redirecting to login page due to PF No. not found');
                    header("Location: ../../auth-emp-login.php");
                    exit();
                }
            } else {
                error_log('Error getting result: ' . mysqli_error($con));
                $_SESSION['error'] = 'An error occurred. Please try again later.';
                error_log('Redirecting to login page due to SQL error');
                header("Location: ../../auth-emp-login.php");
                exit();
            }

            mysqli_stmt_close($stmt);
        } else {
            error_log('Error preparing SQL statement: ' . mysqli_error($con));
            $_SESSION['error'] = 'An error occurred. Please try again later.';
            error_log('Redirecting to login page due to SQL prepare error');
            header("Location: ../../auth-emp-login.php");
            exit();
        }
    } else {
        $_SESSION['error'] = 'PF No. and password are required.';
        error_log('Redirecting to login page due to missing fields');
        header("Location: ../../auth-emp-login.php");
        exit();
    }
}

mysqli_close($con);
ob_end_flush(); // End output buffering
?>
