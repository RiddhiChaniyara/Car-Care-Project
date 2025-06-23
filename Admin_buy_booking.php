<?php
// Include the database connection
include('config.php');
session_start();

// Ensure the user is an admin, otherwise redirect
if (!isset($_SESSION['admin_id'])) {
    header('Location: Admin_login.php');
    exit();
}

// Define the admin's username from the session
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Admin';  // Default to 'Admin' if not set

// Query to get the buy_booking data
$sql = "SELECT id, first_name, last_name, email, mobile_number, car_model, city, state, address, customer_age, marital_status, gender, date FROM buy_booking"; 
$result = $conn->query($sql);

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
    <title>Buy Booking Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="css/Admin_users.css">
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
            <li><a href="#"><i class='bx bx-car'></i><span class="links_name">Bookings</span></a></li>
            <li><a href="#"><i class='bx bx-wrench'></i><span class="links_name">Services</span></a></li>
            <li class="log_out"><a href="#"><i class='bx bx-log-out'></i><span class="links_name">Log out</span></a></li>
        </ul>
    </div>

    <!-- Home Section -->
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class='bx bx-menu'></i><span class="dashboard">Buy Booking</span>
            </div>
            <div class="search-box">
                <input type="text" placeholder="Search...">
                <i class='bx bx-search'></i>
            </div>

            <div class="profile-details">
                <span class="admin_name"><?php echo $username; ?></span> <!-- Display logged-in admin's username -->
                <i class='bx bx-chevron-down'></i>
                <ul class="dropdown-menu">
                    <li><a href="update_profile.php">Update Profile</a></li>
                    <li><a href="admin_logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>

        <div class="home-content">
            <h2>Buy Booking Details</h2>
            <div class="container">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Mobile Number</th>
                            <th>Car Model</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Address</th>
                            <th>Age</th>
                            <th>Marital Status</th>
                            <th>Gender</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($bookings)) : ?>
                            <?php foreach ($bookings as $booking) : ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($booking['id']); ?></td>
                                    <td><?php echo htmlspecialchars($booking['first_name']); ?></td>
                                    <td><?php echo htmlspecialchars($booking['last_name']); ?></td>
                                    <td><?php echo htmlspecialchars($booking['email']); ?></td>
                                    <td><?php echo htmlspecialchars($booking['mobile_number']); ?></td>
                                    <td><?php echo htmlspecialchars($booking['car_model']); ?></td>
                                    <td><?php echo htmlspecialchars($booking['city']); ?></td>
                                    <td><?php echo htmlspecialchars($booking['state']); ?></td>
                                    <td><?php echo htmlspecialchars($booking['address']); ?></td>
                                    <td><?php echo htmlspecialchars($booking['customer_age']); ?></td>
                                    <td><?php echo htmlspecialchars($booking['marital_status']); ?></td>
                                    <td><?php echo htmlspecialchars($booking['gender']); ?></td>
                                    <td><?php echo htmlspecialchars($booking['date']); ?></td>
                                    <td>
                                        <a href="edit_booking.php?id=<?php echo $booking['id']; ?>">
                                            <button class="action-btn update-btn">Update</button>
                                        </a>
                                        <a href="delete_booking.php?id=<?php echo $booking['id']; ?>" onclick="return confirm('Are you sure you want to delete this booking?');">
                                            <button class="action-btn delete-btn">Delete</button>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="14">No bookings found.</td>
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
    let sidebarBtn = document.querySelector(".sidebar-button i"); // Select the icon inside the button

    sidebarBtn.onclick = function () {
        sidebar.classList.toggle("active");
        // Rotating the sidebar button icon when clicked
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

    // Add click event listener to toggle the dropdown visibility
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