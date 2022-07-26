<?php
error_reporting(0);
include 'baza.php';
require 'functions.php';
?>


<!DOCTYPE html>
<html lang="pl">
<style>
.dropbtn {
  border: 2px solid #cda45e;
  background: none;
  color: #fff;
  border-radius: 50px;
  padding: 8px 25px;
  text-transform: uppercase;
  font-size: 13px;
  font-weight: 500;
  letter-spacing: 1px;
  transition: 0.3s;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #cda45e;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
</style>
<head>
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
  <?php
if(isset($_SESSION['komunikat'])){ // WYŚWIETLA KOMUNIKAT O POMYSLNEJ REJESTRACJI/LOGOWANIU
  echo($_SESSION['komunikat']);
  unset($_SESSION['komunikat']);
}

if(isset($_SESSION['wyloguj'])){ // WYŚWIETLA KOMUNIKAT O NIE/POMYSLNYM WYLOGOWANIU SIĘ
  echo($_SESSION['wyloguj']);
  unset($_SESSION['wyloguj']);
session_destroy();
}
?>
  <?php
if(isset($_SESSION['blad'])){ // WYŚWIETLA KOMUNIKAT O POMYSLNEJ REJESTRACJI/LOGOWANIU
  echo($_SESSION['blad']);
  unset($_SESSION['blad']);
}
?>
  <?php topbar(); ?>
    <!-- ======= Header ======= -->
  <header id="header" class="fixed-top" style="padding-left: 20%; text-align: center">
    <?php menu('index.php'); ?>
  </header><!-- End Header -->
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-left" data-aos="zoom-in" data-aos-delay="100">


      <div class="row">
        <div class="col-lg-8">
          <h1>Temat pracy dyplomowej <span>Responsywna </span></h1>
          <h2> aplikacja internetowa E-KUCHNIA</h2>
          <div class="btns">
            <a href="#menu" class="btn-menu animated fadeInUp scrollto">Dostępne przepisy</a>
            <a href="#book-a-table" class="btn-book animated fadeInUp scrollto">Co masz w swojej kuchni?</a>
          </div>
        </div>
        <div class="col-lg-4 d-flex align-items-center justify-content-center" data-aos="zoom-in" data-aos-delay="200">
          <a href="https://www.youtube.com/watch?v=xrP0PpIyL8k" class="venobox play-btn" data-vbtype="video" data-autoplay="true"></a>
        </div>
      </div>
    </div>
  </section><!-- End Hero -->
  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
            <div class="about-img">
              <img src="assets/img/owoce.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>E-kuchnia</h3>
            <p class="font-italic">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>
            <ul>
              <li><i class="icofont-check-circled"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua</li>
              <li><i class="icofont-check-circled"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua</li>
              <li><i class="icofont-check-circled"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua</li>
            </ul>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua
            </p>
          </div>
        </div>
      </div>
    </section><!-- End About Section -->
    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>O aplikacji</h2>
          <p>Korzystanie z niej jest proste</p>
        </div>
        <h6><p>Aplikacja E-kuchnia jest autorskim pomysłem, ułatwiający rozpoczęcie swojej przygody z kuchnią. Nie masz pomysłu na posiłek?</p>
        <p style="margin-bottom: 5%;">
        Więc, aplikacja
        jest w sam raz dla Ciebie. Jak z niej korzystać?</p></h6>
        <div class="row">
          <div class="col-lg-4"  style="max-height: 500px; max-height: 500px;">
            <div class="box" data-aos="zoom-in" data-aos-delay="100">
              <span>Krok 01</span>
              <h4>Skorzystaj z formularza kuchennych produktów<h4>
              <p>Przed skorzystaniem z aplikacji upewnij się, że Twoja lodówka nie jest pusta :) Formularz dostępny jest <a href="#blank">TUTAJ</a></p>
            </div>
          </div>
          <div class="col-lg-4"  style="max-height: 500px; max-height: 500px;">
            <div class="box" data-aos="zoom-in" data-aos-delay="200">
              <span>Krok 02</span>
              <h4>Zaznacz wybrane produkty</h4>
              <p>Dzięki szerokiej gamie produktów jesteś w stanie znaleźć dosłownie każdy produkt który masz u siebie w kuchni</p>
            </div>
          </div>
          <div class="col-lg-4"  style="max-height: 500px; max-height: 500px;">
            <div class="box" data-aos="zoom-in" data-aos-delay="300">
              <span>Krok 03</span>
              <h4>Zabierz się za przygotowanie posiłku</h4>
              <p>Już koniec, jesteś w stanie przygotować posiłek, który aplikacja Tobie podpowiedziała</p>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Why Us Section -->
    <?php przepisy('index.php'); ?>
    <!-- ======= Specials Section ======= -->
    <section id="specials" class="specials">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Aleja gwiazd</h2>
          <p>Dania najlepiej przyjęte przez użytkowników</p>
        </div>
        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-3">

            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-toggle="tab" href="#tab-1">Miejsce 1 </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-2">Miejsce 2</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-3">Miejsce 3</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-4">Miejsce 4</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-5">Miejsce 5</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              <?php
            $aleja_gwiazd = mysqli_query($connection, "SELECT AVG(`ocena`) AS ocena_srednia, id_przepisu , `przepisy`.* FROM `oceny` LEFT JOIN `przepisy` ON `oceny`.`id_przepisu` = `przepisy`.`ID` GROUP BY id_przepisu DESC ORDER BY `ocena_srednia` DESC ");   
            $zlicz = mysqli_num_rows($aleja_gwiazd);
            for ($i=0; $i < $zlicz; $i++) { 
              
              $rekord= mysqli_fetch_assoc($aleja_gwiazd);
              $trudnosc[$i] = $rekord['Trudnosc'];
              $ocena_srednia[$i] = $rekord['ocena_srednia'];
              $nazwa[$i] = $rekord['Nazwa'];
              $opis[$i] = $rekord['Opis'];
              $obrazek[$i] = $rekord['obrazek'];
            }
              echo"<div class='tab-pane active show' id='tab-1'>
                <div class='row'>
                  <div class='col-lg-8 details order-2 order-lg-1'>
            <h3>".$nazwa[0]."</h3> <div>";
                    for ($i=1; $i <= 5; $i++) { 
                  if($i<=$ocena_srednia[0])
                  {
                    echo "<span style='font-size:20px;cursor:pointer; color: #cda45e;'  class='fa fa-star checked'></span></a>";
                  }
                  else {
                    echo "<span style='font-size:20px;cursor:pointer;'  class='fa fa-star checked'></span></a>";
                  }
                }
                echo "<b style='font-size: 12px; margin-left: 2px;; color: #aaaaaa' class='font-italic'>Średnia Ocena: ". round($ocena_srednia[0], 1) ."</b></div>";
                echo "</h3> <br>             
                    <p class='font-italic'>".$opis[0]."</p>
                  </div>
                
                  <div class='col-lg-4 text-center order-1 order-lg-2'>
                    <img src='".$obrazek[0]."'  class='img-fluid'>
                  </div>
                </div>
              </div>";


              echo"<div class='tab-pane' id='tab-2'>
                <div class='row'>
                  <div class='col-lg-8 details order-2 order-lg-1'>
            <h3>".$nazwa[1]."</h3> <div>";
                    for ($i=1; $i <= 5; $i++) { 
                  if($i<=$ocena_srednia[1])
                  {
                    echo "<span style='font-size:20px;cursor:pointer; color: #cda45e;'  class='fa fa-star checked'></span></a>";
                  }
                  else {
                    echo "<span style='font-size:20px;cursor:pointer;'  class='fa fa-star checked'></span></a>";
                  }
                }
                echo "<b style='font-size: 12px; margin-left: 2px;; color: #aaaaaa' class='font-italic'>Średnia Ocena: ". round($ocena_srednia[1], 1) ."</b></div>";
                echo "</h3> <br>             
                    <p class='font-italic'>".$opis[1]."</p>
                  </div>
                
                  <div class='col-lg-4 text-center order-1 order-lg-2'>
                    <img src='".$obrazek[1]."'  class='img-fluid'>
                  </div>
                </div>
              </div>";
              ?>


              <div class="tab-pane" id="tab-3">
                <div class='row'>
                  <?php
               echo"<div class='col-lg-8 details order-2 order-lg-1'>
            <h3>".$nazwa[2]."</h3> <div>";
                    for ($i=1; $i <= 5; $i++) { 
                  if($i<=$ocena_srednia[2])
                  {
                    echo "<span style='font-size:20px;cursor:pointer; color: #cda45e;'  class='fa fa-star checked'></span></a>";
                  }
                  else {
                    echo "<span style='font-size:20px;cursor:pointer;'  class='fa fa-star checked'></span></a>";
                  }
                }
                echo "<b style='font-size: 12px; margin-left: 2px;; color: #aaaaaa' class='font-italic'>Średnia Ocena: ". round($ocena_srednia[2], 1) ."</b></div>";
                echo "</h3> <br>             
                    <p class='font-italic'>".$opis[2]."</p>
                  </div>
                
                  <div class='col-lg-4 text-center order-1 order-lg-2'>
                    <img src='".$obrazek[2]."'  class='img-fluid'>
                  </div>
                </div>
              </div>";
              ?>
              <div class="tab-pane" id="tab-4">
                <div class='row'>
                  <?php
               echo"<div class='col-lg-8 details order-2 order-lg-1'>
            <h3>".$nazwa[3]."</h3> <div>";
                    for ($i=1; $i <= 5; $i++) { 
                  if($i<=$ocena_srednia[3])
                  {
                    echo "<span style='font-size:20px;cursor:pointer; color: #cda45e;'  class='fa fa-star checked'></span></a>";
                  }
                  else {
                    echo "<span style='font-size:20px;cursor:pointer;'  class='fa fa-star checked'></span></a>";
                  }
                }
                echo "<b style='font-size: 12px; margin-left: 2px;; color: #aaaaaa' class='font-italic'>Średnia Ocena: ". round($ocena_srednia[3], 1) ."</b></div>";
                echo "</h3> <br>             
                    <p class='font-italic'>".$opis[3]."</p>
                  </div>
                
                  <div class='col-lg-4 text-center order-1 order-lg-2'>
                    <img src='".$obrazek[3]."'  class='img-fluid'>
                  </div>
                </div>
              </div>";
              ?>
              <div class="tab-pane" id="tab-5">
                <div class='row'>
                  <?php
               echo"<div class='col-lg-8 details order-2 order-lg-1'>
            <h3>".$nazwa[4]."</h3> <div>";
                    for ($i=1; $i <= 5; $i++) { 
                  if($i<=$ocena_srednia[4])
                  {
                    echo "<span style='font-size:20px;cursor:pointer; color: #cda45e;'  class='fa fa-star checked'></span></a>";
                  }
                  else {
                    echo "<span style='font-size:20px;cursor:pointer;'  class='fa fa-star checked'></span></a>";
                  }
                }
                echo "<b style='font-size: 12px; margin-left: 2px;; color: #aaaaaa' class='font-italic'>Średnia Ocena: ". round($ocena_srednia[4], 1) ."</b></div>";
                echo "</h3> <br>             
                    <p class='font-italic'>".$opis[4]."</p>
                  </div>
                
                  <div class='col-lg-4 text-center order-1 order-lg-2'>
                    <img src='".$obrazek[4]."'  class='img-fluid'>
                  </div>
                </div>
              </div>";
              ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Specials Section -->

    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Nowość</h2>
          <p>Ostatnio dodane przepisy, które może staną się bestsellerem</p>
        </div>
        <div class="owl-carousel events-carousel" data-aos="fade-up" data-aos-delay="100">
