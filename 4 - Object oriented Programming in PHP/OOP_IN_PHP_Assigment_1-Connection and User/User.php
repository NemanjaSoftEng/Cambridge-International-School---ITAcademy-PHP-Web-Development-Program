<?php
class User{

    private $id;
    private $first_name;
    private $last_name;
    private $email;
    private $password;
    private $birthday;
    private $status;
    private $mysqli;

    public function __construct($id,$first_name,$last_name,$email,$password,$birthday,$status,$conn){
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = $password;
        $this->birthday = $birthday;
        $this->status = $status;
        $this->mysqli = $conn->get_connect_object();

    }

    public function get_all_datas(){
        echo "ID: ".$this->id."<br>".
            "First name: ".$this->first_name."<br>".
            "Last name: ".$this->last_name."<br>".
            "E-mail: ".$this->email."<br>".
            "Password: ".$this->password."<br>".
            "Birthday: ".$this->birthday."<br>".
            "Status: ".$this->status."<br><br>";
    }

    public function get_full_name(){
        echo "Full name: ".$this->first_name." ".$this->last_name."<br>";
    }

    public function get_email(){
        echo "E-mail: ".$this->email."<br>";
    }

    public function get_id(){
        echo "ID: ".$this->id."<br>";
    }

    public function get_some_info($info){
        echo "Requested data: [$info] -> ".$this->$info."<br>";

    }
    
    public function is_adult(){
        $date1=date_create($this->birthday);
        $date2=date_create(date("Y-m-d"));
        $diff=date_diff($date1,$date2);
        $years = (int)$diff->format("%Y");
        if($years>=18){
            echo "User is ".$years." years old. User is adult.<br>";
            return true;
        }
        else{
            echo "User is ".$years." years old. User isn't adult.<br>";
            return false;
        }
        
    }

    public function insert_new_user($first_name,$last_name,$email,$password,$birthday,$status){
        //$date=(DATE)date_create($birthday);
        $stmt = "INSERT INTO users_datas(first_name,last_name,email,password,birthday,status) 
        VALUES('$first_name','$last_name','$email','$password',$birthday,$status)";

        if(!$this->mysqli->real_query($stmt)){
            echo $this->mysqli->error."<br>";
        }
        else echo "User is successfuly inserted.";


    }

/*radi   $stmt = $this->mysqli->real_query("SELECT * FROM users_datas");
            $stmt_result_storage = $this->mysqli->store_result();
            $stmt_result = $stmt_result_storage->fetch_assoc();
            echo $stmt_result['id'];*/

    public function change_datas($id,$data_type,$value){
        if(!$this->mysqli->real_query("UPDATE users_datas SET $data_type='$value' WHERE id=$id")){
            echo $this->mysqli->error."<br>";
        }
        else echo "User's data is successfuly changed.<br>";

    }

    public function change_status($id,$new_status){
        if(!$this->mysqli->real_query("UPDATE users_datas SET status='$new_status' WHERE id=$id")){
            echo $this->mysqli->error."<br>";
        }
        else echo "User's status is successfuly changed.<br>";

    }

}
?>