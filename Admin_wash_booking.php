<?php
// Include the database connection
include('config.php');
session_start();

// Ensure the user is an admin, otherwise redirect
if (!isset($_SESSION['admin_id'])) {
    header('Location: Admin_login.php');
    exit();
}

// Fetch the admin profile data for the logged-in admin
$admin_id = $_SESSION['admin_id'];
$sql = "SELECT username, email FROM `admin_login` WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $admin_id);
$stmt->execute();
$result = $stmt->get_result();
$admin = $result->fetch_assoc(); // Fetch admin details

// Query to get the wash booking data
$sql = "SELECT booking_id, first_name, last_name, email, mobile_number, pickup_location, drop_location, pickup_date, pickup_time, service_type, nearest_service_station, city, state, pincode, special_request FROM wash_booking";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

if ($result) {
    if ($result->num_rows > 0) {
        $bookings = [];
        while ($row = $result->fetch_assoc()) {
            $bookings[] = $row;
        }
    } else {
        $bookings = [];
    }
} else {
    echo "Error: " . $conn->error; // To debug any SQL error
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wash Bookings</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="css/Admin_wash_booking.css">
</head>
<body>
    
<!-- Sidebar Section -->
<div class="sidebar">
  <div class="logo-details">
    <i class='bx bxs-car'></i>
    <span class="logo_name">Car Care</span>
  </div>
  <ul class="nav-links">
    <li><a href="#" class="active"><i class='bx bx-grid-alt'></i><span class="links_name">Dashboard</span></a></li>
    <li><a href="Admin_users.php"><i class='bx bx-user'></i><span class="links_name">Users</span></a></li>
    <li><a href="Admin_wash_booking.php"><i class='bx bx-car'></i><span class="links_name">Wash Bookings</span></a></li>
    <li><a href="#"><i class='bx bx-wrench'></i><span class="links_name">Services</span></a></li>
    <li class="log_out"><a href="admin_logout.php"><i class='bx bx-log-out'></i><span class="links_name">Log out</span></a></li>
  </ul>
</div>

<!-- Home Section -->
<section class="home-section">
  <nav>
    <div class="sidebar-button">
      <i class='bx bx-menu'></i><span class="dashboard">Wash Booking</span>
    </div>
    <div class="search-box">
      <input type="text" placeholder="Search...">
      <i class='bx bx-search'></i>
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
    <div class="container">
      <table class="admin-table">
        <thead>
          <tr>
            <th>Booking ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Mobile Number</th>
            <th>Pickup Location</th>
            <th>Drop Location</th>
            <th>Pickup Date</th>
            <th>Pickup Time</th>
            <th>Service Type</th>
            <th>Nearest Service Station</th>
            <th>City</th>
            <th>State</th>
            <th>Pincode</th>
            <th>Special Request</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($bookings)) : ?>
            <?php foreach ($bookings as $booking) : ?>
              <tr>
                <td><?= htmlspecialchars($booking['booking_id']); ?></td>
                <td><?= htmlspecialchars($booking['first_name']); ?></td>
                <td><?= htmlspecialchars($booking['last_name']); ?></td>
                <td><?= htmlspecialchars($booking['email']); ?></td>
                <td><?= htmlspecialchars($booking['mobile_number']); ?></td>
                <td><?= htmlspecialchars($booking['pickup_location']); ?></td>
                <td><?= htmlspecialchars($booking['drop_location']); ?></td>
                <td><?= htmlspecialchars($booking['pickup_date']); ?></td>
                <td><?= htmlspecialchars($booking['pickup_time']); ?></td>
                <td><?= htmlspecialchars($booking['service_type']); ?></td>
                <td><?= htmlspecialchars($booking['nearest_service_station']); ?></td>
                <td><?= htmlspecialchars($booking['city']); ?></td>
                <td><?= htmlspecialchars($booking['state']); ?></td>
                <td><?= htmlspecialchars($booking['pincode']); ?></td>
                <td><?= htmlspecialchars($booking['special_request']); ?></td>
                <td>
                  <a href="edit_booking.php?id=<?= $booking['booking_id']; ?>">
                    <button class="action-btn update-btn">Update</button>
                  </a>
                  <a href="delete_booking.php?id=<?= $booking['booking_id']; ?>" onclick="return confirm('Are you sure you want to delete this booking?');">
                    <button class="action-btn delete-btn">Delete</button>
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else : ?>
            <tr>
              <td colspan="16">No bookings found.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>

<script>
    // Sidebar toggle function
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebar-button i");

    sidebarBtn.onclick = function () {
        sidebar.classList.toggle("active");
        if (sidebar.classList.contains("active")) {
            sidebarBtn.classList.add("rotate");
        } else {
            sidebarBtn.classList.remove("rotate");
        }
    };
</script>

<script>
    // Get the profile details container and the dropdown menu
    const profileDetails = document.querySelector('.profile-details');
    const dropdownMenu = document.querySelector('.dropdown-menu');

    // Toggle the dropdown visibility
    profileDetails.addEventListener('click', function() {
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
