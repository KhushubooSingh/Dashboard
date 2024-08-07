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
            header('Location: ../../auth-registration.php?status=success');
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