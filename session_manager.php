<?php
session_start();

// Include database configuration
include 'config.php'; 

// Check if the user is logged in
$isLoggedIn = isset($_SESSION['car care']);
$username = '';

if ($isLoggedIn) {
    $user_id = $_SESSION['car care']; // Retrieve user ID from session

    // Query to get the user's name from the database
    $select = mysqli_query($conn, "SELECT name FROM `login` WHERE id = '$user_id'") or die('Query failed');
    if ($row = mysqli_fetch_assoc($select)) {
        $username = $row['name']; // Store the user's name
    }
} else {
    // If the user is not logged in, redirect to the login page
    header('Location: login.php');
    exit();
}
?>
