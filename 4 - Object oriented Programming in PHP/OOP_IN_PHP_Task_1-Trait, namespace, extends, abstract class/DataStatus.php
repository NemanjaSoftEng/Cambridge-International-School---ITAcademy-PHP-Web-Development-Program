<?php



require_once("AbstractReturn.php");
require_once("trait.php");

class DataStatus extends AbstractReturn{
    use NeverNuclearStrike\user_methods;

    private $host;
    private $user;
    private $password;
    private $database;
    private $port;
    private $mysqli;

    public function __construct(){

        //---
        $this->mysqli=null;

    }


    public function connect(){
        $this->mysqli = new mysqli("localhost:3308", "root", "", "nuclear_weapons");
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

    public function select_datas($id){

        $stmt = $this->mysqli->real_query("SELECT * FROM nuclear_missiles WHERE id=$id");
        if(!$stmt){
            echo $this->mysqli->error."<br>";
        }
        else{
            echo "Query is successfuly executed.<br>";
        }

        $stmt_result_storage = $this->mysqli->store_result();
        $stmt_result = $stmt_result_storage->fetch_assoc();
        //echo $stmt_result['id'];
        $comment=$stmt_result['comment'];

        echo "<br>--------------------------- NUCLEAR MISSILE NO $id ------------------------------".
             "<br>------------------ TECHNICAL DATAS FROM DATABASE---------------------<br>".
             "<b>ID: </b>".$stmt_result['id']."<br>".
             "<b>Name: </b>".$stmt_result['name']."<br>".
             "<b>Type: </b>".$stmt_result['type']."<br>".
             "<b>Mass: </b>".$stmt_result['mass']."t<br>".
             "<b>Length: </b>".$stmt_result['length']."m<br>".
             "<b>Diameter: </b>".$stmt_result['diameter']."m<br>".
             "<b>Blast yield: </b>".$stmt_result['blast_yield']."<br>".
             "<b>Operational range: </b>".$stmt_result['operational_range']."<br>".
             "<b>In service: </b>".$stmt_result['in_service']."<br>".
             "<b>Used by: </b>".$stmt_result['used_by']."<br>".
             "<b>Designer: </b>".$stmt_result['designer']."<br>".
             "<b>Country: </b>".$stmt_result['country']."<br>".
             "<b>Commander in chief: </b>".$stmt_result['commander_in_chief']."<br>".
             "<b>Comment: </b>"."<p style='border: solid black 3px; text-align:justify; background-color: yellow;'>$comment</p>"."<hr>";

        

        

    

    }

    public function return_other_datas(){
        echo "This is implementing of method from superclass of DataSatus class(abstract class).";
    }

    

 
}

?>