<?php
    require_once("models/model.php");
    require_once("DatabaseConnection.php");

    class stage extends Model{
        private static $table = "stages";

        public $id;
        public $project_id;
        public $name;

        public static function getAll(){
            $query = "SELECT * FROM ". stage::$table;
            $db = new DBConnection();
            $conn = $db->getConnection();
            $results = $conn->query($query);
            $stages = [];

            while($row = mysqli_fetch_object($results)){
                $stage = new stage();
                $stage-> id = $row->id;
                $stage-> project_id = $row->project_id;
                $stage->name = $row->name;
                
                
               
                $stages[] = $stage;
            }
            return $stages;
        }
        public static function find($id){
            $query = "SELECT * FROM ". stage::$table . " where id = $id limit 1;";
            $db = new DBConnection();
            $conn = $db->getConnection();
            $results = $conn->query($query);
            $row = mysqli_fetch_object($results);
            $invoice = null;
            if(isset($row)){
                $stage = new stage();
                $stage-> id = $row->id;
                $stage-> project_id = $row->project_id;
                $stage->name = $row->name;
                
            }
            return $stage;
        }

        public static function delete($id){
            $query = "DELETE FROM ". stage::$table . " where id = $id limit 1;";
            $db = new DBConnection();
            $conn = $db->getConnection();
            $results = $conn->query($query);
            return true;
        }

        public function update(){
            $table = stage::$table;

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

        public static function create($stage){
            $table = stage::$table;

            $query = "
                        INSERT INTO $table (id, project_id, name) values (null, '$stage->id', '$stage->project_id', '$stage->name');
                    ";
            $db = new DBConnection();
            $conn = $db->getConnection();
            $results = $conn->query($query);
            return true;
        }

    }

?>