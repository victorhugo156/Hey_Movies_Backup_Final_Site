<?php
session_start();

// Log out the user
unset($_SESSION['customer_email']);

// Redirect to the login page
header('Location: login.php');
exit();
?>