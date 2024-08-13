<?php
namespace NeverNuclearStrike;

trait user_methods{
    public function return_author_datas(){

        echo "<p style='border: dashed 3px red; background-color:lightblue;';><b>AUTHOR DATAS</b><br><b>Name: </b>Nemanja<br>
        <b>Surname: </b>Karapetrović<br>
        <b>Course: </b>OOP_IN_PHP</p>";

    }

    public function return_message(){
        echo "<p style='font-size:30; font-weight: bold; background-color:red;color:yellow; border: dotted 9px cyan;'>
        Please, see listed datas carefuly. That are relevant datas. If you want, you can learn something new by using this scripts
        and google after that(I suggest the great expert dr Momčilo Milinović from whom I learned many things. -> youtube.), but
        it depends only of you. Thank you for using this scripts.</p>";
    }


    
}


?>