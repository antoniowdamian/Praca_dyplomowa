<?php
error_reporting(0);
session_start();
  $user = ($_SESSION['login']);
  $id = ($_SESSION['id']);
  $opcja = $_GET['opcja'];
include 'baza.php';
/*
if (isset($_SESSION["zalogowany"])) {
  echo  "<br>zalogowany: " . $_SESSION["zalogowany"] .
        "<br>ID: " . $_SESSION["id"] .
        "<br>Email: " .$_SESSION["email"].
        "<br>Imie: " . $_SESSION["imie"] .
        "<br>Login: " . $_SESSION["login"] .
        "<br>Nazwisko: " . $_SESSION["nazwisko"] .
        "<br>Permission: " . $_SESSION["poziom_konta"];
}*/
  if (!isset($_SESSION['zalogowany']))
  {
         $_SESSION['komunikat'] ="<div class='alert alert-danger alert-dismissible fade show' role='alert' style='position: absolute; width: 100%; top: 20%; text-align: center; z-index: 1;'>
  <strong>UWAGA! </strong>Opcja dostępna tylko dla zalogowanych
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
    header('Location: index.php');
    exit();
  }
   if  ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']=="true") && ($_SESSION['poziom_konta']=="0")) 
  {
     $_SESSION['komunikat'] ="<div class='alert alert-danger alert-dismissible fade show' role='alert' style='position: absolute; width: 100%; top: 20%; text-align: center; z-index: 1;'>
  <strong>".($_SESSION['login'])." </strong>Twoje konto jest zablokowane 
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
header('Location: index.php');
exit();
  }
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


  <script type="text/javascript" language="javascript" src="assets/js/tabelka.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>

  <script type="text/javascript" class="init">
  


$(document).ready(function() {
  $('#example').DataTable();
} );



  </script>
    
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
        max-width: 50%;
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

    <script>
$(document).ready(function(){
  var i=1;
  //echo "<option value=" . $skladniki_row['ID'] ."></option>";
  var e = '<?php

  $skladniki_query = mysqli_query($connection, "SELECT * FROM `skladniki` WHERE `stan` = '1' ORDER BY `Produkt` ASC"); 
  $skladniki_rows = mysqli_num_rows($skladniki_query); if (mysqli_num_rows($skladniki_query) > 0)
   { 
    echo '<select class="form-control" name="skladnik[]">';
    echo "<option>Wybierz składnik</option>"; 
    while($skladniki_row = mysqli_fetch_assoc($skladniki_query)) {
    echo "<option value= ".$skladniki_row['ID']." > " . $skladniki_row['Produkt'] . " </option>";
    }
    echo "</select>";
   }?>';
  $('#add').click(function(){
    i++;
    $('#dynamic_field').append('<tr id="row'+i+'"><td style="border: none;">'+e+'</td><td style="border:none"><input type="number" name="ilosc[]" placeholder="Ilość" class="form-control" required=""  min="1" max="9999" ></td><td style="border:none;"><input type="text" name="jednostka[]" placeholder="Wprowadź jednostkę" class="form-control" required="" ></td><td style="border:none;"><button type="button" name="remove" id="'+i+'" class="btn btn-outline-warning btn_remove">Usuń -</button></td></tr>');
  });


  $(document).on('click', '.btn_remove', function(){
    var button_id = $(this).attr("id"); 
    $('#row'+button_id+'').remove();
  });
});
  $(document).ready(function(){
    var j=1;
  $('#dodaj').click(function(){
    j++
  $('#kroki').append('<tr id="row'+j+'"><td style="border: none;"><textarea oninput="auto_grow(this)" name="krok[]" class="form-control" style="overflow: hidden;" ></textarea></td><td style="border:none;"><button type="button" name="remove" id="'+j+'" class="btn btn-outline-warning btn_remove">Usuń -</button></td></tr>');
  });
   });     
  function auto_grow(element) {
          element.style.height = "5px";
          element.style.height = (element.scrollHeight)+"px";
  }
