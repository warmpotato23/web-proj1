<?php
session_start();
session_unset(); // Clear session variables
session_destroy(); // Destroy the session
header("Location: homepage.php"); // Redirect to homepage or login page
exit();
?>