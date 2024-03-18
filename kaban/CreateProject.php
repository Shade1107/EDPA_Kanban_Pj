<?php
require_once('header&footer/header.php');
require_once("../models/DatabaseConnection.php");

class Project {
    public static $table = "projects";

    public static function create($project) {
        $db = (new DBConnection())->getConnection();
        $title = $db->real_escape_string($project->name);
        $description = $db->real_escape_string($project->description);
        $create_date = $db->real_escape_string($project->create_date);
        $target_date = $db->real_escape_string($project->target_date);
        $query = "INSERT INTO " . self::$table . " (name, description, create_date, target_date) VALUES ('$title', '$description', '$create_date', '$target_date')";
        $result = $db->query($query);
        if ($result) {
            return $db->insert_id;
        } else {
            echo "Error inserting project: " . $db->error;
            return false;
        }
    }
}

class ProjectMember {
    public static $table = "project_members";

    public static function create($projectId, $memberId) {
        $db = (new DBConnection())->getConnection();
        $project_id = $db->real_escape_string($projectId);
        $user_id = $db->real_escape_string($memberId);
        
        // Prepare the SQL query
        $query = "INSERT INTO " . self::$table . " (project_id, user_id) VALUES ('$project_id', '$user_id')";
        
        // Execute the query
        $result = $db->query($query);
        
        // Check if the query was successful
        if ($result) {
            return true; // Data inserted successfully
        } else {
            // Error occurred during insertion
            echo "Error inserting project member: " . $db->error;
            echo "Query: " . $query; // Debug: Print the SQL query
            return false;
        }
    }
}


function handleFormSubmission() {
    $result = null;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Extract project data from the form
        $title = $_POST["Project_title"];
        $description = $_POST["Description"];
        $create_date = $_POST["CreateD"];
        $target_date = $_POST["TargetD"];
        $members = isset($_POST["member"]) ? $_POST["member"] : [];

        // Create project
        $project = new stdClass();
        $project->name = $title;
        $project->description = $description;
        $project->create_date = $create_date;
        $project->target_date = $target_date;

        $projectId = Project::create($project);

        if ($projectId) {
            // Insert project members
            foreach ($members as $memberId) {
                $inserted = ProjectMember::create($projectId, $memberId);
                if (!$inserted) {
                    $result['code'] = -1;
                    $result['message'] = "Failed to insert member $memberId for project $projectId";
                    return $result;
                }
            }

            $result['code'] = 0;
            $result['message'] = "Project added successfully";
            header("location: addproject(admin).php");
        } else {
            $result['code'] = -1;
            $result['message'] = "Failed to add project";
        }
    }

    return $result;
}

// Handle form submission and display result
$result = handleFormSubmission();
if ($result) {
    echo "Result: " . $result['message'];
} else {
    echo "";
}
?>




 <link rel="icon" type="image/png" href="image/logo.PNG">
     <!--  <form class="input-container">
        <div class="fields">
          <input id="title" placeholder="title..." />
          <input id="description" placeholder="description..." />
        </div>
        <input type="submit" id="submit-button" />
      </form> -->

      <style>
  .loginForm{
    width: 500px;
    /* height: 600px; */
/*    background: linear-gradient(to right,  rgb(185, 43, 39), rgb(21, 101, 192));*/
    margin: 70px 500px;
/*    box-shadow: 10px 10px 5px rgb(67, 27, 27);*/
    border-radius: 20px;
    /* background-image: linear-gradient(  indianred,black); */
  
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

  .plustext{
        padding: 0px 120px;
        color: white;
       font-size: 30px;
      }

      .button{
        margin: 0px 180px;
      }
  
 </style>
    </header>
    
      <div class="loginForm">
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
          <h1 class="loginFormText">Add Project</h1>
           <div class="mb-4 input-group-lg col-auto" >
            <label for="Project_title" class="form-label">Project Title</label>
            <input type="text"  id="Project_title" class="input-field" name="Project_title">
           </div>

           <div class="mb-4 input-group-lg col-auto" >
            <label for="Description" class="form-label">Description</label>
            <input type="text"  id="Description" class="input-field" name="Description">
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

           <div class="mb-4 input-group-lg col-auto" >
            <label for="CreateD" class="form-label">Create Date</label>
            <input type="date"  id="CreateD" class="input-field" name="CreateD">
           </div>

           <div class="mb-4 input-group-lg col-auto" >
            <label for="TargetD" class="form-label">Target Date</label>
            <input type="date"  id="TargetD" class="input-field" name="TargetD">
           </div>

           <button type="submit" class="button" id="submit-button">Add Project</button> 

          </form>
      </div>
    <div class="error-container"></div>

    <script>

// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

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
