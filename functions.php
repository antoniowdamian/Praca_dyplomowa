
<?php
error_reporting(0);
session_start();
/*
if (isset($_SESSION["zalogowany"])) {
  echo  "<br>zalogowany: " . $_SESSION["zalogowany"] .
        "<br>ID: " . $_SESSION["id"] .
        "<br>Email: " .$_SESSION["email"].
        "<br>Imie: " . $_SESSION["imie"] .
        "<br>Login: " . $_SESSION["login"] .
        "<br>Nazwisko: " . $_SESSION["nazwisko"] .
        "<br>Permission: " . $_SESSION["poziom_konta"];
}
*/


  function title()
  {
    echo "<title>Responsywna aplikacja internetowa e-kuchnia</title>";
  }
  function topbar()
  {
    echo "<!-- ======= Top Bar ======= -->
        <div id='topbar' class='d-flex align-items-center fixed-top'>
          <div class='container d-flex'>
            <div class='contact-info mr-auto'>
              <i class='icofont-phone'></i> 0700
              <span class='d-none d-lg-inline-block'><i class='icofont-clock-time icofont-rotate-180'></i> Pon-Pt: 24h</span>
              <span class='d-none d-lg-inline-block'><i class='icofont-clock-time icofont-rotate-180'></i> Niedziela: NIECZYNNE</span>
            </div>
            <div class='languages'>
              <ul>
                <li>En</li>
                <li><a href='#'>Pl</a></li>
              </ul>
            </div>
          </div>
        </div>";
  }
  function przepisy($strona)
  {
    require 'baza.php';
    if ($strona=='przepisy.php') {
      echo"<!-- ======= Menu Section ======= -->
    <section id='menu' class='menu section-bg'>
      <div class='container' data-aos='fade-up'>

        <div class='section-title'>
          <h2>Dostępne przepisy</h2>
          <p>Znajdź określony przepis</p>
        </div>";
echo "<div class='row' data-aos='fade-up' data-aos-delay='100' style='font-size: none;'>
          <div class='col-lg-12 d-flex justify-content-center'>
            <ul id='menu-flters'>
              <li data-filter='*' >Wszystkie</li>
              <li data-filter='.filter-mieso'>Mięso</li>
              <li data-filter='.filter-pizza'>Pizza</li>
              <li data-filter='.filter-fastfood'>Fast Food</li>
              <li data-filter='.filter-ciastadesery'>Ciasta i desery</li>
              <li data-filter='.filter-salatka'>Sałatki</li>
              <li data-filter='.filter-zupa'>Zupy</li>
              <li data-filter='.filter-pieczywo'>Pieczywo</li>
              <li data-filter='.filter-weg'>Napoje</li>
            </ul>
          </div>
        </div>";
        echo "<div class='row menu-container' data-aos='fade-up' data-aos-delay='200'>";
            
$mieso = mysqli_query($connection,"SELECT * FROM `przepisy` WHERE `Kategoria` = 'Mięso'");
   while($row = mysqli_fetch_array($mieso)){
echo substr ($mieso, 0, 10) ;
   echo"<div class='col-lg-10 menu-item filter-mieso'>"; //mieso
        echo"<a href='".$row['obrazek']."' class='venobox' data-gall='gallery-item' style='width: 100px; height: 100px;'> 
            <img src='".$row['obrazek']."' class='menu-img' alt='' style='width: 50px; height: 50px;'></a>";  // wyswietlanie obrazka
        echo"<div class='menu-content'>";
        echo"<a href='przepis.php?ID=".$row['ID']."&nazwa=".$row['Nazwa']."'>".$row['Nazwa']."</a><span><i class='fa fa-hourglass-start'></i>".$row['Czas']." min</span>";              
         echo"</div>
            <div class='menu-ingredients'>";
        echo $row['Opis']; 
          echo"</div>
          </div>";
        }
$pizza = mysqli_query($connection,"SELECT * FROM `przepisy` WHERE `Kategoria` = 'Pizza'");
   while($row = mysqli_fetch_array($pizza)){

   echo"<div class='col-lg-10 menu-item filter-pizza'>"; //mieso
        echo"<a href='assets/img/menu/lobster-bisque.jpg' class='venobox' data-gall='gallery-item'> 
            <img src='assets/img/menu/lobster-bisque.jpg' class='menu-img' alt=''></a>";  // wyswietlanie obrazka
        echo"<div class='menu-content'>";
        echo"<a href='przepis.php?ID=".$row['ID']."&nazwa=".$row['Nazwa']."'>".$row['Nazwa']."</a><span><i class='fa fa-hourglass-start'></i>".$row['Czas']." min</span>";              
         echo"</div>
            <div class='menu-ingredients'>";
        echo $row['Opis']; 
          echo"</div>
          </div>";
        }
$fastfood = mysqli_query($connection,"SELECT * FROM `przepisy` WHERE `Kategoria` = 'Fast Food'");
   while($row = mysqli_fetch_array($fastfood)){

   echo"<div class='col-lg-10 menu-item filter-fastfood'>"; //mieso
        echo"<a href='assets/img/menu/lobster-bisque.jpg' class='venobox' data-gall='gallery-item'> 
            <img src='assets/img/menu/lobster-bisque.jpg' class='menu-img' alt=''></a>";  // wyswietlanie obrazka
        echo"<div class='menu-content'>";
        echo"<a href='przepis.php?ID=".$row['ID']."&nazwa=".$row['Nazwa']."'>".$row['Nazwa']."</a><span><i class='fa fa-hourglass-start'></i>".$row['Czas']." min</span>";              
         echo"</div>
            <div class='menu-ingredients'>";
        echo $row['Opis']; 
          echo"</div>
          </div>";
        }

  $ciastadesery = mysqli_query($connection,"SELECT * FROM `przepisy` WHERE `Kategoria` = 'Ciasta i desery'");
   while($row = mysqli_fetch_array($ciastadesery)){

   echo"<div class='col-lg-10 menu-item filter-ciastadesery'>"; //mieso
        echo"<a href='assets/img/menu/lobster-bisque.jpg' class='venobox' data-gall='gallery-item'> 
            <img src='assets/img/menu/lobster-bisque.jpg' class='menu-img' alt=''></a>";  // wyswietlanie obrazka
        echo"<div class='menu-content'>";
        echo"<a href='przepis.php?ID=".$row['ID']."&nazwa=".$row['Nazwa']."'>".$row['Nazwa']."</a><span><i class='fa fa-hourglass-start'></i>".$row['Czas']." min</span>";              
         echo"</div>
            <div class='menu-ingredients'>";
        echo $row['Opis']; 
          echo"</div>
          </div>";
        }
  $salatka = mysqli_query($connection,"SELECT * FROM `przepisy` WHERE `Kategoria` = 'Sałatki'");
   while($row = mysqli_fetch_array($salatka)){

   echo"<div class='col-lg-10 menu-item filter-salatka'>"; //mieso
        echo"<a href='assets/img/menu/lobster-bisque.jpg' class='venobox' data-gall='gallery-item'> 
            <img src='assets/img/menu/lobster-bisque.jpg' class='menu-img' alt=''></a>";  // wyswietlanie obrazka
        echo"<div class='menu-content'>";
        echo"<a href='przepis.php?ID=".$row['ID']."&nazwa=".$row['Nazwa']."'>".$row['Nazwa']."</a><span><i class='fa fa-hourglass-start'></i>".$row['Czas']." min</span>";              
         echo"</div>
            <div class='menu-ingredients'>";
        echo $row['Opis']; 
          echo"</div>
          </div>";
        }

  $zupa = mysqli_query($connection,"SELECT * FROM `przepisy` WHERE `Kategoria` = 'Zupy'");
   while($row = mysqli_fetch_array($zupa)){

   echo"<div class='col-lg-10 menu-item filter-zupa'>"; //mieso
        echo"<a href='assets/img/menu/lobster-bisque.jpg' class='venobox' data-gall='gallery-item'> 
            <img src='assets/img/menu/lobster-bisque.jpg' class='menu-img' alt=''></a>";  // wyswietlanie obrazka
        echo"<div class='menu-content'>";
        echo"<a href='przepis.php?ID=".$row['ID']."&nazwa=".$row['Nazwa']."'>".$row['Nazwa']."</a><span><i class='fa fa-hourglass-start'></i>".$row['Czas']." min</span>";              
         echo"</div>
            <div class='menu-ingredients'>";
        echo $row['Opis']; 
          echo"</div>
          </div>";
        }     
  $pieczywo = mysqli_query($connection,"SELECT * FROM `przepisy` WHERE `Kategoria` = 'Pieczywo'");
   while($row = mysqli_fetch_array($pieczywo)){

   echo"<div class='col-lg-10 menu-item filter-pieczywo'>"; //mieso
        echo"<a href='assets/img/menu/lobster-bisque.jpg' class='venobox' data-gall='gallery-item'> 
            <img src='assets/img/menu/lobster-bisque.jpg' class='menu-img' alt=''></a>";  // wyswietlanie obrazka
        echo"<div class='menu-content'>";
        echo"<a href='przepis.php?ID=".$row['ID']."&nazwa=".$row['Nazwa']."'>".$row['Nazwa']."</a><span><i class='fa fa-hourglass-start'></i>".$row['Czas']." min</span>";              
         echo"</div>
            <div class='menu-ingredients'>";
        echo $row['Opis']; 
          echo"</div>
          </div>";
        }
  $weg = mysqli_query($connection,"SELECT * FROM `przepisy` WHERE `Kategoria` = 'Napoje'");
   while($row = mysqli_fetch_array($weg)){

   echo"<div class='col-lg-10 menu-item filter-weg'>"; //mieso
        echo"<a href='assets/img/menu/lobster-bisque.jpg' class='venobox' data-gall='gallery-item'> 
            <img src='".$row['obrazek']."' class='menu-img' alt=''></a>";  // wyswietlanie obrazka
        echo"<div class='menu-content'>";
        echo"<a href='przepis.php?ID=".$row['ID']."&nazwa=".$row['Nazwa']."'>".$row['Nazwa']."</a><span><i class='fa fa-hourglass-start'></i>".$row['Czas']." min</span>";              
         echo"</div>
            <div class='menu-ingredients'>";
        echo $row['Opis']; 
          echo"</div>
          </div>";
         /* echo "<a href='przepisy.php?strona=" . 2 . "'><button type='button'  style='border: 2px solid #cda45e;
  color: #fff;
  border-radius: 50px;
  padding: 8px 25px;
  text-transform: uppercase;
  font-size: 13px;
  font-weight: 500;
  letter-spacing: 1px;
  transition: 0.3s;'>WYŚWIETL WIĘCEJ PRZEPISÓW</button></a>";*/
        }

        echo "</div></div>";
    
          

      echo "</div>
  </section><!-- End Menu Section -->";
  }
  elseif ($strona=='index.php') {

              echo"<!-- ======= Menu Section ======= -->
    <section id='menu' class='menu section-bg'>
      <div class='container' data-aos='fade-up'>

        <div class='section-title'>
          <h2>Dostępne przepisy</h2>
          <p>Znajdź określony przepis</p>
        </div>";
    echo "<div class='row' data-aos='fade-up' data-aos-delay='100'>
          <div class='col-lg-12 d-flex justify-content-center'>
            <ul id='menu-flters'>
              <li data-filter='*'>Wszystkie</li>
              <li data-filter='.filter-mieso'>Mięso</li>
              <li data-filter='.filter-pizza'>Pizza</li>
              <li data-filter='.filter-fastfood'>Fast Food</li>
              <li data-filter='.filter-ciastadesery'>Ciasta i desery</li>
              <li data-filter='.filter-salatka'>Sałatki</li>
              <li data-filter='.filter-zupa'>Zupy</li>
              <li data-filter='.filter-pieczywo'>Pieczywo</li>
              <li data-filter='.filter-weg'>Napoje</li>
            </ul>
          </div>
        </div>";
        echo "<div class='row menu-container' data-aos='fade-up' data-aos-delay='200'>";

$mieso = mysqli_query($connection,"SELECT * FROM `przepisy` WHERE `Kategoria` = 'Mięso'");

   while($row = mysqli_fetch_array($mieso)){

   echo"<div class='col-lg-6 menu-item filter-mieso'>"; //mieso
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
$pizza = mysqli_query($connection,"SELECT * FROM `przepisy` WHERE `Kategoria` = 'Pizza'");
   while($row = mysqli_fetch_array($pizza)){
   echo"<div class='col-lg-6 menu-item filter-pizza'>"; //mieso
        echo"<a href='".$row['obrazek']."' class='venobox' data-gall='gallery-item' style='width: 100px; height: 100px;'> 
            <img src='".$row['obrazek']."' class='menu-img' alt='' style='width: 100px; height: 100px;'></a>";  // wyswietlanie obrazka
        echo"<div class='menu-content'>";
        echo"<a href='przepis.php?ID=".$row['ID']."&nazwa=".$row['Nazwa']."'>".$row['Nazwa']."</a><span><i class='fa fa-hourglass-start'></i>".$row['Czas']." min</span>";              
         echo"</div>
            <div class='menu-ingredients'>";
        echo $row['Opis']; 
          echo"</div>
          </div>";
        }
$fastfood = mysqli_query($connection,"SELECT * FROM `przepisy` WHERE `Kategoria` = 'Fast Food'");
   while($row = mysqli_fetch_array($fastfood)){
   echo"<div class='col-lg-6 menu-item filter-fastfood'>"; //mieso
        echo"<a href='".$row['obrazek']."' class='venobox' data-gall='gallery-item' style='width: 100px; height: 100px;'> 
            <img src='".$row['obrazek']."' class='menu-img' alt='' style='width: 100px; height: 100px;'></a>";  // wyswietlanie obrazka
        echo"<div class='menu-content'>";
        echo"<a href='przepis.php?ID=".$row['ID']."&nazwa=".$row['Nazwa']."'>".$row['Nazwa']."</a><span><i class='fa fa-hourglass-start'></i>".$row['Czas']." min</span>";              
         echo"</div>
            <div class='menu-ingredients'>";
        echo $row['Opis']; 
          echo"</div>
          </div>";
        }

  $ciastadesery = mysqli_query($connection,"SELECT * FROM `przepisy` WHERE `Kategoria` = 'Ciasta i desery'");
   while($row = mysqli_fetch_array($ciastadesery)){
   echo"<div class='col-lg-6 menu-item filter-ciastadesery'>"; //mieso
        echo"<a href='".$row['obrazek']."' class='venobox' data-gall='gallery-item' style='width: 100px; height: 100px;'> 
            <img src='".$row['obrazek']."' class='menu-img' alt='' style='width: 100px; height: 100px;'></a>";  // wyswietlanie obrazka
        echo"<div class='menu-content'>";
        echo"<a href='przepis.php?ID=".$row['ID']."&nazwa=".$row['Nazwa']."'>".$row['Nazwa']."</a><span><i class='fa fa-hourglass-start'></i>".$row['Czas']." min</span>";              
         echo"</div>
            <div class='menu-ingredients'>";
        echo $row['Opis']; 
          echo"</div>
          </div>";
        }
  $salatka = mysqli_query($connection,"SELECT * FROM `przepisy` WHERE `Kategoria` = 'Sałatki'");
   while($row = mysqli_fetch_array($salatka)){
   echo"<div class='col-lg-6 menu-item filter-salatka'>"; //mieso
        echo"<a href='".$row['obrazek']."' class='venobox' data-gall='gallery-item' style='width: 100px; height: 100px;'> 
            <img src='".$row['obrazek']."' class='menu-img' alt='' style='width: 100px; height: 100px;'></a>";  // wyswietlanie obrazka
        echo"<div class='menu-content'>";
        echo"<a href='przepis.php?ID=".$row['ID']."&nazwa=".$row['Nazwa']."'>".$row['Nazwa']."</a><span><i class='fa fa-hourglass-start'></i>".$row['Czas']." min</span>";              
         echo"</div>
            <div class='menu-ingredients'>";
        echo $row['Opis']; 
          echo"</div>
          </div>";
        }

  $zupa = mysqli_query($connection,"SELECT * FROM `przepisy` WHERE `Kategoria` = 'Zupy'");
   while($row = mysqli_fetch_array($zupa)){
   echo"<div class='col-lg-6 menu-item filter-zupa'>"; //mieso
        echo"<a href='".$row['obrazek']."' class='venobox' data-gall='gallery-item' style='width: 100px; height: 100px;'> 
            <img src='".$row['obrazek']."' class='menu-img' alt='' style='width: 100px; height: 100px;'></a>";  // wyswietlanie obrazka
        echo"<div class='menu-content'>";
        echo"<a href='przepis.php?ID=".$row['ID']."&nazwa=".$row['Nazwa']."'>".$row['Nazwa']."</a><span><i class='fa fa-hourglass-start'></i>".$row['Czas']." min</span>";              
         echo"</div>
            <div class='menu-ingredients'>";
        echo $row['Opis']; 
          echo"</div>
          </div>";
        }     
  $pieczywo = mysqli_query($connection,"SELECT * FROM `przepisy` WHERE `Kategoria` = 'Pieczywo'");
   while($row = mysqli_fetch_array($pieczywo)){
   echo"<div class='col-lg-6 menu-item filter-pieczywo'>"; //mieso
        echo"<a href='".$row['obrazek']."' class='venobox' data-gall='gallery-item' style='width: 100px; height: 100px;'> 
            <img src='".$row['obrazek']."' class='menu-img' alt='' style='width: 100px; height: 100px;'></a>";  // wyswietlanie obrazka
        echo"<div class='menu-content'>";
        echo"<a href='przepis.php?ID=".$row['ID']."&nazwa=".$row['Nazwa']."'>".$row['Nazwa']."</a><span><i class='fa fa-hourglass-start'></i>".$row['Czas']." min</span>";              
         echo"</div>
            <div class='menu-ingredients'>";
        echo $row['Opis']; 
          echo"</div>
          </div>";
        }
  $weg = mysqli_query($connection,"SELECT * FROM `przepisy` WHERE `Kategoria` = 'Napoje'");
   while($row = mysqli_fetch_array($weg)){
   echo"<div class='col-lg-6 menu-item filter-weg'>"; //mieso
        echo"<a href='".$row['obrazek']."' class='venobox' data-gall='gallery-item' style='width: 100px; height: 100px;'> 
            <img src='".$row['obrazek']."' class='menu-img' alt='' style='width: 100px; height: 100px;'></a>";  // wyswietlanie obrazka
        echo"<div class='menu-content'>";
        echo"<a href='przepis.php?ID=".$row['ID']."&nazwa=".$row['Nazwa']."'>".$row['Nazwa']."</a><span><i class='fa fa-hourglass-start'></i>".$row['Czas']." min</span>";              
         echo"</div>
            <div class='menu-ingredients'>";
        echo $row['Opis']; 
          echo"</div>
          </div>";
        }
    
        ?>
         <!-- <a onclick="funkcja()" style='border: 2px solid #cda45e;
  color: #fff;
  border-radius: 50px;
  padding: 8px 25px;
  text-transform: uppercase;
  font-size: 13px;
  font-weight: 500;
  letter-spacing: 1px;
  transition: 0.3s; margin-top: 2%; width: 100%; text-align: center; display: block;' >WYŚWIETL WIĘCEJ PRZEPISÓW</a> !-->

      </div>
<?php
echo"
  </section><!-- End Menu Section -->";
  }
}

function logowanie_rejestracja_haslo()
{
  echo "<style type='text/css'>
  @media only screen and (max-width: 1000px) {
    div#Rejestracja {
      overflow-y: auto;
    }    
    div#Logowanie {
      overflow-y: auto;
    } 
    div#Zapomnialem {
      overflow-y: auto;
    }   
}

  </style>";

  echo"<!-- POPUP'Y !-->
