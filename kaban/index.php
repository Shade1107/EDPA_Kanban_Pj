<?php 
require_once('header&footer/header.php');
require_once('../models/tasks.php');
require_once('../models/stages.php');
$tasks = task::getAll();
$stages = stage::getAll();  
?>
 <link rel="icon" type="image/png" href="image/logo.PNG">
      <form class="input-container">
        
        <button class="btn "  >Add Task</button>
      </form>
    </header>

    <section class="column-container container" id="container">
      <!-- <div class="task-column item" draggable="true" id="backlog">
        <h3>✔ Planning</h3>
        <hr class="custom-hr" />
        <div class="task-list"></div>
      </div> -->
      <?php
      foreach($stages as $stage) { 

      echo "<div class='task-column item' draggable='true' id=''>".
        " <h3>✔" . $stage->name ."</h3>".
        "<hr class='custom-hr' />" .
        "<div class='task-list'>";
          foreach ($tasks as $task){
              if ($task->stage_id == $stage->id) {
                  echo "<div class='task-item'>" .
                       "  <h4>" . $task->short_description . "</h4>" .
                       "  <p>" . $task->task_name . "</p>" .
                       "</div>";
              }
            }
          echo"</div>".
        "</div>";
      }
?>
    </section>

    <div class="error-container"></div>
    <script src="js/app.js"></script>
  </body>
</html>
