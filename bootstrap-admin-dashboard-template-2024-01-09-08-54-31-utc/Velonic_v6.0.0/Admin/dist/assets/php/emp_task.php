<?php
include('db_connection.php'); // Ensure this file sets up the $con connection
include('session.php'); // Include the session management file

check_login();

// Check if the form is submitted
if (isset($_POST['add_task'])) {
    // Retrieve form data
    $pf_no = $_POST['pf_no'];
    $date = $_POST['date'];
    // $task_id = $_POST['task_id'];
    $task_name = $_POST['task_name'];
    $task_status = $_POST['task_status'];
    $comments = $_POST['comments'];

    // Prepare SQL query to insert data into the task table
    $sql = "INSERT INTO task (pf_no, date, task_name, task_status, comments) VALUES (?, ?, ?, ?, ?)";

    if ($stmt = $con->prepare($sql)) {
        // Bind parameters
        $stmt->bind_param("sssss", $pf_no, $date, $task_name, $task_status, $comments);

        // Execute statement
        if ($stmt->execute()) {
            // Success message
            echo "<div style='color: white; background: linear-gradient(90deg, rgba(214,213,223,1) 0%, rgba(219,210,210,1) 1%, rgba(138,180,204,1) 100%); border: 1px solid #3bc0c3; padding: 10px; border-radius: 5px; text-align: center; margin: 20px auto; width: 50%; max-width: 400px;'>
                    Task added successfully!
                    <br><br>
                    <a href='../../auth-emp-assign-task.php' style='display: inline-block; background-color: #1a2942; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Back to Task Management</a>
                </div>";
        } else {
            // Error message
            echo "<div style='color: white; background-color:linear-gradient(90deg, rgba(214,213,223,1) 0%, rgba(219,210,210,1) 1%, rgba(138,180,204,1) 100%); border: 1px solid #ff4d4d; padding: 10px; border-radius: 5px; text-align: center; margin: 20px auto; width: 50%; max-width: 400px;'>
                    Error: " . $stmt->error . "
                    <br><br>
                    <a href='../../auth-emp-assign-task.php' style='display: inline-block; background-color: #1a2942; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Back to Task Management</a>
                </div>";
        }

        // Close statement
        $stmt->close();
    } else {
        // Error message
        echo "<div style='color: white; background-color: linear-gradient(90deg, rgba(214,213,223,1) 0%, rgba(219,210,210,1) 1%, rgba(138,180,204,1) 100%); border: 1px solid #ff4d4d; padding: 10px; border-radius: 5px; text-align: center; margin: 20px auto; width: 50%; max-width: 400px;'>
                Error: " . $con->error . "
                <br><br>
                <a href='task_management.php' style='display: inline-block; background-color: #1a2942; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Back to Task Management</a>
            </div>";
    }

    // Close connection
    $con->close();
}
?>
