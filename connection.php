<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "carwash_db";

$con = mysqli_connect($host, $username, $password, $database);

if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}
?>