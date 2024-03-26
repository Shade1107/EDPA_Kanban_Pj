<?php
    require_once("models/model.php");
    require_once("models/DatabaseConnection.php");

    class role extends Model{
        private static $table = "roles";

        public $id;
        public $name;

        public static function getAll(){
            $query = "SELECT * FROM ". role::$table;
            $db = new DBConnection();
            $conn = $db->getConnection();
            $results = $conn->query($query);
            $roles = [];

            while($row = mysqli_fetch_object($results)){
                $role = new role();
                $role-> id = $row->id;
                $role->name = $row->name;
                
                
               
                $roles[] = $role;
            }
            return $roles;
        }
        public static function find($id){
            $query = "SELECT * FROM ". role::$table . " where id = $id limit 1;";
            $db = new DBConnection();
            $conn = $db->getConnection();
            $results = $conn->query($query);
            $row = mysqli_fetch_object($results);
            $invoice = null;
            if(isset($row)){
                $role = new role();
                $role-> id = $row->id;
                $role->name = $row->name;
                
            }
            return $role;
        }

        public static function delete($id){
            $query = "DELETE FROM ". role::$table . " where id = $id limit 1;";
            $db = new DBConnection();
            $conn = $db->getConnection();
            $results = $conn->query($query);
            return true;
        }

        public function update(){
            $table = role::$table;

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

        public static function create($role){
            $table = role::$table;

            $query = "
                        INSERT INTO $table (id, name) values (null, '$role->id', '$role->name');
                    ";
            $db = new DBConnection();
            $conn = $db->getConnection();
            $results = $conn->query($query);
            return true;
        }

    }

?>