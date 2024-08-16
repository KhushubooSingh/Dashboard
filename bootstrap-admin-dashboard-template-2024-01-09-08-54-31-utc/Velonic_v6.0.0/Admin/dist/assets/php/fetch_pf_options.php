<?php
// Include database connection
include 'db_connection.php';

// Fetch distinct PF No. and employee name from emp table
$query = "SELECT DISTINCT pf_no, name FROM emp ORDER BY pf_no ASC";
$result = $con->query($query);

// Check for query errors
if ($result) {
    // Output options
    while ($row = $result->fetch_assoc()) {
        // Display PF No. and Employee Name
        echo "<option value='{$row['pf_no']}'>{$row['pf_no']} - {$row['name']}</option>";
    }
} else {
    echo "<option value='' disabled>Error fetching PF No. and Name.</option>";
}

// Close connection
$con->close();
?>
