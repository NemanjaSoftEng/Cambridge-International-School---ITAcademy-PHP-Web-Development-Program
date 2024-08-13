<!DOCTYPE html>
<html>
<head>


    <meta charset="UTF-8">
    <meta name="description" content="form">
	<meta name="keywords" content="database,form">
	<meta name="author" content="Nemanja Karapetrovic">
    <link href="src/css/home_page.css" type="text/css" rel="stylesheet">
    <title>Vesti</title>
    
</head>

<body>
    
<h1>Vesti</h1>
<h2>Sajt sa odabranim temama</h2>
<nav>
    <ul>
        <li><a href="home_page.php" target="_self">Glavna strana</a></li>
        <li><a href="#" target="_self">Nauka</a></li>
        <li><a href="#">Religija</a></li>
        <li><a href="#">Da li ste znali?</a></li>
        <li><a href="registration_page.php" target="_self">Napravite novi nalog</a></li>
    </ul>
</nav>
<img id="earth" src="src/gifs/planet-cropped-unscreen-compressed.gif" alt="ERROR">
<p>Dobrodošli na naš sajt. Da biste mogli komentarisati neku vest na sajtu morate
    imati korisnički nalog. Svi mogu čitati vesti, ali samo registrovani korisnici mogu ostavljati komentare.
    Želimo vam ugodan boravak na našem sajtu.
</p><br>

<form name="login_datas" method="post">
    <fieldset>
        <legend>Prijava</legend>
        
        <label>Ime:<br></label>
        <input type="text" name = "name" placeholder="Unesite svoje ime"></input>
        <br>

        <label>Prezime:<br></label>
        <input type="text" name="surname" placeholder="Unesite svoje prezime"></input>
        <br>
        
        <label>Lozinka:<br></label>
        <input type="text" name="password" placeholder="Unesite lozinku"></input>
        <br><br>
        
        <button type="submit" name="login">PRIJAVA</button>
        <br><br>
        
        

    </fieldset>
</form>
<br><br><br>




<body>

<?php
// Start the session
require_once("user.php");
session_start();



if(isset($_POST["name"]) and isset($_POST["surname"]) and isset($_POST["password"])){
    $_SESSION["name"]=$_POST["name"];
    $_SESSION["surname"] = $_POST["surname"];
    $_SESSION["password"] = $_POST["password"];
    $_SESSION["login"] = $_POST["login"];
	//header("Location: home_page_logged.php");
}





if(isset($_POST["name"]) and isset($_POST["surname"]) and isset($_POST["password"])){
    //echo "Poslato ".$_POST["surname"];
    $entered_name=$_POST["name"];
    $entered_surname=$_POST["surname"];
    $entered_password=$_POST["password"];
    $user_for_log_in=new User($entered_name,$entered_surname,$entered_password);
    

    $logged=$user_for_log_in->log_in_new_user($entered_name,$entered_surname,$entered_password);
    if($logged){
        header("Location: home_page_logged.php");
    }
    
}


?>




</body>

</html>