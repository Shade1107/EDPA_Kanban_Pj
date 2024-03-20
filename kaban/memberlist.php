<?php
require_once('header&footer/header.php');
require_once("../models/DatabaseConnection.php");
require_once("../models/model.php");
require_once("../models/users.php");

$members = member::getAll();
?>

<link rel="icon" type="image/png" href="image/logo.PNG">
      
</header>

<section class="column-container container" id="container">
    <div class="task-column item" draggable="true" id="backlog" style="width:100%">
        <h3>✔ Member list ✔</h3>
        <hr class="custom-hr" />

        <table class="table table-striped" >
            <thead class="table-light">
                <tr class="h5">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
           
            <tbody>
                <?php foreach ($members as $list) : ?>
                <tr style="color:white">
                    <td><?= $list->id ?></td>
                    <td><?= $list->name ?></td>
                    <td><?= $list->email ?></td>
                    <td><?= $list->password ?></td>

                    <td>
                        <?php
                        $db = new DBConnection();
                        $conn = $db->getConnection();
                        $role = mysqli_fetch_object($conn->query("SELECT * FROM roles WHERE id = ". $list->role_id));
                        echo $role->name;
                        ?>
                    </td>
                    <td> <a href="editpage.php?id=<?= $list->id ?>">Edit</a>
                    <a href="delete.php?id=<?= $list->id ?>">Delete</a></td>
                
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
       
    </div>
</section>

<div class="error-container"></div>
<script src="js/app.js"></script>
</body>
</html>
