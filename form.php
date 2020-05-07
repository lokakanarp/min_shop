<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dina beställningar</title>

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
    <div class="container main_container">
      <div class="box_wrapper2">
           <div class="box_dina_uppgifter">
           <h5>Dina kunduppgifter:</h5><br>
            <?php
            if (!empty($_POST["first_name"]) && !empty($_POST["adress"]) && !empty($_POST["email"]) && !empty($_POST["phone"])){
                echo "<ul>
                    <li class='formular'>" . $_POST["first_name"] . "</li>
                    <li class='formular'>" . $_POST["adress"] . "</li>
                    <li class='formular'>" . $_POST["email"] . "</li>
                    <li class='formular'>" . $_POST["phone"] . "</li>
                    </ul>";
            }else {
                echo "<p class='correction'>Var vänlig gå tillbaka och fyll i ALLA kontaktuppgifter!</p>"; }
            ?>
            </div>
             <div class="box_dina_bestallningar">
               <h5>Dina beställningar:</h5>
               <br />
                <?php
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
                  echo "<br />
                    <p>Du får 5% rabatt på alla varor.</p>
                    <br />" .
                    rea_bild() .
                    "<p class='pris'>Att betala: $rea_even_day_odd_week kr</p>";
                    }else {
                        echo "<br />
                        <p class='pris'>Att betala: $sum kr</p>";
                }

                ?>
            </div>
            </div>
        </div>
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
