<?php

include('db_connection.php'); // Ensure this file sets up the $con connection
include('session.php'); // Include the session management file

check_login();

$message = ''; // Initialize message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['emp_submit'])) {
        // Handle form data with sanitization
        $pf_no = mysqli_real_escape_string($con, $_POST['pf_no']);
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $pan_no = mysqli_real_escape_string($con, $_POST['pan_no']);
        $designation = mysqli_real_escape_string($con, $_POST['designation']);
        $bank_name = mysqli_real_escape_string($con, $_POST['bank_name']);
        $account_no = mysqli_real_escape_string($con, $_POST['account_no']);
        $mobile_no = mysqli_real_escape_string($con, $_POST['mobile_no']);
        $guardian_name = mysqli_real_escape_string($con, $_POST['guardian_name']);
        $id_no = mysqli_real_escape_string($con, $_POST['id_no']);
        $joining_date = mysqli_real_escape_string($con, $_POST['joining_date']);
        $alternate_email = mysqli_real_escape_string($con, $_POST['alt_email']);
        $aadhar_no = mysqli_real_escape_string($con, $_POST['aadhar_no']);
        $other = mysqli_real_escape_string($con, $_POST['other']);
        $branch_name = mysqli_real_escape_string($con, $_POST['branch_name']);
        $ifsc_code = mysqli_real_escape_string($con, $_POST['ifsc_code']);
        $address = mysqli_real_escape_string($con, $_POST['address']);
        $guardian_contact = mysqli_real_escape_string($con, $_POST['guardian_contact']);
        $status = mysqli_real_escape_string($con, $_POST['status']);
        $gender = mysqli_real_escape_string($con, $_POST['gender']);
        $password = $_POST['password'];
        
        // Validate password
        if ($password !== $_POST['confirm_password']) {
            $message = 'Passwords do not match.';
            echo "<script>alert('$message'); window.location.href='../../auth-emp-registration.php';</script>";
            exit;
        }
        
        // Handle file upload
        $photo_url = '';
        $uploadDir = 'D:/Xampp/htdocs/New_Dashboard/uploads/'; // Relative path to save uploaded files
        
        // Check if the upload directory exists
        if (!is_dir($uploadDir)) {
            // Create the directory if it does not exist
            if (!mkdir($uploadDir, 0755, true)) {
                $message = 'Failed to create upload directory.';
                exit;
            }
        }
        
        if (isset($_FILES['upload_photo']) && $_FILES['upload_photo']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['upload_photo']['tmp_name'];
            $fileName = $_FILES['upload_photo']['name'];
            $fileNameCmps = explode('.', $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            
            // Define allowed file extensions
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'pdf'];
            
            if (in_array($fileExtension, $allowedExtensions)) {
                // Create a unique file name
                $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                $destPath = $uploadDir . $newFileName;
                
                if (move_uploaded_file($fileTmpPath, $destPath)) {
                    $photo_url = $uploadDir . $newFileName; // URL relative to the script
                } else {
                    $message = 'Failed to move uploaded file.';
                    exit;
                }
            } else {
                $message = 'Invalid file type. Only JPG, JPEG, PNG, GIF, and PDF are allowed.';
                exit;
            }
        } else {
            $message = 'No file uploaded or there was an upload error.';
            exit;
        }
        
        // Prepare SQL statement
        $sql = "INSERT INTO emp (pf_no, name, email, pan_no, designation, bank_name, account_no, mobile_no, guardian_name,
                id_no, joining_date, alt_email, aadhar_no, other, branch_name, ifsc_code, address, guardian_contact, 
                photo_url, status, gender, password) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        // Create prepared statement
        $stmt = $con->prepare($sql);
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($con->error));
        }
        
        // Bind parameters
        $stmt->bind_param("ssssssssssssssssssssss", $pf_no, $name, $email, $pan_no, $designation, $bank_name, $account_no, 
        $mobile_no, $guardian_name, $id_no, $joining_date, $alternate_email, $aadhar_no, $other, $branch_name, 
        $ifsc_code, $address, $guardian_contact, $photo_url, $status, $gender, $password);
        
        // Execute statement
        if ($stmt->execute()) {
            $message = 'Record inserted successfully';
            // For testing purposes, display message on the same page
            echo "<div style='color: white; background: linear-gradient(90deg, rgba(214,213,223,1) 0%, rgba(219,210,210,1) 1%, rgba(138,180,204,1) 100%); border: 1px solid #3bc0c3; padding: 10px; border-radius: 5px; text-align: center; margin: 20px auto; width: 50%; max-width: 400px;'>
                    Employee details added successfully!
                    <br><br>
                    <a href='../../emp-management-access.php' style='display: inline-block; background-color: #1a2942; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Back</a>
                </div>";
        } else {
            $message = 'Error: ' . htmlspecialchars($stmt->error);
            // For testing purposes, display message on the same page
            echo "<script>alert('$message'); window.location.href='../../index.php'</script>";
        }
        
        // Close statement and connection
        $stmt->close();
        $con->close();
    }
}
?>
