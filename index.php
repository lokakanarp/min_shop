<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shoppa</title>
      <!-- Bootstrap-stuff -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Karla|Lobster" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <header>
         <div class="box_wrapper header">
          <div class="header_inside_wrap">
          <div>
            <a href="index.php"><h1>Shoppa.nu</h1></a>
          </div>
          <div>
              <?php
                $day = date("l");   //Day of the week.
                include('functions.php');
                include('products.php'); //Product array
                swedish_date();
               ?>
          </div>
        </div>
      </div>
    </header>
   <main>
   <div class='container main_container'>
            <div class="box_order">
                <h3>Missa inte höstens erbjudanden. Nya priser nästan varje dag.</h3>
                <?php
                if(even_day_odd_week() == true){
                   echo "<p class='bestall_nu'>
                   Beställ nu! Varorna levereras redan imorgon och du får 5% rabatt på hela beställningen!
                   </p>";
                }
                ?>
            </div>
        <form action="form.php" method="POST">
          <div class="products">
             <?php
            for ($row = 0; $row < 4; $row++) {
                echo "<div class='product'>";
                echo "<img src='images/image$row.jpg'>";
                echo "<h4>" . $products[$row]["name"] . "</h4><br />
                    Färg: " . $products[$row]["color"] . "<br />";
                if ($day == 'Monday'){
                   $reapris_monday = $products[$row]["price"] / 2;
                    rea_bild();
                    echo "<p class='pris'>$reapris_monday kr</p><br />";
                    }
					      else if ($day == 'Wednesday'){
                   $hojt_pris_wednesday = $products[$row]["price"] * 1.1;
                    echo "<p class='pris'>$hojt_pris_wednesday kr</p><br />";
                   } else if ($day == 'Friday' && $products[$row]["price"] > 200){
                    $reapris_friday = $products[$row]["price"] - 20;
                    rea_bild();
                    echo "<p class='pris'>$reapris_friday kr</p><br />";

                } else {
					             echo "<p class='pris'>" .$products[$row]["price"] . " kr</p><br />"; }
                       echo '<input type="number" placeholder="Välj antal" name="antal[]" />';
                       echo '<input type="hidden" name="name[]" value="'. $products[$row]["name"].'" />';
                       if ($day == 'Monday'){
                         echo '<input type="hidden" name="price[]" value="'. $reapris_monday .'" />';}
                       else if ($day == 'Wednesday'){
                        echo '<input type="hidden" name="price[]" value="'. $hojt_pris_wednesday .'" />';}
                       else if ($day == 'Friday' && $products[$row]["price"] > 200){
                        echo '<input type="hidden" name="price[]" value="'. $reapris_friday .'" />';
                       } else{
                         echo '<input type="hidden" name="price[]" value="'. $products[$row]["price"].'" />'; }
                         echo '</div>';
                  }
                ?>

          </div>
          <div class="box2 box2_form">
            <h5>Ange dina kunduppgifter:</h5>
               <p>För- och efternamn:<br>
                   <input type="text" name="first_name">
               </p>
                <p>Adress:<br>
                   <input type="text" name="adress">
               </p>
               <p>E-mail:<br>
                   <input type="email" name="email">
               </p>
                <p>Telefonnummer:<br>
                   <input type="text" name="phone">
               </p>
            <input class="button" type="submit" value="Skicka" />
          </div>
     </form>
 </div> <!-- end of container -->

</main>
   <footer>
     <div class='footer'>
       <div class="box_footer">
           <p class="footer_text">Shoppa.nu<br>
           Kundservice: 08-112233<br>
           Tulegatan 41, Stockholm<br>
           kund@shoppa.nu</p>
       </div>
       <div class="box_footer">
           <p class="footer_text">
           Shoppa.nu was created by Loka Kanarp as a school assignment at Medieinstitutet.
           It's made with PHP, HTML and CSS. 2017, 2020.
           </p>
           <a href="https://github.com/lokakanarp/shop2020">GitHub repo</a>
       </div>
    </div>
   </footer>
 <!-- Bootstrap-stuff -->
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    	<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
