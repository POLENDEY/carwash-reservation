<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["save_customer"])) {
    $customerName = $_POST["customerName"];
    $carBrand = $_POST["carBrand"];
    $contactNum = $_POST["contactNum"];

    $arrivalDate = date("Y-m-d H:i:s", strtotime($_POST["arrivalDate"])); // Assuming your database field is of datetime type

    if (addCustomer($con, $customerName, $carBrand, $contactNum, $arrivalDate)) {
        // Data inserted successfully
        header("Location: user_page.php"); // Redirect to a success page
    } else {
        // Error occurred while inserting data
        echo "Error: Failed to save customer data.";
    }
}
?>