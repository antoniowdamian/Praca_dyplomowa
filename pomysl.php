<?php
error_reporting(0);
require 'baza.php';
?>
<html>
<head>

<script type="text/javascript" src="walidacja_hasel.js"></script>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Responsywna aplikacja internetowa e-kuchnia</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">



  <!-- =======================================================
  * Template Name: Restaurantly - v1.1.0
  * Template URL: https://bootstrapmade.com/restaurantly-restaurant-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> 

    <!-- CDN link used below is compatible with this example -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css"> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script> 
    <style type="text/css">
        .hide {
            display: none!important;
        }

        .category {
          margin-left: -12px;
          font-size: 1.3em;
          /*safari won't respect many/any of these but color?*/
          /*font-style: italic;*/
          font-weight: bold !important;
          color: #000000 !important;
          /*straight black makes it pop*/
          /*background: #000;*/
        }

            body {
        counter-reset: ingredient;
    }
     
    .ingredient-count::before {
        counter-increment: ingredient;
        content: counter(ingredient);
    }
    .wybierz-skladnik{
        max-width: 40%;
        height: 200%;
    }
    .wybierz-skladnik1{
        max-width: 40%;
        height: 200%;
    }

    .dropdown.bootstrap-select {
      height: 40px;
    }

    .filter-option-inner-inner {
      line-height: 28px;
    }

    button.btn.dropdown-toggle.bs-placeholder.btn-light {
      height: 40px;
    }

    button.btn.dropdown-toggle.btn-light {
      height: calc(1.5em + .75rem + 2px);;
    }
    textarea.form-control.wybierz-krok.kroki {
      height: calc(1.5em + .75rem + 2px);
      max-width: 80%;
    }
    </style>

    <script type='text/javascript'>
        $(document).ready(function() {
            var max_liczba_skladnikow = 999;
            var wrapper = $(".dodane");

            var x1 = 1;
            $(".add_form_field").click(function(e) {
                e.preventDefault();
                if (x1 < max_liczba_skladnikow) {
                    x1++;
                    var n = $('.skladniki-list').length + 1;
                    var temp = $('.skladniki-list:last').clone(true).removeClass('wybierz-skladnik'+(n-1));
                    $('select[name="skladnik'+(n-1)+'"]:last').attr("name", "skladnik"+(n));
                    $('input[name="ilosc'+(n-1)+'_ilosc"]:last').attr("name", "skladnik"+n+"_ilosc");
                    $('select[name="skladnik'+(n-1)+'_jednostka"]:last').attr("name", "skladnik"+n+"_jednostka");
                    console.log(n);
                    $('input[name="ilosc_skladnikow"]').val(n);
                    // $('.control-label:first', temp).html('Składnik #' + n);
                    $('.input-group', temp).html($('#select-model').html());
                    $('.wybierz-skladnik1', temp).selectpicker();
                    $('.skladniki-list:last').after(temp);

                } else {
                    alert('Max ' + max_liczba_skladnikow +' składników')
                }
            });

            $(wrapper).on("click", ".delete_wybierz_skladnik", function(e) {
                x1--;
                e.preventDefault();
                $(this).parent('div').parent('div').remove();
                document.getElementById("myText1").value = x1;
                
            })
            $(wrapper).on("click", ".delete_krok", function(e) {
                x2--;
                e.preventDefault();
                $(this).parent('div').parent('div').remove();
                document.getElementById("myText2").value = x2;
                
            })
        });
        function auto_grow(element) {
          element.style.height = "5px";
          element.style.height = (element.scrollHeight)+"px";
        }

    </script>
</head>
<body >


  <main id="main">
<section id="specials" class="specials" style="margin-top: 5%;">
    <div class="container">
