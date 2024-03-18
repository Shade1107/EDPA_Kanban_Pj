<?php
require_once("../models/DatabaseConnection.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role_id = 2;

    $db = new DBConnection();
    $conn = $db->getConnection();
    $table = "users";
    $query = "
        SELECT * FROM $table WHERE name = '$name' AND email = '$email' AND password = '$password'
    ";
    $result = $conn->query($query);
}
echo $role_id;
if ($result->num_rows > 0) {
    echo  '
    <script>
        window.location.href = "login.php";
        alert("This user already exist");
    </script>';
    exit;
 } else {
            // If the user doesn't exist, insert the data into the database
        $query = "
            INSERT INTO $table (name, email, password, role_id) 
            VALUES ('$name', '$email', '$password', '$role_id')
        ";
        $insert_result = $conn->query($query);

        if ($insert_result) {
            // Redirect to the index page
            header("Location: index.php");
            exit;
        } else {
            echo "Failed to insert user data.";
        }
 }
 echo $role_id;
?>