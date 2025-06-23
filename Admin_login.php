<?php
include 'config.php'; // Include the database configuration file
session_start(); // Start the session

if (isset($_POST['submit'])) {
    // Sanitize the input values to prevent SQL Injection
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query to select the user based on email
    $select = mysqli_query($conn, "SELECT * FROM admin_login WHERE email = '$email'");

    if (!$select) {
        // If query fails, handle error
        die('Query failed: ' . mysqli_error($conn));
    }

    // If the user exists, verify the password
    if (mysqli_num_rows($select) > 0) {
        $row = mysqli_fetch_assoc($select);

        // Verify the password using password_verify()
        if (password_verify($password, $row['password'])) {
            // If the password matches, store admin information in the session
            $_SESSION['admin_id'] = $row['id']; // Store the admin id in session for further use
            $_SESSION['admin_username'] = $row['username']; // Store the username in the session
            header('Location: Admin_Dashboard.php'); // Redirect to admin dashboard after successful login
            exit();
        } else {
            // If the password is incorrect, display an error message
            $message[] = 'Incorrect email or password!';
        }
    } else {
        // If the email is not found, display an error message
        $message[] = 'Email not found!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <!-- Custom CSS file link -->
    <link rel="stylesheet" href="css/Admin_login.css">
</head>
<body>

<div class="form-container">
    <!-- Login Form -->
    <form action="" method="post">
        <h3>Admin Login</h3>

        <!-- Display error messages if any -->
        <?php
        if (isset($message)) {
            foreach ($message as $msg) {
                echo '<div class="message">' . htmlspecialchars($msg) . '</div>';
            }
        }
        ?>

        <!-- Email input field -->
        <input type="email" name="email" placeholder="Enter Email" class="box" required>

        <!-- Password input field -->
        <input type="password" name="password" placeholder="Enter Password" class="box" required>

        <!-- Submit button -->
        <input type="submit" name="submit" value="Login Now" class="btn">

        <!-- Link to registration page -->
        <p>Don't have an account? <a href="Admin_register.php">Register Now</a></p>
    </form>

</div>

</body>
</html>