</script>
</head>
<body >
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



<?php
        echo "<div class='container d-flex align-items-center'>
                <h1 class='logo mr-auto'><a href='index.php'>E-KUCHNIA</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href='index.html' class='logo mr-auto'><img src='assets/img/logo.png' alt='' class='img-fluid'></a>-->

                <nav class='nav-menu d-none d-lg-block' style='color: rgba(255,255,255,.5), padding-left: 0;'>
                  <ul style='color: rgba(255,255,255,.5);'>
                    <li class='nav-item' style='padding-left: 0;'><a href='index.php#menu' class='nav-link'
                        aria-haspopup='true' aria-expanded='false' style='white-space: nowrap; line-height: 2; color: rgba(255,255,255,.5);'>Przepisy</a></li>        
                    <li class='nav-item' style='padding-left: 0;'><a href='index.php#specials' class='nav-link' id='navbarDropdownMenuLink'
                        aria-haspopup='true' aria-expanded='false' style='white-space: nowrap; line-height: 2; color: rgba(255,255,255,.5);'>Aleja gwiazd</a></li>
                    <li class='nav-item' style='padding-left: 0;'><a href='index.php#events' class='nav-link' id='navbarDropdownMenuLink'
                        aria-haspopup='true' aria-expanded='false' style='white-space: nowrap; line-height: 2; color: rgba(255,255,255,.5);'>Nowość</a></li>
                    <li class='nav-item' style='padding-left: 0;'><a href='index.php#gallery' class='nav-link' id='navbarDropdownMenuLink'
                        aria-haspopup='true' aria-expanded='false' style='white-space: nowrap; line-height: 2; color: rgba(255,255,255,.5);'>Galeria</a>
                        </li>

                    <li class='nav-item' style='padding-left: 0;'><a href='index.php#book-a-table' class='nav-link' id='navbarDropdownMenuLink'
                        aria-haspopup='true' aria-expanded='false' style='white-space: nowrap; line-height: 2; color: rgba(255,255,255,.5);'>Wyszukiwarka przepisów</a></li>";


                     if (isset($_SESSION["zalogowany"]) && $_SESSION["zalogowany"]==1 ) {
                      echo "<ul class='navbar-nav mr-auto'></ul>    
                  <ul class='navbar-nav mr-auto'>
                    <li class='nav-item dropdown'>
                      <a class='nav-link dropdown-toggle' id='navbarDropdownMenuLink' data-toggle='dropdown'
                        aria-haspopup='true' aria-expanded='false' style='border: 2px solid #cda45e; color: #fff; border-radius: 50px; padding: 8px 25px; text-transform: uppercase; font-size: 13px; font-weight: 500; letter-spacing: 1px; transition: 0.3s;'>
                        Witaj <b>" . $_SESSION['login'] ."</b>, opcje konta
                        </a>
                      <div class='dropdown-menu dropdown-primary' aria-labelledby='navbarDropdownMenuLink' style='background:rgba(12, 11, 9, 0.6); margin-top: 5%;'>
                      <style>
                        .dropdown-item:hover {
                          background: #666666
                        }
                      </style>
                        <a class='dropdown-item' href='panel.php'>Dodaj przepis</a>
                        <a class='dropdown-item' href='panel.php?opcja=moje_przepisy'>Moje przepisy</a>
                        <a class='dropdown-item' href='panel.php?opcja=ulubione'>Ulubione przepisy</a>
                        <a class='dropdown-item' href='panel.php?opcja=ocen_przepisy'>Ocenione przepisy</a>

                        <a class='dropdown-item' href='zmien_haslo.php?zmiana_hasla=". $_SESSION["id"] ."'>Kliknij tutaj, aby zmienić hasło</a>
                        <a class='dropdown-item' href='logout.php'>Kliknij tutaj, aby się wylogować</a>
                      </div>
                    </li>
                  </ul>";
                    }
                    else {
                      echo "<!-- Button trigger modal -->
                            <li class='book-a-table text-center'  data-toggle='modal' data-target='#Logowanie'><a>ZALOGUJ</a></li>";
                    }
                    
                  echo "</ul>
                </nav><!-- .nav-menu -->

              </div>";
