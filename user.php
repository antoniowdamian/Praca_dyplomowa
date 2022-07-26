<?php
error_reporting(0);
session_start(); 
include 'baza.php';

?>


<!DOCTYPE html>
<html lang="pl">

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
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <i class="icofont-phone"></i> 0700
        <span class="d-none d-lg-inline-block"><i class="icofont-clock-time icofont-rotate-180"></i> Pon-Pt: 24h</span>
        <span class="d-none d-lg-inline-block"><i class="icofont-clock-time icofont-rotate-180"></i> Niedziela: NIECZYNNE</span>
      </div>
      <div class="languages">
        <ul>
          <li>En</li>
          <li><a href="#">Pl</a></li>
        </ul>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.php">E-kuchnia</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.php">Strona Główna</a></li>
          <li><a href="#">Moje ulubione</a></li>
          <li><a href="#">Moje przepisy</a></li>        
          <li><a href="#">Oceń przepisy</a></li>

          <!-- Button trigger modal -->
          <li class="book-a-table text-center"  data-toggle="modal" data-target="#Logowanie"><a>Wyloguj się</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->


  <main id="main">

    <!-- ======= Specials Section ======= -->
    <section id="specials" class="specials" style="margin-top: 5%;">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Dodaj przepis</h2>
          <p>Dodawanie jest proste</p>
        </div>
