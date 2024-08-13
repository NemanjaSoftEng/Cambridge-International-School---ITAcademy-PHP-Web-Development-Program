<!DOCTYPE html>
<html>
   
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Web Security and Cryptography - SQL injection and XSS prevent">
	<meta name="keywords" content="form, login">
	<meta name="author" content="Nemanja Karapetrovic">
    <title>Form</title>

    <style>
        body {
            /*CSS Gradient using analagous colors for named color Lapis lazuli (hex code #26619C)*/
            /* Background Gradient for Analagous Colors */

            /**Lapis lazuli (Byzantine blue) is the color used to paint the interior of Studenica monastery.
             A kilogram of stone from a mine in Afghanistan, from which this color is obtained, 
             Saint Sava costed a kilogram of gold. */

			background-color: #269C9C;
            /* For WebKit (Safari, Chrome, etc) */
            background: #269C9C -webkit-gradient(linear, left top, left bottom, from(#264D9C), to(#269C9C)) no-repeat;
            /* Mozilla,Firefox/Gecko */
            background: #269C9C -moz-linear-gradient(top, #264D9C, #269C9C) no-repeat;
            /* IE 5.5 - 7 */
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#264D9C, endColorstr=#269C9C) no-repeat;
            /* IE 8 */
            -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#264D9C, endColorstr=#264D9C)" no-repeat;
		}
    </style>
        
    <script>
        document.write("<h1 style='color:yellow; text-shadow: red 3px 3px; text-align: center;'>Welcome to the form safe from SQL injection and XSS attaks</h1>")
    </script>
    
</head>

<body>

<form name="login_datas" method="post">
    <fieldset>
        <legend>Log in</legend>
            
        <label>Username:<br></label>
        <input type="text" name = "username" placeholder="Enter your username"></input>
        <br><br>
            
        <label>Password:<br></label>
        <input type="text" name="password" placeholder="Enter your password"></input>
        <br><br>
            
        <button type="submit" name="login">Log in</button>          
    </fieldset>
</form>


<?php


    if(isset($_POST['username']) and isset($_POST['password']) and isset($_POST['login'])){

        $entered_username = $_POST['username'];
        $entered_password = $_POST['password'];
        $entered_username_len = strlen($entered_username);

        //Check username length
        if($entered_username_len<8 or $entered_username_len>20){
            echo "ERROR: Username length must be from 8 to 20 characters.";
            exit(1);
        }

        //Check digits in username
        for($i=0; $i<$entered_username_len; $i++){
            if(is_numeric(substr($entered_username,$i,$i+1))){
                echo "ERROR: Username mustn't have any number(s).";
                exit(1);
            }
        }

        //Check specilal characters in username
        $is_special = preg_match("/[^\w\-_]/ ", $entered_username);
        if($is_special){
            echo "ERROR: Username mustn't have any special character(s).";
            exit(1);
        }

        echo "<br>Username is correct.<br>" . "Entered username: " . $entered_username . "<br>";


        //Check password
        $mysqli = new mysqli("localhost:3308","root","","mysql");//Default database in phpMyAdmin.

        // Check connection
        if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
        }

        //Resistance of bad passwords
        $safe_password = mysqli_real_escape_string($mysqli,$entered_password);
        $safe_password = addcslashes($entered_password,'_!"#$%&/()=?*-+~{}[]');
        $safe_password = strip_tags($entered_password);

        
        echo "<br>"."Safe password: " . $safe_password . "<br>";

        
        file_put_contents('myfile.json', json_encode(array(
            'username' => $entered_username,
            'password_hash' => md5($entered_password)
        )));

    }


?>



</body>


</html>