<div class="section-title">
          <h2>Dodaj przepis</h2>
          <p>Dodawanie jest proste</p>
        </div>
    <form class="dodane" method="GET" action="#book-a-table">

                  <div class="row">
                    <div class="col-sm">
                <h3>Podaj składniki</h3>
                </div>

                <?php 
                if (isset($_GET['wyszukaj'])) {
                  include 'baza.php'; 
                  $skladniki_query = mysqli_query($connection, "SELECT * FROM `skladniki` WHERE `stan` = 1 ORDER BY `Produkt` ASC ");
                  $skladniki_rows = mysqli_num_rows($skladniki_query);
                  if (mysqli_num_rows($skladniki_query) > 0) {
                    echo "" . $skladniki_row['Produkt'] . "";
                  }

                  ?>
                <div class="col-sm">
                <h3>Z tych składników przyrządzisz</h3>
                </div>
                <?php
              }
              ?>
                </div>
                                <div class="row">
                <div class="col-sm">


            <?php
                $skladniki_query = mysqli_query($connection, "SELECT * FROM `skladniki` WHERE `stan` = 1 ORDER BY `Produkt` ASC ");
                $skladniki_rows = mysqli_num_rows($skladniki_query);
                echo "<div class='form-group skladniki-list'>
                    <label class='control-label'>Składnik #<span class='ingredient-count'></span></label>";

                    echo "<div class='input-group'>";
                if (mysqli_num_rows($skladniki_query) > 0) {
                    // output data of each row
                    echo "<select name='skladnik[]' class='form-control wybierz-skladnik selectpicker' data-live-search='true' title='Wybierz składnik' 
                            requried>";
                    while($skladniki_row = mysqli_fetch_assoc($skladniki_query)) {
                    echo "<option value=" . $skladniki_row['ID'] .">" . $skladniki_row['Produkt'] . "</option>";
                    }
                    echo "</select>";
                } else {
                    echo "<option disabled>Brak składników</option></select>";
                }

?>
        <button class="add_form_field btn btn-outline-warning" style="margin-left: 1%;">Kolejny składnik &nbsp; 
              <span style="font-size:16px; font-weight:bold;">+ </span>
        </button>
        <button class="btn btn-outline-warning" type="submit" name="wyszukaj" style="margin-left: 1%;">Wyślij &nbsp; 
              <span style="font-size:16px; font-weight:bold;">+ </span>
        </button>
        <?php



                    echo "</div>";
                echo "</div>";

            ?>
            </div>
            <div class="col-sm">
              <?php
if (isset($_GET['wyszukaj'])) { 
  require 'baza.php';
  error_reporting(1);
  $liczba_skladnikow = count($_GET["skladnik"]);

  if($liczba_skladnikow > 1)
{
  for($i=0; $i<$liczba_skladnikow; $i++)
  {     $skladnik = $_GET["skladnik"][$i];
    $tablica[$i] = $skladnik;
    $dane = implode(",", $tablica);
    $dane1 = implode(" AND `przepisy_skladniki`.`Skladniki_ID` !=", $tablica);
                
  };

  $zapytanie = mysqli_query($connection,"SELECT *, IF(SUM(exist IS NULL), NULL, SUM(exist)) AS total FROM( SELECT p.Nazwa, p.obrazek, p.id,IF(ps.skladniki_id 
            IN(".$dane."),1,NULL)AS exist FROM przepisy AS p INNER JOIN przepisy_skladniki AS ps ON ps.przepisy_id=p.id) AS tmp GROUP BY id HAVING total");
              $zapytanie_rows = mysqli_num_rows($zapytanie);
          while($zapytanie_rows = mysqli_fetch_assoc($zapytanie)) { 
                    echo"<div class='about-img'>
                   <p><a href='przepis.php?ID= ".$zapytanie_rows['id']."&nazwa= ".$zapytanie_rows['Nazwa']."'> ".$zapytanie_rows['Nazwa']." </a></p>
              <img src='".$zapytanie_rows['obrazek']."' alt='' style='min-width: 300px; height: 300px;
  border: 4px solid rgba(255, 255, 255, 0.2);
  position: relative;'>
            </div>";
          }
        }
  else{
    echo "Wprowadzono za mało składników";
   // exit(header("Location: index.php"));
  }

$tablica[] = "";




$tab[] = ""; // TABELA SKŁADNIKÓW DO OKREŚLONEGO PRZEPISU
$tab1[] = ""; // TABELA Z PRODUKTAMI Z FORMULARZA
$kwerenda = "SELECT `przepisy_skladniki`.*, `skladniki`.*, `przepisy`.*
FROM `przepisy_skladniki` 
  LEFT JOIN `skladniki` ON `przepisy_skladniki`.`Skladniki_ID` = `skladniki`.`ID` 
  LEFT JOIN `przepisy` ON `przepisy_skladniki`.`Przepisy_ID` = `przepisy`.`ID` WHERE";