<!-- FORMULARZ !-->
  <form action="dodaj.php" method="POST" enctype="multipart/form-data">
        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-toggle="tab" href="#tab-1">Podaj tytuł przepisu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-2">Dodaj opis przepisu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-3">Podaj składniki</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-4">Opisz przygotowanie przepisu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-5">Oceń trudność oraz czas przyrządzenia</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-6">Dodaj zdjęcie przepisu i wyślij</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Tytuł</h3>
                        <div class="form-group">
                        <input type="text" class="form-control" id="tytul" placeholder="Wprowadź nazwę przepisu" name="tytul" required>
                        </div>
                        <h3>Określ kategorię przepisu</h3>
                        <div class="form-group">
                        <select name="kategoria" class="form-control" id="tytul" placeholder="Podaj kategorię" required>
                          <option value="Mięso">Mięso</option>
                          <option value="Pizza">Pizza</option>
                          <option value="Fast Food">Fast Food</option>
                          <option value="Ciasta i desery">Ciasta i desery</option>
                          <option value="Sałatki">Sałatki</option>
                          <option value="Zupy">Zupy</option>
                          <option value="Pieczywo">Pieczywo</option>
                          <option value="Wegańskie">Wegańskie</option>
                        </select>
                        </div>
                        <button class="btn btn-outline-warning" data-toggle="tab" href="#tab-2">Dalej</button>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/specials-1.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-2">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Dodaj opis przepisu</h3>
                        <div class="form-group">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="opis" required></textarea>
                        </div>
                        <button class="btn btn-outline-warning" data-toggle="tab" href="#tab-3">Dalej</button>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/specials-2.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-3">
                <div class="row">
                  <div class="col-lg-6 details order-2 order-lg-1">
                    <h3>Podaj składniki</h3>
                    <div class="form-group">
                        <input type="text" class="form-control"  placeholder="Wprowadź 1 składnik" name="skladnik" >
                        </div>
                        <div class="form-group">
                        <input type="text" class="form-control"  placeholder="Wprowadź 2 składnik" name="skladnik1" >
                        </div>
                        <div class="form-group">
                        <input type="text" class="form-control"  placeholder="Wprowadź 3 składnik" name="skladnik2" >
                        </div>
                        <div class="form-group">
                        <input type="text" class="form-control"  placeholder="Wprowadź 4 składnik" name="skladnik3" >
                        </div>
                        <div class="form-group">
                        <input type="text" class="form-control"  placeholder="Wprowadź 5 składnik" name="skladnik4" >
                        </div>
                        <div class="form-group">
                        <input type="text" class="form-control" id="tytul" placeholder="Wprowadź 6 składnik" name="skladnik5" >
                        </div>
                        <div class="form-group">
                        <input type="text" class="form-control" id="tytul" placeholder="Wprowadź 7 składnik" name="skladnik6" >
                        </div>
                        <div class="form-group">
                        <input type="text" class="form-control" id="tytul" placeholder="Wprowadź 8 składnik" name="skladnik7" >
                        </div>
                        <div class="form-group">
                        <input type="text" class="form-control" id="tytul" placeholder="Wprowadź 9 składnik" name="skladnik8" >
                        </div>
                        <div class="form-group">
                        <input type="text" class="form-control" id="tytul" placeholder="Wprowadź 10 składnik" name="skladnik9" >
                        </div>

                  </div>
                  <div class="col-lg-6 details order-2 order-lg-1">
                    <h3>Ilość składników (szt/g)</h3>
                    <div class="form-group">
                        <input type="number" class="form-control"  placeholder="Podaj ilość szt" name="ilosc" min="1" max="999" required>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control"  placeholder="Podaj ilość szt" name="ilosc1" min="1" max="999" required>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control"  placeholder="Podaj ilość szt" name="ilosc2" min="1" max="999" required>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control"  placeholder="Podaj ilość szt" name="ilosc3" min="1" max="999">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control"  placeholder="Podaj ilość szt" name="ilosc4" min="1" max="999">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control"  placeholder="Podaj ilość szt" name="ilosc5" min="1" max="999">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control"  placeholder="Podaj ilość szt" name="ilosc6" min="1" max="999">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control"  placeholder="Podaj ilość szt" name="ilosc7" min="1" max="999">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control"  placeholder="Podaj ilość szt" name="ilosc8" min="1" max="999">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control"  placeholder="Podaj ilość szt" name="ilosc9" min="1" max="999">
                    </div>
                    <button class="btn btn-outline-warning" data-toggle="tab" href="#tab-4">Dalej</button>
                  </div>
                  <div class="col-lg-2 details order-2 order-lg-1">
                    
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-4">
                <div class="row">
                    <div class="col-lg-6 details order-2 order-lg-1">
                      <h3>Opisz przygotowanie przepisu</h3>
                  <div class="md-form">
                      <label for="form7">Krok1</label>
                        <textarea  class="md-textarea form-control" rows="2" name="krok1"></textarea>
                  </div>
                  <div class="md-form">
                      <label for="form7">Krok2</label>
                        <textarea name="krok2" class="md-textarea form-control" rows="2"></textarea>
                  </div>
                  <div class="md-form">
                      <label for="form7">Krok3</label>
                        <textarea name="krok3" class="md-textarea form-control" rows="2"></textarea>
                      </div>
                    </div>
              <div class="col-lg-6 details order-2 order-lg-1">
                <div class="md-form">
                        <h3>:)</h3>
                      <label for="form7">Krok4</label>
                        <textarea name="krok4" class="md-textarea form-control" rows="2"></textarea>
                </div>
                <div class="md-form">
                      <label for="form7">Krok5</label>
                        <textarea name="krok5" class="md-textarea form-control" rows="2"></textarea>
                 </div>
                 <div class="md-form">
                    <label for="form7">Krok6</label>
                        <textarea name="krok6" class="md-textarea form-control" rows="2"></textarea>
                    </div>
                  <button class="btn btn-outline-warning" data-toggle="tab" href="#tab-5" style="margin-top: 2%;">Dalej</button>
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-5">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Oceń trudność oraz czas przyrządzenia</h3>
                      <div class="form-group">
        <label for="exampleFormControlSelect1"> <i class="fas fa-mug-hot"></i> Wybierz poziom trudności:</label>
        <select class="form-control" name="poziom" style="width: 20%;">
        <option>łatwy </option>
        <option>średni</option>
        <option>trudny</option>
        </select>
              </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1"> <i class="fa fa-clock-o"></i> Podaj czas (min):</label>
                      <input type="number" class="form-control" name="czas" min="1" max="999" style="width: 20%;">
                    </div>
                    <button class="btn btn-outline-warning" data-toggle="tab" href="#tab-6">Dalej</button>


                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <i class="fa fa-clock-o fa-10x" style="margin-left: 20%;"></i>
                  </div>
                </div>
              </div>

              <div class="tab-pane" id="tab-6">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Dodaj zdjęcie przepisu</h3>
 <label class="custom-file-upload">
    <input type="file" name="fileToUpload" id="fileToUpload">
     Dodaj obrazek do przepisu
</label>
<style>
  .custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
}
</style>
                    <button type="submit" class="btn btn-outline-warning">Wyślij</button>


                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <i class="fa fa-camera-retro fa-10x"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </form> <!-- KONIEC FORMULARZA -->
    </section><!-- End Specials Section -->  
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>E-kuchnia</h3>
              <p>
                Damian Antoniów <br>
                <br><br>
                <strong>Phone:</strong> 0700<br>
                <strong>Email:</strong> antoniowdamian@gmail.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Odnośniki</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Strona główna</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">O stronie</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Wsparcie</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Warunki usługi</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Polityka prywatnościy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Usługi</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Zapisz się do Newsweek'a</h4>
            <p>Wprowadź swój adres e-mail, aby być na bieżąco z nowościami.</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>PWSTE Jarosław</span></strong>. Wszelkie prawa zastrzeżone
      </div>
      <div class="credits">
      </div>
    </div>
  </footer><!-- End Footer -->

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
<!-- POPUP'Y !-->
</body>


</html>