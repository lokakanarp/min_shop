<?php

function even_day_odd_week() { //Avgör om det är en jämn dag, udda vecka, mellan kl 13-17.
   if(date("W") % 2 != 0 && date("j") % 2 == 0 && date("H") >= 11 && date("H") <= 17){
     return true;
   }
}
function swedish_date(){ //Ger dag, datum, månad, vecka och klockslag.
    //setlocale(LC_ALL,"sv_SE");  //Ger svenska veckodagar och månader.
     echo "<p class='datum'>" . strftime("%A %B %e") . "</p>
          <p class='datum'>Week " . date("W") . "</p>
          <p class='datum'>Time: " . date("H") . ":" . date("i") . "</p>";
}
function rea_bild(){
    echo "<img src='images/image_rea.jpg'>";
}

?>
