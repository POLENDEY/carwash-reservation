<?php 

session_start();


	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html lang="en"> 
 <head> 
  <meta charset="UTF-8"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <link rel="stylesheet" href="ccs/main.css"> 
  <title>ADMIN</title> 
 </head> 
 <body>
   <a href="portal.php" id="logout">Logout</a>
   <h1>ADMIN</h1>
 </body>
 </html>