<?php
session_start();
error_reporting(0);
include 'baza.php';

$opis = $_POST['opis'];
$nazwa = $_POST['nazwa'];
$trudnosc = $_POST['trudnosc'];
$czas = $_POST['czas'];
$numer_przepisu = $_POST['numer_przepisu'];
$skladnik = count($_POST["skladnik"]);
$ilosc = count($_POST["ilosc"]);
$jednostka = count($_POST["jednostka"]);
$krok = count($_POST["krok"]);
$id = count($_POST["id"]);
$id_kroku = count($_POST["id_kroku"]);

$kategoria = $_POST['kategoria'];


if (isset($_POST['edytuj_przepis'])) { 
  
  for($i=0; $i<$skladnik; $i++)
  {
    if(trim($_POST["skladnik"][$i] != '' && $_POST["ilosc"][$i] != '' && $_POST["jednostka"][$i] != '' && $_POST["id"][$i] != ''))
    {
      echo $_POST["id"][$i];

      echo "UPDATE `przepisy_skladniki` SET `Skladniki_ID` = '".$_POST["skladnik"][$i]."', `Ilosc_skladnikow` = '".$_POST["ilosc"][$i]."', `Jednostka` = '".$_POST["jednostka"][$i]."' WHERE `przepisy_skladniki`.`ID` = '".$_POST["id"][$i]."'<br><br>";


        $sql = "UPDATE `przepisy_skladniki` SET `Skladniki_ID` = '".$_POST["skladnik"][$i]."', `Ilosc_skladnikow` = '".$_POST["ilosc"][$i]."', `Jednostka` = '".$_POST["jednostka"][$i]."' WHERE `przepisy_skladniki`.`ID` = '".$_POST["id"][$i]."';";

                if (mysqli_query($connection, $sql)) {
          echo "Edycja składników udana";
        }
                else{
          echo "Wystapił błąd przy edycji składników";
           mysqli_close();
        }
    }
  }
    for($i=0; $i<$krok; $i++)
  {
    if(trim($_POST["krok"][$i] != '' && $_POST["id_kroku"][$i] ))
    {
echo "string";
$sql2 = "UPDATE `kroki` SET `Opis_kroku` = '".$_POST["krok"][$i]."' WHERE `kroki`.`ID` = '".$_POST["id_kroku"][$i]."'";
  if (mysqli_query($connection, $sql2)) {
          echo "Edycja kroków udana";
        }
                else{
          echo "Wystapił błąd przy edycji kroków";
          mysqli_close();
        }
    }
  }
echo "<br><br>";
$sql3 = "UPDATE `przepisy` SET `Nazwa` = '$nazwa', `Kategoria` = '$kategoria', `Opis` = '$opis', `Trudnosc` = '$trudnosc' WHERE `przepisy`.`ID` = $numer_przepisu";
  if (mysqli_query($connection, $sql3)) {
$_SESSION['komunikat'] ="<div class='alert alert-success alert-dismissible fade show' role='alert' style='width: 100%; top: 20%; text-align: center; z-index: 1;'>
  <strong>DOBRZE! </strong>Przepis został pomyślnie zedytowany.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
        }
                else{
$_SESSION['komunikat'] ="<div class='alert alert-danger alert-dismissible fade show' role='alert' style='position: absolute; width: 100%; top: 20%; text-align: center; z-index: 1;'>
  <strong>BŁĄD! </strong>Edycja przepisu zakończona niepowodzeniem.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
mysqli_close();
        }

header("Location: przepis.php?ID=".$numer_przepisu);
 } 




/////////////////////////////////////////////////////////////////////////////////// USTAWIANIE OBRAZKA

