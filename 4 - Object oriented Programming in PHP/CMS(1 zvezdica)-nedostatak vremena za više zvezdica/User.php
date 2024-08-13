<?php


class User{
    private $name;
    private $surname;
    private $password;
    private $status;
    private $mysqli;




    public function __construct($name,$surname,$password,$status=2){ //Status 1-admin 2-običan korisnik
        $this->name=$name;
        $this->surname=$surname;
        $this->password=$password;
        $this->status=$status;
        $this->mysqli=null;
        $this->idU=null;
        $this->logged=null;


    }

    public function get_name(){
        //echo "<br>Ime:".$this->name;
        return $this->name;
    }

    public function get_surname(){
        return $this->surname;
    }

    public function get_password(){
        return $this->password;
    }

    public function get_status(){
        //echo "<br>Status:".$this->status;
        return $this->status;
    }

    public function connect(){
        $this->mysqli = new mysqli("localhost:3308", "root", "", "cms");
        if($this->mysqli->connect_error){
            die("Connection failed: ".mysqli_connect_error()."<br>");
        }
        else{
            //echo "Connection is successfl.<br>";
        }
        }
    

    public function close_connection(){
        $this->mysqli->close();
        $this->mysqli=null;
        //echo "<br>Connection is successfuly closed.<br>";
    }

    public function is_logged($name,$surname,$password){
        $this->connect();
        $query = "SELECT logged.idU,name,surname,password FROM users JOIN logged WHERE logged.idU=users.idU AND name='$name' AND surname='$surname' AND password='$password'";
        $stmt = $this->mysqli->real_query($query);
        $stmt_result_storage=$this->mysqli->store_result();
        $stmt_result=$stmt_result_storage->fetch_assoc();
        //var_dump($stmt_result);// ako nema ništa na upitu $stmt_result će biti null
        if($stmt_result!=null){
            //echo "User is online.";
            $this->close_connection();
            return true;
            
        }
        else{
            //echo "User isnot online.";
            $this->close_connection();
            return false;
        }

    }

    public function log_in_new_user($name,$surname,$password){
        if($this->is_logged($name,$surname,$password)){
            echo "<img src='src/pictures/angry_emoji_face-removebg.png' alt='ERROR' style='display:block; margin:auto;'><br>";
            echo "<p style='font-weight:bold; font-size: 50px; color:red; text-align:center;'>Već ste ulogovani!</p><br>";
            return false;
        }
        else{// NOT LOGGED - CONFIRMED
            //is credentials OK - AUTENTIFICATION
            $this->connect();//To can call islogged/registered independently. That are public methods.
            $query = "SELECT name,surname,password FROM users WHERE name='$name' AND surname='$surname' AND password='$password'";
            $stmt = $this->mysqli->real_query($query);
            $stmt_result_storage=$this->mysqli->store_result();
            $stmt_result=$stmt_result_storage->fetch_assoc();
            if($stmt_result!=null){
                $query1 = "SELECT idU FROM users WHERE name='$name' AND surname='$surname' AND password='$password'";
                $stmt = $this->mysqli->real_query($query1);
                $stmt_result_storage=$this->mysqli->store_result();
                $stmt_result=$stmt_result_storage->fetch_assoc();
                //echo "<br>------------------------";
                var_dump($stmt_result);// ako nema ništa na upitu $stmt_result će biti null
                    if($stmt_result==null){
                        echo "---ERROR---";
                        $this->close_connection();
                        return false;
                        
                        
                    }
                    else{
                        //echo "User isnot online.";
                        $idU_new=$stmt_result['idU'];
                        //$this->idU=$idU_new;//Save ID for non query in logging out.
                        //$this->logged=true;//For log out button.
                        //echo $idU_new;
                    
                        $query="INSERT INTO logged(idU) VALUES('$idU_new')";
                        if(!$this->mysqli->real_query($query)){
                            echo $this->mysqli->error."<br>";
                            $this->close_connection();
                            return false;
                        }
                        else{
                            echo "<img src='src/pictures/ok_emoji_face_removebg.png' alt='ERROR' style='display:block; margin:auto;'>";
                            echo "<p style='font-weight:bold; font-size: 50px; color:red; text-align:center;'>Zdravo, drago nam je da ste ponovo na našem sajtu.<br>Dobrodošli na naš sajt!</p>";
                            $this->close_connection();
                            return true;
                        }
                    
            
                    }
        
        }else{
            echo "<p style='font-weight:bold; font-size: 50px; color:red; text-align:center;'>Kredencijali za prijavu nisu dobri.<br>Molimo vas proverite unete podatke.</p><br><br>";
            $this->close_connection();
            return false;
        }

    }
}


