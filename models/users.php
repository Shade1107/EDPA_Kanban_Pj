<?php
    require_once("models/model.php");
    require_once("models/DatabaseConnection.php");

    class member extends Model{
        private static $table = "users";

        public $id;
        public $name;
        public $email;
        public $password;

        public static function getAll(){
            $query = "SELECT * FROM ". member::$table;
            $db = new DBConnection();
            $conn = $db->getConnection();
            $results = $conn->query($query);
            $members = [];

            while($row = mysqli_fetch_object($results)){
                $member = new member();
                $member-> id = $row->id;
                $member->name = $row->name;
                $member->email = $row->emial;
                $member->password = $row->password;                
               
                $members[] = $member;
            }
            return $members;
        }
        public static function find($id){
            $query = "SELECT * FROM ". member::$table . " where id = $id limit 1;";
            $db = new DBConnection();
            $conn = $db->getConnection();
            $results = $conn->query($query);
            $row = mysqli_fetch_object($results);
            $invoice = null;
            if(isset($row)){
                $member = new member();
                $member-> id = $row->id;
                $member->name = $row->name;
                $member->email = $row->emial;
                $member->password = $row->password;
            }
            return $member;
        }

        public static function delete($id){
            $query = "DELETE FROM ". member::$table . " where id = $id limit 1;";
            $db = new DBConnection();
            $conn = $db->getConnection();
            $results = $conn->query($query);
            return true;
        }

        public function update(){
            $table = member::$table;

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

        public static function create($member){
            $table = member::$table;

            $query = "
                        INSERT INTO $table (id, name, email, password) values (null, '$member->id', '$member->name','$member->email','$member->address','$member->role_id','$member->status');
                    ";
            $db = new DBConnection();
            $conn = $db->getConnection();
            $results = $conn->query($query);
            return true;
        }

    }

?>