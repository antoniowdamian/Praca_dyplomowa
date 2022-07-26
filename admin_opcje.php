
<?php
error_reporting(0);
include 'baza.php';
session_start();
$strona = $_GET['strona'];
$id_user_delete = $_GET['id_user_delete'];
if (isset($_GET['delete_user_btn'])) {  //USUWANIE KONT UŻYTKOWNIKA
  echo $id_user_delete;
  $usun = "DELETE FROM `uzytkownicy` WHERE `uzytkownicy`.`id` = $id_user_delete";

  if(mysqli_query($connection, $usun)) {
   $_SESSION['komunikat'] ="<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>DOBRZE! </strong>UŻYTKOWNIK O NR ID: " .$id_user_delete . " ZOSTAŁ USUNIĘTY
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
    header("Location: admin.php?zakladka=edit_user&strona=".$strona);

} else {

   $_SESSION['komunikat'] ="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>UWAGA! </strong>BŁĄD W TRAKCIE USUWANIA
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
    header("Location: admin.php?zakladka=edit_user&strona=".$strona);
  }
}

if (isset($_GET['zablokuj'])) {     //BLOKOWANIE KONT UŻYTKOWNIKA
  $ban =  "UPDATE `uzytkownicy` SET `poziom_konta` = '0' WHERE `uzytkownicy`.`id` = $id_user_delete";
  if(mysqli_query($connection, $ban)) {
       $_SESSION['komunikat'] ="<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>OK! </strong>UŻYTKOWNIK O NR ID: " .$id_user_delete . " Otrzymał blokadę konta
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
    header("Location: admin.php?zakladka=edit_user&strona=".$strona);    
}
   else {

   $_SESSION['komunikat'] ="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>UWAGA! </strong>Wystąpił nieoczekiwany błąd w trakcie blokady użytkownika
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
    header("Location: admin.php?zakladka=edit_user&strona=".$strona);
  }


}


if (isset($_GET['odblokuj'])) {  //ODBLOKOWYWANIE KONT UŻYTKOWNIKA
  $ban = "UPDATE `uzytkownicy` SET `poziom_konta` = '1' WHERE `uzytkownicy`.`id` = $id_user_delete";
  if(mysqli_query($connection, $ban)) {
       $_SESSION['komunikat'] ="<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>OK! </strong>UŻYTKOWNIK O NR ID: " .$id_user_delete . " Został odblokowany
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
    header("Location: admin.php?zakladka=ban&strona=".$strona);    
}
   else {

   $_SESSION['komunikat'] ="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>UWAGA! </strong>Wystąpił nieoczekiwany błąd
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
    header("Location: admin.php?zakladka=ban&strona=".$strona);
  }


}

if (isset($_GET['odbierz'])) { // ODBIERANIE PRAW ADMINISTRATORA
  $odbierz =  "UPDATE `uzytkownicy` SET `poziom_konta` = '1' WHERE `uzytkownicy`.`id` = $id_user_delete";
  if(mysqli_query($connection, $odbierz)) {
       $_SESSION['komunikat'] ="<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>OK! </strong>Prawa administratorskie dla ID: " .$id_user_delete . " zostały zabrane. Jesteś teraz zwykłym użytkownikiem
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
    header("Location: admin.php?zakladka=admini&strona=".$strona);    
}
   else {

   $_SESSION['komunikat'] ="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>UWAGA! </strong>Wystąpił nieoczekiwany błąd
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
    header("Location: admin.php?zakladka=admini&strona=".$strona);
  }


}

if (isset($_GET['zwieksz'])) { // ZWIĘKSZANIE UPRAWNIEŃ 
  $odbierz =  "UPDATE `uzytkownicy` SET `poziom_konta` = '2' WHERE `uzytkownicy`.`id` = $id_user_delete";
  if(mysqli_query($connection, $odbierz)) {
       $_SESSION['komunikat'] ="<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>OK! </strong>Gratulacje użytkownik o ID: " .$id_user_delete . " został administratorem strony
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
    header("Location: admin.php?zakladka=uzytkownicy&strona=".$strona);    
}
   else {

   $_SESSION['komunikat'] ="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>UWAGA! </strong>Wystąpił nieoczekiwany błąd
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
    header("Location: admin.php?zakladka=uzytkownicy&strona=".$strona);
  }


}

