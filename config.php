<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "st_info_update";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
