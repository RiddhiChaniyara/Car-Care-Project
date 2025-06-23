<?php
include 'config.php'; // Include the database configuration file
session_start(); // Start the session

if (isset($_POST['submit'])) {
    // Sanitize the input values to prevent SQL Injection
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query to select the user based on email
    $select = mysqli_query($conn, "SELECT * FROM login WHERE email = '$email'") or die('Query failed');

    // If the user exists, verify the password
    if (mysqli_num_rows($select) > 0) {
        $row = mysqli_fetch_assoc($select);

        // Verify the password using password_verify()
        if (password_verify($password, $row['password'])) {
            // If the password matches, start the session and store user info
            $_SESSION['car care'] = $row['id']; // Store the user id in session for further use
            $_SESSION['username'] = $row['name']; // Store the username in the session
            header('Location: index.php'); // Redirect to index.php after successful login
            exit();
        } else {
            // If the password is incorrect, show an error message
            $message[] = 'Incorrect email or password!';
        }
    } else {
        // If the email is not found, show an error message
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
    <title>Login</title>

    <!-- Custom CSS file link -->
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

<div class="form-container">

    <!-- Login Form -->
    <form action="  " method="post">
        <h3>Login Now</h3>

        <!-- Display error messages if any -->
        <?php
        if (isset($message)) {
            foreach ($message as $message) {
                echo '<div class="message">' . $message . '</div>';
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
        <p>Don't have an account? <a href="register.php">Register Now</a></p>
    </form>

    <script>
        // Check if the URL contains the 'message=logout' parameter
        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.get('message') === 'logout') {
                alert('Successfully logged out!');
                // Optionally, you can remove the query parameter after showing the alert
                window.history.replaceState(null, '', window.location.pathname);
            }
        };
    </script>
</div>

</body>
</html>
