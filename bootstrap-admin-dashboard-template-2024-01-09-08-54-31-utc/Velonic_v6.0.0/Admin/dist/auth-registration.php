<?php
include('assets/php/session.php'); // Include the session management file

check_login(); // Ensure the user is logged in

// Check for messages in the URL
$message = '';
if (isset($_GET['status'])) {
    switch ($_GET['status']) {
        case 'success':
            $message = '<div class="alert alert-secondary">Registration successful!</div>';
            break;
        case 'error':
            $message = '<div class="alert alert-danger">Error: ' . htmlspecialchars($_GET['message']) . '</div>';
            break;
        case 'warning':
            $message = '<div class="alert alert-warning">Form submission not recognized.</div>';
            break;
        case 'invalid':
            $message = '<div class="alert alert-warning">Invalid request method.</div>';
            break;
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully responsive admin theme which can be used to build CRM, CMS,ERP etc." name="description" />
    <meta content="Techzaa" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Theme Config Js -->
    <script src="assets/js/config.js"></script>

    <!-- App css -->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
</head>

<body class="authentication-bg">

    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-8 col-lg-10">
                    <div class="card overflow-hidden bg-opacity-25">
                        <div class="row g-0">
                            <div class="col-lg-6 d-none d-lg-block p-2">
                                <img src="assets/images/auth-img.jpg" alt="" class="img-fluid rounded h-100">
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex flex-column h-100">
                                    <div class="auth-brand p-4">
                                        <a href="index.php" class="logo-light">
                                            <img src="assets/images/logo.png" alt="logo" height="22">
                                        </a>
                                        <a href="index.php" class="logo-dark">
                                            <img src="assets/images/logo-dark.png" alt="dark logo" height="22">
                                        </a>
                                    </div>
                                    <div class="p-4 my-auto">
                                        <h4 class="fs-20">Registration Form</h4>
                                        <p class="text-muted mb-3">Enter the details to add a new intern's account</p>

                                        <!-- form -->
                                        <form action="assets/php/registration.php" method="POST">
                                        <div class="mb-3">
                                                <label for="certificatetitle" class="form-label">Certificate Title</label>
                                                <input class="form-control" type="text" id="certificatetitle" name="certificatetitle"
                                                    placeholder="Enter your certificate title" required="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="registration_no" class="form-label">Registration No</label>
                                                <input class="form-control" type="text" id="registration_no" name="registration_no"
                                                    placeholder="Enter your registration no." required="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Name</label>
                                                <input class="form-control" type="name" id="name" name="name" required=""
                                                    placeholder="Enter your name">
                                            </div>
                                            <div class="mb-3">
                                                <label for="course" class="form-label">Course</label>
                                                <input class="form-control" type="text" required="" id="course" name="course"
                                                    placeholder="Enter your course name">
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input class="form-control" type="email" required="" id="email" name="email"
                                                    placeholder="Enter your email id">
                                            </div>
                                            <div class="mb-3">
                                                <label for="duration_from" class="form-label">Course Duration From</label>
                                                <input class="form-control" type="text" required="" id="duration_from" name="duration_from"
                                                    placeholder="Enter your starting date">
                                            </div>
                                            <div class="mb-3">
                                                <label for="duration_to" class="form-label">Course Duration To</label>
                                                <input class="form-control" type="text" required="" id="duration_to" name="duration_to"
                                                    placeholder="Enter your ending date">
                                            </div>
                                            <div class="mb-3">
                                                <label for="contact" class="form-label">Contact</label>
                                                <input class="form-control" type="text" required="" id="contact" name="contact"
                                                    placeholder="Enter your contact">
                                            </div>
                                            <div class="mb-3">
                                                <label for="contact" class="form-label">College Name</label>
                                                <input class="form-control" type="text" required="" id="college_name" name="college_name"
                                                    placeholder="Enter your college name">
                                            </div>
                                            <div class="mb-3">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input"
                                                        id="checkbox-signup">
                                                    <label class="form-check-label" for="checkbox-signup">I accept <a
                                                            href="javascript: void(0);" class="text-muted">Terms and
                                                            Conditions</a></label>
                                                </div>
                                            </div>
                                            <div class="mb-0 d-grid text-center">
                                                <button class="btn btn-primary fw-semibold" type="submit" name="register_submit">Register</button>
                                            </div>
                                            <div class="mb-0 d-grid text-center mt-2">
                                                <button class="btn btn-primary fw-semibold" id="logout-btn" type="submit">Log out</button>
                                            </div>
                                        </form>
                                        <!-- end form-->
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- <div class="row">
                <div class="col-12 text-center">
                    <p class="text-dark-emphasis">Already have account? <a href="auth-login.html"
                            class="text-dark fw-bold ms-1 link-offset-3 text-decoration-underline"><b>Log In</b></a>
                    </p>
                </div> 
            </div> -->
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- <footer class="footer footer-alt fw-medium">
        <span class="text-dark-emphasis">
            <script>document.write(new Date().getFullYear())</script> © Velonic - Theme by Techzaa
        </span>
    </footer> -->

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

</body>

</html>