<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dina beställningar</title>
     
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
                        <a href="index.php"><h1>Shoppa.nu</h1></a>    
                  </div>
                  <div class="box_header_time col-lg-6">
                  <?php
                    include('functions.php'); //Mina funktioner    
                    swedish_date();
                   ?>
                  </div>
                </div>
            </div>
        </header>
        <main>
    <div class="container"> 
      <div class="box_wrapper2 col-sm-12">
           <div class="box_dina_uppgifter col-sm-12 col-lg-6"> 
           <h5>Dina kunduppgifter:</h5><br>
            <?php
            if (!empty($_POST["first_name"]) && !empty($_POST["adress"]) && !empty($_POST["email"]) && !empty($_POST["phone"])){
                echo "<ul>" .
                    "<li class='formular'>" . $_POST["first_name"] . "</li>" .
                    "<li class='formular'>" . $_POST["adress"] . "</li>" .
                    "<li class='formular'>" . $_POST["email"] . "</li>" .
                    "<li class='formular'>" . $_POST["phone"] . "</li>" .
                    "</ul>";
            }else {
                echo "<p class='correction'>Var vänlig gå tillbaka och fyll i ALLA kontaktuppgifter!</p>"; }  
            ?>
            </div>
             <div class="box_dina_bestallningar col-sm-12 col-lg-6">    
               <h5>Dina beställningar:</h5>
                <?php   

                echo "<br />";
                $sum = 0;    
                for ($i = 0; $i < 4; $i++) {
                    if (!empty($_POST["antal"][$i])){
                    $antal_x_price = $_POST["price"][$i] * $_POST["antal"][$i];  
                     $sum = $sum + $antal_x_price;    
                    echo '<p class="formular_2">' . $_POST["name"][$i] . ': ' . $_POST["price"][$i] . ' kr/st - ' . $_POST["antal"][$i] . ' st. ' .$antal_x_price . ' kr.</p>';
                    echo "<br />";
                    }
                }
                if(even_day_odd_week() == true){
                        $rea_even_day_odd_week = $sum - ($sum * 0.05);
                    echo "<br />"; 
                echo '  Du får 5% rabatt på alla varor. ' . 
                    '<br />' .
                    rea_bild() . 
                    '<p class="pris">Att betala: ' . $rea_even_day_odd_week . ' kr</p>';       
                    }else {
                        echo "<br />"; 
                        echo '<p class="pris">Att betala: ' . $sum . ' kr</p>';
                }

                ?> 
            </div>    
            </div>
        </div> 
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