if (isset($_GET['usun_produkt_btn'])) { // USUWANIE PRODUKTU 
  $produkt = $_GET['produkt'];
  $przywroc = "UPDATE `skladniki` SET `stan` = '0' WHERE `skladniki`.`ID` = $id_user_delete; ";
  if(mysqli_query($connection, $przywroc)) {
       $_SESSION['komunikat'] ="<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>OK! </strong>Produkt: <b> $produkt </b> został usunięty
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
   header("Location: admin.php?zakladka=edit_product&strona=1");    
}
   else {

   $_SESSION['komunikat'] ="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>UWAGA! </strong>Wystąpił nieoczekiwany błąd
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
    header("Location: admin.php?zakladka=edit_product&strona=1");
  }


}
if (isset($_GET['przywroc'])) { // PRZYWRACANIE PRODUKTU
  $produkt = $_GET['produkt'];
  $przywroc = "UPDATE `skladniki` SET `stan` = '1' WHERE `skladniki`.`ID` = $id_user_delete; ";
  if(mysqli_query($connection, $przywroc)) {
       $_SESSION['komunikat'] ="<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>OK! </strong>Produkt: <b> $produkt </b> został przywrócony
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
   header("Location: admin.php?zakladka=usuniete&strona=1");    
}
   else {

   $_SESSION['komunikat'] ="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>UWAGA! </strong>Wystąpił nieoczekiwany błąd
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
    header("Location: admin.php?zakladka=usuniete&strona=1");
  }


}

//DODAWANIE PRODUKTÓW ZAKŁADKA PRODUKTY


if (isset($_GET['dodaj_produkt_btn'])) {
$number = count($_GET["name"]);
if($number > 1)
{
  for($i=0; $i<$number; $i++)
  {
    if(trim($_GET["name"][$i] != ''))
    {
      $sql = "INSERT INTO skladniki(Produkt, stan) VALUES('".mysqli_real_escape_string($connection, $_GET["name"][$i])."', '0')";
      mysqli_query($connection, $sql);
    }
  }
  $_SESSION['komunikat'] ="<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>OK! </strong>Produkty zostały dodane
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
  header("Location: admin.php?zakladka=zablokowane");
}
else
{

     $_SESSION['komunikat'] ="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>UWAGA! </strong>Wystąpił nieoczekiwany błąd
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
  header("Location: admin.php?zakladka=zablokowane");
}

}
// zakonczenie po��czenia


//ZAKŁADKA PRODUKTY PRZYWRACANIE ORAZ USUWANIE WSZYSTKI PRODUKTÓW
if (isset($_GET['usun_perm_btn'])) {
  $produkt = $_GET['produkt'];
  $przywroc = "DELETE FROM `skladniki` WHERE `skladniki`.`stan` = 0";
  if(mysqli_query($connection, $przywroc)) {
       $_SESSION['komunikat'] ="<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>OK! </strong>Wszystkie produkty zostały usunięte
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
   header("Location: admin.php?zakladka=usuniete&strona=1");    
}
   else {

   $_SESSION['komunikat'] ="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>UWAGA! </strong>Wystąpił nieoczekiwany błąd
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
    header("Location: admin.php?zakladka=usuniete&strona=1");
  }


}
if (isset($_GET['usun_perm'])) {
  $produkt = $_GET['produkt'];
  $przywroc = "DELETE FROM `skladniki` WHERE `skladniki`.`ID` = $id_user_delete";
  if(mysqli_query($connection, $przywroc)) {
       $_SESSION['komunikat'] ="<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>OK! </strong>Wszystkie produkty zostały usunięte
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
   header("Location: admin.php?zakladka=usuniete&strona=1");    
}
   else {

   $_SESSION['komunikat'] ="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>UWAGA! </strong>Wystąpił nieoczekiwany błąd
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
    header("Location: admin.php?zakladka=usuniete&strona=1");
  }


}
if (isset($_GET['odzyskaj_all_btn'])) {
  $produkt = $_GET['produkt'];
  $przywroc = "UPDATE `skladniki` SET `stan` = '1' WHERE `skladniki`.`stan` = 0; ";
  if(mysqli_query($connection, $przywroc)) {
       $_SESSION['komunikat'] ="<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>OK! </strong>Wszystkie produkty zostały przywrócone
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
   header("Location: admin.php?zakladka=usuniete&strona=1");    
}
   else {

   $_SESSION['komunikat'] ="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>UWAGA! </strong>Wystąpił nieoczekiwany błąd
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
    header("Location: admin.php?zakladka=usuniete&strona=1");
  }


}

