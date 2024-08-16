<?php
include('assets/php/session.php'); // Include the session management file
include('assets/php/db_connection.php');

check_login(); // Ensure the user is logged in
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>IITK Vlab- Emp Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully responsive admin theme which can be used to build CRM, CMS, ERP, etc." name="description" />
    <meta content="Techzaa" name="author" />

    <!-- Link Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Theme Config Js -->
    <script src="assets/js/config.js"></script>

    <!-- App css -->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- custom css -->
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        .auth-brand img {
            max-width: 100%;
        }

        .card {
            border-radius: 10px;
            margin: 0 auto;
            width: 100%;
            max-width: 900px;
        }

        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .form-container .btn {
            margin-top: 20px;
        }
    </style>
</head>

<body class="authentication-bg">
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative" style="background: linear-gradient(90deg, rgba(214,213,223,1) 0%, rgba(219,210,210,1) 1%, rgba(138,180,204,1) 100%);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card overflow-hidden bg-opacity-25">
                        <form action="assets/php/emp_registration.php" method="POST" enctype="multipart/form-data" style="background: radial-gradient(circle, rgba(247,247,247,1) 0%, rgba(124,150,172,1) 34%);">
                            <div class="row g-0">
                                <div class="col-lg-6 px-4 pt-3">
                                    <div class="p-0 my-auto">
                                        <div class="mb-3">
                                            <label for="pf_no" class="form-label" style="color: #1a2942;">PF No.</label>
                                            <input class="form-control" type="text" id="pf_no" name="pf_no" placeholder="Enter the pf no.">
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label" style="color: #1a2942;">Password</label>
                                            <input class="form-control" type="text" id="password" name="password" placeholder="Enter your password">
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label" style="color: #1a2942;">Name</label>
                                            <input class="form-control" type="text" id="name" name="name" placeholder="Enter your name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label" style="color: #1a2942;">Email</label>
                                            <input class="form-control" type="email" id="email" name="email" required="" placeholder="Enter your email">
                                        </div>
                                        <div class="mb-3">
                                            <label for="pan_no" class="form-label" style="color: #1a2942;">Pan No.</label>
                                            <input class="form-control" type="text" required="" id="pan_no" name="pan_no" placeholder="Enter your pan no.">
                                        </div>
                                        <div class="mb-3">
                                            <label for="status" class="form-label" style="color: #1a2942;">Status</label>
                                            <select class="form-control" name="status" id="emp-status" style="display: block;" required>
                                                <option value="" disabled selected>Select status</option>
                                                <option value="active">Active</option>
                                                <option value="not_active">Not Active</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="designation" class="form-label" style="color: #1a2942;">Designation</label>
                                            <input class="form-control" type="text" required="" id="designation" name="designation" placeholder="Enter your designation">
                                        </div>
                                        <div class="mb-3">
                                            <label for="bank_name" class="form-label" style="color: #1a2942;">Bank Name</label>
                                            <input class="form-control" type="text" required="" id="bank_name" name="bank_name" placeholder="Enter your bank name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="account_no" class="form-label" style="color: #1a2942;">Account No.</label>
                                            <input class="form-control" type="text" required="" id="account_no" name="account_no" placeholder="Enter your account no.">
                                        </div>
                                        <div class="mb-3">
                                            <label for="guardian_name" class="form-label" style="color: #1a2942;">Guardian Name</label>
                                            <input class="form-control" type="text" required="" id="guardian_name" name="guardian_name" placeholder="Enter your guardian name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="upload_photo" class="form-label" style="color: #1a2942;">Upload Image</label>
                                            <input type="file" id="upload_photo" class="form-control" name="upload_photo">
                                        </div>
                                        <div class="mb-3">
                                            <label for="mobile_no" class="form-label" style="color: #1a2942;">Mobile No.</label>
                                            <input class="form-control" type="text" required="" id="mobile_no" name="mobile_no" placeholder="Enter your mobile no.">
                                        </div>
                                    </div>
                                </div>
                                <!-- Second Column -->
                                <div class="col-lg-6 px-4 pt-3">
                                    <div class="p-0 my-auto">
                                        <div class="mb-3">
                                            <label for="id_no" class="form-label" style="color: #1a2942;">Id No.</label>
                                            <input class="form-control" type="text" id="id_no" name="id_no" placeholder="Enter your id no" required="">
                                        </div>
                                        <div class="mb-3">
                                            <label for="confirm_password" class="form-label" style="color: #1a2942;">Confirm Password</label>
                                            <input class="form-control" type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password">
                                        </div>
                                        <div class="mb-3">
                                            <label for="gender" class="form-label" style="color: #1a2942;">Gender</label>
                                            <select class="form-control" id="gender" name="gender" style="display: block;" required>
                                                <option value="" disabled selected>Select gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="alt_email" class="form-label" style="color: #1a2942;">Alt. Email</label>
                                            <input class="form-control" type="email" id="alt_email" name="alt_email" required="" placeholder="Enter your alternate email">
                                        </div>
                                        <div class="mb-3">
                                            <label for="aadhar_no" class="form-label" style="color: #1a2942;">Aadhar No.</label>
                                            <input class="form-control" type="text" required="" id="aadhar_no" name="aadhar_no" placeholder="Enter your aadhar no.">
                                        </div>
                                        <div class="mb-3">
                                            <label for="joining_date" class="form-label" style="color: #1a2942;">Joining Date</label>
                                            <input class="form-control" type="date" id="joining_date" name="joining_date" placeholder="Enter your joining date" required="">
                                        </div>
                                        <div class="mb-3">
                                            <label for="other" class="form-label" style="color: #1a2942;">Other Info.</label>
                                            <input class="form-control" type="text" required="" id="other" name="other" placeholder="Enter your other information">
                                        </div>
                                        <div class="mb-3">
                                            <label for="branch_name" class="form-label" style="color: #1a2942;">Branch Name</label>
                                            <input class="form-control" type="text" required="" id="branch_name" name="branch_name" placeholder="Enter your branch name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="ifsc_code" class="form-label" style="color: #1a2942;">Ifsc Code</label>
                                            <input class="form-control" type="text" required="" id="ifsc_code" name="ifsc_code" placeholder="Enter your ifsc code">
                                        </div>
                                        <div class="mb-3">
                                            <label for="guardian_contact" class="form-label" style="color: #1a2942;">Guardian Contact</label>
                                            <input class="form-control" type="text" required="" id="guardian_contact" name="guardian_contact" placeholder="Enter your guardian contact">
                                        </div>
                                        <div class="mb-3">
                                            <label for="address" class="form-label" style="color: #1a2942;">Address</label>
                                            <textarea class="form-control" id="address" name="address" rows="6" placeholder="Enter your address"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mb-3" >
                                <button class="btn fw-semibold" type="submit" name="emp_submit"  style="background-color: #1a2942; color: #ffffff;">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="pf_data" class="container mt-4">
        <!-- PF data will be displayed here -->
    </div>

    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>

</body>

</html>
