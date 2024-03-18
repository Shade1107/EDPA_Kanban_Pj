<?php 
require_once('header&footer/header.php');
require_once('../models/tasks.php');
$tasks = task::getAll();   
?>
 <link rel="icon" type="image/png" href="image/logo.PNG">
      <form class="input-container">
        
        <button class="btn "  >Add Task</button>
      </form>
    </header>

    <section class="column-container container" id="container">
      <div class="task-column item" draggable="true" id="backlog">
        <h3>✔ Planning</h3>
        <hr class="custom-hr" />
        <div class="task-list"></div>
      </div>

      <div class="task-column item" draggable="true"  id="doing">
        <h3>✔ To Do List</h3>
        <hr class="custom-hr" />
        <div class="task-list">
        <?php
          foreach ($tasks as $task) {
              echo "<div class='task-item'>" .
                   "  <h4>" . $task->short_description . "</h4>" .
                   "  <p>" . $task->task_name . "</p>" .
                   "</div>";
          }
          ?>
        </div>
      </div>

      <div class="task-column item" draggable="true"  id="done">
        <h3>✔ Doing Task</h3>
        <hr class="custom-hr" />
        <div class="task-list"></div>
      </div>

     

      <div class="task-column item" draggable="true"  id="doing">
        <h3>✔ Done</h3>
        <hr class="custom-hr" />
        <div class="task-list"></div>
      </div>
    </section>

    <div class="error-container"></div>

    

    <script src="js/app.js"></script>
  </body>
</html>
