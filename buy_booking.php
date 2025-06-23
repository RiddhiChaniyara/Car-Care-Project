<?php
// Include your config file for database connection
include 'config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form inputs
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile_number = mysqli_real_escape_string($conn, $_POST['mobile_number']);
    $car_model = mysqli_real_escape_string($conn, $_POST['car_model']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $customer_age = (int)$_POST['customer_age']; // Cast to int
    $marital_status = mysqli_real_escape_string($conn, $_POST['marital_status']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);

    // Insert data into the buy_booking table
    $sql = "INSERT INTO buy_booking (first_name, last_name, email, mobile_number, car_model, city, state, address, customer_age, marital_status, gender, date) 
            VALUES ('$first_name', '$last_name', '$email', '$mobile_number', '$car_model', '$city', '$state', '$address', $customer_age, '$marital_status', '$gender', '$date')";

    if (mysqli_query($conn, $sql)) {
        // If the insert is successful, display a success message
        echo "<script>alert('Successfully bought the car!');</script>";
    } else {
        // If there's an error, display an error message
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
}

// Close the database connection
mysqli_close($conn);
?>
