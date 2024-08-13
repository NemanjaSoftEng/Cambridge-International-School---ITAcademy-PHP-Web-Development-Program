<?php
    class Connection{
        private $host;
        private $user;
        private $password;
        private $database;
        private $port;
        private $mysqli;
    
        public function __construct($host,$user,$password,$database,$port){
            $this->host = $host;
            $this->user = $user;
            $this->password = $password;
            $this->database = $database;
            $this->port = $port;
            $this->mysqli = null;
        }
    
        public function connect(){
            $this->mysqli = new mysqli($this->host.":".$this->port, $this->user, $this->password, $this->database);
            if($this->mysqli->connect_error){
                die("Connection failed: ".mysqli_connect_error()."<br>");
            }
            else{
                echo "Connection is successfl.<br>";
            }
            
        }
    
        public function close_connection(){
            $this->mysqli->close();
            $this->mysqli=null;
            echo "<br>Connection is successfuly closed.<br>";
        }
    
        public function get_connect_object(){
            if($this->mysqli!=null){
                return $this->mysqli;
            }
            else{
                echo "ERROR<br>";
            }
        }
    
    }
?>