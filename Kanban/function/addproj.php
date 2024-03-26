<?php

require_once("../models/DatabaseConnection.php");

class Project {
    public static $table = "projects";

    public static function create($project) {
        $db = (new DBConnection())->getConnection();
        $title = $db->real_escape_string($project->name);
        $description = $db->real_escape_string($project->description);
        $create_date = $db->real_escape_string($project->create_date);
        $due_date = $db->real_escape_string($project->due_date);
        $query = "INSERT INTO " . self::$table . " (name, description, create_date, due_date) VALUES ('$title', '$description', '$create_date', '$due_date')";
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
        $due_date = $_POST["TargetD"];
        $members = isset($_POST["member"]) ? $_POST["member"] : [];

        // Create project
        $project = new stdClass();
        $project->name = $title;
        $project->description = $description;
        $project->create_date = $create_date;
        $project->due_date = $due_date;

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