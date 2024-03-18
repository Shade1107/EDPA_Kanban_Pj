<?php 
require_once('header&footer/header.php');
<<<<<<< HEAD
require_once('../models/DatabaseConnection.php');
=======
>>>>>>> 7f2521a43e537b993b4dd9f5946d9d6b12c583c1
?>
 <link rel="icon" type="image/png" href="image/logo.PNG">
     <!--  <form class="input-container">
        <div class="fields">
          <input id="title" placeholder="title..." />
          <input id="description" placeholder="description..." />
        </div>
        <input type="submit" id="submit-button" />
      </form> -->
    </header>
    


      <section class="column-container row">
  <div class="leftSideBar col-lg-3 h-10">
    <h3 class="text-center text-white mt-5">Project</h3>
    
  </div>
  <div class="col-lg-9">
    <div class="task-columns-container mt-3" id="taskColumnsContainer">
<<<<<<< HEAD
    <?php
    require_once('../models/projects.php');

    $projects= project::getAll();
    ?>
    <?php foreach ($projects as $p) : ?>
    <div class="task-column" id="backlog">
      <a href="#" class="text-decoration-none text-white"><h3><?=$p->name?> </h3></a>
      </div>

      <?php endforeach; ?>
      
=======
      <div class="task-column" id="backlog">
      <a href="index.php" class="text-decoration-none text-white"><h3>Project 1</h3></a>
      </div>

      <div class="task-column" id="backlog">
      <a href="index.php" class="text-decoration-none text-white"><h3>Project 2</h3></a>
      </div>

      <div class="task-column" id="backlog">
      <a href="index.php" class="text-decoration-none text-white"><h3>Project 3</h3></a>
      </div>

      <div class="task-column" id="backlog">
      <a href="index.php" class="text-decoration-none text-white"><h3>Project 4</h3></a>
      </div>
>>>>>>> 7f2521a43e537b993b4dd9f5946d9d6b12c583c1

      

    </div>
  </div>
</section>

      
    <div class="error-container"></div>

    <!-- <script type="text/javascript" src="js/addProject.js"></script> -->
    <!-- <script>
document.getElementById("addTaskButton").addEventListener("click", function() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "create.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.responseText);
            // Handle response from PHP file here
        }
    };
    xhr.send();
});
</script> -->

  </body>
</html>
