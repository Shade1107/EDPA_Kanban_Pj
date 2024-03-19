<?php
require_once("../models/DatabaseConnection.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    // $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if ( empty($email) && empty($password) ) {
        
        header("Location:login.php?FieldEmpty=true&email=$email");
        exit;
    }else if ( empty($password)) {
        header("Location:login.php?PasswordEmpty=true&email=$email");
        exit;
    }else if ( empty($email)){
        header("Location:login.php?EmailEmpty=true&email=$email");
        exit;
    }

    // Check if the user already exists in the database
    $db = new DBConnection();
    $conn = $db->getConnection();
    $table = "users";
    $query = "
        SELECT * FROM $table WHERE email = '$email' AND password = '$password'
    ";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $role_id = $user['role_id'];

        // Determine user role and redirect accordingly
        if ($role_id == '1') {
            // Redirect admin to admin page
            header("Location: addproject(admin).php");
            exit;
        } else {
            // Redirect member to member page
            header("Location: addtask(member).php");
            exit;
        }
    } else {
        // If the user does not exist
        echo  '
        <script>
            window.location.href = "login.php";
            alert("This your does not  exist");
        </script>';
    }
}
?>
?>