if (isset($_GET['zmien_btn'])) {
  error_reporting(-1);
  //$produkt = $_GET['produkt'];
  $nowy_produkt = $_GET['nowy_produkt'];
  $zmien = "UPDATE `skladniki` SET `Produkt` = '$nowy_produkt' WHERE `skladniki`.`ID` = $id_user_delete; ";

  if(mysqli_query($connection, $zmien)) {
    echo "ok";
       $_SESSION['komunikat'] ="<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>OK! </strong> Produkt o id $id_user_delete  zmienił swoją nazwę na <b> $nowy_produkt </b>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
  header("Location: admin.php?zakladka=edit_product&strona=1");    
}
   else {
echo "blad";
   $_SESSION['komunikat'] ="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>UWAGA! </strong>Wystąpił nieoczekiwany błąd
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
   // header("Location: admin.php?zakladka=edit_product&strona=1");
  }


}
  
////////////////////////////////////////////////////////// USUWANIE PRZEPISU

if (isset($_GET['usun_przepis'])) {

  error_reporting(-1);
  $usun_przepis =  "DELETE FROM `przepisy` WHERE `przepisy`.`ID` = $id_user_delete";
    if(mysqli_query($connection, $usun_przepis)) {
    echo "ok";
       $_SESSION['komunikat'] ="<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>OK! </strong> Przepis o ID:  $id_user_delete  został pomyślnie usunięty
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
  header("Location: admin.php?zakladka=edit_recipe");    
}
   else {
echo "blad";
   $_SESSION['komunikat'] ="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>UWAGA! </strong>Wystąpił nieoczekiwany błąd
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
   header("Location: admin.php?zakladka=edit_recipe");
  }

  }


mysqli_close($connection);
?>







<!--  ZMIANA INDYWIDUALNA DANYCH KONTA !-->
        <?php 
      if (isset($_POST['zmien_haslo'])) {
session_start();
error_reporting(-1);
  require("baza.php");
  $stare_haslo=$_POST['aktualne_haslo'];
  $nowe_haslo_1=$_POST['nowe_haslo_1'];
  $nowe_haslo_2=$_POST['nowe_haslo_2'];
  $id_uzytkownika = $_SESSION["id"];

  $stare_md5_haslo=md5($stare_haslo);
  $nowe_md5_haslo=md5($nowe_haslo_1);
echo "SELECT * FROM `uzytkownicy` WHERE `id` = $id_uzytkownika";
  $wynik = mysqli_query($connection, "SELECT * FROM `uzytkownicy` WHERE `id` = $id_uzytkownika");
    $kolumna = mysqli_fetch_assoc($wynik);
echo $kolumna['haslo'];
  if ($kolumna['haslo']!=$stare_md5_haslo) {
    $_SESSION['Komunikat'] = "<h5 style='color:red;'>Niepoprawne aktualne hasło</h5>";
     header("Location: zmien_haslo.php?zmiana_hasla=".$id_uzytkownika."&&Blad=".$stare_haslo."");
    exit;
  }
  else
  {
    if($nowe_haslo_1==$nowe_haslo_2)
    { 
      $sql = "UPDATE `uzytkownicy` SET `haslo`='$nowe_md5_haslo' WHERE `id`='$id_uzytkownika'";

      if(mysqli_query($connection, $sql)){
                $_SESSION['komunikat'] = "<div class='alert alert-success alert-dismissible fade show' role='alert' style='position: absolute; width: 100%; top: 20%; text-align: center; z-index: 1;'>
                                            <strong>OK! </strong>Pomyślnie zmieniono hasło.
                                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                              <span aria-hidden='true'>&times;</span>
                                            </button>
                                          </div>";
          //header("Location: index.php");
        exit;

          } else{
              //echo "ERROR: Nie udało się przenieść zlecenia KOD BŁĘDU: " . mysqli_error($connection);
              $_SESSION['Komunikat'] = "<h5 style='color:red;'>Nie udało się zmienić hasła. Spróbuj ponownie. Jeżeli problem będzie występował nadal skontaktuj sie z administratorem</h5>";

     //header("Location: zmien_haslo.php?ID=".$id_uzytkownika."&&Blad=".$nowe_haslo_1."");
          exit;
          }  
    }
    else
    {
      $_SESSION['Komunikat'] = "<h5 style='color:red;'>Hasła nie są identyczne</h5>";

        echo "<h5 style='color:red;'>Hasła nie są identyczne</h5>";
        //header("Location: zmien_haslo.php?zmiana_hasla_id=$zmiana_id");
    }
  }
        }  
      ?>


