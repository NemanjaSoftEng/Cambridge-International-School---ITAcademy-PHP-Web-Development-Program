<?php


require_once("Connection.php");
require_once("User.php");



$conn = new Connection("localhost","root","","my_database","3308");
echo $conn->connect()."<br>";
$user_person = new User("7","Nemanja","Karapetrović","nemanjakarapetrovic@gmail.com","123-456-789","1995-01-27","3",$conn);
$user_person->get_all_datas();
$user_person->get_full_name();
$user_person->get_email();
$user_person->get_id();
$user_person->get_some_info("birthday");
$user_person->is_adult();
$birthday = date_create('1995-01-27');
$user_person->insert_new_user("Nemanja","Karapetrović","nemanjakarapetrovic@gmail.com","123-456-789","1995-01-27","3");
//Odkomentarišite sledeće linije kako bi mogli proveriti promene. Namerno je zakomentarisano da bi se bolje pratilo.
//$user_person->change_datas(1,"first_name","Nikola");
//$user_person->change_status(1,3);


$conn->close_connection();

?>