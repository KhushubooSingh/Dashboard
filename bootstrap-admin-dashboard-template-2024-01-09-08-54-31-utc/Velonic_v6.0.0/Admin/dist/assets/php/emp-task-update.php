<?php
include('db_connection.php');
session_start(); // Ensure session is started

if (isset($_POST['update_task'])) {
    // Get form data
    $pf_no = $_POST['pf_no'];
    // $task_id = $_POST['task_id'];
    $task_name = $_POST['task_name'];
    $task_status = $_POST['task_status'];
    $date = $_POST['date'];
    $comments = $_POST['comments'];
    $user_pf_no = $_SESSION['pf_no']; // Fetch PF No. from session
    $timestamp = date('Y-m-d H:i:s'); // Get current timestamp

    // Validate and sanitize inputs if necessary
    $pf_no = trim($pf_no);
    // $task_id = trim($task_id);
    $task_name = trim($task_name);
    $task_status = trim($task_status);
    $date = trim($date);
    $comments = trim($comments);

    // Prepare and execute SQL statement
    $sql = "INSERT INTO task (pf_no, task_name, task_status, date, comments,  user_pf_no, user_timestamp) VALUES ( ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sssssss", $pf_no, $task_name, $task_status, $date, $comments, $user_pf_no, $timestamp);
        
        if ($stmt->execute()) {
            // Success message
            echo "<div style='color: white; background: linear-gradient(90deg, rgba(214,213,223,1) 0%, rgba(219,210,210,1) 1%, rgba(138,180,204,1) 100%); border: 1px solid #3bc0c3; padding: 10px; border-radius: 5px; text-align: center; margin: 20px auto; width: 50%; max-width: 400px;'>
            Task status updated successfully!
        </div>";
        } else {
            // Error handling
            echo 
            "<div style='color: white; background: linear-gradient(90deg, rgba(214,213,223,1) 0%, rgba(219,210,210,1) 1%, rgba(138,180,204,1) 100%); border: 1px solid #3bc0c3; padding: 10px; border-radius: 5px; text-align: center; margin: 20px auto; width: 50%; max-width: 400px;'>
            Failed to update the task. Please try again later.
        </div>";
        }

        $stmt->close();
    } else {
        // Error preparing statement
        echo 
        "<div style='color: white; background: linear-gradient(90deg, rgba(214,213,223,1) 0%, rgba(219,210,210,1) 1%, rgba(138,180,204,1) 100%); border: 1px solid #3bc0c3; padding: 10px; border-radius: 5px; text-align: center; margin: 20px auto; width: 50%; max-width: 400px;'>
            Failed to prepare the SQL statement. Please try again later.
        </div>";
    }

    $con->close();
} else {
    // Handle the case where the form wasn't submitted correctly
    echo "<h1>Invalid request.</h1>";
}
?>
