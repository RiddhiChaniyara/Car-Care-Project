<?php
session_start(); // Start the session

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Show a popup message and then redirect to the login page
echo "<script>
    alert('Successfully logged out!');
    window.location.href = 'login.php?message=logout'; // Redirect with message query parameter
</script>";

// Exit to stop further execution
exit();
?>
