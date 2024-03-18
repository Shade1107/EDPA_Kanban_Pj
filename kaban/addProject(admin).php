<?php 
require_once('header&footer/header.php');
require_once('../models/DatabaseConnection.php');
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
    


      <section class="column-container row" >
  <div class="leftSideBar col-lg-3 h-10">
    <h3 class="text-center text-white mt-5">Project</h3>
    
  </div>
  <div class="col-lg-9">
    <div class="task-columns-container mt-3" id="taskColumnsContainer">

    <?php
    require_once('../models/projects.php');

    $projects= project::getAll();
    ?>
    <?php foreach ($projects as $p) : ?>
    <div class="task-column" id="backlog">
      <a href="#" class="text-decoration-none text-white"><h3><?=$p->name?> </h3></a>
      </div>

      <?php endforeach; ?>
    
      <div class="task-column" id="backlog">
      <a href="CreateProject.php" class="text-decoration-none text-white"><h3 class="text-center">+</h3></a>
      </div>

                          
          </div>
      </div>


    </div>
  </div>
</section>

      
    <div class="error-container"></div>

  
  </body>
</html>
