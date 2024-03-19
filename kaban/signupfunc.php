<?php
require_once("../models/DatabaseConnection.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role_id = 2;

    if (empty($name) && empty($email) && empty($password)) {
        // All fields are empty
        header("Location:signup.php?FieldEmpty=true");
    } 
    else if( empty($name) && empty($email)){
        header("Location:signup.php?NameEmailEmpty=true");
    }
    else if(empty($email) && empty($password)){
        header("Location:signup.php?EmailPasswordEmpty=true&name=$name");
    }
    else if(empty($name) && empty($password)){
        header("Location:signup.php?NamePasswordEmpty=true&email=$email");
    }
    else if (empty($name)) {
        // Name is empty
        header("Location:signup.php?NameEmpty=true&email=$email");
    } 
     else if (empty($email)) {
        // Email is empty
        header("Location:signup.php?EmailEmpty=true&name=$name");
        }
    elseif (empty($password)) {
        // Password is empty
        header("Location:signup.php?PasswordEmpty=true&name=$name&&email=$email");
       
    }
    else{
        $db = new DBConnection();
        $conn = $db->getConnection();
        $table = "users";
        $query = "
            SELECT * FROM $table WHERE name = '$name' AND email = '$email' AND password = '$password'
        ";
        $result = $conn->query($query);


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
    header("Location: addProject(user).php");
    exit;
} else {
    echo "Failed to insert user data.";
}
}
    }
}
?>
