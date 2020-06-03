<?php

function even_day_odd_week() { //determine whether it is a even date, odd week, between 11-17.
   if(date("W") % 2 != 0 && date("j") % 2 == 0 && date("H") >= 11 && date("H") <= 17){
     return true;
   }
}
function swedish_date() {
  //setlocale(LC_ALL,"sv_SE");  //Month in Swedish
  $day = date("l");
  $currentMonth = date("F");

  $weekdays = array("Monday" => "Måndagen",
  "Tuesday" => "Tisdagen",
  "Wednesday" => "Onsdagen",
  "Thursday" => "Torsdagen",
  "Friday" => "Fredagen",
  "Saturday" => "Lördagen",
  "Sunday" => "Söndagen"
  );

  $months = array(
    "January" => "Januari",
    "February" => "Februari",
    "March" => "Mars",
    "April" => "April",
    "May" => "Maj",
    "June" => "Juni",
    "July" => "Juli",
    "August" => "Augusti",
    "September" => "September",
    "October" => "Oktober",
    "November" => "November",
    "December" => "December"
  );
  $swedishWeekday = $weekdays[$day];
  $swedishmonth = $months[$currentMonth];
 echo "<p class='datum'>$swedishWeekday den " . strftime("%e") . " $swedishmonth</p>
      <p class='datum'>Vecka " . date("W") . "</p>
      <p class='datum'>Klockan " . date("H") . ":" . date("i") . "</p>";
}
function rea_bild(){
    echo "<img src='images/image_rea.jpg'>";
}

?>