?>

    </div>
  </header><!-- End Header -->


  <main id="main">


<?php
switch ($opcja) {
  case 'moje_przepisy':
    echo "<section id='menu' class='menu section-bg'>
      <div class='container aos-init aos-animate' data-aos='fade-up'>

        <div class='section-title' style='margin-top: 10%;'>
          <h2>".$user."</h2>
          <p>MOJE PRZEPISY</p>
        </div>


        <div class='row menu-container aos-init aos-animate' data-aos='fade-up' data-aos-delay='200' style='position: relative; min-height: 600px;'>";
  $zupa = mysqli_query($connection,"SELECT * FROM `przepisy` WHERE `id_uzytkownika`= $id");
   while($row = mysqli_fetch_array($zupa)){

   echo"<div class='col-lg-6 menu-item filter-zupa'>"; //mieso
        echo"<a href='".$row['obrazek']."' class='venobox' data-gall='gallery-item' style='width: 100px; height: 100px;'> 
            <img src='".$row['obrazek']."' class='menu-img' alt='' style='width: 100px; height: 100px;'></a>";  // wyswietlanie obrazka
        echo"<div class='menu-content'>";
        echo"<a href='przepis.php?ID=".$row['ID']."&nazwa=".$row['Nazwa']."'>".$row['Nazwa']."</a><span><i class='fa fa-hourglass-start'></i>".$row['Czas']." min</span>";              
         echo"</div>
            <div class='menu-ingredients'>";
        echo substr ($row['Opis'], 0, 100) ; echo "...";
          echo"</div>
          </div>";
        } 
       echo" </div>

      </div>
    </section>";
    break;
       case 'ocen_przepisy':
        echo "<section id='menu' class='menu section-bg'>";


?>
<?php
 echo"<div class='container aos-init aos-animate' data-aos='fade-up'>

        <div class='section-title' style='margin-top: 10%;'>
          <h2>".$user."</h2>
          <p>MOJE OCENY</p>";

          if(isset($_SESSION['komunikat'])){ // WYŚWIETLA KOMUNIKAT O POMYSLNEJ REJESTRACJI/LOGOWANIU
  echo($_SESSION['komunikat']);
  unset($_SESSION['komunikat']);
}

echo"        </div>";
    echo
    "<style>
    .demo-html{
position: relative;
width: 100%;
margin-left: auto;
margin-right: auto;
    }
    </style>";
  echo"<div class='fw-background'>
    <div></div>
  </div>
  <div class='fw-container'>
    <div class='fw-body'>
        <div class='demo-html'>
      
          <table id='example' class='table table-striped table-bordered dt-responsive nowrap' style='width:100%; color: white;' >
            <thead>
             <tr>
                <th>ID</th>
                <th>Nazwa</th>
                <th>Obrazek</th>
                <th>Aktualna ocena</th>
                <th>Zmiana oceny</th>
              </tr>

              
            </thead>
            <tbody>";
              ?>
              <?php
                $ocen = mysqli_query($connection," SELECT `przepisy`.`ID` AS przepis_ID, `przepisy`.`Nazwa`, `przepisy`.`obrazek`, `oceny`.* FROM `przepisy` LEFT JOIN `oceny` ON `oceny`.`id_przepisu` = `przepisy`.`ID` WHERE oceny.user_id = $id");
                while($row = mysqli_fetch_array($ocen)){
                  $ocena = $row['ocena'];

   echo" 
    <tr>
    <form action='admin_opcje.php' method='get'>";
   echo"
      <td style='color: #FFD700;'><b>".$row['przepis_ID']."</b></td>
      <td style='color: #FFD700;'><b>".$row['Nazwa']."</b></td>
      <td style='color: #FFD700;'><b><img src='".$row['obrazek']."' style='max-width: 300px; max-height: 150px;'></b></td>
      <td>";        for ($i=1; $i <= 5; $i++) { 
                  if($i<=$ocena)
                  {
                    echo "<a href='#'><span   id='" . $i . "' style='font-size:20px;cursor:pointer;'  class='fa fa-star checked' title='Gwiazdek ".$i."'></span></a>";
                  }
                  else {
                    echo "<a href='#' ><span   id='" . $i . "' style='color: white;font-size:15px;cursor:pointer;'  class='fa fa-star checked'></span></a>";
                  }
                }echo"</td>";
    
   echo"<td>";        for ($i=1; $i <= 5; $i++) {
                  if($i==0) 
                  {
                    echo "<a href='ocena.php?ocena=" . $i . "&ID=" . $ID_przepisu . "&nazwa=" . $nazwa_przepisu . "'  ><span  class='zmiana' id='" . $i . "'   class='fa fa-star checked' title='Gwiazdek ".$i."' ></span></a>";
                  }
                  else {
                    echo "
                    <style>
                    span#".$i.".fa.fa-star.checked.zmiana:hover{
                      color: #cda45e;
                      cursor:pointer;
                    }
                    span#".$i.".fa.fa-star.checked.zmiana{
                      color: red;
                      font-size: 100px;
                    }
                    span.zmiana:hover{
                      font-size: 25px;
                    }
                    #example_filter{
                    padding-left: 50%;
                  }

                    </style>";
                    echo "<a   href='ocena.php?ocena=" . $i . "&ID=" . $row['ID'] . "&nazwa=" . $row['Nazwa'] . "&zmien' ><span  id='" . $i . "'  class='fa fa-star checked zmiana' title='".$i." gwiazdek'></span></a>";
                  }
                }echo"</td>
    </tr>
    </form>";
                              }
                

  echo"          </tbody>
          </table>
        </div>


        </div>
      </div>
    </div>
  </div>

      </div>
    </section><!-- End About Section -->";
    break;
  case 'ulubione':
  ?>
              <?php