<!-- Modal REJESTRACJA-->
<div class='modal fade' id='Rejestracja' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'
  aria-hidden='true'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content' style='border-radius: 32px;'>
      <div class='modal-header' style='background-image: url(login.jpg); width: 500px; height: 200px; border-top-left-radius: 29px; border-top-right-radius: 29px;' >
        <h1 class='modal-title text-white logo mr-auto' id='exampleModalLabel' style='font-family: Impact, Charcoal, sans-serif; color: white; margin-left: 27%; margin-top: 10%; letter-spacing: 3px;'>Rejestracja</h1>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close' style='color: white'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body text-secondary'>
         <form action='zaloguj.php' method='POST'>
  <div class='form-group row'>
    <label for='imie' class='col-sm-2 col-form-label'>Imię:</label>
    <div class='col-sm-10'>
      <input type='text' name='imie' class='form-control' placeholder='Podaj imię' required>
    </div>
  </div>
  <div class='form-group row'>
    <label for='nazwisko' class='col-sm-2 col-form-label'>Nazwisko:</label>
    <div class='col-sm-10'>
      <input type='text' name='nazwisko' class='form-control' placeholder='Podaj nazwisko' required>
    </div>
  </div>
    <div class='form-group row'>
    <label for='inputPassword' class='col-sm-2 col-form-label'>Email:</label>
    <div class='col-sm-10'>
      <input type='email' name='email' class='form-control' placeholder='Podaj swój adres email' required>
    </div>
  </div>
      <div class='form-group row'>
    <label for='inputPassword' class='col-sm-2 col-form-label'>Login:</label>
    <div class='col-sm-10'>
      <input type='text' name='login' class='form-control' placeholder='Podaj swój login' required>
    </div>
  </div>
        <div class='form-group row'>
    <label for='inputPassword' class='col-sm-2 col-form-label'>Hasło:</label>
    <div class='col-sm-10'>
     <input type='password'  id='haslo' name='haslo' class='form-control' pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}' title='Hasło musi zawierać małą oraz wielką literę, składać się z cyfry oraz ma być dłuższe niż 8 znaków ' placeholder='Wprowadź hasło' required >
    </div>
  </div>
          <div class='form-group row'>
    <label for='inputPassword' class='col-sm-2 col-form-label'>Powtórz hasło:</label>
    <div class='col-sm-10'>
     <input type='password' id='haslo2' name='haslo1' class='form-control' pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}' title='Hasło musi zawierać małą oraz wielką literę, składać się z cyfry oraz ma być dłuższe niż 8 znaków ' placeholder='Wprowadź hasło' required>
    </div>
  </div>
     <div class='form-group row'>
    <label  class='col-sm-4 col-form-label'><input type='checkbox' onclick='myFunction()' style='margin-left: 5%;'> Odsłoń hasło</label>
  </div>
  <button type='reset' class='btn btn-warning' style='border-radius: 12px; width: 49%; color: black;'>Wyczyść</button>
  <button type='submit' class='btn btn-warning' style='border-radius: 12px; width: 49%; color: black;' name='zarejstruj_btn' >Stwórz konto</button>
  </div>
