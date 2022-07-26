<?php
error_reporting(0);
session_start(); 
require 'baza.php';
require 'functions.php';
$ID_przepisu = $_GET['ID'];
$nazwa_przepisu = $_GET['nazwa'];
              $wyswietl_przepis = mysqli_query($connection,"SELECT * FROM `przepisy` WHERE `przepisy`.`ID` = $ID_przepisu");
              while($row = mysqli_fetch_array($wyswietl_przepis))
              {   
                 $wyswietlenia = $row['Wyswietlenia'];
              }

$zmien_wyswietlenia = mysqli_query($connection, "UPDATE `przepisy` SET `Wyswietlenia` = $wyswietlenia +1 WHERE `przepisy`.`ID` = $ID_przepisu");
if ($ID_przepisu==NULL || !isset($ID_przepisu)) {
  header("Location: index.php#menu");
  exit;
}

if (isset($_SESSION["zalogowany"])) {
  session_start();
  ///////////////////////////////////// ZAKÅADKA ULUBIONE
  $id_uzytkownika =  $_SESSION["id"]; 
  $identyfikator_sprawdz = "$id_uzytkownika$ID_przepisu";
              $wynik = mysqli_query($connection,"SELECT `identyfikator` FROM `ulubione` WHERE `id_przepis` = $ID_przepisu");
              while($row = mysqli_fetch_array($wynik))
              {   
                  $identyfikator = $row['identyfikator'];
              }
              /*
echo "<h3> DODAWANIE DO ULUBIONYCH </h3> ";
echo "identyfikator przepisu $identyfikator <br>";
echo "identyfikator do sprawdzenia: $identyfikator_sprawdz <br>";
 
////////////////////////////////////////// ZAKÅADKA EDYCJA
*/

$identyfikator_edycja = "$ID_przepisu$id_uzytkownika";
              $edycja = mysqli_query($connection,"SELECT *, CONCAT(ID, id_uzytkownika) AS identyfikator FROM przepisy WHERE `ID` = $ID_przepisu ");
              while($row = mysqli_fetch_array($edycja))
              {   
                  $edytuj = $row['identyfikator'];
              }
/*
echo "<h3> MOÅ»LIWOÅšÄ† EDYCJI </h3> ";
echo "identyfikator przepisu $edytuj <br>";
echo "identyfikator do sprawdzenia: $identyfikator_edycja";
*/
}

?>


<!DOCTYPE html>
<html lang="pl">

<head>
<style>
.checked {
    color: orange;
    
}
</style>
<script type="text/javascript" src="walidacja_hasel.js"></script>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">


  <?php title(); ?>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



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


</head>

<body>
  <?php topbar(); ?>
  <?php logowanie_rejestracja_haslo(); ?>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <?php menu('przepis.php'); ?>
  </header><!-- End Header -->

<!-- ======= About Section ======= -->

    <section id="about" class="about">

      <div class="container" data-aos="fade-up" style="margin-top: 5%;">

        <div class="row">

          <div class="col-lg-6 order-1 order-lg-1 content" data-aos="zoom-in" data-aos-delay="100">
            <div class="about-img">
              <?php
              $zdj_start = "<img src='";
              $zdj_end = "' alt='' >";
              $wynik = mysqli_query($connection,"SELECT * FROM `przepisy` WHERE `ID` = $ID_przepisu; ");
              while($row = mysqli_fetch_array($wynik))

              {
                echo"$zdj_start".$row['obrazek']."$zdj_end";
              }
              ?>
            </div>
            <p>
              <h3>OPIS</h3>
              <?php
              $wynik = mysqli_query($connection,"SELECT * FROM `przepisy` WHERE `ID` = $ID_przepisu; ");
              while($row = mysqli_fetch_array($wynik))

              {
                echo $row['Opis'];
              }
              ?>
              
            </p>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-1 order-lg-2 content">
          <?php
