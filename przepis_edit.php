<?php
error_reporting(0);
session_start(); 
require 'baza.php';
require 'functions.php';
$ID_przepisu = $_GET['ID'];
$nazwa_przepisu = $_GET['nazwa'];

if (isset($_SESSION["zalogowany"])) {
  session_start();
  $id_uzytkownika =  $_SESSION["id"];
  //echo "<b> POZIOM KONTA: </b>". $_SESSION["poziom_konta"]. "<br>";
  $identyfikator_sprawdz = "$ID_przepisu$id_uzytkownika";
              $wynik = mysqli_query($connection,"SELECT *, CONCAT(ID, id_uzytkownika) AS identyfikator FROM przepisy WHERE `ID` = $ID_przepisu ");
              while($row = mysqli_fetch_array($wynik))
              {   
                  $identyfikator = $row['identyfikator'];
              }

/*echo "identyfikator przepisu $identyfikator <br>";
echo "identyfikator do sprawdzenia: $identyfikator_sprawdz"; */
}
if(!( ( ($_SESSION['poziom_konta'] == 2) || ($identyfikator == $identyfikator_sprawdz)) && (isset($_SESSION['zalogowany']) ) ) )
{
   $_SESSION['blad'] ="<div class='alert alert-danger alert-dismissible fade show' role='alert' style='position: absolute; width: 100%; top: 20%; text-align: center; z-index: 1;'>
  <strong>UWAGA! </strong>Brak dostępu do edycji tego przepisu
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
    header('Location: index.php');
}

if ($ID_przepisu==NULL || !isset($ID_przepisu)) {
  header("Location: przepisy.php");
  exit;
}
?>


<!DOCTYPE html>
<html lang="pl">

<head>
<style>
.checked {
    color: orange;
    
}
    textarea.form-control.wybierz-krok.kroki {
      height: calc(1.5em + .75rem + 2px);
      max-width: 100%;
    }
</style>
<script type="text/javascript">
          function auto_grow(element) {
          element.style.height = "5px";
          element.style.height = (element.scrollHeight)+"px";
        }
</script>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">


  <?php title(); ?>
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
</head>

<body>
  <?php topbar(); ?>
  <?php logowanie_rejestracja_haslo(); ?>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <?php menu(false,'przepis.php'); ?>
  </header><!-- End Header -->

<!-- ======= About Section ======= -->
<?php
if(isset($_SESSION['komunikat'])){
  echo($_SESSION['komunikat']);
  unset($_SESSION['komunikat']);
}

 
?>
    <section id="about" class="about">

      <div class="container" data-aos="fade-up" style="margin-top: 5%;">

