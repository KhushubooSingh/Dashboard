<?php
include('assets/php/session.php');
include('assets/php/db_connection.php');
$username = isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Guest';

// Fetch certificates data
$sql = "SELECT
    sr_no, 
    certificate_title,
    registration_no,
    name,
    course,
    email,
    DATE_FORMAT(STR_TO_DATE(course_duration_from, '%d-%m-%Y'), '%d-%m-%Y') AS course_duration_from,
    DATE_FORMAT(STR_TO_DATE(course_duration_to, '%d-%m-%Y'), '%d-%m-%Y') AS course_duration_to,
    contact_no,
    college_name
FROM certificate
ORDER BY sr_no DESC";
$result = mysqli_query($con, $sql);
$certificates = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/footer.css">


<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="auth-login.php">Admin Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="auth-login-task.php">Task Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="auth-emp-task-access.php">Employee Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="auth-verification.php">Verification</a>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="#">
                            <div class="user-info-container d-flex align-items-center justify-content-center">
                                <div class="user-info-circle">
                                    <span class="user-info-text">
                                        <strong><?php echo $username; ?></strong>
                                    </span>
                                </div>
                                <!-- <i class="ri-arrow-down-s-line align-middle"></i> -->
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="centered-image">
        <img src="assets/images/vlab-iitk.png" class="logo-img" alt="VLabs IITK">
    </div>

    <div class="scrolling-container">
        <div class="scrolling-text">
            Virtual Labs enable the students to learn at their own pace and enthuse them to conduct experiments. Virtual Labs also provide a complete learning management system where the students can avail various tools for learning, including additional web resources, video lectures, animated demonstration, and self-evaluation.
        </div>
    </div>

    </div>
    <h5 class="header-title mb-0 text-center">Complete Intern Data</h5>
    </div>

    <div class="table-container">
        <div class="table-responsive">
            <table class="table-nowrap table-hover mb-0">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Certificate Title</th>
                        <th>Registration No.</th>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Email</th>
                        <th>Course Duration From</th>
                        <th>Course Duration To</th>
                        <th>Contact</th>
                        <th>College Name</th>
                    </tr>
                </thead>
                </thead>
                <tbody>
                    <?php foreach ($certificates as $cert): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($cert['sr_no']); ?></td>
                            <td><?php echo htmlspecialchars($cert['certificate_title']); ?></td>
                            <td><?php echo htmlspecialchars($cert['registration_no']); ?></td>
                            <td><?php echo htmlspecialchars($cert['name']); ?></td>
                            <td><?php echo htmlspecialchars($cert['course']); ?></td>
                            <td><?php echo htmlspecialchars($cert['email']); ?></td>
                            <td><?php echo htmlspecialchars($cert['course_duration_from']); ?></td>
                            <td><?php echo htmlspecialchars($cert['course_duration_to']); ?></td>
                            <td><?php echo htmlspecialchars($cert['contact_no']); ?></td>
                            <td><?php echo htmlspecialchars($cert['college_name']); ?></td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>

    <div class="pt-5">
        <footer class="pt-5 bg-dark text-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="footer-links">
                            <h5 class="link-heading">Quick Links</h5>
                            <div>
                                <a href="#" class="links-address" target="_blank">Lab Feedback Form</a>
                                <br>
                                <a href="https://www.vlab.co.in/faq" class="links-address" target="_blank">FAQ</a>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="footer-links">
                            <h5 class="link-heading">About VLAB</h5>
                            <div class="links-address">
                                <a href="https://www.vlab.co.in/" class="links-address" target="_blank">Home</a>
                                <br>
                                <a href="https://www.vlab.co.in/participating-institute-iit-kanpur" class="links-address" target="_blank">About us</a>
                                <br>
                                <a href="https://www.vlab.co.in/participating-institute-iit-kanpur" class="links-address" target="_blank">Contact Us</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="footer-contact">
                            <h5 class="link-heading">Get In Touch With Us</h5>
                            <div class="links-address">
                                <p>Email: <a href="mailto:support@vlab.co.in">support@vlab.co.in</a></p>
                                <p>Phone: 011-26582050</p>
                                <p>Wireless Research Lab, Room No - 206/IIA, Bharti School of Telecom, Indian Institute of Technology Delhi, Hauz Khas, New Delhi-110016</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>