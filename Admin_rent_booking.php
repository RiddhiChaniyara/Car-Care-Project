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
$sql = "SELECT username, email FROM `car care`.`admin_login` WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $admin_id);
$stmt->execute();
$result = $stmt->get_result();
$admin = $result->fetch_assoc(); // Fetch admin details

// Query to get the rent booking data
$sql = "SELECT booking_id, first_name, last_name, email, mobile_number, pickup_location, drop_location, pickup_date, pickup_time, adults, children, special_request FROM rent_booking"; 
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
    <title>Rent Bookings</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="css/Admin_rent_booking.css">
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
    <li><a href="Admin_rent_booking.php"><i class='bx bx-car'></i><span class="links_name">Bookings</span></a></li>
    <li><a href="#"><i class='bx bx-wrench'></i><span class="links_name">Services</span></a></li>
    <li class="log_out"><a href="admin_logout.php"><i class='bx bx-log-out'></i><span class="links_name">Log out</span></a></li>
  </ul>
</div>

<!-- Home Section -->
<section class="home-section">
  <nav>
    <div class="sidebar-button">
      <i class='bx bx-menu'></i><span class="dashboard">Rent Booking</span>
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
            <th>Adults</th>
            <th>Children</th>
            <th>Special Request</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($bookings)) : ?>
            <?php foreach ($bookings as $booking) : ?>
              <tr>
                <td><?php echo htmlspecialchars($booking['booking_id']); ?></td>
                <td><?php echo htmlspecialchars($booking['first_name']); ?></td>
                <td><?php echo htmlspecialchars($booking['last_name']); ?></td>
                <td><?php echo htmlspecialchars($booking['email']); ?></td>
                <td><?php echo htmlspecialchars($booking['mobile_number']); ?></td>
                <td><?php echo htmlspecialchars($booking['pickup_location']); ?></td>
                <td><?php echo htmlspecialchars($booking['drop_location']); ?></td>
                <td><?php echo htmlspecialchars($booking['pickup_date']); ?></td>
                <td><?php echo htmlspecialchars($booking['pickup_time']); ?></td>
                <td><?php echo htmlspecialchars($booking['adults']); ?></td>
                <td><?php echo htmlspecialchars($booking['children']); ?></td>
                <td><?php echo htmlspecialchars($booking['special_request']); ?></td>
                <td>
                  <a href="edit_booking.php?id=<?php echo $booking['booking_id']; ?>">
                    <button class="action-btn update-btn">Update</button>
                  </a>
                  <a href="delete_booking.php?id=<?php echo $booking['booking_id']; ?>" onclick="return confirm('Are you sure you want to delete this booking?');">
                    <button class="action-btn delete-btn">Delete</button>
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else : ?>
            <tr>
              <td colspan="13">No bookings found.</td>
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