<div id='zalogowano'> </div>
</form>
  <br>
      </div>
    </div>
  </div>
</div>
<!-- Modal LOGOWANIE-->
<div class='modal fade' id='Logowanie' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'
  aria-hidden='true' style=''>
  <div class='modal-dialog' role='document' style='margin-top: 10%;'>
    <div class='modal-content' style='border-radius: 32px;'>
      <div class='modal-header' style='background-image: url(login.jpg); height: 200px; border-top-left-radius: 30px; border-top-right-radius: 30px;'>
        <h1 class='modal-title text-white logo mr-auto' id='exampleModalLabel' style='font-family: Impact, Charcoal, sans-serif; color: white; margin-left: 27%; margin-top: 10%; letter-spacing: 3px;'>Logowanie</h1>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close' style='color: white'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body text-secondary modal-content'>
         <form action='zaloguj.php' method='POST'>
          <div class='form-group row'>
            <label for='login' class='col-sm-2 col-form-label'>Login:</label>
            <div class='col-sm-10'>
              <input type='text' class='form-control' name='login' placeholder='Podaj swój login' required>
            </div>
          </div>
          <div class='form-group row'>
            <label for='inputPassword' class='col-sm-2 col-form-label'>Hasło:</label>
            <div class='col-sm-10'>
              <input type='password' class='form-control' name='haslo' placeholder='Podaj hasło' required>
            </div>
          </div>               
          <div class='form-group row'>     
          <label  class='col-sm-6 col-form-label'><input type='checkbox' onclick='myFunction()' style='margin-left: 5%;'> Odsłoń hasło</label>
                    <p  class='col-sm-1'></p>
          </div>
         <div class='form-group row col-sm-12 col'>     
          <input type='button' value='Utwórz konto' class='form-label text-center btn btn-warning' style='border-radius: 12px; width: 100%; padding-right:0; color: black; margin-left: 3%;' data-toggle='modal' data-target='#Rejestracja' data-dismiss='modal'>
          </div>
          <input type='reset' value='Wyczyść' class='btn btn-warning' style='border-radius: 12px; width: 49%; color: black;'>
          <input type='submit' value='Zaloguj się' name='zaloguj_btn' class='btn btn-warning' style='border-radius: 12px; width: 49%; color: black;'>
        </form><br>
      </div>
    </div>
  </div>
