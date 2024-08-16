<?php
// Include your database connection file
include('db_connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['emp_update'])) {
    // Retrieve form data
    $pf_no = $_POST['pf_no'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pan_no = $_POST['pan_no'];
    $status = $_POST['status'];
    $designation = $_POST['designation'];
    $bank_name = $_POST['bank_name'];
    $account_no = $_POST['account_no'];
    $guardian_name = $_POST['guardian_name'];
    $mobile_no = $_POST['mobile_no'];
    $id_no = $_POST['id_no'];
    $gender = $_POST['gender'];
    $alt_email = $_POST['alt_email'];
    $aadhar_no = $_POST['aadhar_no'];
    $joining_date = $_POST['joining_date'];
    $other = $_POST['other'];
    $branch_name = $_POST['branch_name'];
    $ifsc_code = $_POST['ifsc_code'];
    $guardian_contact = $_POST['guardian_contact'];
    $address = $_POST['address'];

    // Handle file upload
    $upload_photo = '';
    if (isset($_FILES['upload_photo']) && $_FILES['upload_photo']['error'] == UPLOAD_ERR_OK) {
        $target_dir = "D:/Xampp/htdocs/New_Dashboard/uploads/";
        $target_file = $target_dir . basename($_FILES["upload_photo"]["name"]);
        if (move_uploaded_file($_FILES["upload_photo"]["tmp_name"], $target_file)) {
            $upload_photo = $target_file; // Save the file path
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit;
        }
    }

    // Prepare the SQL update statement
    $sql = "UPDATE emp SET name=?, email=?, pan_no=?, status=?, designation=?, bank_name=?, account_no=?, guardian_name=?, 
    mobile_no=?, id_no=?, gender=?, alt_email=?, aadhar_no=?, joining_date=?, other=?, branch_name=?, ifsc_code=?, 
    guardian_contact=?, address=?, photo_url=? WHERE pf_no=?";
    $stmt = $con->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sssssssssssssssssssss", $name, $email, $pan_no, $status, $designation, $bank_name, $account_no, 
        $guardian_name, $mobile_no, $id_no, $gender, $alt_email, $aadhar_no, $joining_date, $other, $branch_name, 
        $ifsc_code, $guardian_contact, $address, $upload_photo, $pf_no);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "<div style='color: white; background: linear-gradient(90deg, rgba(214,213,223,1) 0%, rgba(219,210,210,1) 1%, rgba(138,180,204,1) 100%); border: 1px solid #3bc0c3; padding: 10px; border-radius: 5px; text-align: center; margin: 20px auto; width: 50%; max-width: 400px;'>
            Employee data updated successfully.
            <br><br>
                    <a href='../../emp-management-access.php' style='display: inline-block; background-color: #1a2942; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Back</a>
            </div>";
            
        } else {
            echo "<div style='color: white; background: linear-gradient(90deg, rgba(214,213,223,1) 0%, rgba(219,210,210,1) 1%, rgba(138,180,204,1) 100%); border: 1px solid #3bc0c3; padding: 10px; border-radius: 5px; text-align: center; margin: 20px auto; width: 50%; max-width: 400px;'>
            No changes made or employee not found.
            <br><br>
                    <a href='../../emp-management-access.php' style='display: inline-block; background-color: #1a2942; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Back</a>
            </div>";
        }

        $stmt->close();
    } else {
        echo "Error preparing the SQL statement.";
    }

    // Close the database connection
    $con->close();
} else {
    echo "Invalid request method.";
}
?>