if(isset($_SESSION['komunikat'])){
  echo($_SESSION['komunikat']);
  unset($_SESSION['komunikat']);
}

 
?>
            <h3 style="margin-left: 3%;">
              <?php
              $wynik = mysqli_query($connection,"SELECT * FROM `przepisy` WHERE `ID` = $ID_przepisu; ");
$identyfikator = "".$_SESSION["id"]."$ID_przepisu";
              while($row = mysqli_fetch_array($wynik))
              {
              	$nazwa = $row['Nazwa'];
           if ( $_SESSION["zalogowany"] !== 0) {
      $query = mysqli_query($connection, "SELECT `ulubione`.*, `uzytkownicy`.* FROM `ulubione` LEFT JOIN `uzytkownicy` ON `ulubione`.`id_uzytkownika` = `uzytkownicy`.`id` WHERE ulubione.id_uzytkownika = ". $_SESSION["id"]." AND ulubione.id_przepis = $ID_przepisu");
      }          
      while($row = mysqli_fetch_array($query))
      {
      	$identyfikator2 = $row["identyfikator"];  
      }
             
      
                echo "<form action='user_opcje.php' method='POST'>".$nazwa;
                echo "<input type='hidden' value='$ID_przepisu' name='id_przepisu'>";

                if ($identyfikator == $identyfikator2 && $_SESSION["poziom_konta"] == 1  ) {
                  echo "
                  <button title='Usuń z obserwowanych' class='btn btn-secondary' name='usun_ulubione' style='margin-left: 2%;'><i class='fa fa-heart-o fa-2x' style='color: red;'></i></button>
                  ";
                }

                if ($edytuj == $identyfikator_edycja && $_SESSION["poziom_konta"] == 1  ) {
                  echo "<b class='btn btn-secondary' title='Edytuj przepis' style='margin-left: 2%;'><a href='przepis_edit.php?ID=".$ID_przepisu."' style='color: white;'>
                  <i class='fa fa-edit fa-2x' aria-hidden='true'></i></a></b>";
                }

                if ($identyfikator !== $identyfikator2 && $_SESSION["poziom_konta"] == 1  ) {
                  echo "
                  <input type='hidden' name='id_przepisu' value='$ID_przepisu'>
                  <button type='submit' title='Dodaj do ulubionych' class='btn btn-secondary' name='dodaj_ulubione' style='margin-left: 2%;'><i class='fa fa-heart fa-2x' style='color: red;'></i></button>
                  ";
                }

                if ($identyfikator == $identyfikator2 && $_SESSION["poziom_konta"] == 2  ) {
                  echo "<button name='usun_ulubione' title='Dodaj do ulubionych' class='btn btn-secondary' style='margin-left: 2%;'><i class='fa fa-heart fa-2x' style='color: red;'></i></button>";

                  echo "<b class='btn btn-secondary' title='Edytuj przepis' style='margin-left: 2%;'><a href='przepis_edit.php?ID=".$ID_przepisu."' style='color: white;'>
                  <i class='fa fa-edit fa-2x' aria-hidden='true'></i></a></b>";

                }

                 if ($identyfikator !== $identyfikator2 && $_SESSION["poziom_konta"] == 2  ) {
                  echo "<button name='dodaj_ulubione' title='Dodaj do ulubionych' class='btn btn-secondary' style='margin-left: 2%;'><i class='fa fa-heart fa-2x' style='color: red;'></i></button>";
                  echo "<button class='btn btn-secondary' title='Edytuj przepis' style='margin-left: 2%;'><a href='przepis_edit.php?ID=".$ID_przepisu."' style='color: white;'>
                  <i class='fa fa-edit fa-2x' aria-hidden='true'></i></a></button>";
                }
               


               
         /*   echo "<h3> Możliwość edycji: " .$identyfikator2;
echo "Dodano przez: $edytuj <br>";
echo "identyfikator do sprawdzenia: $identyfikator_edycja </h3>"; */


              }
              echo "</form>";
              ?>                
              </h3>
              <div class="container">
              <?php
                $result = mysqli_query($connection, "SELECT AVG(`ocena`) AS ocena_srednia FROM `oceny` WHERE `id_przepisu` = $ID_przepisu ; ");
                $row = mysqli_fetch_assoc($result);
                $ocena_zaokroglona = round($row['ocena_srednia'], 0);
                echo "<p style='font-size: 12px; color: silver;'> Wyswietlono : ".$wyswietlenia . " razy </p>";
                echo "<p style='font-size: 12px; color: silver;'> Srednia ocen : ".$ocena_zaokroglona . " gwiazdek </p>";
                for ($i=1; $i <= 5; $i++) { 
                  if($i<=$ocena_zaokroglona)
                  {
                    echo "<a href='ocena.php?ocena=" . $i . "&ID=" . $ID_przepisu . "&nazwa=" . $nazwa_przepisu . "' ><span  onmouseover='starmark(this)' onclick='starmark(this)' id='" . $i . "' style='font-size:20px;cursor:pointer;'  class='fa fa-star checked'></span></a>";
                  }
                  else {
                    echo "<a href='ocena.php?ocena=" . $i . "&ID=" . $ID_przepisu . "&nazwa=" . $nazwa_przepisu . "' ><span  onmouseover='starmark(this)' onclick='starmark(this)' id='" . $i . "' style='color: black;font-size:20px;cursor:pointer;'  class='fa fa-star checked'></span></a>";
                  }
                }

              ?>
                
             
                <span style="margin-left: 3%;"><i class="fas fa-mug-hot"></i>
              <?php
              $wynik = mysqli_query($connection,"SELECT * FROM `przepisy` WHERE ID = $ID_przepisu ");
              while($row = mysqli_fetch_array($wynik))
              {
                echo $row['Trudnosc']."<span style='margin-left: 3%;'><i class='fa fa-hourglass-start'></i> ". $row['Czas']. "min </span>";
              }
              ?></span>
                <script>
                var count;

                function starmark(item)
                {
                  count=item.id[0];
                  sessionStorage.starRating = count;
                  var subid= item.id.substring(1);
                  for(var i=0;i<5;i++)
                  {
                    if(i<count)
                    {
                      document.getElementById((i+1)+subid).style.color="orange";

                    }
                    else
                    {
                      document.getElementById((i+1)+subid).style.color="black";
                    }
                  }
                }

                </script>

            </p>
            <p>SKŁADNIKI</p>
            <ul>

              <?php
              $wynik = mysqli_query($connection,"SELECT `przepisy_skladniki`.`Przepisy_ID`, `skladniki`.`ID`, `skladniki`.`Produkt`, `przepisy_skladniki`.`Ilosc_skladnikow`, `przepisy_skladniki`.`Jednostka`
FROM `przepisy_skladniki` 
INNER JOIN `skladniki` ON `przepisy_skladniki`.`Skladniki_ID` = `skladniki`.`ID` WHERE Przepisy_ID = $ID_przepisu;");
              while($row = mysqli_fetch_array($wynik))

              {
                echo "<li><i class='icofont-check-circled'></i>". $row['Produkt']. " x " . $row['Ilosc_skladnikow'] . " ". $row['Jednostka'] ."</li>"; 
              }
              ?>
            </ul>
            <p>

              <h3>PRZYGOTOWANIE</h3> </br>
              <ul>
                              <?php
              $wynik = mysqli_query($connection,"SELECT * FROM `kroki` WHERE `Przepis_ID`=$ID_przepisu ");
              while($row = mysqli_fetch_array($wynik))

              {
                ?>
                                <style type="text/css">
                              body {
        counter-reset: ingredient;
    }
     
    .numeracja::before {
        counter-increment: ingredient;
        content: counter(ingredient);
    }
                </style>
                <?php
                echo "<li><i class='icofont-check-circled'></i>Krok <a class='numeracja'></a></li>



                <p>".$row['Opis_kroku']."</p>"; 
              }
              ?>
              
            </ul>
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->
    


  <!-- ======= Footer ======= -->
  <section id="stopka" class="stopka">
    <?php footer('default'); ?>
  </section>

  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


</body>


</html>