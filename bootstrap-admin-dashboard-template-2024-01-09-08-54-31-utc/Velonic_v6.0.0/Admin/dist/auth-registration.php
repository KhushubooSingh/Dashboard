<?php
include('assets/php/session.php'); // Include the session management file
include('assets/php/db_connection.php');

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
    <title>IITK Vlab- Certficate Verification</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully responsive admin theme which can be used to build CRM, CMS, ERP etc." name="description" />
    <meta content="Techzaa" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Theme Config Js -->
    <script src="assets/js/config.js"></script>

    <!-- App css -->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <style>
        /* General Styles */
        .aspect-ratio-box img {
            max-width: 108%;
            height: 530px;
        }

        /* Hide image on smaller screens */
        @media (max-width: 991px) and (max-height: 886px) {
            .col-lg-6.d-none.d-lg-block {
                display: none;
            }
        }

        /* Adjust padding and margins for smaller screens */
        @media (max-width: 991px) {
            .auth-brand img {
                width: auto;
                height: auto;
            }

            .card {
                margin: 0;
            }

            .p-4 {
                padding: 15px;
            }

            .btn {
                padding: 10px 15px;
                font-size: 14px;
            }
        }




        /* Default styles for the logo */
        .logo-img {
            max-width: 100%;
            /* Ensures the image does not exceed the container's width */
            height: auto;
            /* Maintains the aspect ratio */
            border: 1px solid rgb(113, 130, 134);
            border-radius: 5px;
        }

        /* Responsive styles for smaller screens */
        @media (max-width: 991px) {
            .logo-img {
                max-width: 80%;
                /* Adjust the width as needed for smaller screens */
            }
        }

        @media (max-width: 576px) {
            .logo-img {
                max-width: 100%;
                /* Ensures the logo fits within smaller screens */
            }
        }
    </style>
</head>

<body class="authentication-bg position-relative">
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative" style="background: linear-gradient(90deg, rgba(214,213,223,1) 0%, rgba(219,210,210,1) 1%, rgba(138,180,204,1) 100%);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card overflow-hidden">
                        <div class="row g-0" style="background: radial-gradient(circle, rgba(247,247,247,1) 0%, rgba(124,150,172,1) 34%);">
                            <div class="col-lg-12 d-flex align-items-center justify-content-center p-3">
                                <div class="d-flex flex-column w-100">
                                    <div class="auth-brand p-4 text-center">
                                        <a href="index.php" class="logo-light">
                                            <img src="assets/images/logo.png" alt="logo" height="22">
                                        </a>
                                        <a href="index.php" class="logo-dark">
                                            <img src="assets/images/vlab-iitk.png" class="logo-img" alt="dark logo" height="120" width="320" style="border:1px solid  rgb(113,130,134); border-radius: 5px;">
                                        </a>
                                    </div>
                                    <div class="p-4 my-auto d-flex justify-content-center">
                                        <div class="w-100" style="max-width: 600px;">
                                            <h4 class="fs-20 text-center" style="color: #1a2942;">Registration Form</h4>
                                            <p class="mb-3 text-center"  style="color: #696969;">Enter the details to add a new intern's account</p>

                                             <!-- Display message -->
                                            <?php echo $message; ?>


                                            <!-- form -->
                                            <form action="assets/php/registration.php" method="POST">
                                        <div class="mb-3">
                                            <label for="certificatetitle" class="form-label" style="color: #1a2942; ">Certificate Title</label>
                                            <input class="form-control" type="text" id="certificatetitle" name="certificatetitle" placeholder="Enter your certificate title" required="">
                                        </div>
                                        <div class="mb-3">
                                            <label for="registration_no" class="form-label" style="color: #1a2942; ">Registration No</label>
                                            <input class="form-control" type="text" id="registration_no" name="registration_no" placeholder="Enter your registration no." required="">
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label" style="color: #1a2942; ">Name</label>
                                            <input class="form-control" type="text" id="name" name="name" required="" placeholder="Enter your name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="course" class="form-label" style="color: #1a2942; ">Course</label>
                                            <input class="form-control" type="text" required="" id="course" name="course" placeholder="Enter your course name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label" style="color: #1a2942; ">Email</label>
                                            <input class="form-control" type="email" required="" id="email" name="email" placeholder="Enter your email id">
                                        </div>
                                        <div class="mb-3">
                                            <label for="duration_from" class="form-label" style="color: #1a2942; ">Course Duration From</label>
                                            <input class="form-control" type="text" required="" id="duration_from" name="duration_from" placeholder="Enter your starting date">
                                        </div>
                                        <div class="mb-3">
                                            <label for="duration_to" class="form-label" style="color: #1a2942; ">Course Duration To</label>
                                            <input class="form-control" type="text" required="" id="duration_to" name="duration_to" placeholder="Enter your ending date">
                                        </div>
                                        <div class="mb-3">
                                            <label for="contact" class="form-label" style="color: #1a2942; ">Contact</label>
                                            <input class="form-control" type="text" required="" id="contact" name="contact" placeholder="Enter your contact">
                                        </div>
                                        <div class="mb-3">
                                            <label for="college_name" class="form-label" style="color: #1a2942; ">College Name</label>
                                            <input class="form-control" type="text" required="" id="college_name" name="college_name" placeholder="Enter your college name">
                                        </div>
                                        <!-- <div class="mb-3">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="checkbox-signup">
                                                <label class="form-check-label" for="checkbox-signup" style="color: #696969;">I accept <a href="javascript: void(0);"  style="color: #696969;">Terms and Conditions</a></label>
                                            </div>
                                        </div> -->
                                        <div class="mb-0 d-grid text-center">
                                            <button class="btn fw-semibold" style="background-color: #1a2942; color: #ffffff;" type="submit" name="register_submit">Register</button>
                                        </div>
                                        <div class="mb-0 d-grid text-center mt-2">
                                            <button class="btn fw-semibold" style="background-color: #1a2942; color: #ffffff;" type="button" id="logout-btn">Log out</button>
                                        </div>
                                    </form>
                                            <!-- end form-->
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>

    <script src="assets/js/vendor.min.js"></script>
    <!-- App js -->
    <script src="assets/js/app.min.js"></script>
</body>

</html>
