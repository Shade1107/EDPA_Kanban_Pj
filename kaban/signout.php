
<?php


require_once('../models/DatabaseConnection.php');

session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page or homepage
    header("Location: ../index.php");
    exit();
}

// Clear all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to login page or homepage
header("Location: ../index.php");
exit();
?>