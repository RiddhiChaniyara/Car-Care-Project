<?php
// Include the database configuration file
include 'config.php';

// Check if form is submitted
if (isset($_POST['sell_now'])) {
    // Collect form data
    $first_name = $conn->real_escape_string($_POST['first_name']);
    $last_name = $conn->real_escape_string($_POST['last_name']);
    $email = $conn->real_escape_string($_POST['email']);
    $mobile_number = $conn->real_escape_string($_POST['mobile_number']);
    $car_model = $conn->real_escape_string($_POST['car_model']);
    $city = $conn->real_escape_string($_POST['city']);
    $state = $conn->real_escape_string($_POST['state']);
    $km_driven = (int)$_POST['km_driven'];
    $year = $conn->real_escape_string($_POST['year']);
    $car_type = $conn->real_escape_string($_POST['car_type']);
    $fuel_type = $conn->real_escape_string($_POST['fuel_type']);
    $transmission = $conn->real_escape_string($_POST['transmission']);
    $ownership = $conn->real_escape_string($_POST['ownership']);
    $car_price = (float)$_POST['car_price'];
    $special_request = $conn->real_escape_string($_POST['special_request']);

    // Insert data into the database
    $sql = "INSERT INTO sell_booking (first_name, last_name, email, mobile_number, car_model, city, state, km_driven, year, car_type, fuel_type, transmission, ownership, car_price, special_request) 
            VALUES ('$first_name', '$last_name', '$email', '$mobile_number', '$car_model', '$city', '$state', $km_driven, '$year', '$car_type', '$fuel_type', '$transmission', '$ownership', $car_price, '$special_request')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Sell is successfully done');
                window.location.href = 'sell_booking.html'; // Redirect back to the form page
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
