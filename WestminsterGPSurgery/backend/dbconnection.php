// W1863171 - Chloe Carson
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database configuration
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name_vaccines = "vaccines";
$db_name_gpsurgery = "GPSurgery";

// Create connection to vaccines database
$conn_vaccines = mysqli_connect($db_host, $db_user, $db_password, $db_name_vaccines);

// Check connection
if (!$conn_vaccines) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create connection to GP Surgery database
$conn_gpsurgery = mysqli_connect($db_host, $db_user, $db_password, $db_name_gpsurgery);

// Check connection
if (!$conn_gpsurgery) {
    die("Connection failed: " . mysqli_connect_error());
}
?>