<?php
    require_once("model.php");
    require_once("DatabaseConnection.php");

    class project_member extends Model{
        private static $table = "project_members";

        public $id;
        public $user_id;
        public $project_id;


        public static function getAll(){
            $query = "SELECT * FROM ". project_member::$table;
            $db = new DBConnection();
            $conn = $db->getConnection();
            $results = $conn->query($query);
            $project_members = [];

            while($row = mysqli_fetch_object($results)){
                $project_member = new project_member();
                $project_member-> id = $row->id;
                $project_member-> user_id = $row->user_id;
                $project_member-> project_id = $row->project_id;            
                
               
                $project_members[] = $project_member;
            }
            return $project_members;
        }
        public static function find($id){
            $query = "SELECT * FROM ". project_member::$table . " where id = $id limit 1;";
            $db = new DBConnection();
            $conn = $db->getConnection();
            $results = $conn->query($query);
            $row = mysqli_fetch_object($results);
            $invoice = null;
            if(isset($row)){
                $project_member = new project_member();
                $project_member-> id = $row->id;
                $project_member-> user_id = $row->user_id;
                $project_member-> project_id = $row->project_id;
            }
            return $project_member;
        }

        public static function delete($id){
            $query = "DELETE FROM ". project_member::$table . " where id = $id limit 1;";
            $db = new DBConnection();
            $conn = $db->getConnection();
            $results = $conn->query($query);
            return true;
        }

        public function update(){
            $table = project_member::$table;

            $query = "
                        UPDATE $table 
                        SET project_id = '$this->project_id'
                        WHERE id = $this->id
                    ";
            $db = new DBConnection();
            $conn = $db->getConnection();
            $results = $conn->query($query);
            return true;
        }

        public static function create($project_member){
            $table = project_member::$table;

            $query = "
            INSERT INTO $table (id, user_id, project_id) values (null, '$project_member->id','$project_member->user_id', '$project_member->project_id');
                    ";
            $db = new DBConnection();
            $conn = $db->getConnection();
            $results = $conn->query($query);
            return true;
        }

    }

?>