if(isset($_SESSION['komunikat'])){ // WYŚWIETLA KOMUNIKAT O POMYSLNEJ REJESTRACJI/LOGOWANIU
  echo($_SESSION['komunikat']);
  unset($_SESSION['komunikat']);
}
?>
<section id="menu" class="menu section-bg">
      <div class="container aos-init aos-animate" data-aos="fade-up">

        <div class="section-title" style="margin-top: 10%;">
          <h2><?php echo $user; ?></h2>
          <p>MOJE ULUBIONE</p>
        </div>


        <div class="row menu-container aos-init aos-animate" data-aos="fade-up" data-aos-delay="200" style="position: relative; min-height: 600px;">

<?php
  $ulubione = mysqli_query($connection,"SELECT `przepisy`.*, `ulubione`.`id_uzytkownika` FROM `przepisy` LEFT JOIN `ulubione` ON `ulubione`.`id_przepis` = `przepisy`.`ID` WHERE `ulubione`.`id_uzytkownika` = $id");
   while($row = mysqli_fetch_array($ulubione)){

   echo"<div class='col-lg-6 menu-item filter-zupa'>"; //mieso
        echo"<a href='".$row['obrazek']."' class='venobox' data-gall='gallery-item' style='width: 100px; height: 100px;'> 
            <img src='".$row['obrazek']."' class='menu-img' alt='' style='width: 100px; height: 100px;'></a>";  // wyswietlanie obrazka
        echo"<div class='menu-content'>";
        echo"<a href='przepis.php?ID=".$row['ID']."&nazwa=".$row['Nazwa']."'>".$row['Nazwa']."</a><span><i class='fa fa-hourglass-start'></i>".$row['Czas']." min 
        <form method='POST' action='user_opcje.php'>
        <input type='hidden' name='id_przepisu' value=".$row['ID'].">
        <button type='submit' name='usun' class='btn btn-danger'><i class='fas fa-ban'></i></button></span></form>";              
         echo"</div>
            <div class='menu-ingredients'>";
        echo substr ($row['Opis'], 0, 100) ; echo "...";
          echo"</div>
          </div>";
        } 
        /*
        if ($row == 0) {
          echo"<div class='section-title' style='margin-top: 2%;'>
          <h2>BRAK PRZEPISÓW W ULUBIONYCH</h2>
        </div>";
         } */
        ?>


        </div>

      </div>
    </section>
    <?php
    break;
  default:
    echo"<section id='specials' class='specials' style='margin-top: 5%;'>
    <div class='container'>
