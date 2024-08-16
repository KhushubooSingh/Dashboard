<?php
include 'db_connection.php'; // Adjust the path if needed

// Query to fetch PF numbers
$query = "SELECT pf_no FROM emp";
$result = $con->query($query);

// Initialize options array
$options = [];

if ($result->num_rows > 0) {
    // Fetch all results
    $options = $result->fetch_all(MYSQLI_ASSOC);
}

// Set the content type to JSON
header('Content-Type: application/json');

// Output the data as JSON
echo json_encode($options);
?>
