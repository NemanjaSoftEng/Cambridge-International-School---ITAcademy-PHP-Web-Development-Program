<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
    <meta name="description" content="form">
	<meta name="keywords" content="database, form">
	<meta name="author" content="Nemanja Karapetrovic">
    <link href="src/css/registration_page.css" type="text/css" rel="stylesheet">
    <title>Registracija</title>
    
<head>
</head>

<body>
    
<h1>Vesti</h1>
<h2>Sajt sa odabranim temama</h2>
<h3>Dobrodošli na stranu za registraciju</h3>


<nav>
    <ul>
        <li><a href="home_page.php" target="_self">Glavna strana</a></li>
        <li><a href="#">Nauka</a></li>
        <li><a href="#">Religija</a></li>
        <li><a href="#">Da li ste znali?</a></li>
        <li><a href="registration_page.php" target="_self">Napravite novi nalog</a></li>
    </ul>
</nav>

<div>
        <p style='text-align:center; font-weight:bold;'>MISAO DANA</p>
            <p style='text-align:center; font-weight:bold;'><i>„Kad bi drvo cigarete pušilo, brzo bi se kao slamka osušilo.“<br>     
            „Kad bi drvo alkohola trošilo i kao ološ brzo bi ološilo.“<br>
            „Kad bi drvo po krčmama bazalo, srce bi mu drveno otkazalo.“</i><br>
        <p style='text-align:center; font-weight:bold;'><i>- Stihovi iz pesme za decu inspektora Blaže<a href="https://www.youtube.com/watch?v=h-6DYQPeuYM" target="_blank" >„Kad bi drvo“.</a></i></p>
        </p><br>
</div>


<img id="earth" src="src/pictures/planet-cropped-removedbg.png" alt="ERROR">
<p id="notification">Dobrodošli na naš sajt. Da biste mogli komentarisati neku vest na sajtu morate
    imati korisnički nalog. Svi mogu čitati vesti, ali samo registrovani korisnici mogu ostavljati komentare.
    Želimo vam ugodan boravak na našem sajtu.
</p>

<form name="registration_datas" method="post">
    <fieldset>
        <legend>Registracija</legend>
            
        <label>Ime:<br></label>
        <input type="text" name = "name" placeholder="Unesite svoje ime"></input>
        <br>
            
        <label>Prezime:<br></label>
        <input type="text" name="surname" placeholder="Unesite svoje prezime"></input>
        <br>
            
        <label>Lozinka:<br></label>
        <input type="text" name="password" placeholder="[8-50] karaktera"></input>
        <br><br>
            
        <button type="submit" name="register">REGISTRACIJA</button>          
    </fieldset>
</form>


<?php
    require_once("User.php");

    if(isset($_POST['name']) and isset($_POST['surname']) and isset($_POST['password']) and isset($_POST['register'])){
        //echo "Poslato ".$_POST['surname'];
        $entered_name=$_POST['name'];
        $entered_surname=$_POST['surname'];
        $entered_password=$_POST['password'];
        if($entered_name!="" and $entered_surname!="" and $entered_password!="" and strlen($entered_password)>=8 and strlen($entered_password)<=50){ 
            $user_for_registration = new User($entered_name,$entered_surname,$entered_password);
            //Same user(credentials) can't be registered two times. Program has protection of this.
            $user_for_registration->register_new_user($entered_name,$entered_surname,$entered_password);
        }else{
            echo "<p style='font-weight:bold; font-size: 50px; color:red; text-align:center;'>Uneti podaci nisu validni.<br>Molimo vas pokušajte ponovo!</p>";
        }
        


    }





?>



</body>


</html>