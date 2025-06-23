<?php
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    // If not logged in, show an alert and redirect to the login page
    echo "<script>
        alert('Login is required to access this page!');
        window.location.href = 'Admin_login.php';
    </script>";
    exit();
}

// Fetch the admin profile data for the logged-in admin
include('config.php');
$admin_id = $_SESSION['admin_id'];

// Use prepared statements to prevent SQL injection and securely fetch admin details
$sql = "SELECT username, email FROM admin_login WHERE id = ?";  // No need to specify database here if included in config.php
$stmt = $conn->prepare($sql); // Prepare the statement
if ($stmt === false) {
    die('MySQL prepare error: ' . $conn->error);  // Handle the error if prepare fails
}

// Bind the parameter for the prepared statement (the admin's ID)
$stmt->bind_param('i', $admin_id);  // 'i' stands for integer

// Execute the prepared statement
$stmt->execute();

// Get the result of the query
$result = $stmt->get_result();

// Fetch the admin details
if ($result->num_rows > 0) {
    $admin = $result->fetch_assoc(); // Fetch the admin details as an associative array
} else {
    echo "Admin not found.";
    exit();
}

// Close the statement and the connection
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/Admin_Dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/boxicons/css/boxicons.min.css" rel="stylesheet"> <!-- Boxicons CDN -->
</head>
<body>

<!-- Sidebar Section -->
<div class="sidebar">
  <div class="logo-details">
    <i class='bx bxs-car'></i>
    <span class="logo_name">Car Care</span>
  </div>
  <ul class="nav-links">
    <li><a href="Admin_dashboard.php" class="active"><i class='bx bx-grid-alt'></i><span class="links_name">Dashboard</span></a></li>
    <li><a href="Admin_users.php"><i class='bx bx-user'></i><span class="links_name">Users</span></a></li>
    <li><a href="Admin_rent_booking.php"><i class='bx bx-car'></i><span class="links_name">Car Sell Bookings</span></a></li>
    <li><a href="#"><i class='bx bx-car'></i><span class="links_name">Car Buy Booking</span></a></li>
    <li><a href="#"><i class='bx bx-car'></i><span class="links_name">Car Rent Booking</span></a></li>
    <li><a href="#"><i class='bx bx-car'></i><span class="links_name">Car Wash Booking</span></a></li>
    <li class="log_out"><a href="admin_logout.php"><i class='bx bx-log-out'></i><span class="links_name">Log out</span></a></li>
  </ul>
</div>

<!-- Home Section -->
<section class="home-section">
  <nav>
    <div class="sidebar-button">
      <i class='bx bx-menu'></i><span class="dashboard">Dashboard</span>
    </div>
  <!-- Admin Profile Section -->
  <div class="profile-details">
        <span class="admin_name"><?= htmlspecialchars($admin['username']); ?></span>
        <i class='bx bx-chevron-down'></i>
        <ul class="dropdown-menu">
            <li><a href="admin_logout.php">Logout</a></li>
        </ul>
    </div>
  </nav>

  <div class="home-content">
    <div class="car-image">
        <img src="images/adminbg.jpg" alt="Admin" class="responsive-img">
    </div>
  </div>
</section>

<script>
    // Sidebar toggle function
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebar-button i");

    sidebarBtn.onclick = function () {
        sidebar.classList.toggle("active");
    };
</script>

<script>
    // Get the profile details container and the dropdown menu
    const profileDetails = document.querySelector('.profile-details');
    const dropdownMenu = document.querySelector('.dropdown-menu');

    // Add click event listener to toggle the dropdown visibility
    profileDetails.addEventListener('click', function(event) {
        event.stopPropagation(); // Prevent event bubbling to window
        dropdownMenu.classList.toggle('show');
    });

    // Close dropdown if clicked outside
    window.addEventListener('click', function(event) {
        if (!profileDetails.contains(event.target)) {
            dropdownMenu.classList.remove('show');
        }
    });
</script>

</body>
</html>
