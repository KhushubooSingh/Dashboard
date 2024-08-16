<?php

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "vlab_iitk_db";

$con = new mySqli($serverName, $userName, $password, $dbName);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

?>