<?php

$query_przepisy = mysqli_query($connection,"SELECT * FROM `przepisy` ORDER BY `ID` DESC LIMIT 3");
    while($row_przepisy = mysqli_fetch_array($query_przepisy))
    {
      $query_przepisy_skladnik = mysqli_query($connection,"SELECT AVG(`ocena`) AS Srednia, `przepisy_skladniki`.*
      FROM `oceny`
      , `przepisy_skladniki` WHERE `oceny`.`id_przepisu` = $row_przepisy[ID]");
      $row = mysqli_fetch_assoc($query_przepisy_skladnik);
      $zaokraglona = round($row['Srednia'], 0);
      echo "<div class='row event-item'>
            <div class='col-lg-6'>
              <img src='".$row_przepisy['obrazek']."' alt='' class='img-fluid' style='max-height: 500px;'> 
            </div>
            <div class='col-lg-6 pt-4 pt-lg-0 content'>
              <h3><a href='przepis.php?ID=".$row_przepisy['ID']."&Nazwa=".$row_przepisy['Nazwa']."'>" .$row_przepisy['Nazwa']. "</a></h3>
              <div class='price'>
                <p><span>".$zaokraglona."✩    <i class='fa fa-hourglass-start' aria-hidden='true' style='margin-left:3%;'></i> " . $row_przepisy['Czas'] . "min <i class='fas fa-mug-hot' aria-hidden='true' style='margin-left:3%;'></i> " . $row_przepisy['Trudnosc'] . " </span>
                </p>

              </div>
              <p class='font-italic'>
                ".$row_przepisy['Opis']."
              </p>
              <ul>";

                while($row_przepisy_skladniki = mysqli_fetch_array($query_przepisy_skladnik))
                {
                  $query_skladnik = mysqli_query($connection,"SELECT * FROM `skladniki` WHERE `ID`=$row_przepisy_skladniki[Skladniki_ID]");
                  
                  while($row_skladniki = mysqli_fetch_array($query_skladnik))
                  {
                    echo "<li><i class='icofont-check-circled'></i>".$row_skladniki['Produkt']." x ". $row_przepisy_skladniki['Ilosc_skladnikow'] . " " . $row_przepisy_skladniki['Jednostka'] . "</li>";
                  }



                }
            echo "</ul><p>
                Dodano przez TUTAJ BĘDZIE NAZWA USERA
              </p>
            </div>
          </div>";
        }
?>
        </div>
      </div>
    </section><!-- End Events Section -->
    <!-- ======= Book A Table Section ======= -->
    <section id="book-a-table" class="book-a-table">
<?php
if(isset($_SESSION['przepis'])){ // WYŚWIETLA KOMUNIKAT O POMYSLNEJ REJESTRACJI/LOGOWANIU
  echo($_SESSION['przepis']);
  unset($_SESSION['przepis']);
}
include 'pomysl.php';

?>
    </section><!-- End Book A Table Section -->
  


   
    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Galeria</h2>
          <p>Zdjęcia losowych dań</p>
        </div>
      </div>
      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">
        <div class="row no-gutters">
          <?php
$obrazki = mysqli_query($connection,"SELECT * FROM przepisy LIMIT 0,8");
    while($row = mysqli_fetch_array($obrazki)){
    echo"<div class='col-lg-3 col-md-4'>
          <a href='przepis.php?ID=".$row['ID']."'>".$row['Nazwa']."</a>
            <div class='gallery-item'>
              <a href=".$row['obrazek']." class='venobox' data-gall='gallery-item'>
                <img src='".$row['obrazek']."' alt='' class='img-fluid'>
              </a>
            </div>
          </div>";
    }
?>
          </div>
        </div>
      </div>
    </section><!-- End Gallery Section -->
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Skontaktuj się</h2>
          <p>Lokalizacja</p>
        </div>
      </div>
      <div data-aos="fade-up">
        <iframe style="border:0; width: 100%; height: 350px;" allowfullscreen="" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2565.8674180958037!2d23.11341431571434!3d49.97634487941282!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x473321b688784fd65ff%3A0xcd4ffff97b1dcaf9!2zQnVkennFhCAyMSwgMzctNTUyIEJ1ZHp5xYQ!5e0!3m2!1spl!2spl!4v1602596793244!5m2!1spl!2spl" frameborder="0"></iframe>
      </div>
      <div class="container" data-aos="fade-up">
        <div class="row mt-5">
          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Lokalizacja:</h4>
                <p></p>
              </div>
              <div class="open-hours">
                <i class="icofont-clock-time icofont-rotate-90"></i>
                <h4>Strona:</h4>
                <p>
                  Pn-Sob 24h<br>

                  Niedziela: NIECZYNNE
                </p>
              </div>
              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>antoniowdamian@gmail.com</p>
              </div>
              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Telefon:</h4>
                <p>0700</p>
              </div>
            </div>
          </div>
          <!-- STYL DO FORMULARZA KONTAKTOWEGO !-->
          <style type="text/css">
.formularz button[type="submit"] {
  background: #cda45e;
  border: 0;
  padding: 10px 35px;
  color: #fff;
  transition: 0.4s;
  border-radius: 50px;

}
.formularz button[type="submit"]:hover {
  background: #d3af71;
}
          </style>
          <!-- STYL DO FORMULARZA KONTAKTOWEGO !-->
          <div class="col-lg-8 mt-5 mt-lg-0">
            <form action="forms/contact.php" method="post" role="form" class="formularz">
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" name="imie" class="form-control"  placeholder="Twoje imię" data-rule="minlen:4" data-msg="Wprowadż minimum 4 znaki" required="" style="border-radius: 0;
  box-shadow: none;
  font-size: 14px;
  background: #0c0b09;
  border-color: #625b4b;
  color: white;">
                </div>
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="email"  placeholder="Twój email" data-rule="email" data-msg="Adres email jest nieprawidłowy" required="" style="border-radius: 0;
  box-shadow: none;
  font-size: 14px;
  background: #0c0b09;
  border-color: #625b4b;
  color: white;">
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="temat"  placeholder="Temat" data-rule="minlen:4" data-msg="Wpisz przynajmniej 8 znaków" required="" style="border-radius: 0;
  box-shadow: none;
  font-size: 14px;
  background: #0c0b09;
  border-color: #625b4b;
  color: white;">
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="wiadomosc" rows="8" data-rule="required" data-msg="Wiadomość nie może być pusta" placeholder="Wiadomość" required="" style="border-radius: 0;
  box-shadow: none;
  font-size: 14px;
  background: #0c0b09;
  border-color: #625b4b;
  color: white;"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="error-message"></div>
                <div class="sent-message">  <?php
if(isset($_SESSION['email'])){ // WYŚWIETLA KOMUNIKAT O POMYSLNEJ REJESTRACJI/LOGOWANIU
  echo($_SESSION['email']);
  unset($_SESSION['email']);
}

?></div>
              </div>
              <div class="text-center"><button type="submit" name="wyslij" class="formularz">Wyślij wiadomość</button></div>
            </form>


          </div>
        </div>
      </div>
    </section><!-- End Contact Section -->
  </main><!-- End #main -->
  <?php footer('default'); ?>
  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>

  <!-- Vendor JS Files -->
  <!-- <script src="assets/vendor/jquery/jquery.min.js"></script> -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
<!-- POPUP'Y !-->
<?php logowanie_rejestracja_haslo() ?>
</body>


</html>