<?php
session_start();
session_destroy(); // Destroy all admin-related sessions to log the admin out

// Display a logout success message using JavaScript and then redirect to the login page with a query parameter
echo "<script>
    alert('Logout successfully');
    window.location.href = 'Admin_login.php?message=logout'; // Redirect to the login page with a logout message
</script>";
exit(); // Ensure the script stops executing after redirection
?>
