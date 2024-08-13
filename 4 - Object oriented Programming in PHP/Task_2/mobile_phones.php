<!DOCTYPE html>
<html>
<head>


    <meta charset="UTF-8">
    <meta name="description" content="mobile phones performances">
	<meta name="keywords" content="mobile,phone,">
	<meta name="author" content="Nemanja Karapetrovic">
    <link href="src_2/css/mobile_phones.css" type="text/css" rel="stylesheet">
    <title>MOBILE PHONES</title>
    
</head>

<body>
 
<br><br><br><br>
<h1>Mobile phones</h1>

<img id="mobiles" src="src_2/gifs/mobile-phones-gif-unscreen.gif" alt="ERROR">
<br><br><br>
<p style="font-size:33px;">Welcome dear users</p><br><br>

<form name="phones_datas" method="post">
    <fieldset>
        <legend>Phones datas</legend>
        
        <label>Manufacturer:<br></label>
        <!--<input type="text" name = "manufacturer" placeholder="Enter manufacturer"></input>-->
        <select name="manufacturer" autofocus>
            <option value="Samsug">Samsung</option>
            <option value="Huawei">Huawei</option>
            <option value="Nokia">Nokia</option>
            <option value="Lenovo">Lenovo</option>
        </select>
        <br><br>

        <label>Model:<br></label>
        <input type="text" name="model" placeholder="Enter model"></input>
        <br>
        
        <label>Price(€):<br></label>
        <input type="number" name="price" placeholder="Enter price"></input>
        <br>

        <label>Year of production:<br></label>
        <input type="number" name="year" placeholder="Enter year of production"></input>
        <br><br>

        <p>Please, first select all models, see specific ID of model which you want to 
            update or delete, enter ID in the filed below, and press appropriate button.
            You can update only price(it's logic). If you enter ID which isnot in database, you will see
            message that phone is successfuly updated or deleted, but in real your request willnot have an effect.</p><br>
        <label>Specific ID for update/delete:<br></label>
        <input type="number" name="specific_id" placeholder="Enter specific ID"></input>
        <br><br>
        
        <button type="submit" name="select">SELECT</button>
        <br><br>
        
        <button type="submit" name="insert">INSERT</button>
        <br><br>

        <button type="submit" name="update">UPDATE</button>
        <br><br>

        <button type="submit" name="delete">DELETE</button>
        <br><br>
        

    </fieldset>
</form>

<body>

<?php
    require_once("MobilePhone.php");

    
    if(isset($_POST['select'])){
        //echo "<br>SELECT<br>";
        $mobile_demo = new MobilePhone();
        $mobile_demo->select();

    }


    if(isset($_POST['insert'])){
        //echo "<br>INSERT<br>";
        $manufacturer = $_POST['manufacturer'];
        $model =  $_POST['model'];
        $price = $_POST['price'];
        $year = $_POST['year'];
        $mobile_for_insert = new MobilePhone($manufacturer,$model,$price,$year);
        $mobile_for_insert->insert($manufacturer,$model,$price,$year);
        //echo "INSERTED: ".$_POST['manufacturer']."<br><br>";

    }

    if(isset($_POST['update'])){
        //echo "<br>UPDATE<br>";
        $specific_id = $_POST['specific_id'];
        $new_price = $_POST['price'];
        $mobile_for_update = new MobilePhone();
        $mobile_for_update->update($specific_id,$new_price);
        //echo "UPDATED ID: ".$_POST['specific_id']."<br>";
        //echo "WITH NEW PRICE: ".$_POST['price']."<br><br>";

    }

    if(isset($_POST['delete'])){
        //echo "<br>DELETE<br>";
        $id_for_delete = $_POST['specific_id'];
        $mobile_for_update = new MobilePhone();
        $mobile_for_update->delete($id_for_delete);
        //echo "Phone whitch ID= ".$_POST['specific_id']."is succesfuly deleted.<br>";

    }


?>




</body>

</html>