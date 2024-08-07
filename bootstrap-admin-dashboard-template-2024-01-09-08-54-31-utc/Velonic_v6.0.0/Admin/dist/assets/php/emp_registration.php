<?php
include('db_connection.php');

$message = ''; // Initialize message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['emp_submit'])) {
        // Handle form data
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
        $other_info = mysqli_real_escape_string($con, $_POST['other']);
        $branch_name = mysqli_real_escape_string($con, $_POST['branch_name']);
        $ifsc_code = mysqli_real_escape_string($con, $_POST['ifsc_code']);
        $address = mysqli_real_escape_string($con, $_POST['address']);
        $guardian_contact = mysqli_real_escape_string($con, $_POST['guardian_contact']);
        $status = mysqli_real_escape_string($con, $_POST['status']); // New field
        $gender = mysqli_real_escape_string($con, $_POST['gender']); // New field
        
        // Handle file upload
        $photo_url = '';
        $uploadDir = 'D:/Xampp/htdocs/New Dashboard/uploads/'; // Full path to save uploaded files
        
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
            $fileSize = $_FILES['upload_photo']['size'];
            $fileType = $_FILES['upload_photo']['type'];
            $fileNameCmps = explode('.', $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            
            // Define allowed file extensions
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            
            if (in_array($fileExtension, $allowedExtensions)) {
                // Create a unique file name
                $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                $destPath = $uploadDir . $newFileName;
                
                if (move_uploaded_file($fileTmpPath, $destPath)) {
                    $photo_url = 'uploads/' . $newFileName; // URL relative to the script
                } else {
                    $message = 'Failed to move uploaded file.';
                }
            } else {
                $message = 'Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.';
            }
        } else {
            $message = 'No file uploaded or there was an upload error.';
        }
        
        // Prepare SQL statement
        $sql = "INSERT INTO emp (pf_no, name, email, pan_no, designation, bank_name, account_no, mobile_no, guardian_name,
                id_no, joining_date, alt_email, aadhar_no, other_info, branch_name, ifsc_code, address, guardian_contact, photo_url, status, gender) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        // Create prepared statement
        $stmt = $con->prepare($sql);
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($con->error));
        }
        
        // Bind parameters
        $stmt->bind_param("sssssssssssssssssssss", $pf_no, $name, $email, $pan_no, $designation, $bank_name, $account_no, $mobile_no, $guardian_name,
                         $id_no, $joining_date, $alternate_email, $aadhar_no, $other_info, $branch_name, $ifsc_code, $address, $guardian_contact, $photo_url, $status, $gender);
        
        // Execute statement
        if ($stmt->execute()) {
            $message = 'Record inserted successfully';
        } else {
            $message = 'Error: ' . htmlspecialchars($stmt->error);
        }
        
        // Close statement and connection
        $stmt->close();
        $con->close();
    }
}
?>
