<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>IITK Vlab- Update Task Status</title>
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
            min-height: 100vh;
            padding: 20px;
        }

        /* Ensure the card takes full width on smaller screens */
        .card {
            width: 100%;
            border-radius: 10px;
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
                                        <h4 class="fs-20 text-center" style="color: #1a2942;">Task Management</h4>
                                        <p class="text-center mb-3">Here you can update the status of your Task</p>

                                        <!-- form -->
                                        <form action="assets/php/emp-task-update.php" method="POST">
                                            <div class="mb-3">
                                                <label for="pf_no" class="form-label" style="color: #1a2942;">PF No.</label>
                                                <select id="pf_no" name="pf_no" class="form-control" required>
                                                    <option value="">Select PF No.</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="task_id" class="form-label" style="color: #1a2942;">Task Id</label>
                                                <input class="form-control" type="text" id="task_id" name="task_id" required
                                                    placeholder="Enter the task id">
                                            </div>
                                            <div class="mb-3">
                                                <label for="task_name" class="form-label" style="color: #1a2942;">Task Name</label>
                                                <input class="form-control" type="text" id="task_name" name="task_name" required
                                                    placeholder="Enter the task name">
                                            </div>
                                            <div class="mb-3">
                                                <label for="task_status" class="form-label" style="color: #1a2942;">Update Status</label>
                                                <select class="form-control" id="task_status" name="task_status" required>
                                                    <option value="">Select Task Status</option>
                                                    <option value="on_hold">On Hold</option>
                                                    <option value="in_progress">In Progress</option>
                                                    <option value="completed">Completed</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="date" class="form-label" style="color: #1a2942;">Date</label>
                                                <input class="form-control" type="date" id="date" name="date" required
                                                    placeholder="Enter the task date">
                                            </div>
                                            <div class="mb-3">
                                                <label for="comments" class="form-label" style="color: #1a2942;">Comments</label>
                                                <input class="form-control" type="text" id="comments" name="comments" required
                                                    placeholder="Enter the comments">
                                            </div>
                                            <div class="mb-0 d-grid text-center">
                                                <button class="btn fw-semibold" type="submit" name="update_task" style="background-color: #1a2942; color: #ffffff;">Update Task Status</button>
                                            </div>
                                            <div class="mb-0 d-grid text-center pt-2">
                                                <button class="btn fw-semibold" type="button" id="logout-button" name="logout-button" style="background-color: #1a2942; color: #ffffff;">Back</button>
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
