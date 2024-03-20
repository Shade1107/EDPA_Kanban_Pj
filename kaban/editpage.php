<?php 
require_once('header&footer/header.php');
?>

<?php
    require_once("../models/users.php");

    if (isset($_GET["id"])) {
        $id = intval($_GET["id"]);
        $user = member::find($id);

        if (isset($user)) {
    ?>

    <link rel="icon" type="image/png" href="image/logo.PNG">

    <style>
        .loginForm{
            width: 500px;
            height: 600px;
            margin: 70px 500px;
            border-radius: 20px;
        }

        .input-field {
            width: 470px; 
            height: 50px;
            border-radius: 20px;
            margin: 20px 15px;
            box-shadow: 2px 2px 10px #242b34;
            background: white;
            border: none;
        }

        .button{
            margin: 0px 180px;
        }
    </style>

    </header>
    
    <div class="loginForm">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <h1 class="loginFormText">Edit Member</h1>
            <input type="hidden" name="id" value="<?php echo $user->id;?>">
            <div class="mb-4 input-group-lg col-auto">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="input-field" value="<?php echo htmlspecialchars($user->name);?>">
            </div>

            <div class="mb-4 input-group-lg col-auto">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="input-field" value="<?php echo htmlspecialchars($user->email);?>">
            </div>

            <div class="mb-4 input-group-lg col-auto">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="input-field" value="<?php echo htmlspecialchars($user->password);?>">
            </div>

            <div class="mb-4 input-group-lg col-auto">
                <select class="input-field" name="role_id">
                    <option selected disabled>Select Role</option>
                    <option value="1" <?php if($user->role_id == 1) echo "selected"; ?>>Admin</option>
                    <option value="2" <?php if($user->role_id == 2) echo "selected"; ?>>Member</option>
                </select>
            </div>

            <button type="submit" name="submit" class="button" id="submit-button">Update User</button> 
        </form>
    </div>

    <?php
        } else {
            echo "<p>User not found.</p>";
        }
    }

    if (isset($_POST["submit"])) {
        $id = intval($_POST["id"]);
        $user = new member();
        $user->id = $id;
        $user->name = $_POST["name"];
        $user->email = $_POST["email"];
        $user->password = $_POST["password"];
        $user->role_id = $_POST["role_id"];

        $result = $user->update();

        if ($result) {
            echo "<p>User updated successfully.</p>";
            header("Location: memberlist.php");
        } else {
            echo "<p>Error updating user.</p>";
        }
    }
    ?>

    <div class="error-container"></div>

  </body>
</html>