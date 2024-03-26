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
                    <td><a href="#" class="btn btn-primary">Edit
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
</svg>
                    </a>


                    <a href="delete.php?id=<?= $list->id ?>" class="btn btn-danger">Delete
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
</svg></a></td>
                
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
       
    </div>
</section>

<div class="d-flex">
           <!-- <button type="button" class="button" id="submit-button"></button> -->
           <a href="#" class="button button-a">Back</a>
            </div>

<div class="error-container"></div>
<script src="js/app.js"></script>
</body>
</html>
