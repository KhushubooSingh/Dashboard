<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>IITK Vlab- Emp Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully responsive admin theme which can be used to build CRM, CMS, ERP, etc." name="description" />
    <meta content="Techzaa" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Theme Config Js -->
    <script src="assets/js/config.js"></script>

    <!-- App css -->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
                <div class="col-xxl-8 col-lg-10">
                    <div class="card overflow-hidden">
                        <div class="row g-0" style="background: radial-gradient(circle, rgba(247,247,247,1) 0%, rgba(124,150,172,1) 34%);">
                            <div class="col-lg-6 d-none d-lg-block p-3">
                                <div class="aspect-ratio-box pt-2">
                                    <img src="assets/images/vlab4.jpg" alt="Description" height="530" width="420" style="border: 0.5px solid #1a2942; border-radius: 5px;">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex flex-column h-100">
                                    <div class="auth-brand p-4">
                                        <a href="index.php" class="logo-light">
                                            <img src="assets/images/logo.png" alt="logo" height="22">
                                        </a>
                                        <a href="index.php" class="logo-dark">
                                            <img src="assets/images/vlab-iitk.png" class="logo-img" alt="dark logo" height="120" width="320" style="border:1px solid  rgb(113,130,134); border-radius: 5px;">
                                        </a>
                                    </div>
                                    <div class="p-4 my-auto">
                                        <h4 class="fs-20" style="color: #1a2942;">Task Management</h4>
                                        <p class="mb-3">Here you can see all task's after successfull login</p>

                                        <!-- form -->
                                        <form action="assets/php/fetch_emp_task.php" method="POST">
                                            <div class="mb-3">
                                                <label for="pf_no" class="form-label" style="color: #1a2942;">PF No.</label>
                                                <input class="form-control" type="text" id="pf_no" name="pf_no"
                                                    placeholder="Enter the pf no" required="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="password" class="form-label" style="color: #1a2942;">Password</label>
                                                <input class="form-control" type="password" id="password" name="password"
                                                    placeholder="Enter the password" required="">
                                            </div>
                                            <div class="mb-0 d-grid text-center">
                                                <button class="btn fw-semibold" type="submit" name="login" style="background-color: #1a2942; color: #ffffff;">Login</button>
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

            <!-- end row -->
        </div>
        <!-- end container -->
    </div>

    <script src="assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

    <!-- custom js -->
    <script src="assets/js/login.js"></script>

    <!-- jQuery script to populate dropdown -->
    <script>
        $(document).ready(function() {
            $.ajax({
                url: 'assets/php/fetch_pf_numbers.php',
                method: 'GET',
                success: function(data) {
                    $('#pf_no').html(data);
                }
            });
        });
    </script>

</body>

</html>