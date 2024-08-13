<?php 

session_start();

?>


<!DOCTYPE html>
<html>
<head>


    <meta charset="UTF-8">
    <meta name="description" content="form">
	<meta name="keywords" content="form, database">
	<meta name="author" content="Nemanja Karapetrovic">
    <link href="src/css/homepage_logged.css" type="text/css" rel="stylesheet">
    <title>Vesti</title>
    
</head>

<body>
    
<h1>Vesti</h1><br>
<p>Zdravo, <?php echo $_SESSION["name"]."<br>";?></p><br>
<h2>Sajt sa odabranim temama</h2><br>
<nav>
    <ul>
        <li><a href="home_page.php" target="_self">Glavna strana</a></li>
        <li><a href="#">Nauka</a></li>
        <li><a href="#">Religija</a></li>
        <li><a href="#">Da li ste znali?</a></li>
        <li><a href="registration_page.php" target="_self">Napravite novi nalog</a></li>
    </ul>
</nav>
<img id="earth" src="src/gifs/planet-cropped-unscreen-compressed.gif" alt="ERROR">
<p>Dobrodošli na naš sajt. Da biste mogli komentarisati neku vest na sajtu morate
    imati korisnički nalog. Svi mogu čitati vesti, ali samo registrovani korisnici mogu ostavljati komentare.
    Želimo vam ugodan boravak na našem sajtu.
</p><br><br><br>




<?php
    require_once("User.php");

    if(isset($_SESSION["login"])){

        echo "<form name='login_datas' method='post'>
                <fieldset>
                    
                    <button type='submit' name='log_out'>ODJAVA</button>
                    
                    
            
                    </fieldset>
                </form>
                <br><br><br>";

    }

    
    
    if(isset($_POST['log_out'])){
        $name=$_SESSION["name"];
        $surname=$_SESSION["surname"];
        $password=$_SESSION["password"];
        User::log_out_user($name,$surname,$password);
    }

    
?>
    




</body>

</html>