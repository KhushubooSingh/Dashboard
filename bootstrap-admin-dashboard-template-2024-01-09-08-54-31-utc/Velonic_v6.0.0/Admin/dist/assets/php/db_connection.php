<?php

// $serverName = "localhost";
// $userName = "root";
// $password = "";
// $dbName = "vlab_iitk_db";

$servername = "sg2nlmysql33plsk.secureserver.net:3306";
$username = "vlcertiverify";
$password = "5Ii5pw3$1";
$dbname = "ph15958919426_vlabiitkcerti";


$con = new mySqli($serverName, $userName, $password, $dbName);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

?>