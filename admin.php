<!DOCTYPE html>
<html lang="en">
  <?php
error_reporting(0);
  $zakladka = $_GET['zakladka'];
  require 'baza.php';
  require 'functions.php';
/*if (isset($_SESSION["zalogowany"])) {
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
   if  ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']=="true") && ($_SESSION['poziom_konta']!="2")) 
  {
     $_SESSION['komunikat'] ="<div class='alert alert-danger alert-dismissible fade show' role='alert' style='position: absolute; width: 100%; top: 20%; text-align: center; z-index: 1;'>
  <strong>".($_SESSION['login'])." </strong>Nie masz odpowiednich uprawnień, aby skorzystać z tej strony.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
header('Location: index.php');
exit();
  } // usunąc gdy będzie działać logowanie zrobione tylko do tesu
  
?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <?php title(); ?>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/v4-shims.css">


  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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

  <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

  <script type="text/javascript" language="javascript" src="assets/js/tabelka.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>



<script src='https://kit.fontawesome.com/a076d05399.js'></script> <!-- CZCIONKI !-->

  <script type="text/javascript" class="init">
  


$(document).ready(function() {
  $('#example').DataTable();
} );



  </script>

    <link rel="shortcut icon" type="image/png" href="/media/images/favicon.png">
  <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
  <link rel="stylesheet" type="text/css" href="/media/css/site-examples.css?_=76e0beef271cda75893495a30c11a693">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">
</head>

<body class="wide comments example dt-example-bootstrap4">
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
        <?php menu('admin.php'); ?>
  </header><!-- End Header -->


  <main id="main">
              <?php
  if(isset($_SESSION['komunikat'])){
  echo($_SESSION['komunikat']);
  unset($_SESSION['komunikat']);
}
  ?>
<?php 
error_reporting(-1);
switch ($zakladka) {
  case 'edit_user':
  error_reporting(-1);
    echo "<!-- ======= About Section ======= -->
    <section id='about' class='about' style='color: white;'>             
";
              
        if(isset($_SESSION['komunikat'])){ // WYŚWIETLA KOMUNIKAT O POMYSLNEJ REJESTRACJI/LOGOWANIU
          echo($_SESSION['komunikat']);
          unset($_SESSION['komunikat']);
        }
        echo"
      <div class='container' data-aos='fade-up'>
  <div class='fw-background'>
    <div></div>
  </div>
  <div class='fw-container'>
    <div class='fw-body'>
      <div class='content'>
        <h1 class='page_title' style='margin-top: 10%; text-align: center; margin-bottom: 2%;'>Wszyscy użytkownicy</h1>
        <div class='demo-html'>
      
          <table id='example' class='table table-striped table-bordered dt-responsive nowrap' style='width:100%; color: white;' >
                                <div class='row' style='margin-bottom: 2%;'>
                        <div class='col-lg-3'>
                          <a href='admin.php?zakladka=edit_user' style='color: black;'>
                            <button class='btn btn-warning' style='border-radius: 12px; width: 100%; margin-bottom: 4%;'>
                              <b>Wszyscy użytkownicy</b>
                            </button>
                          </a>
                        </div>

                        <div class='col-lg-3'>
                          <a  href='admin.php?zakladka=admini' style='color: black;'>
                            <button class='btn btn-warning' style='border-radius: 12px; width: 100%; margin-bottom: 4%;'>
                              <b>Administracja</b>
                            </button>
                          </a>
                        </div>
                        <div class='col-lg-3'>
                          <a  href='admin.php?zakladka=uzytkownicy' style='color: black;'>
                            <button class='btn btn-warning' style='border-radius: 12px; width: 100%; margin-bottom: 4%;'>
                             <b>Użytkownicy</b>
                            </button>
                          </a>
                        </div>
                        <div class='col-lg-3'>
                          <a  href='admin.php?zakladka=ban' style='color: black;'>
                            <button class='btn btn-warning' style='border-radius: 12px; width: 100%; margin-bottom: 4%;'>
                              <b>Zablokowani</b>
                            </button>
                          </a>
                        </div>
                      </div>
            <thead>
             <tr>
                <th>ID</th>
                <th>Imię</th>
                <th>Nazwisko</th>
                <th>E-mail</th>
                <th>Login</th>
                <th>Opcje</th>
                <th>Edytuj</th>
                <th>Usuń</th>
              </tr>

              
            </thead>
            <tbody>";
              $uzytkownicy = mysqli_query($connection,"SELECT * FROM `uzytkownicy`");
                while($row = mysqli_fetch_array($uzytkownicy)){
   echo" 
    <tr>
    <form action='admin_opcje.php' method='get'>";
    if ($row['poziom_konta'] == 0) {
     echo" <input type='hidden' name='id_user_delete' value='". $row['id'] . "'>
      <input type='hidden' name='nazwisko' value='". $row['nazwisko'] . "'>
      <td style='color: red;'><b>".$row['id']."</b></td>
      <td style='color: red;'><b><input type='text' value='".$row['imie']."'></b></td>
      <td style='color: red;'><b><input type='text' value='".$row['nazwisko']."'></b></td>
      <td style='color: red;'><b>".$row['email']."</b></td>
      <td style='color: red;'><b>".$row['login']."</b></td>
      <td style='color: red;'><button type='submit' class='btn btn-success' name='odblokuj' title='Odblokuj'><i class='fas fa-unlock fa-1x'></i></button></td>
      <td style='color: red;'><a href='zmien_haslo.php?zmiana_hasla_id=". $row["id"] ."' class='btn btn-secondary' title='Edytuj'><i class='fas fa-edit'></i></a></td>
      <td style='color: red;'><button type='submit' class='btn btn-danger' name='delete_user_btn' title='Usuń'><i class='fas fa-trash-alt'></i></button></td>";
}
    if ($row['poziom_konta'] == 1) {
     echo" <input type='hidden' name='id_user_delete' value='". $row['id'] . "'>
      <input type='hidden' name='nazwisko' value='". $row['nazwisko'] . "'>
      <td style='color: green;'><b>".$row['id']."</b></td>
      <td style='color: green;'><b><input type='text' value='".$row['imie']."'></b></td>
      <td style='color: green;'><b><input type='text' value='".$row['nazwisko']."'></b></td>
      <td style='color: green;'><b>".$row['email']."</b></td>
      <td style='color: green;'><b>".$row['login']."</b></td>
      <td style='color: green;'><button type='submit' class='btn btn-danger' name='zablokuj' title='Zablokuj'><i class='fas fa-lock fa-1x'></i></button>
      <button type='submit' class='btn btn-success' name='zwieksz' title='Zwiększ uprawnienia'><i class='fas fa-arrow-up'></i></button></td>
      <td style='color: green;'><a href='zmien_haslo.php?zmiana_hasla_id=". $row["id"] ."' class='btn btn-secondary' name='edit_user_btn' title='Edytuj'><i class='fas fa-edit'></i></a></td>
      <td style='color: green;'><button type='submit' class='btn btn-danger' name='delete_user_btn' title='Usuń'><i class='fas fa-trash-alt'></i></button></td>";
}
    if ($row['poziom_konta'] == 2) {
   echo"<input type='hidden' name='id_user_delete' value='". $row['id'] . "'>
      <input type='hidden' name='nazwisko' value='". $row['nazwisko'] . "'>
      <td style='color: #FFD700;'><b>".$row['id']."</b></td>
      <td style='color: #FFD700;'><b><input type='text' value='".$row['imie']."'></b></td>
      <td style='color: #FFD700;'><b><input type='text' value='".$row['nazwisko']."'></b></td>
      <td style='color: #FFD700;'><b>".$row['email']."</b></td>
      <td style='color: #FFD700;'><b>".$row['login']."</b></td>
      <td><button type='submit' class='btn btn-danger' name='zablokuj' title='Zablokuj'><i class='fas fa-lock fa-1x'></i></button>
      <button type='submit' class='btn btn-danger' name='odbierz' title='Odbierz prawa'><i class='fas fa-arrow-down'></i></button>
      </td>
      <td><a href='zmien_haslo.php?zmiana_hasla_id=". $row["id"] ."' class='btn btn-secondary' name='edit_user_btn' title='Edytuj'><i class='fas fa-edit'></i></a></td>
      <td><button type='submit' class='btn btn-danger' name='delete_user_btn' title='Usuń'><i class='fas fa-trash-alt'></i></button></td>";
    }
   echo" </tr>
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
    
    case 'admini':
    echo "<!-- ======= About Section ======= -->
    <section id='about' class='about' style='color: white;'>             
";
              
        if(isset($_SESSION['komunikat'])){ // WYŚWIETLA KOMUNIKAT O POMYSLNEJ REJESTRACJI/LOGOWANIU
          echo($_SESSION['komunikat']);
          unset($_SESSION['komunikat']);
        }
        echo"
      <div class='container' data-aos='fade-up'>
  <div class='fw-background'>
    <div></div>
  </div>
  <div class='fw-container'>
    <div class='fw-body'>
      <div class='content'>
        <h1 class='page_title' style='margin-top: 10%; text-align: center; margin-bottom: 2%;'>Wszyscy użytkownicy</h1>
        <div class='demo-html'>
      
          <table id='example' class='table table-striped table-bordered dt-responsive nowrap' style='width:100%; color: white;' >
                                <div class='row' style='margin-bottom: 2%;'>
                        <div class='col-lg-3'>
                          <a href='admin.php?zakladka=edit_user' style='color: black;'>
                            <button class='btn btn-warning' style='border-radius: 12px; width: 100%; margin-bottom: 4%;'>
                              <b>Wszyscy użytkownicy</b>
                            </button>
                          </a>
                        </div>

                        <div class='col-lg-3'>
                          <a  href='admin.php?zakladka=admini' style='color: black;'>
                            <button class='btn btn-warning' style='border-radius: 12px; width: 100%; margin-bottom: 4%;'>
                              <b>Administracja</b>
                            </button>
                          </a>
                        </div>
                        <div class='col-lg-3'>
                          <a  href='admin.php?zakladka=uzytkownicy' style='color: black;'>
                            <button class='btn btn-warning' style='border-radius: 12px; width: 100%; margin-bottom: 4%;'>
                             <b>Użytkownicy</b>
                            </button>
                          </a>
                        </div>
                        <div class='col-lg-3'>
                          <a  href='admin.php?zakladka=ban' style='color: black;'>
                            <button class='btn btn-warning' style='border-radius: 12px; width: 100%; margin-bottom: 4%;'>
                              <b>Zablokowani</b>
                            </button>
                          </a>
                        </div>
                      </div>
            <thead>
             <tr>
                <th>ID</th>
                <th>Imię</th>
                <th>Nazwisko</th>
                <th>E-mail</th>
                <th>Login</th>
                <th>Uprawnienia</th>
                <th>Edytuj</th>
                <th>Usuń</th>
              </tr>

              
            </thead>
            <tbody>";
              $uzytkownicy = mysqli_query($connection,"SELECT * FROM `uzytkownicy` WHERE poziom_konta = 2");
                while($row = mysqli_fetch_array($uzytkownicy)){

   echo" 
    <tr>
    <form action='admin_opcje.php' method='get'>
      <input type='hidden' name='id_user_delete' value='". $row['id'] . "'>
      <input type='hidden' name='nazwisko' value='". $row['nazwisko'] . "'>
      <td style='color: #FFD700;'><b>".$row['id']."</b></td>
      <td style='color: #FFD700;'><b><input type='text' value ='".$row['imie']."'></b></td>
      <td style='color: #FFD700;'><b><input type='text' value =' ".$row['nazwisko']." '></b></td>
      <td style='color: #FFD700;'><b>".$row['email']."</b></td>
      <td style='color: #FFD700;'><b>".$row['login']."</b></td>
      <td style='color: #FFD700;'><button type='submit' class='btn btn-danger' name='odbierz' title='Obniż uprawnienia'><i class='fas fa-arrow-down'></i></button></td>
      <td style='color: #FFD700;'><button type='submit' class='btn btn-secondary' name='edit_user_btn' title='Edytuj'><i class='fas fa-edit'></i></button></td>
      <td style='color: #FFD700;'><button type='submit' class='btn btn-danger' name='delete_user_btn' title='Usuń'><i class='fas fa-trash-alt'></i></button></td>
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
    case 'uzytkownicy':
      echo "<!-- ======= About Section ======= -->
    <section id='about' class='about' style='color: white;'>             
";
              
        if(isset($_SESSION['komunikat'])){ // WYŚWIETLA KOMUNIKAT O POMYSLNEJ REJESTRACJI/LOGOWANIU
          echo($_SESSION['komunikat']);
          unset($_SESSION['komunikat']);
        }
        echo"
      <div class='container' data-aos='fade-up'>
  <div class='fw-background'>
    <div></div>
  </div>
  <div class='fw-container'>
    <div class='fw-body'>
      <div class='content'>
        <h1 class='page_title' style='margin-top: 10%; text-align: center; margin-bottom: 2%;'>Wszyscy użytkownicy</h1>
        <div class='demo-html'>
      
          <table id='example' class='table table-striped table-bordered dt-responsive nowrap' style='width:100%; color: white;' >
                                <div class='row' style='margin-bottom: 2%;'>
                        <div class='col-lg-3'>
                          <a href='admin.php?zakladka=edit_user' style='color: black;'>
                            <button class='btn btn-warning' style='border-radius: 12px; width: 100%; margin-bottom: 4%;'>
                              <b>Wszyscy użytkownicy</b>
                            </button>
                          </a>
                        </div>

                        <div class='col-lg-3'>
                          <a  href='admin.php?zakladka=admini' style='color: black;'>
                            <button class='btn btn-warning' style='border-radius: 12px; width: 100%; margin-bottom: 4%;'>
                              <b>Administracja</b>
                            </button>
                          </a>
                        </div>
                        <div class='col-lg-3'>
                          <a  href='admin.php?zakladka=uzytkownicy' style='color: black;'>
                            <button class='btn btn-warning' style='border-radius: 12px; width: 100%; margin-bottom: 4%;'>
                             <b>Użytkownicy</b>
                            </button>
                          </a>
                        </div>
                        <div class='col-lg-3'>
                          <a  href='admin.php?zakladka=ban' style='color: black;'>
                            <button class='btn btn-warning' style='border-radius: 12px; width: 100%; margin-bottom: 4%;'>
                              <b>Zablokowani</b>
                            </button>
                          </a>
                        </div>
                      </div>
            <thead>
             <tr>
                <th>ID</th>
                <th>Imię</th>
                <th>Nazwisko</th>
                <th>E-mail</th>
                <th>Login</th>
                <th>Uprawnienia</th>
                <th>Edytuj</th>
                <th>Usuń</th>
              </tr>

              
            </thead>
            <tbody>";
              $uzytkownicy = mysqli_query($connection,"SELECT * FROM `uzytkownicy` WHERE poziom_konta = 1");
                while($row = mysqli_fetch_array($uzytkownicy)){

   echo" 
    <tr>
    <form action='admin_opcje.php? method='get'>
      <input type='hidden' name='id_user_delete' value='". $row['id'] . "'>
      <input type='hidden' name='nazwisko' value='". $row['nazwisko'] . "'>
      <td style='color: green'><b>".$row['id']."</b></td>
      <td><b><input type='text' value='".$row['imie']."'></b></td>
      <td><b><input type='text' value='".$row['nazwisko']."'></b></td>
      <td style='color: green'><b>".$row['email']."</b></td>
      <td style='color: green'><b>".$row['login']."</b></td>
      <td><button type='submit' class='btn btn-success' name='zwieksz' title='Zwiększ uprawnienia'><i class='fas fa-arrow-up'></i></button></td>
      <td><button type='submit' class='btn btn-secondary' name='edit_user_btn' title='Edytuj'><i class='fas fa-edit'></i></button></td>
      <td><button type='submit' class='btn btn-danger' name='delete_user_btn' title='Usuń'><i class='fas fa-trash-alt'></i></button></td>
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
    case 'ban':
  echo "<!-- ======= About Section ======= -->
    <section id='about' class='about' style='color: white;'>             
";
              
        if(isset($_SESSION['komunikat'])){ // WYŚWIETLA KOMUNIKAT O POMYSLNEJ REJESTRACJI/LOGOWANIU
          echo($_SESSION['komunikat']);
          unset($_SESSION['komunikat']);
        }
        echo"
      <div class='container' data-aos='fade-up'>
  <div class='fw-background'>
    <div></div>
  </div>
  <div class='fw-container'>
    <div class='fw-body'>
      <div class='content'>
        <h1 class='page_title' style='margin-top: 10%; text-align: center; margin-bottom: 2%;'>Wszyscy użytkownicy</h1>
        <div class='demo-html'>
      
          <table id='example' class='table table-striped table-bordered dt-responsive nowrap' style='width:100%; color: white;' >
                                <div class='row' style='margin-bottom: 2%;'>
                        <div class='col-lg-3'>
                          <a href='admin.php?zakladka=edit_user' style='color: black;'>
                            <button class='btn btn-warning' style='border-radius: 12px; width: 100%; margin-bottom: 4%;'>
                              <b>Wszyscy użytkownicy</b>
                            </button>
                          </a>
                        </div>

                        <div class='col-lg-3'>
                          <a  href='admin.php?zakladka=admini' style='color: black;'>
                            <button class='btn btn-warning' style='border-radius: 12px; width: 100%; margin-bottom: 4%;'>
                              <b>Administracja</b>
                            </button>
                          </a>
                        </div>
                        <div class='col-lg-3'>
                          <a  href='admin.php?zakladka=uzytkownicy' style='color: black;'>
                            <button class='btn btn-warning' style='border-radius: 12px; width: 100%; margin-bottom: 4%;'>
                             <b>Użytkownicy</b>
                            </button>
                          </a>
                        </div>
                        <div class='col-lg-3'>
                          <a  href='admin.php?zakladka=ban' style='color: black;'>
                            <button class='btn btn-warning' style='border-radius: 12px; width: 100%; margin-bottom: 4%;'>
                              <b>Zablokowani</b>
                            </button>
                          </a>
                        </div>
                      </div>
            <thead>
             <tr>
                <th>ID</th>
                <th>Imię</th>
                <th>Nazwisko</th>
                <th>E-mail</th>
                <th>Login</th>
                <th>Uprawnienia</th>
                <th>Usuń</th>
              </tr>

              
            </thead>
            <tbody>";
              $uzytkownicy = mysqli_query($connection,"SELECT * FROM `uzytkownicy` WHERE poziom_konta = 0");
                while($row = mysqli_fetch_array($uzytkownicy)){

   echo" 
    <tr>
    <form action='admin_opcje.php' method='get'>
      <input type='hidden' name='id_user_delete' value='". $row['id'] . "'>
      <input type='hidden' name='nazwisko' value='". $row['nazwisko'] . "'>
      <td style='color: red'><b>".$row['id']."</b></td>
      <td style='color: red'><b> ".$row['imie']."</b></td>
      <td style='color: red'><b> ".$row['nazwisko']."</b></td>
      <td style='color: red'><b>".$row['email']."</b></td>
      <td style='color: red'><b>".$row['login']."</b></td>
      <td><button type='submit' class='btn btn-info' name='odblokuj' title='Odblokuj'><i class='fas fa-unlock fa-1x'></i></button></td>
      <td><button type='submit' class='btn btn-danger' name='delete_user_btn' title='Usuń'><i class='fas fa-trash-alt'></i></button></td>
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
    case 'edit_recipe':
      echo "<!-- ======= About Section ======= -->
    <section id='about' class='about' style='color: white;'>             
";
              
        if(isset($_SESSION['komunikat'])){ // WYŚWIETLA KOMUNIKAT O POMYSLNEJ REJESTRACJI/LOGOWANIU
          echo($_SESSION['komunikat']);
          unset($_SESSION['komunikat']);
        }
        echo"
      <div class='container' data-aos='fade-up'>
  <div class='fw-background'>
    <div></div>
  </div>
  <div class='fw-container'>
    <div class='fw-body'>
      <div class='content'>
        <h1 class='page_title' style='margin-top: 10%; text-align: center; margin-bottom: 2%;'>Przepisy</h1>
        <div class='demo-html'>
      
          <table id='example' class='table table-striped table-bordered dt-responsive nowrap' style='width:100%; color: white;' >
            <thead>
             <tr>
                <th>ID</th>
                <th>Nazwa</th>
                <th>Przepis dodał</th>
                <th>Edytuj</th>
                <th>Usuń</th>
              </tr>

              
            </thead>
            <tbody>";
              $uzytkownicy = mysqli_query($connection,"SELECT `przepisy`.*, `uzytkownicy`.`imie` FROM `przepisy` LEFT JOIN `uzytkownicy` ON `przepisy`.`id_uzytkownika` = `uzytkownicy`.`id`");
                while($row = mysqli_fetch_array($uzytkownicy)){

   echo" 
    <tr>
    <form action='admin_opcje.php' method='get'>
      <input type='hidden' name='id_user_delete' value='". $row['ID'] . "'>
      <td><b>".$row['ID']."</b></td>
      <td><b> ".$row['Nazwa']."</b></td>
      <td><b> ".$row['imie']."</b></td>
      <td><b class='btn btn-secondary' title='Edytuj przepis' style='margin-left: 2%;'><a href='przepis_edit.php?ID=". $row['ID'] ."' style='color: white;'>
      <i class='fas fa-edit fa-2x' aria-hidden='true'></i></a></b></td>
      <td><button type='submit' class='btn btn-danger' name='usun_przepis' title='Usuń'><i class='fas fa-trash-alt fa-2x'></i></button></td>
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
    case 'edit_product':
      echo "<!-- ======= About Section ======= -->
    <section id='about' class='about' style='color: white;'>             
";
              

        echo"
      <div class='container' data-aos='fade-up'>
  <div class='fw-background'>
    <div></div>
  </div>
  <div class='fw-container'>
    <div class='fw-body'>
      <div class='content'>";             
        echo"
        <h1 class='page_title' style='margin-top: 10%; text-align: center; margin-bottom: 2%;'>Składniki</h1>
        ";
         if(isset($_SESSION['komunikat'])){ // WYŚWIETLA KOMUNIKAT O POMYSLNEJ REJESTRACJI/LOGOWANIU
          echo($_SESSION['komunikat']);
          unset($_SESSION['komunikat']);
        }echo"
        <div class='demo-html'>
      
          <table id='example' class='table table-striped table-bordered dt-responsive nowrap' style='width:100%; color: white;' >
           <div class='row' style='margin-bottom: 2%;'>
                        <div class='col-lg-6'>
                          <a href='admin.php?zakladka=edit_product' style='color: black;'>
                            <button class='btn btn-warning' style='border-radius: 12px; width: 100%; margin-bottom: 4%;'>
                              <b>Składniki</b>
                            </button>
                          </a>
                        </div>

                        <div class='col-lg-6'>
                          <a  href='admin.php?zakladka=zablokowane' style='color: black;'>
                            <button class='btn btn-warning' style='border-radius: 12px; width: 100%; margin-bottom: 4%;'>
                              <b>Zablokowane składniki</b>
                            </button>
                          </a>
                        </div>
                      </div>
            <thead>
             <tr>
                <th>ID</th>
                <th>Nazwa</th>
                <th>Zmień nazwę</th>
                <th>Usuń produkt</th>
              </tr>

              
            </thead>
            <tbody>";
              $uzytkownicy = mysqli_query($connection,"SELECT * FROM `skladniki` WHERE stan = '1'");
                while($row = mysqli_fetch_array($uzytkownicy)){

   echo" 
    <tr>
    <form action='admin_opcje.php' method='get'>
      <input type='hidden' name='id_user_delete' value='". $row['ID'] . "'>
      <td><b>".$row['ID']."</b></td>
      <td><b><input type='text' value ='".$row['Produkt']."' name='nowy_produkt'></b></td>
      <td><button type='submit' class='btn btn-secondary' name='zmien_btn'>Zmień nazwę</button></td>
      <td><button type='submit' class='btn btn-danger' name='usun_produkt_btn'>Usuń produkt</button></td>
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
          case 'zablokowane':
      echo "<!-- ======= About Section ======= -->
    <section id='about' class='about' style='color: white;'>             
";
              

        echo"
      <div class='container' data-aos='fade-up'>
  <div class='fw-background'>
    <div></div>
  </div>
  <div class='fw-container'>
    <div class='fw-body'>
      <div class='content'>";             
        echo"
        <h1 class='page_title' style='margin-top: 10%; text-align: center; margin-bottom: 2%;'>Zablokowane produkty</h1>
        ";
         if(isset($_SESSION['komunikat'])){ // WYŚWIETLA KOMUNIKAT O POMYSLNEJ REJESTRACJI/LOGOWANIU
          echo($_SESSION['komunikat']);
          unset($_SESSION['komunikat']);
        }echo"
        <div class='demo-html'>
      
          <table id='example' class='table table-striped table-bordered dt-responsive nowrap' style='width:100%; color: white;' >
           <div class='row' style='margin-bottom: 2%;'>
                        <div class='col-lg-6'>
                          <a href='admin.php?zakladka=edit_product' style='color: black;'>
                            <button class='btn btn-warning' style='border-radius: 12px; width: 100%; margin-bottom: 4%;'>
                              <b>Składniki</b>
                            </button>
                          </a>
                        </div>

                        <div class='col-lg-6'>
                          <a  href='admin.php?zakladka=zablokowane' style='color: black;'>
                            <button class='btn btn-warning' style='border-radius: 12px; width: 100%; margin-bottom: 4%;'>
                              <b>Zablokowane składniki</b>
                            </button>
                          </a>
                        </div>
                      </div>
            <thead>
             <tr>
                <th>ID</th>
                <th>Nazwa</th>
                <th>Zmień nazwę</th>
                <th>Dodaj do zablokowanych</th>
              </tr>

              
            </thead>
            <tbody>";
              $uzytkownicy = mysqli_query($connection,"SELECT * FROM `skladniki` WHERE stan = '0'");
                while($row = mysqli_fetch_array($uzytkownicy)){

   echo" 
    <tr>
    <form action='admin_opcje.php' method='get'>
      <input type='hidden' name='id_user_delete' value='". $row['ID'] . "'>
      <td><b>".$row['ID']."</b></td>
      <td><b><input type='text' value ='".$row['Produkt']."' name='nowy_produkt'></b></td>
      <td><button type='submit' class='btn btn-secondary' name='zmien_btn'>Zmień nazwę</button></td>
      <td><button type='submit' class='btn btn-danger' name='delete_user_btn'>Dodaj do zablokowanych</button></td>
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
      case 'add_product':
        include 'dodaj_skladnik.php';
        break;
        default:

        echo "
    <section id='hero' class='why-us'>
      <div class='container' data-aos='fade-up'>
        <div class='section-title'>
          <h2 style='margin-top:10%;'>Panel administratora</h2>
          <p>LEGENDA</p>
        </div>
        <div class='row'>
          <div class='col-lg-4' >
            <div class='box aos-init aos-animate' data-aos='zoom-in' data-aos-delay='100' style='max-height: 250px; min-height: 250px;'>
              <a href='?zakladka=edit_user&strona=1'>
                <span>Zarządzanie użytkownikami</span>
                <p style='margin-top:2%;'>Edycja danych, blokowanie, nadawanie uprawnień oraz usuwanie kont użytkowników</p>
              </a>
            </div>
          </div>
          <div class='col-lg-4'>
            <div class='box aos-init aos-animate' data-aos='zoom-in' data-aos-delay='200' style='max-height: 250px; min-height: 250px;'>
              <a href='?zakladka=edit_recipe'>
                <span>Przepisy</span>
                <p style='margin-top:2%;'>Dodawanie nowych przepisów oraz ich edycja</p>
              </a>
            </div>
          </div>
          <div class='col-lg-4'>
            <div class='box aos-init aos-animate' data-aos='zoom-in' data-aos-delay='300' style='max-height: 250px; min-height: 250px;'>
              <a href='?zakladka=add_product'>
                <span>Produkty</span>
                <p margin-top:2%;>Dodaj, edytuj bądź usuń produkt</p>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>";
        break;
}
    

    
?>
    

    


  </main><!-- End #main -->

    <!-- ======= Footer ======= -->
  <footer id="footer">
    <?php footer('default'); ?>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>

  <!-- Vendor JS Files
  <script src="assets/vendor/jquery/jquery.min.js"></script> -->
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