<?php
error_reporting(0);
session_start(); 
$ID = $_SESSION["id"];
require 'baza.php';
require 'functions.php';
/*
if (isset($_SESSION["zalogowany"])) {
  session_start();
  $id_uzytkownika =  $_SESSION["id"];
  echo "<b> POZIOM KONTA: </b>". $_SESSION["poziom_konta"]. "<br>";
  $identyfikator_sprawdz = "$ID_przepisu$id_uzytkownika";
              $wynik = mysqli_query($connection,"SELECT *, CONCAT(ID, id_uzytkownika) AS identyfikator FROM przepisy WHERE `ID` = $ID_przepisu ");
              while($row = mysqli_fetch_array($wynik))
              {   
                  $identyfikator = $row['identyfikator'];
              }

echo "identyfikator przepisu $identyfikator <br>";
echo "identyfikator do sprawdzenia: $identyfikator_sprawdz";
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
*/
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


 
?>
    <section id="about" class="about">
<?php 


    if (isset($_GET['zmiana_hasla_id']) && $_SESSION["poziom_konta"] == 2) {
              $zmiana_hasla_id = $_GET['zmiana_hasla_id'];
              $wynik = mysqli_query($connection,"SELECT * FROM `uzytkownicy` WHERE `ID` = $zmiana_hasla_id");
              $row = mysqli_fetch_array($wynik);
       ?>
      <div class="container" data-aos="fade-up" style="margin-top: 5%;">
          <?php
  if(isset($_SESSION['komunikat'])){
  echo($_SESSION['komunikat']);
  unset($_SESSION['komunikat']);
}
  ?>
<h1 style="text-align: center; padding-bottom: 5%;">Edycja konta o ID <?php echo $zmiana_hasla_id ?> <x style='font-size: 25px; color: silver;'>Login: (<?php echo $row['login']; ?>)</x></h1>
<form  method="POST" action="admin_opcje.php">
        <div class="row">

          <div class="col-sm content">

            <h3 style="margin-left: 3%;">
              <?php
              echo "<input type='hidden' name='id_uzytkownika' value='$zmiana_hasla_id'>";
                echo "<div class='row'> 
                <div class='col-sm'>
                Zmiana imienia: 
                </div>
                <div class='col-sm'>
                <input type='text' class='form-control'  name='imie' value='".$row['imie']."'>
                </div>
                </div>";
              
              ?>                
              </h3>
              <h3 style="margin-left: 3%;">
              <?php

              {
                echo "<div class='row'> 
                <div class='col-sm'>
                Zmiana nazwiska: 
                </div>
                <div class='col-sm'>
                <input type='text' class='form-control'  name='nazwisko' value='".$row['nazwisko']."'>
                </div>
                </div>";
              }
              ?>                
              </h3>
              <h3 style="margin-left: 3%;">
              <?php

              {
                echo "<div class='row'> 
                <div class='col-sm'>
                Zmiana maila: 
                </div>
                <div class='col-sm'>
                <input type='text' class='form-control'  name='email' value='".$row['email']."'>
                </div>
                </div>";
              }
              ?>                
              </h3>
              <h3 style="margin-left: 3%;">
              <?php

              {
                echo "<div class='row'> 
                <div class='col-sm'>
                Login: 
                </div>
                <div class='col-sm'>
                <input type='text' class='form-control'  name='login' value='".$row['login']."' >
                </div>
                </div>";
              }
              ?> 
            </h3>
            <h3 style="margin-left: 3%;">
              <div class="row">
                <div class="col-sm">Nowe hasło</div>
                <div class="col-sm"><input type="password" class="form-control" name="nowe_haslo_1" placeholder="Wprowadź nowe hasło" required></div>
              </div>
            </h3>
            <h3 style="margin-left: 3%;">
              <div class="row">
                <div class="col-sm">Powtórz hasło:</div>
                <div class="col-sm"><input type="password" class="form-control" name="nowe_haslo_2" placeholder="Powtórz hasło" required></div>
              </div>

            </h3>

              <div class="container">             
                          <div class="row">
                <div class="col-sm">
                  <br><br><br><br>

                </div>
                <div class="col-sm">
                  <br><br><br><br>
                          <button class="btn btn-outline-warning" type="submit" name="zmien_id">Zmień  &nbsp; 
              <span style="font-size:16px; font-weight:bold;"> </span>
        </button>
        <button class="btn btn-outline-warning" name="powrot" style="margin-left: 2%;"><a href='admin.php'>Powrót</a> &nbsp; 
              <span style="font-size:16px; font-weight:bold;"> </span>
        </button>
                </div>
            </div>
            </div>


            </ul>
            </p>
          </div>
        </div>
      </div>
    </form>
    <?php } ?>


<?php
if ($_GET['zmiana_hasla'] == $ID) {
                $wynik = mysqli_query($connection,"SELECT * FROM `uzytkownicy` WHERE `ID` = $ID");
              $row = mysqli_fetch_array($wynik);
?>

 <div class="container" data-aos="fade-up" style="margin-top: 5%;">
  <?php
  if(isset($_SESSION['komunikat'])){
  echo($_SESSION['komunikat']);
  unset($_SESSION['komunikat']);
}
  ?>
<h1 style="text-align: center; padding-bottom: 5%;">Zmień hasło  <x style='font-size: 25px; color: silver;'>Login: (<?php echo $row['login']; ?>)</x></h1>
<form method="POST" action="admin_opcje.php">
  <?php echo "<input type='hidden' name='id' value='".$ID."'>"; ?>
        <div class="row">

          <div class="col-sm content">

            <h3 style="margin-left: 3%;">
              <div class="row">
                <div class="col-sm">Aktualne hasło</div>
                <div class="col-sm"><input type="password" class="form-control" name="aktualne_haslo" placeholder="Wprowadź aktualne hasło"></div>
              </div>
            </h3>
            <h3 style="margin-left: 3%;">
              <div class="row">
                <div class="col-sm">Nowe hasło</div>
                <div class="col-sm"><input type="password" class="form-control" name="nowe_haslo_1" placeholder="Wprowadź nowe hasło"></div>
              </div>
            </h3>
            <h3 style="margin-left: 3%;">
              <div class="row">
                <div class="col-sm">Powtórz hasło:</div>
                <div class="col-sm"><input type="password" class="form-control" name="nowe_haslo_2" placeholder="Powtórz hasło"></div>
              </div>

            </h3>

              <div class="container">             
                          <div class="row">
                <div class="col-sm">
                  <br><br><br><br>

                </div>
                <div class="col-sm">
                  <br><br><br><br>
                          <button class="btn btn-outline-warning" type="submit" name="zmien_haslo">Zmień  &nbsp; 
              <span style="font-size:16px; font-weight:bold;"> </span>
        </button>
        <button class="btn btn-outline-warning" name="powrot" style="margin-left: 2%;"><a href='admin.php'>Powrót</a> &nbsp; 
              <span style="font-size:16px; font-weight:bold;"> </span>
        </button>
                </div>
            </div>
            </div>


            </ul>
            </p>
          </div>
        </div>
      </div>
</form>
<?php  }
?>
    </section><!-- End About Section -->


    </form>
<!--  ZMIANA INDYWIDUALNA DANYCH KONTA !-->

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