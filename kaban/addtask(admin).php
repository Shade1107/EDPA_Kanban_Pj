<?php 
require_once('header&footer/header.php');

?>
 <link rel="icon" type="image/png" href="image/logo.PNG">
<style>
  
.loginForm{
 background-image: linear-gradient(  indianred,black);
}

.loginForm{
    width: 500px;
    height: 700px;
/*    background: linear-gradient(to right,  rgb(185, 43, 39), rgb(21, 101, 192));*/
    margin: 70px 500px;
/*    box-shadow: 10px 10px 5px rgb(67, 27, 27);*/
    border-radius: 20px;
    
  }

.Text_area{
  width: 470px; 
     height: 70px;
     border-radius: 20px;
     box-shadow: 2px 2px 10px #242b34;
     margin: 20px 15px;
}



.input-field {
     width: 470px; 
     height: 50px;
     border-radius: 20px;
     margin: 20px 15px;
     box-shadow: 2px 2px 10px #242b34;
      background: white;
      border: none;
  }/* Adjust width as needed */

  .dateform{
    width: 500px;
    height: 100px;
    /* background-color: #242b34; */
   
  }

  .startdate{
    width: 220px;
    height: auto;
    /* background-color: yellow; */
    float: left;
    margin: 0px 14px;
    border-radius: 10px;
  }

  .input-fielddate{
    width: 220px;
    height: 50px;
    border-radius: 10px;
    background: white;
    border: none;
    box-shadow: 2px 2px 10px #242b34;
  }

  .stagetext{
    color: white;
    size: 15px;
  }

.space{
  width: 100%;
  height: 50px;
}

.form-select{
  width: 470px; 
     height: 50px;
     /* border-radius: 40px; */
     margin: 20px 15px;
     box-shadow: 2px 2px 10px #242b34;
      background: white;
      border: none;
}
</style>


      <div class="input-container">
        <a class="btn" type="button" href="createtask.php">Add Task</a>

        <!-- The Modal -->

</div>
    </header>

    <section class="column-container">
      <div class="task-column" id="backlog">
        <h3>✔ Planning</h3>
        <hr class="custom-hr" />
        <div class="task-list"></div>
      </div>

      <div class="task-column" id="doing">
        <h3>✔ To Do List</h3>
        <hr class="custom-hr" />
        <div class="task-list"></div>
      </div>

      <div class="task-column" id="done">
        <h3>✔ Doing Task</h3>
        <hr class="custom-hr" />
        <div class="task-list"></div>
      </div>

      <div class="task-column" id="doing">
        <h3>✔ Done</h3>
        <hr class="custom-hr" />
        <div class="task-list"></div>
      </div>
    </section>

    <div class="error-container"></div>

    <script src="js/app.js"></script>


  </body>
</html>
