<?php

require_once("../models/DatabaseConnection.php");

class task {
    public static $table = "tasks";

    public static function create($task) {
        $db = (new DBConnection())->getConnection();
        $project_id = $db->real_escape_string($task->project_id);
        $stage = $db->real_escape_string($task->stage_id);
        $description = $db->real_escape_string($task->short_description);   
        $task_name = $db->real_escape_string($task->task_name);
        $query = "INSERT INTO " . self::$table . " (project_id,stage_id, short_description, task_name) VALUES ('$project_id','1', '$description', '$task_name')";
        $result = $db->query($query);
        if ($result) {
            return $db->insert_id;
        } else {
            echo "Error inserting project: " . $db->error;
            return false;
        }
    }
}

class taskMember {
    public static $table = "task_members";

    public static function create($taskId, $memberId) {
        $db = (new DBConnection())->getConnection();
        $user_id = $db->real_escape_string($memberId);
        $taskId = $db->real_escape_string($taskId);
        
        // Prepare the SQL query
        $query = "INSERT INTO " . self::$table . " (user_id,task_id) VALUES ('$user_id','$taskId')";
        
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
       
        $project_id = $_POST["id"];
        $stage = $_POST["stage"];
        $description = $_POST["Description"];
        $task_name = $_POST["task_name"];
        $members = isset($_POST["member"]) ? $_POST["member"] : [];

        // Create project
        $task = new stdClass();
        $task->project_id = $project_id;
        $task->stage_id = $stage;
        $task->short_description = $description;
        $task->task_name = $task_name;

        $taskId = task::create($task);

        if ($taskId) {
            // Insert project members
            foreach ($members as $memberId) {
                $inserted = taskMember::create($taskId, $memberId);
                if (!$inserted) {
                    $result['code'] = -1;
                    $result['message'] = "Failed to insert member $memberId for project $taskId";
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