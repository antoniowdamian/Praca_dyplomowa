<?php
session_start();
error_reporting(0);
include 'baza.php';
$tytul = $_POST['tytul'];
$kategoria = $_POST['kategoria'];
$opis = $_POST['opis'];
$skladnik = count($_POST["skladnik"]);
$ilosc = count($_POST["ilosc"]);
$jednostka = count($_POST["jednostka"]);
$krok = count($_POST["krok"]);
$poziom = $_POST['poziom'];
$czas = $_POST['czas'];
$uzytkownik = $_POST['uzytkownik'];
$folder = "images/";
$sciezka_pliku = $folder . time() . basename($_FILES["plik_do_wgrania"]["name"]);
$uploadOk = 1;
$typ_pliku = strtolower(pathinfo($sciezka_pliku,PATHINFO_EXTENSION));


$sprawdzenie_formatu = getimagesize($_FILES["plik_do_wgrania"]["tmp_name"]);
if($sprawdzenie_formatu !== false) {
  echo "Plik jest zdjęciem - " . $sprawdzenie_formatu["mime"] . ".";
  $uploadOk = 1;
} else {
  echo "Plik nie jest zdjęciem.";
  $uploadOk = 0;
}


// sprawdzenie czy plik występuje
if (file_exists($sciezka_pliku)) {
  echo "Plik o tej nazwie jest już na serwerze.";
  $uploadOk = 0;
}

// sprawdzenie rozmiaru pliku
/*if ($_FILES["plik_do_wgrania"]["size"] > 500000) {
  echo "Za duży rozmiar pliku.";
  $uploadOk = 0;
}*/

// Dozwolone formaty plików
if($typ_pliku != "jpg" && $typ_pliku != "png" && $typ_pliku != "jpeg" && $typ_pliku != "gif" ) {
  echo "Przepraszamy, tylko JPG, JPEG, PNG i GIF są dozwolone.";
  $uploadOk = 0;
}

// sprawdzenie_formatu if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Plik nie został wgrany.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["plik_do_wgrania"]["tmp_name"], $sciezka_pliku)) {
    echo "Plik ". htmlspecialchars( basename( $_FILES["plik_do_wgrania"]["name"])). " został wgrany.";
  } else {
    echo "Wystąpił błąd podczas wgrywania pliku.";
  }
}
// Wyświetlanie pobranych rzeczy

echo "<h3>tytul </h3>" . $tytul;
echo "<h3>kategoria</h3>" . $kategoria;
echo "<h3>opis</h3>" . $opis;
  echo "<h3 style='color: green;'>id_usera</h3>" . $uzytkownik;
for($i=0; $i<$skladnik; $i++)
{
  echo "<h3>skladnik " . ($i+1) . "</h3>" . $_POST["skladnik"][$i] . " x " . $_POST["ilosc"][$i] . " " . $_POST["jednostka"][$i];
}
for($i=0; $i<$krok; $i++)
{
  echo "<h3>krok " . ($i+1) . "</h3>" . $_POST["krok"][$i];
}
echo "<h3>poziom</h3>" . $poziom;
echo "<h3>czas</h3>" . $czas . "<br>";

$przepisy = "INSERT INTO `przepisy` (`Nazwa`, `Kategoria`, `Opis`, `Trudnosc`, `Czas`, `obrazek`, `Wyswietlenia`, `id_uzytkownika`) VALUES 
                ('$tytul', '$kategoria', '$opis', '$poziom', '$czas', '$sciezka_pliku', '1', '$uzytkownik'); ";
if(mysqli_query($connection, $przepisy)) { 
  $id_dodanego_ostatniego_przepisu = mysqli_insert_id($connection);
  echo "<h2 style='color: green;'>dodano przepis </h2>";
  echo "<h3 style='color: green;'>tytul</h3>" . $tytul;
  echo "<h3 style='color: green;'>kategoria</h3>" . $kategoria;
  echo "<h3 style='color: green;'>opis</h3>" . $opis;
  echo "<h3 style='color: green;'>id_usera</h3>" . $uzytkownik;
  header('przepisy.php?ID=$id_dodanego_ostatniego_przepisu&nazwa=$tytul');

  if($skladnik > 1 && $ilosc > 1 && $jednostka > 1)
  {
    for($i=0; $i<$skladnik; $i++)
    {
      if(trim($_POST["skladnik"][$i] != '' && $_POST["ilosc"][$i] != '' && $_POST["jednostka"][$i] != ''))
      {
        $sql = "INSERT INTO przepisy_skladniki(`Przepisy_ID`, `Skladniki_ID`, `Ilosc_skladnikow`, `Jednostka`) VALUES('$id_dodanego_ostatniego_przepisu', '".mysqli_real_escape_string($connection, $_POST["skladnik"][$i])."', '".mysqli_real_escape_string($connection, $_POST["ilosc"][$i])."', '".mysqli_real_escape_string($connection, $_POST["jednostka"][$i])."')";
        if (mysqli_query($connection, $sql)) {
          echo "<h3 style='color: green;'>skladnik " . ($i+1) . "</h3>" . $_POST["skladnik"][$i] . " x " . $_POST["ilosc"][$i] . " " . $_POST["jednostka"][$i];
        }
        else{
          echo "nie dodano składnika " . ($i+1) . mysqli_error($connection) . "<br>";
        }
      }
      else {
        echo "skaldnik lub ilosc lub jednostka jest równa NULL";
      }
    }
  }
  if($krok > 1)
  {
  for($j=0; $j<$krok; $j++)
    {
      if(trim($_POST["krok"][$j] != ''))
      {
        $sql2 = "INSERT INTO kroki(Przepis_ID,  Opis_kroku) VALUES('$id_dodanego_ostatniego_przepisu', '".mysqli_real_escape_string($connection, $_POST["krok"][$j])."')";
        if (mysqli_query($connection, $sql2)) {

          echo "<h3 style='color: green;'>krok " . ($j+1) . "</h3>" . $_POST["krok"][$j];

        }
      }
      else
      {
        echo "krok jest null";
      }
    }
    //header("Location: testowe.php?ID=".$id_dodanego_ostatniego_przepisu."&nazwa=".$tytul."");
  }
header("Location: przepis.php?ID=".$id_dodanego_ostatniego_przepisu."&nazwa=".$tytul."");
}
else {
  echo "nie dodano przepisu"  . mysqli_error($connection) . "<br>";
}

?>