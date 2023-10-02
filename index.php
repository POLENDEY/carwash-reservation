<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head> 
  <meta charset="UTF-8"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <link rel="stylesheet" href="css/main.css"> 
  <title>CARWASH</title> 
 </head>
<body>
<header>
	<a href="logout.php" id="logout">Logout</a>
	<h1>Carwash Slot Availability and Reservations</h1>
</header>

	<br>
	<span>Hello, <?php echo $user_data['given_name']; ?></span>
	 <div class="reservation-form">
	   
   </div>
</body>
</html>