<form action="zmien.php" method="POST" enctype="multipart/form-data">
  <?php
  echo"<input type='hidden' name='numer_przepisu' value='".$_GET['ID']."'>";
  ?>
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
            <br>
                <input type="file" name="plik_do_wgrania" id="plik_do_wgrania" >
                <button type="submit" name="obrazek" class="btn btn-outline-warning">Zmień zdjęcie przepisu</button>
            <p>
              <h3>OPIS</h3>
              <?php

              $wynik = mysqli_query($connection,"SELECT * FROM `przepisy` WHERE `ID` = $ID_przepisu; ");
              while($row = mysqli_fetch_array($wynik))

              {
                echo "<textarea  name='opis' class='form-control' style='overflow: hidden; min-height: 300px;'  >".$row['Opis']."</textarea>";
              }
              ?>
              
            </p>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-1 order-lg-2 content">

            <h3 style="margin-left: 3%;">
              <?php
              $wynik = mysqli_query($connection,"SELECT * FROM `przepisy` WHERE `ID` = $ID_przepisu; ");
              while($row = mysqli_fetch_array($wynik))

              {
                echo "<div class='row'> 
                <div class='col-sm'>
                Tytuł:
                </div>
                <div class='col-sm-10'>
                <input type='text' class='form-control' value='".$row['Nazwa']."' name='nazwa'>
                </div>
                </div>";
              }
              ?>                
              </h3>
              <div class="container">             
              <?php
              $wynik = mysqli_query($connection,"SELECT * FROM `przepisy` WHERE ID = $ID_przepisu ");
              while($row = mysqli_fetch_array($wynik))
              {
                ?>
                <br>
                <div class="row">
                  <div class="col-sm">
                <h3><b>Poziom</b> <i class="fas fa-mug-hot"></i>:</h3>
                  </div>
                  <?php
                  echo "<div class='col-sm-7'>";
                echo "<select name='trudnosc' class='form-control'>
                 <option value='łatwy' > łatwy </option>
                 <option value='średni'> średni </option>
                 <option value='trudny'> trudny </option>
                 </select></div>
                 <div class='col-sm-1'>
                 </div>
                </div><br>


                <div class='row'>
                <div class='col-sm'>
                 <h3><b>Czas:<span style='margin-left: 3%;'><i class='fa fa-hourglass-start'></i>  </span></b></h3>
                </div>

                <div class='col-sm-7'>
                <input type='number' class='form-control' value='". $row['Czas']. "' name='czas'>
                </div>

                <div class='col-sm-1'>
                min
                </div>
                 </div>
<br>
                <div class='row'>
                <div class='col-sm'>
                 <h3><b>Kategoria:<span style='margin-left: 3%;'></b></h3>
                </div>

                <div class='col-sm-7'>
                <select name='kategoria' class='form-control'>
                <option value='Mięso'>Potrawy mięsne</option>
                <option value='Pizza'>Pizza</option>
                <option value='Fast Food'>Fast Food</option>
                <option value='Ciasta i desery'>Ciasta i desery</option>
                <option value='Sałatki'>Sałatki</option>
                <option value='Zupy'>Zupy</option>
                <option value='Pieczywo'>Pieczywo</option>
                <option value='Napoje'>Napoje</option>
                </select> 
                </div>

                <div class='col-sm-1'>
                </div>
                 </div>
                 ";

              }
              ?></span>
            </p>
            <h3><p>SKŁADNIKI</p></h3>
            <div class="row">
              <div class="col-sm" style="text-align: center;">Nazwa produktu</div>
              <div class="col-sm-2" style="text-align: center;">Ilość produktu</div>
              <div class="col-sm-3" style="text-align: center;">Jednostka</div>
              <div class="col-sm-1" style="text-align: center;">Usuń składnik</div>
            </div>
            <ul>

              <?php
              $wynik = mysqli_query($connection,"SELECT `przepisy_skladniki`.`ID` AS id_skladnika, `przepisy_skladniki`.`Przepisy_ID`, `skladniki`.`ID`, `skladniki`.`Produkt`, `przepisy_skladniki`.`Ilosc_skladnikow`, `przepisy_skladniki`.`Jednostka` FROM `przepisy_skladniki` INNER JOIN `skladniki` ON `przepisy_skladniki`.`Skladniki_ID` = `skladniki`.`ID` WHERE Przepisy_ID = $ID_przepisu ");
              while($row = mysqli_fetch_array($wynik))
              {
                $skladniki = mysqli_query($connection,"SELECT * FROM `skladniki` WHERE stan = 1 OR stan = 3 ORDER BY `Produkt` ASC");
                echo "<li><div class='row'>
                <i class='icofont-check-circled'></i>
                <div class='col-sm'>


                <input type='hidden' value='".$row['id_skladnika']."' name='id[]'>

                <select name='skladnik[]' class='form-control'>
                <option value='".$row['ID']."'>". $row['Produkt']. "</option>";
                while($rows = mysqli_fetch_array($skladniki)){
                echo"<option value='".$rows['ID']."'>". $rows['Produkt']. "</option>";
                 }

                echo"</select>

                </div>

                <div class='col-sm-2'> 
                <input type='number' class='form-control' value='" . $row['Ilosc_skladnikow'] . "' name='ilosc[]' min='1' requried>
                </div>

                <div class='col-sm-3'> 
                <input type='text' class='form-control' value='".$row['Jednostka']."'  name='jednostka[]' >
                </div> 
                <div class='col-sm-1'>
                <button class='btn btn-danger' title='Usuń składnik' name='usun_skladnik' value='".$row['id_skladnika']."'><i class='fas fa-minus'></i></button>
                </div>
                </div>"; 
              }
              ?>
              <br>
              <div class="row">
                <div class="col-sm">
                  <br>
                  ZWIĘKSZ ILOŚĆ SKŁADNIKÓW O
        <select type='submit' name="ilosc_skladnikow" class="form-control">
        <option value="1">1</option>
        <option value="2">2</option> 
        <option value="3">3</option> 
        <option value="4">4</option>
        <option value="5">6</option>
        <option value="6">5</option> 
        <option value="7">7</option> 
        <option value="8">8</option>
        <option value="9">9</option>  
        <option value="10">10</option>       
        </select>
                </div>
                <div class="col-sm">
                  <br><br>
                <button class="btn btn-outline-warning" name="dodaj_skladnik">Dodaj składnik/i&nbsp; 
              <span style="font-size:16px; font-weight:bold; ">+ </span>
              </button>
                </div>
            </div>
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
                  <div class='row'>
    <div class='col-sm-10'>
    <input type='hidden' value='".$row['ID']."' name='id_kroku[]'>
      <textarea oninput='auto_grow(this)' name='krok[]' class='form-control wybierz-krok kroki' style='overflow: hidden; width: 100%;'>".$row['Opis_kroku']."</textarea>
      <br>
    </div>
    <div class='col-sm-2'>
      <button class='btn btn-danger' title='Usuń krok' name='usun_krok' value='".$row['ID']."' ><i class='fas fa-minus'></i></button>
    </div></div>";
              }
              ?>
              <div class="row">
                <div class="col-sm">
                  <br>
                  ZWIĘKSZ ILOŚĆ KROKÓW O
        <select type='submit' name="kroki" class="form-control">
        <option value="1">1</option>
        <option value="2">2</option> 
        <option value="3">3</option> 
        <option value="4">4</option>
        <option value="5">6</option>
        <option value="6">5</option> 
        <option value="7">7</option> 
        <option value="8">8</option>
        <option value="9">9</option>  
        <option value="10">10</option>       
        </select>
                </div>
                <div class="col-sm">
                  <br><br>
                <button class="btn btn-outline-warning" name="dodaj_krok">Dodaj krok/i&nbsp; 
              <span style="font-size:16px; font-weight:bold; ">+ </span>
              </button>
                </div>
            </div>

            <div class="row">
                <div class="col-sm">
                  <br><br><br><br>
        <button class="btn btn-outline-warning" type="submit" name="edytuj_przepis">Zmień  &nbsp; 
              <span style="font-size:16px; font-weight:bold;"> </span>
        </button>
                </div>
                <div class="col-sm">
                  <br><br><br><br>
        <button class="btn btn-outline-warning" name="powrot"><a href='panel.php' style="">Powrót</a> &nbsp; 
              <span style="font-size:16px; font-weight:bold;"> </span>
        </button>
                </div>
            </div>
            </ul>
            </p>
          </div>
        </div>
      </div>
    </section><!-- End About Section -->
    </form>


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