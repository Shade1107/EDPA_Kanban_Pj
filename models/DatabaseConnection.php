<?php
        $db=mysqli_connect('localhost','root','','kanban');

   
   class DBConnection{
        private $server = "localhost";
        private $user = "root";
        private $password = "";
        private $db = "kanban";
        

        function getConnection(){
            $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
            return $conn;
        }
   }
?>