if(isset($_POST['obrazek']))
{
$folder = "images/";
$sciezka_pliku = $folder . time() . basename($_FILES["plik_do_wgrania"]["name"]);
$uploadOk = 1;
$typ_pliku = strtolower(pathinfo($sciezka_pliku,PATHINFO_EXTENSION));


$sprawdzenie_formatu = getimagesize($_FILES["plik_do_wgrania"]["tmp_name"]);
if($sprawdzenie_formatu !== false) {
  echo "Plik jest zdjęciem - " . $sprawdzenie_formatu["mime"] . ".";
  $uploadOk = 1;
} else {
$_SESSION['komunikat'] ="<div class='alert alert-danger alert-dismissible fade show' role='alert' style='position: absolute; width: 100%; top: 20%; text-align: center; z-index: 1;'>
  <strong>UWAGA! </strong>Wystąpił błąd przy zmianie obrazka
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
mysqli_close();
  header("Location: przepis_edit.php?ID=".$numer_przepisu);
  $uploadOk = 0;
}


// sprawdzenie czy plik występuje
if (file_exists($sciezka_pliku)) {
$_SESSION['komunikat'] ="<div class='alert alert-danger alert-dismissible fade show' role='alert' style='position: absolute; width: 100%; top: 20%; text-align: center; z-index: 1;'>
  <strong>UWAGA! </strong>Wystąpił błąd przy zmianie obrazka
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
mysqli_close();
  header("Location: przepis_edit.php?ID=".$numer_przepisu);
  $uploadOk = 0;
}



// Dozwolone formaty plików
if($typ_pliku != "jpg" && $typ_pliku != "png" && $typ_pliku != "jpeg" && $typ_pliku != "gif" ) {
  echo "Przepraszamy, tylko JPG, JPEG, PNG i GIF są dozwolone.";
  $uploadOk = 0;
}

// sprawdzenie_formatu if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
$_SESSION['komunikat'] ="<div class='alert alert-danger alert-dismissible fade show' role='alert' style='position: absolute; width: 100%; top: 20%; text-align: center; z-index: 1;'>
  <strong>UWAGA! </strong>Wystąpił błąd przy zmianie obrazka
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
mysqli_close();
  header("Location: przepis_edit.php?ID=".$numer_przepisu);
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["plik_do_wgrania"]["tmp_name"], $sciezka_pliku)) {
    echo "Plik ". htmlspecialchars( basename( $_FILES["plik_do_wgrania"]["name"])). " został wgrany.";
      $sql3 = "UPDATE `przepisy` SET `obrazek` = '$sciezka_pliku' WHERE `przepisy`.`ID` = $numer_przepisu";
  if (mysqli_query($connection, $sql3)) {
$_SESSION['komunikat'] ="<div class='alert alert-success alert-dismissible fade show' role='alert' style='position: absolute; width: 100%; top: 20%; text-align: center; z-index: 1;'>
  <strong>DOBRZE! </strong>Obrazek został prawidłowo zmieniony
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
  header("Location: przepis_edit.php?ID=".$numer_przepisu);
  } else {
$_SESSION['komunikat'] ="<div class='alert alert-danger alert-dismissible fade show' role='alert' style='position: absolute; width: 100%; top: 20%; text-align: center; z-index: 1;'>
  <strong>UWAGA! </strong>Wystąpił błąd przy zmianie obrazka
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
mysqli_close();
  header("Location: przepis_edit.php?ID=".$numer_przepisu);
  }
}

        }

}
////////////////////////////////////////////////////////////////////////////////


if (isset($_POST['usun_skladnik'])) {  // USUWANIE SKŁADNIKÓW
$usun_skladnik = $_POST['usun_skladnik'];
$sql4 = "DELETE FROM `przepisy_skladniki` WHERE `przepisy_skladniki`.`ID` = $usun_skladnik";
//$sql4 = "DELETE FROM `przepisy_skladniki` WHERE `przepisy_skladniki`.`ID` = $usun";
  if (mysqli_query($connection, $sql4)) {    // USUWANIE SKŁADNIKÓW
          echo "Składnik został usunięty";
          header("Location: przepis_edit.php?ID=".$numer_przepisu);
        }
                else{
          echo "Usuwanie nie powiodło się";
          header("Location: przepis_edit.php?ID=".$numer_przepisu);
        }
}

////////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['dodaj_skladnik'])) {         // DODAWANIE SKŁADNIKÓW
$ilosc_skladnikow = $_POST['ilosc_skladnikow'];
echo "$ilosc_skladnikow";
for ($i=0; $i <$ilosc_skladnikow ; $i++) { 
  echo "INSERT INTO `przepisy_skladniki` ( `Przepisy_ID`, `Skladniki_ID`, `Ilosc_skladnikow`, `Jednostka`) VALUES ( '$numer_przepisu', '1', '', 'jednostka');";
  $sql5 =  "INSERT INTO `przepisy_skladniki` ( `Przepisy_ID`, `Skladniki_ID`, `Ilosc_skladnikow`, `Jednostka`) VALUES ( '$numer_przepisu', '1', '1', 'Wprowadź jednostkę'); ";
    if (mysqli_query($connection, $sql5)) {
          echo "Dodano $ilosc_skladnikow składników";
           header("Location: przepis_edit.php?ID=".$numer_przepisu);
        }
                else{
          echo "Dodawanie nie powiodło się";
           header("Location: przepis_edit.php?ID=".$numer_przepisu);
        }

}
}
////////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['usun_krok'])) {  // USUWANIE KROKÓW
$krok_id = $_POST['usun_krok'];
$sql5 = "DELETE FROM `kroki` WHERE `kroki`.`ID` = $krok_id";
  if (mysqli_query($connection, $sql5)) {
          echo "Krok został usunięty";
          header("Location: przepis_edit.php?ID=".$numer_przepisu);
        }
                else{
          echo "Usuwanie nie powiodło się";
         header("Location: przepis_edit.php?ID=".$numer_przepisu);
        }
}

/////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['dodaj_krok'])) { 
$ilosc_krokow = $_POST['kroki'];
for ($i=0; $i < $ilosc_krokow ; $i++) { 
  $sql4 = "INSERT INTO `kroki` (`Przepis_ID`, `Opis_kroku`) VALUES ('$numer_przepisu', 'Wprowadź opis');";
  if (mysqli_query($connection, $sql4)) {
    header("Location: przepis.php?ID=".$numer_przepisu);
          echo "Krok dodany";
        }
                else{
                  header("Location: przepis.php?ID=".$numer_przepisu);
          echo "Wystąpił nieoczekiwany błąd";
        }
}

}

////////////////////////////////////////////////////////////////////////////////////

?>