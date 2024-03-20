<?php
    require_once("model.php");
    require_once("DatabaseConnection.php");

    class project extends Model{
        private static $table = "projects";

        public $id;
        public $name;
        public $description;
        public $create_date;
        public $due_date;

        public static function getAll(){
            $query = "SELECT * FROM ". project::$table;
            $db = new DBConnection();
            $conn = $db->getConnection();
            $results = $conn->query($query);
            $projects = [];

            while($row = mysqli_fetch_object($results)){
                $project = new project();
                $project-> id = $row->id;
                $project->name = $row->name;
                $project->description = $row->description;
                $project->create_date = $row->create_date;
                $project->due_date = $row->due_date;
                
               
                $projects[] = $project;
            }
            return $projects;
        }
        public static function find($id){
            $query = "SELECT * FROM ". project::$table . " where id = $id limit 1;";
            $db = new DBConnection();
            $conn = $db->getConnection();
            $results = $conn->query($query);
            $row = mysqli_fetch_object($results);
            $project = null;
            if(isset($row)){
                $project = new project();
                $project-> id = $row->id;
                $project->name = $row->name;
                $project->description = $row->description;
                $project->create_date = $row->create_date;
                $project->due_date = $row->due_date;
                
            }
            return $project;
        }

        public static function delete($id){
            $query = "DELETE FROM ". project::$table . " where id = $id limit 1;";
            $db = new DBConnection();
            $conn = $db->getConnection();
            $results = $conn->query($query);
            return true;
        }

        public function update(){
            $table = project::$table;

            $query = "
                        UPDATE $table 
                        SET name = '$this->name'
                        WHERE id = $this->id
                    ";
            $db = new DBConnection();
            $conn = $db->getConnection();
            $results = $conn->query($query);
            return true;
        }

        public static function create($project){
            $table = project::$table;

            $query = "
                        INSERT INTO $table (id, name, description, create_date,target_date) values (null, '$project->id', '$project->name','$project->description','$project->create_date','$project->target_date');
                    ";
                    $db = new DBConnection();
                    $conn = $db->getConnection();
                    $results = $conn->query($query);
                    if ($results === true) {
                        return true;
                    } else {
                        return false;
                    }
                }
            
            }

?>