for ($i=0; $i < $liczba_skladnikow ; $i++) { 
  if ($liczba_skladnikow - $i > 1) {
    $kwerenda .= "`przepisy_skladniki`.`Skladniki_ID` = ".$tablica[$i]." OR ";
      }
      else
    {
  $kwerenda .= "`przepisy_skladniki`.`Skladniki_ID` = ".$tablica[$i]."";
    }
}

$zapytanie_1 = mysqli_query($connection, $kwerenda); 

while($wiersz = mysqli_fetch_array($zapytanie_1)){
  $a = count($tab);
  $z = 0;
  for ($i=0; $i < $a ; $i++) { 
    if ($tab[$i] == $wiersz['Nazwa'] ) {
       $z = 1;  

    }
    else {

    }

  }
    if ($z == 0) {
      $tab[] = $wiersz['Nazwa'];
      $zmienna[] = $wiersz['Produkt'];
    }
}

for ($i=0; $i < count($tab); $i++) { 
  $a = $tab[$i];


$sql_0 = mysqli_query($connection, "SELECT * FROM `przepisy` WHERE `Nazwa` = '".$a."' ");


while ($b = $sql_0 -> fetch_assoc()) {

  $sql_1 = mysqli_query($connection, "SELECT `przepisy_skladniki`.`Skladniki_ID` FROM `przepisy_skladniki` WHERE `przepisy_skladniki`.`Przepisy_ID` = ".$b['ID'].  " AND `przepisy_skladniki`.`Skladniki_ID` != " .$dane1. "");
  $rows = mysqli_num_rows($sql_1);
if($rows !==0){

                       echo"<p><div class='about-img'>
                   <p><a href='przepis.php?ID= ".$b['ID']."&nazwa= ".$b['Nazwa']."'> ".$b['Nazwa']." </a></p>
              <img src='".$b['obrazek']."' alt='' style='min-width: 300px; height: 300px;
  border: 4px solid rgba(255, 255, 255, 0.2);
  position: relative;'>
            </div></p>";
  echo "<b>Brakuje Ci jeszcze: </b> <br>";
  
}

  while ($wiersz = $sql_1 -> fetch_assoc() ) {
  $sql_2 = mysqli_query($connection, "SELECT `Produkt` FROM `skladniki` WHERE `ID` = ".$wiersz['Skladniki_ID']."");
  $row2 = mysqli_fetch_assoc($sql_2); 


  for ($j=0; $j < 1 ; $j++) { 
   if ($tab1[$j] !== $row2['Produkt']) {
            echo "<b style='color: red'>".$row2['Produkt']."</b>";
         } 
    else{
      if ($tab1[$j] == 0 ) {
        echo "str";
      }
    }
  }
echo "<br>";


  }


}


}


echo "<br>";


}
?>
            </div>
          </div>



    

    



    
</div>


            
</form>
</section>
</main><!-- End #main -->

  <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>
<?php
    error_reporting(-1);
    $skladniki_query = mysqli_query($connection, "SELECT * FROM `skladniki` WHERE `stan` = 1 ORDER BY `Produkt` ASC ");
    $skladniki_rows = mysqli_num_rows($skladniki_query);
    echo "<div id='select-model' class='hide'>";
    if (mysqli_num_rows($skladniki_query) > 0) {
        // output data of each row
        echo "<select name='skladnik[]' class='wybierz-skladnik1 form-control ' data-live-search='true' title='Wybierz składnik'>";
        while($skladniki_row = mysqli_fetch_assoc($skladniki_query)) {
        echo "<option value=" . $skladniki_row['ID'] .">" . $skladniki_row['Produkt'] . "</option>";
        }
        echo "</select>";
    } else {
        echo "<option disabled>Brak składników</option></select><input type='number' placeholder='Ilość' name='skladnik1_ilosc'>";
    }



    echo "<div class='col-lg-12 details order-2 order-lg-1'>";
    echo "</div>";
   
    echo "<a href='#' class='delete_wybierz_skladnik btn btn-outline-warning' style='margin-left:1%;'>Usuń -</a></div></div>";

    

?>




<!--   <script src="assets/js/main.js"></script> DO KARUZELI-->

</body>


</html>