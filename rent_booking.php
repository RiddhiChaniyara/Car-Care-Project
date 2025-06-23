<?php
// Database connection (use your credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car care"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $mobile_number = $_POST['mobile_number'];
    $pickup_location = $_POST['pickup_location'];
    $drop_location = $_POST['drop_location'];
    $pickup_date = $_POST['pickup_date'];
    $pickup_time = $_POST['pickup_time'];
    $adults = $_POST['adults'];
    $children = $_POST['children'];
    $special_request = $_POST['special_request'];
    $booking_id = $_POST['booking_id']; // Assuming this is being passed from the form

    // Handle "Book Now" button action
    if (isset($_POST['book_now'])) {
        $sql = "INSERT INTO rent_booking (first_name, last_name, email, mobile_number, pickup_location, drop_location, pickup_date, pickup_time, adults, children, special_request) 
                VALUES ('$first_name', '$last_name', '$email', '$mobile_number', '$pickup_location', '$drop_location', '$pickup_date', '$pickup_time', '$adults', '$children', '$special_request')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Booking is successfully'); window.location.href = 'index.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Handle "Update Booking" button action
    if (isset($_POST['update_booking'])) {
        $sql = "UPDATE rent_booking SET 
                first_name='$first_name', 
                last_name='$last_name', 
                email='$email', 
                mobile_number='$mobile_number', 
                pickup_location='$pickup_location', 
                drop_location='$drop_location', 
                pickup_date='$pickup_date', 
                pickup_time='$pickup_time', 
                adults='$adults', 
                children='$children', 
                special_request='$special_request' 
                WHERE booking_id='$booking_id'";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Details updated successfully'); window.location.href = 'index.html';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Handle "Cancel Booking" button action
    if (isset($_POST['cancel_booking'])) {
        $sql = "DELETE FROM rent_booking WHERE booking_id='$booking_id'";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Booking canceled successfully'); window.location.href = 'index.html';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Close the connection
    $conn->close();
}
?>