<!--  ZMIANA  DANYCH PRZEZ ADMINA !-->
  <?php 
      if (isset($_POST['zmien_id'])) {

error_reporting(-1);
include 'baza.php';
  $imie = $_POST['imie'];
  $nazwisko = $_POST['nazwisko'];
  $email = $_POST['email'];
  $login = $_POST['login'];
  $nowe_haslo_1=$_POST['nowe_haslo_1'];
  $nowe_haslo_2=$_POST['nowe_haslo_2'];
  $id_uzytkownika = $_POST['id_uzytkownika'];
  echo "<p style='color: white;'> $id_uzytkownika </p>";

  $nowe_md5_haslo=md5($nowe_haslo_1);

    if($nowe_haslo_1==$nowe_haslo_2)
    { 
      $sql = "UPDATE `uzytkownicy` SET `imie` = '$imie', `nazwisko` = '$nazwisko', `email` = '$email', `login` = '$login', `haslo`='$nowe_md5_haslo' WHERE `uzytkownicy`.`id` = $id_uzytkownika";

      if(mysqli_query($connection, $sql)){
                $_SESSION['komunikat'] = "<div class='alert alert-success alert-dismissible fade show' role='alert' style='position: absolute; width: 100%; top: 20%; text-align: center; z-index: 1;'>
                                            <strong>OK! </strong>Pomyślnie zmieniono hasło.
                                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                              <span aria-hidden='true'>&times;</span>
                                            </button>
                                          </div>";
          header("Location: zmien_haslo.php?zmiana_hasla_id=$id_uzytkownika");
          //header("Location: admin.php");
        exit;

          } else{
                              $_SESSION['komunikat'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert' width: 100%; top: 20%; text-align: center; z-index: 1;'>
                                            <strong>Błąd! </strong>Nie udało się zmienić hasła. Spróbuj ponownie. Jeżeli problem będzie występował nadal skontaktuj sie z administratorem
                                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                              <span aria-hidden='true'>&times;</span>
                                            </button>
                                          </div>";

     header("Location: zmien_haslo.php?zmiana_hasla_id=$id_uzytkownika");
          exit;
          }  
    }
    else
    {
                $_SESSION['komunikat'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert' width: 100%; top: 20%; text-align: center; z-index: 1;'>
                                            <strong>Błąd! </strong>Hasła nie są identyczne
                                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                              <span aria-hidden='true'>&times;</span>
                                            </button>
                                          </div>";

        echo "<h5 style='color:red;'>Hasła nie są identyczne</h5>";
     header("Location: zmien_haslo.php?zmiana_hasla_id=".$id_uzytkownika."");
    }
    
  
        }  
      ?>
