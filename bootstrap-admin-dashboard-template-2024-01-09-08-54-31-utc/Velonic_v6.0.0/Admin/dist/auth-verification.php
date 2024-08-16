<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Task Management - Update Status</title>
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

    <style>
        /* General Styles */
        .aspect-ratio-box img {
            max-width: 100%;
            height: auto;
        }

        /* Hide image on smaller screens */
        @media (max-width: 991px) {
            .d-none.d-lg-block {
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
                max-width: 90%;
                /* Adjust the width as needed for smaller screens */
            }
        }

        @media (max-width: 576px) {
            .logo-img {
                max-width: 100%;
                /* Ensures the logo fits within smaller screens */
            }
        }

        /* Center form vertically and horizontally */
        .form-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 50vh;
            padding: 10px;
        }

        /* Ensure the card takes full width on smaller screens */
        .card {
            width: 100%;
            border-radius: 10px;
        }

        /* Add gap between columns */
        .col-sm-6 {
            padding: 0 15px;
        }
        
        /* Add a margin to the form elements */
        .form-element {
            margin-bottom: 20px;
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
                            <div class="col-lg-12 d-flex align-items-center justify-content-center p-3 form-container">
                                <div class="w-100" style="max-width: 600px;">
                                    <div class="auth-brand text-center">
                                        <!-- <a href="index.php" class="logo-light">
                                            <img src="assets/images/logo.png" alt="logo" height="22">
                                        </a> -->
                                        <a href="index.php" class="logo-dark">
                                            <img src="assets/images/vlab-iitk.png" class="logo-img" alt="dark logo" height="120" width="320">
                                        </a>
                                    </div>
                                    <div class="p-4 my-auto">
                                        <h4 class="fs-20 text-center" style="color: #1a2942;">Verification</h4>
                                        <p class="text-center mb-3">Here you can verify your certification</p>

                                        <!-- form -->
                                        <div class="row">
                                            <div class="col-sm-6 form-element">
                                                <form action="assets/php/verification-search-name.php" method="post">
                                                    <div class="mb-3">
                                                        <h5 style="color: #1a2942; ">Search with your registered name</h5>
                                                        <div class="pb-2">
                                                            <input type="text" id="name" name="name" class="form-control custom-input" placeholder="Enter your registered name :" required>
                                                        </div>
                                                    </div>
                                                    <div class="mb-0 d-grid text-center">
                                                        <button class="btn fw-semibold" type="submit" id="search_by" name="search_by" style="background-color: #1a2942; color: #ffffff;">Search</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-sm-6 form-element">
                                                <form action="assets/php/verification-search-reg-nmbr.php" method="post">
                                                    <div class="mb-3">
                                                        <h5 style="color: #1a2942; ">Search with your registration no.</h5>
                                                        <div class="pb-2">
                                                            <input type="text" id="registration_no" name="registration_no" class="form-control"
                                                                placeholder="Enter your registration no :" required>
                                                        </div>
                                                    </div>
                                                    <div class="mb-0 d-grid text-center">
                                                        <button class="btn fw-semibold" type="submit" id="search_by" name="search_by" style="background-color: #1a2942; color: #ffffff;">Search</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- end form -->
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>

        <!-- custom js -->
        <script src="assets/js/emp-fetch-task.js"></script>

</body>

</html>