</div>
<!-- Modal LOGOWANIE-->

<!--MODAL ZAPOMNIAŁEM HASŁA -->
<div class='modal fade' id='Zapomnialem' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog' role='document' style='margin-top: 10%;'>
    <div class='modal-content' style='border-radius: 32px;'>
      <div class='modal-header' style='background-image: url(login.jpg); height: 200px; border-top-left-radius: 29px; border-top-right-radius: 29px; ' >
        <h2 class='modal-title' id='exampleModalLabel' style='font-family: Impact, Charcoal, sans-serif; color: white; margin-left: 20%; margin-top: 10%; letter-spacing: 3px;'><b>Przypomnij hasło</b></h2>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <form action='zaloguj.php' method='POST'>
          <div class='form-group row'>
            <label for='inputPassword' class='col-sm-2 col-form-label' style='color: black;'>Email:</label>
            <div class='col-sm-10'>
              <input type='email' class='form-control' id='haslo3' name='haslo' placeholder='Podaj adres email' required>
            </div>
          </div>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Zamknij</button>
        <button type='button' class='btn btn-primary'>Wyślij</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!--MODAL ZAPOMNIAŁEM HASŁA -->";
}

  function menu($activ)
  {
    switch ($activ) {
      case 'index.php':
      echo "<nav class='navbar navbar-expand-lg navbar-light bg-none' >
  <ul style='padding-right: 3%;' class='navbar-nav'>    
  <li><h1 class='logo mr-auto' style='left: 20%;'><a href='index.php'>E-KUCHNIA</a></h1></li>
  </ul>
  <button class='navbar-toggler bg-light' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
    <span class='navbar-toggler-icon'></span>
  </button>
  <div class='collapse navbar-collapse' id='navbarNav'>
    <ul class='navbar-nav'>

      <li class='nav-item' style='padding-left: 2%;'>
        <a class='nav-link' aria-haspopup='true' aria-expanded='false' style='white-space: nowrap; line-height: 2; color: rgba(255,255,255,.5);' href='#about' >O stronie</a>
      </li>
      <li class='nav-item' style='padding-left: 2%;'>
        <a class='nav-link' aria-haspopup='true' aria-expanded='false' style='white-space: nowrap; line-height: 2; color: rgba(255,255,255,.5);' href='#menu' >Przepisy</a>
      </li>
      <li class='nav-item' style='padding-left: 2%;'>
        <a class='nav-link' aria-haspopup='true' aria-expanded='false' style='white-space: nowrap; line-height: 2; color: rgba(255,255,255,.5);' href='#specials' >Aleja gwiazd</a>
      </li>
      <li class='nav-item' style='padding-left: 2%;'>
        <a class='nav-link' aria-haspopup='true' aria-expanded='false' style='white-space: nowrap; line-height: 2; color: rgba(255,255,255,.5);' href='#events' >Nowość</a>
      </li>
      <li class='nav-item' style='padding-left: 2%;'>
        <a class='nav-link' aria-haspopup='true' aria-expanded='false' style='white-space: nowrap; line-height: 2; color: rgba(255,255,255,.5);' href='#gallery' >Galeria</a>
      </li>
      <li class='nav-item' style='padding-left: 2%;'>
        <a class='nav-link' aria-haspopup='true' aria-expanded='false' style='white-space: nowrap; line-height: 2; color: rgba(255,255,255,.5);' href='#contact' >Kontakt</a>
      </li>
      <li class='nav-item' style='padding-left: 2%;'>
        <a class='nav-link' aria-haspopup='true' aria-expanded='false' style='white-space: nowrap; line-height: 2; color: rgba(255,255,255,.5);' href='#book-a-table' >Wyszukiwarka przepisów</a>
      </li>


    </ul>";

  
if (isset($_SESSION["zalogowany"]) && $_SESSION["zalogowany"]==1 ) {
                      echo "<ul style='padding-left: 10%;' class='navbar-nav'><div class='dropdown'>
  <button onclick='myFunction()' class='dropbtn'>Witaj <b>" . $_SESSION['login'] ."</b>, opcje konta</button>
  <div id='myDropdown' class='dropdown-content' style='background:rgba(0, 0, 0, 0.85)'>";
  if (isset($_SESSION["zalogowany"]) && $_SESSION["poziom_konta"]==2 ) {
        echo "<a href='admin.php' style='color: white;'>Panel administratora</a>";
  }
 echo"
    <a href='panel.php' style='color: white'>Mój Profil</a>  
    <a href='zmien_haslo.php?zmiana_hasla=". $_SESSION["id"] ."' style='color: white;'>Kliknij tutaj, aby zmienić hasło</a>
    <a href='logout.php' style='color: white;'>Kliknij tutaj, aby się wylogować</a>
  </div></ul>";
    }
   else{
    echo"<ul style='padding-left: 10%;' class='navbar-nav'>
          <li  class='dropbtn' data-toggle='modal' data-target='#Logowanie' style='height:10%; margin-top: 0.5%; margin-left: 2%;'><a>ZALOGUJ</a></li>
    </ul>";
  }               
 echo" </div>

</nav>";         
        break;
            case 'admin.php':
        echo "<div class='container align-items-center' >
              <!-- admin.php  -->
              <div class='container align-items-center' >
              <nav class='navbar navbar-expand-lg navbar-dark primary-color'>

                <!-- Navbar brand -->
                <a class='logo mr-auto' href='index.php' style='line-height: 2; margin-left: -32px; color: white;'>E-KUCHNIA</a>

                <!-- Collapse button -->
                <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#basicExampleNav'
                  aria-controls='basicExampleNav' aria-expanded='false' aria-label='Toggle navigation'>
                  <span class='navbar-toggler-icon'></span>
                </button>

                <!-- Collapsible content -->
                <div class='collapse navbar-collapse' >

                  <!-- Links -->
                  <ul class='navbar-nav mr-auto'>

                    <!-- Dropdown -->
                    <li class='nav-item' style='margin-left: 4%;'>
                      <a class='nav-link'
                        aria-haspopup='true' aria-expanded='false' style='white-space: nowrap; line-height: 2; font-family: none;' href='admin.php?zakladka=edit_user'>Zarządzanie użytkownikami</a>
                    </li>
                          <!-- Dropdown -->
                    <li class='nav-item dropdown' style='margin-left: 4%;'>
                      <a class='nav-link dropdown-toggle' data-toggle='dropdown'
                        aria-haspopup='true' aria-expanded='false' style='font-family: none;'>Zarządzanie przepisami</a>
                      <div class='dropdown-menu dropdown-primary' aria-labelledby='navbarDropdownMenuLink' style='background:rgba(12, 11, 9, 0.6); margin-top: 5%;'>
                        <a class='dropdown-item' href='panel.php' style='color: white; background:rgba(12, 11, 9, 0.6); color: white;'>Dodaj przepis</a>
                        <a class='dropdown-item' href='admin.php?zakladka=edit_recipe' style='color: white; background:rgba(12, 11, 9, 0.6);'>Edytuj przepis</a>
                      </div>
                    </li>
                                <!-- Dropdown -->
                    <li class='nav-item dropdown' style='margin-left: 4%;'>
                      <a class='nav-link dropdown-toggle' data-toggle='dropdown'
                        aria-haspopup='true' aria-expanded='false' style='font-family: none;'>Zarządzanie produktami</a>
                      <div class='dropdown-menu dropdown-primary' aria-labelledby='navbarDropdownMenuLink' style='background:rgba(12, 11, 9, 0.6); margin-top: 5%;'>
                        <a class='dropdown-item' href='admin.php?zakladka=add_product' style='color: white; background:rgba(12, 11, 9, 0.6);'>Dodaj produkt</a>
                        <a class='dropdown-item' href='admin.php?zakladka=edit_product&strona=1' style='color: white; background:rgba(12, 11, 9, 0.6);'>Edytuj produkt</a>
                      </div>
                    </li>

                  </ul>
                  <!-- Links -->
                  <ul class='navbar-nav mr-auto' style='padding-right:10%;'>
                  </ul>
                  <!-- Links -->
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
                        <a class='dropdown-item' href='panel.php' style='color: white;'>Dodaj przepis</a>
                        <a class='dropdown-item' href='panel.php?opcja=moje_przepisy' style='color:white'>Moje przepisy</a>
                        <a class='dropdown-item' href='panel.php?opcja=ulubione' style='color: white;'>Ulubione przepisy</a>
                        <a class='dropdown-item' href='panel.php?opcja=ocen_przepisy' style='color: white;'>Ocenione przepisy</a>

                        <a class='dropdown-item' href='zmien_haslo.php?zmiana_hasla=". $_SESSION["id"] ."' style='color: white;'>Kliknij tutaj, aby zmienić hasło</a>
                        <a class='dropdown-item' href='logout.php' style='color: white;'>Kliknij tutaj, aby się wylogować</a>
                      </div>
                    </li>
                  </ul>
                </div>
                <!-- Collapsible content -->

              </nav>

              </div>";
        break;
      case 'przepis.php':
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
                      </style>";
                      if (isset($_SESSION["zalogowany"]) && $_SESSION["poziom_konta"]==2 ) {
                                              echo"
                        <a class='dropdown-item' href='admin.php'>Przejdź do panelu administratora</a>";
                      }
                      echo"
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
        break;

      default:
        echo "<div class='container d-flex align-items-center'>
                <h1 class='logo mr-auto'><a href='index.php'>E-KUCHNIA</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href='index.html' class='logo mr-auto'><img src='assets/img/logo.png' alt='' class='img-fluid'></a>-->

                <nav class='nav-menu d-none d-lg-block' style='color: rgba(255,255,255,.5), padding-left: 0;'>
                  <ul style='color: rgba(255,255,255,.5);'>
                    <li class='nav-item' style='padding-left: 0;'>
                      <a class='nav-link'
                        aria-haspopup='true' aria-expanded='false' style='white-space: nowrap; line-height: 2; color: rgba(255,255,255,.5);' href='#about' >O stronie</a>
                    </li>
                    <li class='nav-item' style='padding-left: 0;'><a href='#menu' class='nav-link'
                        aria-haspopup='true' aria-expanded='false' style='white-space: nowrap; line-height: 2; color: rgba(255,255,255,.5);'>Przepisy</a></li>        
                    <li class='nav-item' style='padding-left: 0;'><a href='#specials' class='nav-link' id='navbarDropdownMenuLink'
                        aria-haspopup='true' aria-expanded='false' style='white-space: nowrap; line-height: 2; color: rgba(255,255,255,.5);'>Aleja gwiazd</a></li>
                    <li class='nav-item' style='padding-left: 0;'><a href='#events' class='nav-link' id='navbarDropdownMenuLink'
                        aria-haspopup='true' aria-expanded='false' style='white-space: nowrap; line-height: 2; color: rgba(255,255,255,.5);'>Nowość</a></li>
                    <li class='nav-item' style='padding-left: 0;'><a href='#gallery' class='nav-link' id='navbarDropdownMenuLink'
                        aria-haspopup='true' aria-expanded='false' style='white-space: nowrap; line-height: 2; color: rgba(255,255,255,.5);'>Galeria</a>
                        </li>

                    <li class='nav-item' style='padding-left: 0;'><a href='#book-a-table' class='nav-link' id='navbarDropdownMenuLink'
                        aria-haspopup='true' aria-expanded='false' style='white-space: nowrap; line-height: 2; color: rgba(255,255,255,.5);'>Wyszukiwarka przepisów</a></li>
                    <li class='nav-item' style='padding-left: 0;'><a href='#chefs' class='nav-link' id='navbarDropdownMenuLink'
                        aria-haspopup='true' aria-expanded='false' style='white-space: nowrap; line-height: 2; color: rgba(255,255,255,.5);'>Kontakt</a></li>";
                    
                    
                     if (isset($_SESSION["zalogowany"]) && $_SESSION["zalogowany"]==1 ) {
                      echo "<ul class='navbar-nav mr-auto'></ul>    
                  <ul class='navbar-nav mr-auto'>
                    <li class='nav-item dropdown'>
                      <a class='nav-link dropdown-toggle' id='navbarDropdownMenuLink' data-toggle='dropdown'
                        aria-haspopup='true' aria-expanded='false' style='border: 2px solid #cda45e; color: #fff; border-radius: 50px; padding: 8px 25px; text-transform: uppercase; font-size: 13px; font-weight: 500; letter-spacing: 1px; transition: 0.3s; margin-left: 2%;'>
                        Witaj <b>" . $_SESSION['login'] ."</b>, opcje konta
                        </a>
                      <div class='dropdown-menu dropdown-primary' aria-labelledby='navbarDropdownMenuLink' style='background:rgba(12, 11, 9, 0.6); margin-top: 5%;'>
                      <style>
                        .dropdown-item:hover {
                          background: #666666
                        }
                      </style>";
                    if (isset($_SESSION["zalogowany"]) && $_SESSION["poziom_konta"]==2 ) {
                      echo "<a class='dropdown-item' href='admin.php'>Przejdź do panelu administratora</a>";
                     }
                       echo " <a class='dropdown-item' href='zmien_haslo.php?zmiana_hasla=". $_SESSION["id"] ."'>Kliknij tutaj, aby zmienić hasło</a>
                        <a class='dropdown-item' href='logout.php'>Kliknij tutaj, aby się wylogować</a>";

                      echo"</div>
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
        break;
    }
  }

  function footer($version)
  {
    switch ($version) {
      case '':
        echo "";
        break;

      default:
        echo "<!-- ======= Footer ======= -->
            <footer id='footer'>
              <div class='footer-top'>
                <div class='container'>
                  <div class='row'>

                    <div class='col-lg-3 col-md-6'>
                      <div class='footer-info'>
                        <h3>E-kuchnia</h3>
                        <p>
                          Damian Antoniów <br>
                          <br><br>
                          <strong>Phone:</strong> 0700<br>
                          <strong>Email:</strong> antoniowdamian@gmail.com<br>
                        </p>
                        <div class='social-links mt-3'>
                          <a href='#' class='twitter'><i class='bx bxl-twitter'></i></a>
                          <a href='#' class='facebook'><i class='bx bxl-facebook'></i></a>
                          <a href='#' class='instagram'><i class='bx bxl-instagram'></i></a>
                          <a href='#' class='google-plus'><i class='bx bxl-skype'></i></a>
                          <a href='#' class='linkedin'><i class='bx bxl-linkedin'></i></a>
                        </div>
                      </div>
                    </div>

                    <div class='col-lg-2 col-md-6 footer-links'>
                      <h4>Odnośniki</h4>
                      <ul>
                        <li><i class='bx bx-chevron-right'></i> <a href='#'>Strona główna</a></li>
                        <li><i class='bx bx-chevron-right'></i> <a href='#'>O stronie</a></li>
                        <li><i class='bx bx-chevron-right'></i> <a href='#'>Wsparcie</a></li>
                        <li><i class='bx bx-chevron-right'></i> <a href='#'>Warunki usługi</a></li>
                        <li><i class='bx bx-chevron-right'></i> <a href='#'>Polityka prywatnościy</a></li>
                      </ul>
                    </div>

                    <div class='col-lg-3 col-md-6 footer-links'>
                      <h4>Usługi</h4>
                      <ul>
                        <li><i class='bx bx-chevron-right'></i> <a href='#'>Web Design</a></li>
                        <li><i class='bx bx-chevron-right'></i> <a href='#'>Web Development</a></li>
                        <li><i class='bx bx-chevron-right'></i> <a href='#'>Product Management</a></li>
                        <li><i class='bx bx-chevron-right'></i> <a href='#'>Marketing</a></li>
                        <li><i class='bx bx-chevron-right'></i> <a href='#'>Graphic Design</a></li>
                      </ul>
                    </div>

                    <div class='col-lg-4 col-md-6 footer-newsletter'>
                      <h4>Zapisz się do Newsweek'a</h4>
                      <p>Wprowadź swój adres e-mail, aby być na bieżąco z nowościami.</p>
                      <form action='' method='post'>
                        <input type='email' name='email'><input type='submit' value='Subscribe'>
                      </form>

                    </div>

                  </div>
                </div>
              </div>

              <div class='container'>
                <div class='copyright'>
                  &copy; Copyright <strong><span>PWSTE Jarosław</span></strong>. Wszelkie prawa zastrzeżone
                </div>
                <div class='credits'>
                </div>
              </div>
            </footer><!-- End Footer -->";
        break;
    }
  }

?>

