<?php
    require_once("models/model.php");
    require_once("models/DatabaseConnection.php");
    
    class task_history extends Model{
        private static $table = "tasks_history";

        public $id;
        public $task_id;
        public $project_id;
        public $stage_id;
        public $member_id;
        public $short_description;
        public $detail;

        public static function getAll(){
            $query = "SELECT * FROM ". task_history::$table;
            $db = new DBConnection();
            $conn = $db->getConnection();
            $results = $conn->query($query);
            $tasks = [];

            while($row = mysqli_fetch_object($results)){
                $task = new task_history();
                $task-> id = $row->id;
                $task-> task_id = $row->task_id;
                $task-> project_id = $row->project_id;
                $task->stage_id = $row->stage_id;
                $task->member_id = $row->member_id;
                $task->short_description = $row->short_description;
                $task->detail = $row->detail;
                
                
               
                $tasks[] = $task;
            }
            return $tasks;
        }
        public static function find($id){
            $query = "SELECT * FROM ". task_history::$table . " where id = $id limit 1;";
            $db = new DBConnection();
            $conn = $db->getConnection();
            $results = $conn->query($query);
            $row = mysqli_fetch_object($results);
            $invoice = null;
            if(isset($row)){
                $task = new task_history();
                $task-> id = $row->id;
                $task-> task_id = $row->task_id;
                $task-> project_id = $row->project_id;
                $task->stage_id = $row->stage_id;
                $task->member_id = $row->member_id;
                $task->short_description = $row->short_description;
                $task->detail = $row->detail;
                
            }
            return $task;
        }

        public static function delete($id){
            $query = "DELETE FROM ". task_history::$table . " where id = $id limit 1;";
            $db = new DBConnection();
            $conn = $db->getConnection();
            $results = $conn->query($query);
            return true;
        }

        public function update(){
            $table = task_history::$table;

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
            $table = task_history::$table;

            $query = "
                        INSERT INTO $table (id, task_id, project_id, stage_id,member_id,short_description,detail) values (null, '$task->id', '$task->task_id', '$task->project_id', '$task->stage_id','$task->member_id','$task->short_description','$task->detail');
                    ";
            $db = new DBConnection();
            $conn = $db->getConnection();
            $results = $conn->query($query);
            return true;
        }

    }

?>