<?php

include 'config.php'; // Include the database configuration file

if (isset($_POST['submit'])) {

   // Sanitize and escape user inputs to prevent SQL Injection
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = mysqli_real_escape_string($conn, $_POST['password']);
   $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
   $image = $_FILES['image']['name']; // Image name
   $image_size = $_FILES['image']['size']; // Image size
   $image_tmp_name = $_FILES['image']['tmp_name']; // Temp file path
   $image_folder = 'uploaded_img/' . $image; // Folder where image will be saved

   // Check if the admin email already exists
   $select = mysqli_query($conn, "SELECT * FROM `admin_login` WHERE email = '$email'") or die('Query failed');

   if (mysqli_num_rows($select) > 0) {
      $message[] = 'Admin already exists!';
   } else {
      if ($password != $confirm_password) {
         $message[] = 'Passwords do not match!';
      } elseif ($image_size > 2000000) { // Check if the image size is too large
         $message[] = 'Image size is too large!';
      } else {
         // Hash the password before storing it
         $hashed_password = password_hash($password, PASSWORD_DEFAULT);

         // Insert admin details into the database
         $insert = mysqli_query($conn, "INSERT INTO `admin_login`(username, email, password, image) VALUES('$username', '$email', '$hashed_password', '$image')") or die('Query failed');

         if ($insert) {
            move_uploaded_file($image_tmp_name, $image_folder); // Upload image to the specified folder
            $message[] = 'Admin registered successfully!';
            echo "<script>alert('Admin registered successfully!'); window.location.href='admin_login.php';</script>"; // Popup alert and redirect to login page
            exit();
         } else {
            $message[] = 'Registration failed!';
         }
      }
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Register</title>

   <!-- Custom CSS file link -->
   <link rel="stylesheet" href="css/Admin_register.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>Admin Register</h3>
      
      <!-- Display error/success messages -->
      <?php
      if (isset($message)) {
         foreach ($message as $message) {
            echo '<div class="message">' . $message . '</div>';
         }
      }
      ?>
      
      <!-- Form Fields -->
      <input type="text" name="username" placeholder="Enter username" class="box" required>
      <input type="email" name="email" placeholder="Enter email" class="box" required>
      <input type="password" name="password" placeholder="Enter password" class="box" required>
      <input type="password" name="confirm_password" placeholder="Confirm password" class="box" required>
      <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
      <input type="submit" name="submit" value="Register Now" class="btn">
      
      <p>Already have an account? <a href="Admin_login.php">Login now</a></p>
   </form>

</div>

</body>
</html>
