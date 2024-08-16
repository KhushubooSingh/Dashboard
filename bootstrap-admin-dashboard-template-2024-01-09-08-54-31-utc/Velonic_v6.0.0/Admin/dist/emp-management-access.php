<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Cards | Velonic - Bootstrap 5 Admin & Dashboard Template</title>
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

    <!-- Custom CSS for Back link -->
    <style>
        .back-link-container {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 9999; /* Ensures it stays on top of other elements */
        }

        .back-link {
            /* background-color: #1a2942; */
            color: #ffffff; /* Customize the text color */
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            /* font-weight: bold; */
        }

        .back-link:hover {
            background-color: #141e30; /* Darker background on hover */
        }
    </style>
</head>

<body style="background: linear-gradient(90deg, rgba(214,213,223,1) 0%, rgba(219,210,210,1) 1%, rgba(138,180,204,1) 100%);">
    <!-- Begin page -->
    <div class="wrapper">
        <!-- Back link container -->
        <div class="back-link-container">
            <a href="index.php" class="back-link">Back</a>
        </div>

        <div class="content-page">
            <div class="content">
                <!-- Start Content-->
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <!-- <div class="page-title-right">Back</div> -->
                                <!-- <h4 class="page-title">Cards</h4> -->
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col-12 pt-5">
                            <!-- <h4 class="mb-4 mt-2">Employee Management and Access</h4> -->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row pt-5">
                        <div class="col-sm-6 col-lg-3">
                            <div class="card">
                                <img src="assets/images/small/small-2.jpg" class="card-img-top" alt="...">
                                <div class="card-body" style="background: radial-gradient(circle, rgba(247,247,247,1) 0%, rgba(124,150,172,1) 34%);">
                                    <h5 class="card-title" style="color: #1a2942;">Add new Intern Account</h5>
                                    <a href="auth-registration.php" class="btn mt-2 stretched-link" style="background-color: #1a2942;  color: #ffffff;">Click here</a>
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div> <!-- end col-->
                        <div class="col-sm-6 col-lg-3">
                            <div class="card">
                                <img src="assets/images/small/small-2.jpg" class="card-img-top" alt="...">
                                <div class="card-body" style="background: radial-gradient(circle, rgba(247,247,247,1) 0%, rgba(124,150,172,1) 34%);">
                                    <h5 class="card-title" style="color: #1a2942;">Add new Employee Account</h5>
                                    <a href="auth-emp-registration.php" class="btn mt-2 stretched-link" style="background-color: #1a2942;  color: #ffffff;">Click here</a>
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div> <!-- end col-->
                        <div class="col-sm-6 col-lg-3">
                            <div class="card">
                                <img src="assets/images/small/small-2.jpg" class="card-img-top" alt="...">
                                <div class="card-body" style="background: radial-gradient(circle, rgba(247,247,247,1) 0%, rgba(124,150,172,1) 34%);">
                                    <h5 class="card-title" style="color: #1a2942;">Update existing Employee Account</h5>
                                    <a href="auth-emp-update.php" class="btn mt-2 stretched-link" style="background-color: #1a2942;  color: #ffffff;">Click here</a>
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->
                </div> <!-- container -->
            </div> <!-- content -->

            <!-- Footer Start -->
            <!-- <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 text-center">
                            <script>document.write(new Date().getFullYear())</script> © Velonic - Theme by <b>Techzaa</b>
                        </div>
                    </div>
                </div>
            </footer> -->
            <!-- end Footer -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->

    <!-- Theme Settings -->
    <!-- (Your theme settings code here) -->

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>
</body>

</html>
