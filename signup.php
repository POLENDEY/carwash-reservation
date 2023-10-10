<?php
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Something was posted
    $surname = $_POST['surname'];
    $given_name = $_POST['given_name'];
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
        
        // Check if the username already exists
        $check_query = "SELECT user_id FROM users WHERE user_name = '$user_name'";
        $result = mysqli_query($con, $check_query);
        
        if (mysqli_num_rows($result) > 0) {
            echo "Username is already taken. Please choose a different one.";
        } else {
            // Generate a unique user ID (you can use your random_num function)
            $user_id = random_num(20);

            // Store the password in plain text
            $plain_password = $password;

            // Insert user data into the database
            $query = "INSERT INTO users (user_id, surname, given_name, user_name, password) VALUES ('$user_id', '$surname', '$given_name', '$user_name', '$plain_password')";

            if (mysqli_query($con, $query)) {
                // Registration successful, redirect to login page
                header("Location: login.php");
                die;
            } else {
                // Handle the case where the query fails
                echo "Registration failed. Please try again later.";
            }
        }
    } else {
        echo "Please enter some valid information!";
    }
}
?>




<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>SIGNUP</title>
</head>

<body>
    <header>
        <h1>Carwash Slot Availability and Reservations</h1>
    </header>

    <style type="text/css">
    a {
        text-decoration: none;
        color: #fff;
    }

    #text {

        height: 25px;
        border-radius: 5px;
        padding: 4px;
        border: solid thin #aaa;
        width: 100%;
    }

    #button {

        padding: 10px;
        width: 100px;
        color: white;
        background-color: lightblue;
        border: none;
    }

    #box {

        background-color: grey;
        margin: auto;
        width: 300px;
        padding: 20px;
    }
    </style>

    <div id="box">

        <form method="post">
            <div style="font-size: 20px;margin: 10px;color: white;">Signup</div>

            <input id="text" type="text" name="surname" placeholder="SURNAME"><br><br>
            <input id="text" type="text" name="given_name" placeholder="GIVEN NAME"><br><br>
            <input id="text" type="text" name="user_name" placeholder=" USERNAME"><br><br>
            <input id="text" type="password" name="password" placeholder="PASSWORD"><br><br>

            <input id="button" type="submit" value="Signup"><br><br>

            <a href="login.php">Click to Login</a><br><br>
        </form>
    </div>
</body>

</html>