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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Information</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>
    <!-- Add Reservation Modal -->
    <div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="customerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="customerModalLabel">Customer Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Customer Name Input -->
                    <form method="post" action="add_reservation.php">
                        <div class="form-group">
                            <label for="customerName">Customer Name</label>
                            <input type="text" class="form-control" id="customerName" name="customerName"
                                placeholder="Enter customer name">
                        </div>
                        <!-- Picture Input -->
                        <!-- <div class="form-group">
                            <label for="picture">Picture</label>
                            <input type="file" class="form-control" id="picture" name="picture">
                        </div> -->
                        <!-- Car Brand Input -->
                        <div class="form-group">
                            <label for="carBrand">Car Brand</label>
                            <input type="text" class="form-control" id="carBrand" name="carBrand"
                                placeholder="Enter car brand">
                        </div>
                        <!-- Contact Number Input -->
                        <div class="form-group">
                            <label for="contactNum">Contact Number</label>
                            <input type="number" class="form-control" id="contactNum" name="contactNum"
                                placeholder="Enter contact information">
                        </div>
                        <!-- Arrival Time Input -->
                        <div class="form-group">
                            <label for="arrivalDate">Arrival Date</label>
                            <input type="datetime-local" class="form-control" id="arrivalDate" name="arrivalDate">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="save_customer">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <div class=" container mt-4">
        <h1 class="text-center">Customer Information</h1>
        <span>Hello, <?php echo $user_data['given_name']; ?></span>

        <!-- Use Bootstrap classes for alignment -->
        <div class="d-flex justify-content-between mb-3">
            <div>
                <button class="btn btn-primary"><a class="text-white text-decoration-none" href="logout.php"
                        id="logout">Logout</a></button>
            </div>
            <div>
                <!-- Add Reserved button on the right -->
                <button class="btn btn-success" type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#customerModal"><i class="bi bi-plus-circle"></i> Add Reserved</button>
            </div>
        </div>

        <table class="table table-primary table-striped table-bordered">
            <thead thead class="table-dark text-center">
                <tr>
                    <th>Customer Name</th>
                    <th>Picture</th>
                    <th>Car Brand</th>
                    <th>Contact Information</th>
                    <th>Arrival Time</th>
                </tr>
            </thead>
            <tbody>
                <!-- <tr class="text-center">
                    <td>John Doe</td>
                    <td><img src="images/dummy.jpg" alt="John Doe's Picture" class="img-fluid"
                            style="width: 100px; height: 100px;"></td>
                    <td>Ford</td>
                    <td>Email: john@example.com<br>Phone: (123) 456-7890</td>
                    <td>2023-09-23 10:00 AM</td>
                </tr>
                <tr class="text-center">
                    <td>John Doe</td>
                    <td><img src="images/dummy.jpg" alt="John Doe's Picture" class="img-fluid"
                            style="width: 100px; height: 100px;"></td>
                    <td>Ford</td>
                    <td>Email: john@example.com<br>Phone: (123) 456-7890</td>
                    <td>2023-09-23 10:00 AM</td>
                </tr>
                <tr class="text-center">
                    <td>John Doe</td>
                    <td><img src="images/dummy.jpg" alt="John Doe's Picture" class="img-fluid"
                            style="width: 100px; height: 100px;"></td>
                    <td>Ford</td>
                    <td>Email: john@example.com<br>Phone: (123) 456-7890</td>
                    <td>2023-09-23 10:00 AM</td>
                </tr>
                <tr class="text-center">
                    <td>John Doe</td>
                    <td><img src="images/dummy.jpg" alt="John Doe's Picture" class="img-fluid"
                            style="width: 100px; height: 100px;"></td>
                    <td>Ford</td>
                    <td>Email: john@example.com<br>Phone: (123) 456-7890</td>
                    <td>2023-09-23 10:00 AM</td>
                </tr> -->

                <?php
                $query = "SELECT * FROM reservation";
                $result = mysqli_query($con, $query);
                
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr class="text-center">';
                        echo '<td>' . $row['customer_name'] . '</td>';
                        echo '<td><img src="images/dummy.jpg" alt="' . $row['customer_name'] . '\'s Picture" class="img-fluid" style="width: 100px; height: 100px;"></td>';
                        echo '<td>' . $row['brand'] . '</td>';
                        echo '<td>Phone: ' . $row['contact_number'] . '</td>';
                        echo '<td>' . $row['arrival_date'] . '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo "Error: " . mysqli_error($con);
                }
                ?>
                <!-- Add more rows for other customers -->
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>