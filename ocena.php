 <?php
error_reporting(0);
 session_start();
  $user = ($_SESSION['login']);
  $id = ($_SESSION['id']);
  include 'baza.php';
  $gwiazdka = $_GET['ocena'];
  $ID_przepisu = $_GET['ID'];
  $nazwa_przepisu = $_GET['nazwa'];
  if (isset($_GET['zmien'])) {
    $ID = $_GET['ID'];
    $ocena = $_GET['ocena'];
$zmien_ocene = "UPDATE `oceny` SET `ocena` = '$ocena' WHERE `oceny`.`ID` = $ID"; // ocena
if(mysqli_query($connection, $zmien_ocene)) {
  $_SESSION['komunikat'] = "<div class='alert alert-success alert-dismissible fade show' role='alert' style='width: 100%; top: 20%; text-align: center; z-index: 1;'>
  <strong>Dziękuję! </strong>Twoja ocena została zmieniona na $gwiazdka ✩
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
  <span aria-hidden='true'>&times;</span>
  </button>
  </div>"; // KOMUNIKAT O ODDANEJ OCENIE
  echo "UPDATE `oceny` SET `ocena` = '$ocena' WHERE `oceny`.`ID` = $ID";
 header("Location:panel.php?opcja=ocen_przepisy");
} 
else{
  $_SESSION['komunikat'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='width: 100%; top: 20%; text-align: center; z-index: 1;'>
  <strong>UWAGA! </strong>Wystąpił błąd w zmianie przepisu
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
  <span aria-hidden='true'>&times;</span>
  </button>
  </div>"; // KOMUNIKAT O NIEODDANEJ OCENIE

  header("Location:panel.php?opcja=ocen_przepisy");

}

exit();

  }
  
$ocena = "INSERT INTO `oceny` (`user_id`, `id_przepisu`, `ocena`, `glos`) VALUES ( '$id', '$ID_przepisu', '$gwiazdka', '$id$ID_przepisu');"; // ocena

if(mysqli_query($connection, $ocena)) {
  $_SESSION['komunikat'] = "<div class='alert alert-success alert-dismissible fade show' role='alert' style='width: 100%; top: 20%; text-align: center; z-index: 1;'>
  <strong>Dziękuję! </strong>Twoja ocena to $gwiazdka ✩
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
  <span aria-hidden='true'>&times;</span>
  </button>
  </div>"; // KOMUNIKAT O ODDANEJ OCENIE
  header("Location:przepis.php?ID=" . $ID_przepisu . "&nazwa=" . $nazwa_przepisu);
} 
else{
  $_SESSION['komunikat'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='width: 100%; top: 20%; text-align: center; z-index: 1;'>
  <strong>UWAGA! </strong>JUŻ OCENIŁEŚ TEN PRZEPIS LUB NIE JESTEŚ ZALOGOWANY
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
  <span aria-hidden='true'>&times;</span>
  </button>
  </div>"; // KOMUNIKAT O NIEODDANEJ OCENIE

  header("Location:przepis.php?ID=" . $ID_przepisu . "&nazwa=" . $nazwa_przepisu);
}
?>