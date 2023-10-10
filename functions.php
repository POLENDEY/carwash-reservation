<?php
include("connection.php");

function check_login($con)
{

	if(isset($_SESSION['user_id']))
	{

		$id = $_SESSION['user_id'];
		$query = "select * from users where user_id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: login.php");
	die;

}

function random_num($length)
{

	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(4,$length);

	for ($i=0; $i < $len; $i++) { 
		# code...

		$text .= rand(0,9);
	}

	return $text;
}

function addCustomer($con, $customerName, $carBrand, $contactNum, $arrivalDate)
{
    // Escape user input to prevent SQL injection
    $customerName = mysqli_real_escape_string($con, $customerName);
    $carBrand = mysqli_real_escape_string($con, $carBrand);
    $contactNum = mysqli_real_escape_string($con, $contactNum);

    $query = "INSERT INTO reservation (customer_name, brand, contact_number, arrival_date) 
              VALUES ('$customerName', '$carBrand', '$contactNum', '$arrivalDate')";

    $result = mysqli_query($con, $query);

    if ($result) {
        return true; // Success
    } else {
        return false; // Error
    }
}


?>