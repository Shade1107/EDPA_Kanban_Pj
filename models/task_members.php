<?php
    require_once("models/model.php");
    require_once("models/DatabaseConnection.php");

    class task_member extends Model{
        private static $table = "task_members";

        public $id;
        public $member_id;
        public $task_id;

        public static function getAll(){
            $query = "SELECT * FROM ". task_member::$table;
            $db = new DBConnection();
            $conn = $db->getConnection();
            $results = $conn->query($query);
            $task_members = [];

            while($row = mysqli_fetch_object($results)){
                $task_member = new task_member();
                $task_member-> id = $row->id;
                $task_member-> member_id = $row->member_id;
                $task_member-> task_id = $row->task_id;          

                $task_members[] = $task_member;
            }
            return $task_members;
        }
        public static function find($id){
            $query = "SELECT * FROM ". task_member::$table . " where id = $id limit 1;";
            $db = new DBConnection();
            $conn = $db->getConnection();
            $results = $conn->query($query);
            $row = mysqli_fetch_object($results);
            $invoice = null;
            if(isset($row)){
                $task_member = new task_member();
                $task_member-> id = $row->id;
                $task_member-> member_id = $row->member_id;
                $task_member-> task_id = $row->task_id;
            }
            return $task_member;
        }

        public static function delete($id){
            $query = "DELETE FROM ". task_member::$table . " where id = $id limit 1;";
            $db = new DBConnection();
            $conn = $db->getConnection();
            $results = $conn->query($query);
            return true;
        }

        public function update(){
            $table = task_member::$table;

            $query = "
                        UPDATE $table 
                        SET task_id = '$this->task_id'
                        WHERE id = $this->id
                    ";
            $db = new DBConnection();
            $conn = $db->getConnection();
            $results = $conn->query($query);
            return true;
        }

        public static function create($task_member){
            $table = task_member::$table;

            $query = "
                        INSERT INTO $table (id, member_id, task_id) values (null, '$task_member->id','$task_member->member_id', '$task_member->task_id');
                    ";
            $db = new DBConnection();
            $conn = $db->getConnection();
            $results = $conn->query($query);
            return true;
        }

    }

?>