<?php
require_once("../models/users.php");
require_once("../models/DatabaseConnection.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the form is submitted
    if (isset($_POST["submit"])) {
        // Validate input
        $id = isset($_POST["id"]) ? intval($_POST["id"]) : null;
        $name = isset($_POST["name"]) ? $_POST["name"] : null;
        $email = isset($_POST["email"]) ? $_POST["email"] : null;
        $password = isset($_POST["password"]) ? $_POST["password"] : null;
        $role_id = isset($_POST["role_id"]) ? intval($_POST["role_id"]) : null;

        if (!$id || !$name || !$email || !$password || !$role_id) {
            echo "<p>Please fill in all fields.</p>";
            exit;
        }

        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Create a new DBConnection object
        $connection = new DBConnection(); // Assuming DBConnection class handles database connection

        // Create a new User object
        $user = new member($connection); // Assuming User class takes a database connection as a parameter in its constructor

        // Update the user
        $user->id = $id;
        $user->name = $name;
        $user->email = $email;
        $user->password = $hashed_password;
        $user->role_id = $role_id;

        $result = $user->update();

        if ($result) {
            // Redirect to memberlist.php if update is successful
            header("Location: memberlist.php");
            exit;
        } else {
            echo "<p>Error updating user.</p>";
        }
    }
}
?>
