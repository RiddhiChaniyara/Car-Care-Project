<?php
// Include the database configuration
include('config.php');

// Start session
session_start();

// Check if the form was submitted and identify the button clicked
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get all the form inputs
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $mobile_number = $_POST['mobile_number'];
    $pickup_location = $_POST['pickup_location'];
    $drop_location = $_POST['drop_location'];
    $pickup_date = $_POST['pickup_date'];
    $pickup_time = $_POST['pickup_time'];
    $service_type = $_POST['service_type'];
    $nearest_service_station = $_POST['nearest_service_station'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $pincode = $_POST['pincode'];
    $special_request = $_POST['special_request'];
    $booking_id = $_POST['booking_id']; // Hidden field to store booking ID

    // Check which button was clicked
    if (isset($_POST['book_now'])) {
        // Book Now: Insert into database
        $query = "INSERT INTO wash_booking (first_name, last_name, email, mobile_number, pickup_location, drop_location, 
                    pickup_date, pickup_time, service_type, nearest_service_station, city, state, pincode, special_request) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssssssssssss", $first_name, $last_name, $email, $mobile_number, $pickup_location, $drop_location, 
                            $pickup_date, $pickup_time, $service_type, $nearest_service_station, $city, $state, $pincode, $special_request);
        
        if ($stmt->execute()) {
            echo "<script>alert('Booking successfully made!'); window.location.href = 'wash_booking.php';</script>";
        } else {
            echo "<script>alert('Error while booking!'); window.location.href = 'wash_booking.php';</script>";
        }
        $stmt->close();

    } elseif (isset($_POST['update_booking'])) {
        // Update Booking: Update booking in database
        $query = "UPDATE wash_booking SET first_name = ?, last_name = ?, email = ?, mobile_number = ?, pickup_location = ?, drop_location = ?, 
                    pickup_date = ?, pickup_time = ?, service_type = ?, nearest_service_station = ?, city = ?, state = ?, pincode = ?, special_request = ?
                  WHERE booking_id = ?";

        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssssssssssssi", $first_name, $last_name, $email, $mobile_number, $pickup_location, $drop_location, 
                            $pickup_date, $pickup_time, $service_type, $nearest_service_station, $city, $state, $pincode, $special_request, $booking_id);
        
        if ($stmt->execute()) {
            echo "<script>alert('Booking updated successfully!'); window.location.href = 'wash_booking.php';</script>";
        } else {
            echo "<script>alert('Error while updating booking!'); window.location.href = 'wash_booking.php';</script>";
        }
        $stmt->close();

    } elseif (isset($_POST['cancel_booking'])) {
        // Cancel Booking: Delete booking from database
        $query = "DELETE FROM wash_booking WHERE booking_id = ?";

        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $booking_id);

        if ($stmt->execute()) {
            echo "<script>alert('Booking canceled successfully!'); window.location.href = 'wash_booking.php';</script>";
        } else {
            echo "<script>alert('Error while canceling booking!'); window.location.href = 'wash_booking.php';</script>";
        }
        $stmt->close();
    }
}

// Close the database connection
$conn->close();
?>