    public function is_registered($name,$surname,$password){
        $this->connect();
        $query = "SELECT name,surname,password FROM users WHERE name='$name' AND surname='$surname'";
        $stmt = $this->mysqli->real_query($query);
        $stmt_result_storage=$this->mysqli->store_result();
        $stmt_result=$stmt_result_storage->fetch_assoc();
        echo "<br><br><br><br>";
        //var_dump($stmt_result);// ako nema ništa na upitu $stmt_result će biti null
        if($stmt_result!=null){
            //echo "User was registered in past.";
            $this->close_connection();
            return true;
            
        }
        else{
            //echo "User wasn't registered in past.";
            $this->close_connection();
            return false;
        }

        

    }

    public function register_new_user($name,$surname,$password){
        if($this->is_registered($name,$surname,$password)){
            echo "<img src='src/pictures/angry_emoji_face-removebg.png' alt='ERROR' style='display:block; margin:auto;'>";
            echo "<p style='font-weight:bold; font-size: 50px; color:red; text-align:center;'>Korisnik je već regstrovan.<br> Ne možete kreirati dva naloga!</p>";
        }
        else{
            $this->connect();//To can call islogged/registered independently. That are public methods.
            $query="INSERT INTO users(name,surname,password,status) VALUES('$name','$surname','$password',$this->status)";
            if(!$this->mysqli->real_query($query)){
                echo $this->mysqli->error."<br>";
                $this->close_connection();
            }
            else{
                echo "<img src='src/pictures/ok_emoji_face_removebg.png' alt='ERROR' style='display:block; margin:auto;'>";
                echo "<p style='font-weight:bold; font-size: 50px; color:red; text-align:center;'>Čestitamo, uspešno ste se registrovali.<br> Dobrodošli na naš sajt!</p>";
                $this->close_connection();
            }
        }


    }



    public static function log_out_user($name,$surname,$password){
        
        $mysqli = new mysqli("localhost:3308", "root", "", "cms");
        if($mysqli->connect_error){
            die("Connection failed: ".mysqli_connect_error()."<br>");
        }
        else{
            //echo "Connection is successfl.<br>";
        }
            $idU_query = "SELECT idU FROM users WHERE name='$name' AND surname='$surname' AND password='$password'";
            $stmt = $mysqli->real_query($idU_query);
            $stmt_result_storage=$mysqli->store_result();
            $stmt_result=$stmt_result_storage->fetch_assoc();

            $idU = $stmt_result["idU"];
           
            
            
            
            
            
            $query = "DELETE FROM logged WHERE idU='$idU'";
            //var_dump($stmt_result);// ako nema ništa na upitu $stmt_result će biti null
            if($mysqli->real_query($query)){
                echo "<br><br><p style='font-weight:bold; font-size: 50px; color:red; text-align:center;'>Uspešno ste se odjavili.<br> Nadamo se da vam je bilo korisno i zanimljivo.</p><br><br><br>";
                $mysqli->close();
                return true;
                
            }
            else{
                echo "***************ERROR*************************";
                $mysqli->close();
                return false;
            }


    }
        
        
    

    public function get_logged(){
        return $this->logged;
    }

    public function get_idU(){
        return $this->idU;
    }





}



?>