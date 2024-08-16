<?php
include('db_connection.php');

if (isset($_POST['pf_no'])) {
    $pf_no = $_POST['pf_no'];

    $sql = "SELECT task_id, task_name FROM task WHERE pf_no = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $pf_no);
    $stmt->execute();
    $result = $stmt->get_result();

    $taskDetails = array();
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $taskDetails[] = $row;
        }
    }
    
    echo json_encode($taskDetails);
    $stmt->close();
}
$con->close();
?>
