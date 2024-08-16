<?php
include('db_connection.php');

// Fetch PF No. from task table
$sql = "SELECT DISTINCT pf_no FROM task";
$result = $con->query($sql);

$options = "";
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $options .= "<option value='{$row['pf_no']}'>{$row['pf_no']}</option>";
    }
} else {
    $options = "<option value='' disabled>No PF No. found</option>";
}

echo $options;
$con->close();
?>
