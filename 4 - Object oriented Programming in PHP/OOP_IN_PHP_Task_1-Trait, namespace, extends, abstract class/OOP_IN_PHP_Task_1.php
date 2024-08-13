<?php


require_once("NuclearMissile.php");


echo "<title style='text-transform:uppercase;'>Never nuclear war</title><h1 style='text-align: center; text-transform:uppercase; color:red; font-weight:bold;'>Never nuclear war</h1>";

$power_explode_unit = "What is a measure of the strength of an explosion? It's not standard SI unit. It's comparison with
explosion of TNT but in appropriate count. For example nuclear explosion of just one MIRV nuclear warehead from RS-28 Sarmat has
strength of 750 kt(kt-kilotones). It means that this one explosion is eqvivalent to explode 750000 tones of TNT(750000000kg). For example: bomb which dropped on Hisoshima
had only 15kt and it was small bomb. One MIRV nuclear warehead from RS-28 Sarmat is 50 times stronger than bomb from Hiroshima.
Now, you can understand how dangerous nuclear weapons are(RS-28 Sarmat can take 15 MIRV nuclear wareheads). God forbid it is ever use.";

echo "<p style='color:yellow; font-weght:bold; font-size: 30; text-transform:uppercase; border: solid black 3px; text-align:justify; background-color: red;'>$power_explode_unit</p>"."<hr>";

$hwasong_18_comm="The Hwasong-18 ICBM is a developmental, solid-fueled ICBM that is considered North Korea's most powerful weapon. Its built-in solid propellant makes launches harder for outsiders to detect than liquid-fueled missiles, which must be fueled before liftoffs.";

$hwasong_18 = new NuclearMissile(6,"Hwasong-18","Intercontinental balistic missile(ICBM)","55-60","25","2","unknown","15000km",
                                "2023-present","Korean People's Army Strategic Force","unknown","Democratic People's Republic of Korea",
                            "Kim Jong Un",$hwasong_18_comm);



$hwasong_18->toString();
$hwasong_18->connect();
for($i=1;$i<6;$i++){
    $hwasong_18->select_datas($i);
}

$hwasong_18->return_author_datas();
$hwasong_18->return_message();
$hwasong_18->return_other_datas();
$hwasong_18->close_connection();
?>