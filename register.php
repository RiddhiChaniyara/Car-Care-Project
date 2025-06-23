<?php

include 'config.php';

if (isset($_POST['submit'])) {

   // Sanitize inputs to avoid SQL Injection
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = mysqli_real_escape_string($conn, $_POST['password']);
   $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/' . $image;

   // Check if the user already exists
   $select = mysqli_query($conn, "SELECT * FROM `login` WHERE email = '$email'") or die('Query failed');

   if (mysqli_num_rows($select) > 0) {
      $message[] = 'User already exists!';
   } else {
      if ($password != $cpassword) {
         $message[] = 'Passwords do not match!';
      } elseif ($image_size > 2000000) {
         $message[] = 'Image size is too large!';
      } else {
         // Hash the password before storing it
         $hashed_password = password_hash($password, PASSWORD_DEFAULT);

         // Insert user details into the database
         $insert = mysqli_query($conn, "INSERT INTO `login`(name, email, password, image) VALUES('$name', '$email', '$hashed_password', '$image')") or die('Query failed');

         if ($insert) {
            move_uploaded_file($image_tmp_name, $image_folder); // Upload image to folder
            $message[] = 'Registered successfully!';
            echo "<script>alert('Registered successfully!'); window.location.href='login.php';</script>"; // Popup and redirect
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
   <title>Register</title>

   <!-- Custom CSS file link -->
   <link rel="stylesheet" href="css/login.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>Register Now</h3>
      
      <!-- Display error/success messages -->
      <?php
      if (isset($message)) {
         foreach ($message as $message) {
            echo '<div class="message">' . $message . '</div>';
         }
      }
      ?>
      
      <!-- Form Fields -->
      <input type="text" name="name" placeholder="Enter username" class="box" required>
      <input type="email" name="email" placeholder="Enter email" class="box" required>
      <input type="password" name="password" placeholder="Enter password" class="box" required>
      <input type="password" name="cpassword" placeholder="Confirm password" class="box" required>
      <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
      <input type="submit" name="submit" value="Register Now" class="btn">
      
      <p>Already have an account? <a href="login.php">Login now</a></p>
   </form>

</div>

</body>
</html>
