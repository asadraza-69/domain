<?php
session_start(); // Start the session

// Unset the user session variable
unset($_SESSION['user']);

// Destroy the session
session_destroy();

// Redirect to the login page or any other desired location
header("Location: index.php");
exit();
?>
