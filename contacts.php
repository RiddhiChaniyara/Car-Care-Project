<?php
session_start(); // Start the session

// Include database configuration
include 'config.php'; 

// Check if the user is logged in
if (!isset($_SESSION['Car Care'])) {
    // If the user is not logged in, show an alert and redirect to login page
    echo "<script>alert('Please log in to submit the form.'); window.location.href='login.php';</script>";
    exit;
}

$user_id = $_SESSION['Car Care']; // Use the ID stored in the session
$username = '';

// Query to select the user's name
$select = mysqli_query($conn, "SELECT name FROM `login` WHERE id = '$user_id'") or die('Query failed');
if ($row = mysqli_fetch_assoc($select)) {
    $username = $row['name']; // Store the user's name
} else {
    // If no user is found, display an error
    echo "<script>alert('User not found.'); window.location.href='login.php';</script>";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $username; // Use the logged-in user's name
    $mobile = $_POST['mobile']; // Mobile number from form
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Prepare the statement for inserting into the database
    $stmt = $conn->prepare("INSERT INTO contacts (name, mobile, subject, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $mobile, $subject, $message);

    if ($stmt->execute()) {
        // Define the carrier gateway for SMS
        $carrierGateway = 'vtext.com'; // Change this based on the user's carrier
        $to = $mobile . '@' . $carrierGateway; // Format: [number]@[carrier]
        $smsMessage = "Thank you for contacting Online Car Care, $name. We'll get back to you shortly.";

        // Send SMS via mail function
        if (mail($to, '', $smsMessage, 'From: no-reply@onlinecarcare.com')) {
            // Show success pop-up
            echo "<script>alert('Thank you for reaching us! Message sent to your mobile number successfully.');</script>";
        } else {
            echo "<script>alert('Error sending SMS.');</script>";
        }
    } else {
        echo "<script>alert('Error submitting form.');</script>";
    }

    $stmt->close();
}

// Close database connection
$conn->close();
?>
