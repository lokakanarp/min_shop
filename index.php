<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shoppa</title>
    
    
      <!-- Bootstrap-grejer -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    

    <link href="https://fonts.googleapis.com/css?family=Karla|Lobster" rel="stylesheet">
    
     <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <header>
      <div class='container'> 
         <div class="box_wrapper col-lg-12">
          <div class="box_header col-lg-6">
            <h1>Shoppa.nu</h1>       
          </div>
          <div class="box_header_time col-lg-6">
              <?php

                $day = date("l");   //Dagens veckodag läggs i en variabel för senare användning.
                include('functions.php'); //Mina funktioner    
                include('products.php'); //Produkt-arrayen 
                swedish_date();
               ?>
          </div>
        </div>
      </div>
    </header>
   <main>
    <div class='container'>   
      
        <form action="form.php" method="POST">
            <div class="box_order col-lg-12">
                <h3>Missa inte höstens erbjudanden. Nya priser nästan varje dag.</h3>
                  <?php 
                if(even_day_odd_week() == true){
                   echo "<p class='bestall_nu'>Beställ nu! Varorna levereras redan imorgon och du får 5% rabatt på hela beställningen!</p>";     
                }
                ?>
            </div>
            <div class="box_wrapper3 col-sm-12">
             <?php   

            for ($row = 0; $row < 4; $row++) {
                echo '<div class="box1 col-sm-12 col-lg-6">';
                echo '<img src="images/image' .$row. '.jpg">';
                echo "<h4>" . $products[$row]["name"] . "<br />" . "</h4>" .
                    " Color: " . $products[$row]["color"] . "<br />";
                if ($day == 'Monday'){
                   $reapris_monday = $products[$row]["price"] / 2;
                    rea_bild();
                    echo "<p class='pris'>" . $reapris_monday . " kr" . "</p>" . "<br />";
                    } else if ($day == 'Wednesday'){
                   $hojt_pris_wednesday = $products[$row]["price"] * 1.1;
                    echo "<p class='pris'>" . $hojt_pris_wednesday . " kr" . "</p>" . "<br />";
                   } else if ($day == 'Friday' && $products[$row]["price"] > 200){
                    $reapris_friday = $products[$row]["price"] - 20;
                    rea_bild();
                    echo "<p class='pris'>" . $reapris_friday . " kr" . "</p>" . "<br />";
                    
                } else {      
                        echo "<p class='pris'>" . $products[$row]["price"] . " kr" . "</p>" . "<br />"; }
            
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
                    echo '</div>'; }      
                ?> 
        </div>
        <div class="box2 col-lg-12">
          <h5>Ange dina kunduppgifter:</h5>
               <p class="formular">För- och efternamn:<br>
                   <input type="text" name="first_name">
               </p>
                <p class="formular">Adress:<br>
                   <input type="text" name="adress">
               </p>
               <p class="formular">E-mail:<br>
                   <input type="email" name="email">
               </p>
                <p class="formular">Telefonnummer:<br>
                   <input type="text" name="phone">
               </p>
            <input class="button" type="submit" value="Skicka" />
          </div>   
     </form> 
       
 </div> <!-- slut på container -->
         
          
</main> 
   <footer>
     <div class='container'>
       <div class="box_footer col-sm-12 col-lg-6">
           <p class="footer_text">Shoppa.nu<br>
           Kundservice: 08-361112<br>
           Tulegatan 41, Stockholm<br>
           kund@shoppa.nu</p>
       </div>
       <div class="box_footer col-sm-12 col-lg-6">
           <p class="footer_text">Följ oss på Instagram<br>
           Följ oss på Facebook<br>
           Prenumerera på vårt nyhetsbrev<br>
           Besök oss
           </p> 
       </div>
    </div> 
   </footer>
 <!-- Bootstrap-grejer -->
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    	<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>   
</body>
</html>