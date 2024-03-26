<?php 
require_once('header&footer/header.php');
require_once('../function/addtask.php');
?>

 <link rel="icon" type="image/png" href="image/logo.PNG">
<style>
  
/* .loginForm{
 background-image: linear-gradient(  indianred,black);

} */

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


      <!-- <div class="input-container">

      </div> -->
    </header>
    
<div class="loginForm">
<!-- <div class="mb-4 input-group-lg col-auto" >
   <label for="addmember" class="form-label">Add Member</label>
  <input type="text"  id="addmember" class="input-field"> --> 
  
<div class="wrap">  
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<h1 class="loginFormText">Add Task</h1>
<?php
        require_once ('../models/projects.php');

        if (isset($_GET["id"])) {
            $id = intval($_GET["id"]);
            $project = project::find($id);

            if (isset($project)) {
        ?>
    <input type="hidden" name="id" value="<?php echo $project->id;?>">
<?php
            } else {
                echo "<p>not found.</p>";
            }
        }
        ?>

<div class="input-group-lg col-auto" >
  <label for="Discription" class="form-label">Discription</label>
  <textarea id="Discription" class="Text_area" name="w3review" rows="3" cols="42">
</textarea>
</div>

<div class="input-group-lg col-auto" >
  <label for="task_name" class="form-label">Task Name</label>
  <textarea id="task_name" class="Text_area" name="task_name" rows="3" cols="42">
</textarea>
</div>

<?php
                require_once("../models/users.php");
                $users = member::getAll();
            ?>
           <div class="mb-4 input-group-lg col-auto">
           <button type="button" class="btn plustext" onclick="BtnAdd()">+</button>
           <label for="member" class="form-label">Add Member</label>
           <select class="form-select user-select" name="member[]" id="member">
                <option value="">Select Member</option>
                <?php foreach ($users as $u) : ?>
                    <option value="<?php echo htmlspecialchars($u->id); ?>">
                    <?php echo htmlspecialchars($u->name); ?>
                    </option>
                    <?php endforeach; ?>
                    </select>
                
           </div>
           <div id="inputContainer"></div> 


<!-- <div class="input-group-lg col-auto startdate" >
  <label for="Stage" class="form-label">Stage</label><br>

  <input type="radio" id="Stage" name="#" value="planning" >
<label for="planning" class="stagetext">Planning</label><br>


<input type="radio" id="Stage" name="#" value="todolist">
<label for="doing" class="stagetext">To do list</label><br>


<input type="radio" id="Stage" name="fav_language" value="doing">
<label for="javascript" class="stagetext">Doing</label><br>

<input type="radio" id="Stage" name="fav_language" value="done">
<label for="javascript" class="stagetext">Done</label>
</div><br><br> -->


  <!-- <label for="datetimeS" class="form-label">Start Date</label>
  <input type="datetime-local" id="datetimeS"  class="input-fielddate"> -->
  <!-- <select class="form-select" aria-label="Default select example" >
  <option selected>Select Stage</option>
  <option value="1">✔ Planning</option>
  <option value="2">✔ To Do List</option>
  <option value="3">✔ Doing Task</option>
  <option value="3">✔ Done</option>
</select> -->

<div class="space"></div>
<button type="submit" class="button" name="submit" id="submit-button">Add Task</button>

</form>

 </div>

</div>




    <div class="error-container"></div>

    <script src="js/app.js"></script>
   
    <script>
    function BtnAdd() {
        var originalInput = document.getElementById('member');
        var cloneInput = originalInput.cloneNode(true);
        document.getElementById('inputContainer').appendChild(cloneInput);

        var br = document.createElement('br');
    document.getElementById('inputContainer').appendChild(br);
    }
</script>


  </body>

</html>
