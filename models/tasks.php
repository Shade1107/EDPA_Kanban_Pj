<?php
    require_once("model.php");
    require_once("DatabaseConnection.php");

    class task extends Model{
        private static $table = "tasks";

        public $id;
        public $project_id;
        public $stage_id;
        public $short_description;
        public $task_name;

        public static function getAll(){
            $query = "SELECT * FROM ". task::$table;
            $db = new DBConnection();
            $conn = $db->getConnection();
            $results = $conn->query($query);
            $tasks = [];

            while($row = mysqli_fetch_object($results)){
                $task = new task();
                $task-> id = $row->id;
                $task-> project_id = $row->project_id;
                $task->stage_id = $row->stage_id;
                $task->short_description = $row->short_description;
                $task->task_name = $row->task_name;
                
                
               
                $tasks[] = $task;
            }
            return $tasks;
        }
        public static function find($id){
            $query = "SELECT * FROM ". task::$table . " where id = $id limit 1;";
            $db = new DBConnection();
            $conn = $db->getConnection();
            $results = $conn->query($query);
            $row = mysqli_fetch_object($results);
            $invoice = null;
            if(isset($row)){
                $task = new task();
                $task-> id = $row->id;
                $task-> project_id = $row->project_id;
                $task->stage_id = $row->stage_id;
                $task->short_description = $row->short_description;
                $task->detail = $row->detail;
                
            }
            return $task;
        }

        public static function delete($id){
            $query = "DELETE FROM ". task::$table . " where id = $id limit 1;";
            $db = new DBConnection();
            $conn = $db->getConnection();
            $results = $conn->query($query);
            return true;
        }

        public function update(){
            $table = task::$table;

            $query = "
                        UPDATE $table 
                        SET short_description = '$this->short_description'
                        WHERE id = $this->id
                    ";
            $db = new DBConnection();
            $conn = $db->getConnection();
            $results = $conn->query($query);
            return true;
        }

        public static function create($task){
            $table = task::$table;

            $query = "
                        INSERT INTO $table (id, project_id, stage_id,short_description,detail) values (null, '$task->id', '$task->project_id', '$task->stage_id','$task->short_description','$task->detail');
                    ";
            $db = new DBConnection();
            $conn = $db->getConnection();
            $results = $conn->query($query);
            return true;
        }       

    }

?>