<div class='section-title'>
          <h2>Dodaj przepis";?> <?php echo $user; ?> </h2>
          <p>Dodawanie jest proste</p>
            <?php
if(isset($_SESSION['komunikat'])){ // WYŚWIETLA KOMUNIKAT O POMYSLNEJ REJESTRACJI/LOGOWANIU
  echo($_SESSION['komunikat']);
  unset($_SESSION['komunikat']);
}
?>
        </div>
    <form action="dodaj_przepis.php" method="POST" enctype="multipart/form-data">
      <?php echo"<input type='hidden' name='uzytkownik' value= ".$id.">"; ?>
                <div class="row">
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
                        <input type="text" class="form-control" id="tytul" placeholder="Wprowadź nazwę przepisu" name="tytul" >
                        </div>
                        <h3>Określ kategorię przepisu</h3>
                        <div class="form-group">
                          <form action="dodaj_przepis.php" method="get">
                        <select name="kategoria" class="form-control"  placeholder="Podaj kategorię" >
                          <option value="Mięso">Mięso</option>
                          <option value="Pizza">Pizza</option>
                          <option value="Fast Food">Fast Food</option>
                          <option value="Ciasta i desery">Ciasta i desery</option>
                          <option value="Sałatki">Sałatki</option>
                          <option value="Zupy">Zupy</option>
                          <option value="Pieczywo">Pieczywo</option>
                          <option value="Napoje">Napoje</option>
                        </select>
                        </div>
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
                        <textarea class="form-control" rows="10" name="opis" ></textarea>
                        </div>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/specials-2.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
                <div class="tab-pane" id="tab-3">
                <div class="row">
                <div class="col-lg-12 details order-2 order-lg-1">
                <h3>Podaj składniki</h3>
                      <div class="table-responsive">
            <table class="table table-bordered" id="dynamic_field">
              <tr>
                <?php
                $skladniki_query = mysqli_query($connection, "SELECT * FROM `skladniki` WHERE `stan` = '1' ORDER BY `Produkt` ASC");
                $skladniki_rows = mysqli_num_rows($skladniki_query);
                if (mysqli_num_rows($skladniki_query) > 0) {
                echo"<td style='border:none !important'><select name='skladnik[]' class='form-control ' data-live-search='true' title='Wybierz składnik' style=''>";
                echo "<option>Wybierz składnik</option>";                           
                while($skladniki_row = mysqli_fetch_assoc($skladniki_query)) {
                    echo "<option value=" . $skladniki_row['ID'] .">" . $skladniki_row['Produkt'] . "</option>";
                    }
                    echo "</select></td>";
                }
                echo"
                
                <td style='border: none; width: 20%;'><input type='number' name='ilosc[]' placeholder='ilość' class='form-control name_list' required=' ' min='1' max='9999' ></td>
                <td style='border: none;'><input type='text' name='jednostka[]' placeholder='Wprowadź jednostkę' class='form-control' required='' ></td>
                <td style='border: none;'></td>
              </tr>
              <tr>";
                $zapytanie2 = mysqli_query($connection, "SELECT * FROM `skladniki` WHERE `stan` = '1' ORDER BY `Produkt` ASC");
                $skladniki_rows = mysqli_num_rows($zapytanie2);
                if (mysqli_num_rows($zapytanie2) > 0) {
                echo"<td style='border:none !important'><select name='skladnik[]' class='form-control ' data-live-search='true' title='Wybierz składnik' style=''>"; 
                echo "<option>Wybierz składnik</option>";                            
                while($skladniki_row = mysqli_fetch_assoc($zapytanie2)) {
                    echo "<option value=" . $skladniki_row['ID'] .">" . $skladniki_row['Produkt'] . "</option>";
                    }
                    echo "</select></td>";
                }
                echo"
                
                <td style='border: none; width: 20%;'><input type='number' name='ilosc[]' placeholder='ilość' class='form-control name_list' required=' ' min='1' max='9999' ></td>
                <td style='border: none;'><input type='text' name='jednostka[]' placeholder='Wprowadź jednostkę' class='form-control' required='' ></td>
                <td style='border: none;'><button type='button' name='add' id='add' class='btn btn-outline-warning' style='line-height:1;'>
                Kolejny składnik</button></td>
              </tr>
              </table>
          </div>";

              ?>

    </div>




    
