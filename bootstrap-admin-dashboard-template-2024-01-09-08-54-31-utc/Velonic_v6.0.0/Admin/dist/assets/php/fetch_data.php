<?php
include 'db_connection.php'; // Adjust the path if needed

// Check if PF No. is provided
if (isset($_GET['pf_no'])) {
    $pf_no = $con->real_escape_string($_GET['pf_no']);

    // Query to fetch data based on PF number
    $query = "SELECT * FROM emp WHERE pf_no = '$pf_no'";
    $result = $con->query($query);

    if ($result->num_rows > 0) {
        // Fetch the data
        $data = $result->fetch_assoc();
    } else {
        $data = ['error' => 'No data found for the selected PF number.'];
    }
} else {
    $data = ['error' => 'PF number not provided.'];
}

// Set the content type to JSON
header('Content-Type: application/json');

// Output the data as JSON
echo json_encode($data);
?>
