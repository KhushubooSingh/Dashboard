<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Student Details</title>
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
    <div class="container">

<?php
include('db_connection.php'); // Ensure this file sets up the $con connection
include('session.php'); // Include the session management file

check_login(); // Ensure the user is logged in

$message = ''; // Initialize message variable



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['register_submit'])) {
        // Handle registration form submission
        $certificate_title = mysqli_real_escape_string($con, $_POST['certificatetitle']);
        $registration_no = mysqli_real_escape_string($con, $_POST['registration_no']);
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $course = mysqli_real_escape_string($con, $_POST['course']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $course_duration_from = mysqli_real_escape_string($con, $_POST['duration_from']);
        $course_duration_to = mysqli_real_escape_string($con, $_POST['duration_to']);
        $contact_no = mysqli_real_escape_string($con, $_POST['contact']);
        $college_name = mysqli_real_escape_string($con, $_POST['college_name']);

        $sql = "INSERT INTO certificate (certificate_title, registration_no, name, course, email, contact_no, course_duration_from, course_duration_to, college_name) 
                VALUES ('$certificate_title', '$registration_no', '$name', '$course', '$email', '$contact_no', '$course_duration_from', '$course_duration_to', '$college_name')";

        if (mysqli_query($con, $sql)) {
            // Redirect with success message
            echo "<div style='background: radial-gradient(circle, rgba(247,247,247,1) 0%, rgba(124,150,172,1) 34%); padding: 10px; border-radius: 5px; text-align: center; margin: 20px auto; width: 50%; max-width: 400px;'>
                    Intern's details added successfully!
                    <br><br>
                    <a href='../../emp-management-access.php' style='display: inline-block; background-color: #1a2942; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Back</a>
                </div>";
            exit();
        } else {
            // Redirect with error message
            header('Location: ../../auth-registration.php?status=error&message=' . urlencode(mysqli_error($con)));
            exit();
        }
    } else {
        // Redirect with warning message
        header('Location: ../../auth-registration.php?status=warning');
        exit();
    }
} else {
    // Redirect with invalid request message
    header('Location: ../../auth-registration.php?status=invalid');
    exit();
}



?>

</body>
</html>