</div>
</div>
              <div class="tab-pane" id="tab-4">
                <div class="row">
                  <div class="col-lg-12 details order-2 order-lg-1">
                    <h3>Opisz przygotowanie przepisu</h3>


<table class="table table-bordered" id="kroki" style="border: none;">
  <tr style="">
    <td style="border: none;"><textarea oninput="auto_grow(this)" name='krok[]' class='form-control' style='overflow: hidden;' ></textarea></td>
</tr>
  <tr style="">
    <td style="border: none;"><textarea oninput="auto_grow(this)" name='krok[]' class='form-control' style='overflow: hidden;' ></textarea></td>
<td style="border: none;"><button type='button' name='dodaj' id='dodaj' class='btn btn-outline-warning'>Dodaj</button></td>
</tr>
</table>

                    
                  </div>
                </div>
              </div>
            
              <div class="tab-pane" id="tab-5">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Oceń trudność oraz czas przyrządzenia</h3>
                    <div class="form-group">
                        <label><i class="fas fa-mug-hot"></i> Wybierz poziom trudności:</label>
                        <select class="form-control" name="poziom" style="width: 20%;">
                            <option>łatwy </option>
                            <option>średni</option>
                            <option>trudny</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><i class="fa fa-clock-o"></i> Podaj czas (min):</label>
                        <input type="number" class="form-control" name="czas" min="1" max="999" style="width: 20%;">
                    </div>
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
    <input type="file" name="plik_do_wgrania" id="plik_do_wgrania" required="">
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
                    <input type='submit' class='btn btn-outline-warning' value='Wyślij' name='dodaj_produkt_btn'>


                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <i class="fa fa-camera-retro fa-10x"></i>
                  </div>
                </div>
              </div>


            
</form>
</section>
    <?php
    break;
}
?>





















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
  <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>

<div id='select-krok' class='hide'> 
<textarea style="margin-right: 1%; overflow: hidden;" oninput="auto_grow(this)" name='krok1' class='form-control wybierz-krok kroki'></textarea>
                        <a href='#' class='delete_krok btn btn-outline-warning' style='width: 20%;
    height: 20%;
    box-sizing: border-box;
    margin: auto auto;
    display: flex;
    justify-content: center;
    align-items: center;'>Usuń -</a>
                    </div>


  <script src="assets/vendor/aos/aos.js"></script>


<!--   <script src="assets/js/main.js"></script> DO KARUZELI-->

</body>


</html>