<?php
require_once("../models/DatabaseConnection.php");

function delete($id) {
    // Create a new DB connection
    $db = new DBConnection();
    $conn = $db->getConnection();

    // Prepare and execute the SQL query to delete the user
    $sql = "DELETE FROM users WHERE id = ?";
    
    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Deletion successful
        header("Location: memberlist.php");
        exit(); // Ensure script execution stops after redirection
    } else {
        // Deletion failed
        echo "Error: " . $stmt->error;
        // Optionally, you can handle the error gracefully
    }
}

// Check if ID is provided and numeric
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Call the delete function
    delete($_GET['id']);
} else {
    // Handle invalid or missing ID
    echo "Invalid or missing user ID.";
}
?>
