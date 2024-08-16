<?php
// Include database connection
include 'db_connection.php';

// Check if form is submitted
if (isset($_POST['login'])) {
    $pf_no = $_POST['pf_no'];
    $password = $_POST['password'];

    // Prepare and execute SQL to check credentials
    $query = "SELECT * FROM emp WHERE pf_no = ? AND password = ?";
    if ($stmt = $con->prepare($query)) {
        $stmt->bind_param("ss", $pf_no, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if user exists
        if ($result->num_rows > 0) {
            // Fetch tasks for the given PF No.
            $taskQuery = "SELECT * FROM task WHERE pf_no = ?";
            if ($taskStmt = $con->prepare($taskQuery)) {
                $taskStmt->bind_param("s", $pf_no);
                $taskStmt->execute();
                $tasks = $taskStmt->get_result();

                // Display tasks
                echo "<div style='text-align: center; padding; padding: 20px; margin: 40px;background: linear-gradient(90deg, rgba(214,213,223,1) 0%, rgba(219,210,210,1) 1%, rgba(138,180,204,1) 100%);'>";
                echo "<h4 class='fs-20' style='font-size: 20px; margin-bottom: 20px;'>Tasks for PF No. $pf_no</h4>";
                echo "<table style='margin: 0 auto; width: 80%; border-collapse: collapse;'>";
                echo "<thead style='background-color: #1a2942; color: #ffffff;'><tr><th style='padding: 10px; border: 1px solid #ddd;'>Task ID</th><th style='padding: 10px; border: 1px solid #ddd;'>Task Name</th><th style='padding: 10px; border: 1px solid #ddd;'>Status</th><th style='padding: 10px; border: 1px solid #ddd;'>Comments</th></tr></thead>";
                echo "<tbody>";

                while ($task = $tasks->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td style='padding: 10px; border: 1px solid #ddd;'>{$task['task_id']}</td>";
                    echo "<td style='padding: 10px; border: 1px solid #ddd;'>{$task['task_name']}</td>";
                    echo "<td style='padding: 10px; border: 1px solid #ddd;'>{$task['task_status']}</td>";
                    echo "<td style='padding: 10px; border: 1px solid #ddd;'>{$task['comments']}</td>";
                    echo "</tr>";
                }

                echo "</tbody></table>";
                echo "<a href='../../auth-emp-task.php' style='display: inline-block; background-color: #1a2942; color: #ffffff; padding: 10px 20px; text-decoration: none; border-radius: 5px; margin-top: 20px;'>Back to Task Management</a>";
                echo "</div>";
            } else {
                echo "<div style='text-align: center; color: red;'>Error fetching tasks: " . $con->error . "</div>";
            }
        } else {
            echo "<div style='text-align: center; color: red;'>Invalid PF No. or Password.</div>";
        }

        // Close statement
        $stmt->close();
    } else {
        echo "<div style='text-align: center; color: red;'>Error: " . $con->error . "</div>";
    }

    // Close connection
    $con->close();
}
?>
