<?php 
require_once('header&footer/header.php');
require_once('../models/tasks.php');
require_once('../models/stages.php');
require_once('../models/users.php');
require_once('../models/projects.php');
$tasks = task::getAll();
$stages = stage::getAll(); 
// $id = 4;
// $projects = project::find($id);

  $id = intval($_GET["id"]);
  $projects = project::find($id);
?>
 <link rel="icon" type="image/png" href="image/logo.PNG">
      <form class="input-container">

      <div class="input-container">
      <a class="btn" type="button" href="memberlist.php">Member List</a>
      </div>
      <div class="input-container">
      <a href="createtask.php?id=<?= $projects->id?>" class="btn" type="button">Add Task</a>
      </div>
      </form>

    </header>
    <section class="column-container container" id="container">
      
      <?php
      foreach($stages as $stage):?>

      <div class='task-column item' draggable='true' id=''>
        <h3>✔️ <?= $stage->name?> </h3>
        <hr class='custom-hr' />
        <div class='task-list'>
          <?php foreach ($tasks as $task): ?>
              <?php
              if ($task->stage_id == $stage->id && $task->project_id == $projects->id) {
                  echo "<div class='task-item'>" .
                       "  <h4>" . $task->short_description . "</h4>" .
                       "  <p>" . $task->task_name . "</p>" .
                       "</div>".
                       "<hr>";
                }
              ?>
          <?php endforeach; ?>
        </div>
      </div>
      <hr>

      <?php endforeach; ?>
    </section>
    <div class="error-container"></div>
    <script src="js/app.js"></script>
  </body>
</html>