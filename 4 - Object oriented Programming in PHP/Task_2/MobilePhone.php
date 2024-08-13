<?php

class MobilePhone{
    private $manufacturer;
    private $model;
    private $price;
    private $year;
    private $mysqli;


    public function __construct($manufacturer=0,$model=0,$price=0,$year=0){
        $this->manufacturer=$manufacturer;
        $this->model=$model;
        $this->price=$price;
        $this->year=$year;
        $this->mysqli=null;
        //echo "Napravljen";

    }

    public function get_manufacturer(){
        return $this->manufacturer;
    }

    public function get_model(){
        return $this->model;
    }

    public function get_price(){
        return $this->price;
    }

    public function get_year(){
        return $this->year;
    }

    public function connect(){
        $this->mysqli = new mysqli("localhost:3308", "root", "", "mobile_phones");
        if($this->mysqli->connect_error){
            die("Connection failed: ".mysqli_connect_error()."<br>");
        }
        else{
            echo "Connection is successfl.<br><br>";
        }
        }
    
    public function close_connection(){
        $this->mysqli->close();
        $this->mysqli=null;
        echo "<br>Connection is successfuly closed.<br>";
    }

    public function select(){
        $this->connect();
        $stmt = $this->mysqli->real_query("SELECT idP,manufacturer,model,price,year FROM phones JOIN manufacturers USING(idP) ORDER BY idP");
        if(!$stmt){
            echo $this->mysqli->error."<br>";
        }
        else{
            echo "Query is successfuly executed.<br>";
        }

        $stmt_result_storage = $this->mysqli->store_result();
        $help_array=array('idP','manufacturer','model','price','year');
        while($mobile = $stmt_result_storage->fetch_assoc()) {
            //print_r($mobile);
            for($i=0; $i<=4; $i++){
        
                if($i==0) echo "<br>ID: ".$mobile[$help_array[$i]]."<br>";
                if($i==1) echo "Manufacturer: ".$mobile[$help_array[$i]]."<br>";
                if($i==2) echo "Model: ".$mobile[$help_array[$i]]."<br>";
                if($i==3) echo "Price: ".$mobile[$help_array[$i]]."<br>";
                if($i==4) echo "Year of production: ".$mobile[$help_array[$i]]."."."<br>";
        
            }
            }
            
        /*$stmt_result = $stmt_result_storage->fetch_assoc();
        //echo $stmt_result['model']."<br>";
        //echo count($stmt_result['manufacturer'])."<br>";

        $help_array=array('idP','manufacturer','model','price','year');
        /*for($i=0; $i<=4; $i++){
            echo $stmt_result[$help_array[$i]]."<br>";
            
        }*/

        $this->close_connection();                  
    }

    public function insert($manufacturer,$model,$price,$year){
        $this->connect();
        $stmt = "INSERT INTO phones(model,price,year) VALUES('$model','$price','$year')";
        $stmt2 = "INSERT INTO manufacturers(manufacturer) VALUES('$manufacturer')";

        if(!$this->mysqli->real_query($stmt) or !$this->mysqli->real_query($stmt2)){
            echo $this->mysqli->error."<br>";
        }
        else echo "<p style='font-size: 24px;
        font-weight:bold;
        border: solid 3px red;
        background-color: yellow;
        text-transform: uppercase;
        text-align: center;'>Phone is successfuly inserted.</p>";
        
        $this->close_connection();

    }



    public function update($specific_id,$new_price){

        $this->connect();
        $stmt = "UPDATE phones SET price = '$new_price' WHERE idP='$specific_id'";
        

        if(!$this->mysqli->real_query($stmt)){
            echo $this->mysqli->error."<br>";
        }
        else echo "<p style='font-size: 24px;
        font-weight:bold;
        border: solid 3px red;
        background-color: yellow;
        text-transform: uppercase;
        text-align: center;'>Phone is successfuly updated.</p>";
        
        $this->close_connection();
        
    }

    public function delete($specific_id){

        $this->connect();
        $stmt = "DELETE FROM phones WHERE idP='$specific_id'";//CASCADE - WILL BE DELETED APPRICHIATED MANUFACTURER
        

        if(!$this->mysqli->real_query($stmt)){
            echo $this->mysqli->error."<br>";
        }
        else echo "<p style='font-size: 24px;
        font-weight:bold;
        border: solid 3px red;
        background-color: yellow;
        text-transform: uppercase;
        text-align: center;'>Phone is successfuly deleted.</p>";
        
        $this->close_connection();


        
    }








}


?>