<?php
error_reporting(0);
session_start();
include 'baza.php';
  $user = ($_SESSION['login']);
  $id = ($_SESSION['id']);


if (isset($_POST['usun'])) {  // usuwanie przepisu z obserwowanych (GŁÓWNY PANEL)
  $id_przepisu = $_POST['id_przepisu'];
  echo "DELETE FROM `ulubione` WHERE `ulubione`.`id_przepis` = $id_przepisu AND `id_uzytkownika` = $id;";
  $usun = "DELETE FROM `ulubione` WHERE `ulubione`.`id_przepis` = $id_przepisu AND `id_uzytkownika` = $id;";

  if(mysqli_query($connection, $usun)) {
   $_SESSION['komunikat'] ="<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>DOBRZE! </strong>USUNIĘTO Z LISTY ULUBIONYCH PRZEPISÓW ID
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";

   header("Location: przepis.php?ID=$id_przepisu");

} else {

   $_SESSION['komunikat'] ="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>UWAGA! </strong>BŁĄD W TRAKCIE USUWANIA
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
   header("Location: przepis.php?ID=$id_przepisu");
  }
}




if (isset($_POST['usun_ulubione'])) {  // usuwanie przepisu z obserwowanycH (PO WEJŚCIU NA STRONE PRZEPIS.PHP)
  $id_przepisu = $_POST['id_przepisu'];
  echo "DELETE FROM `ulubione` WHERE `ulubione`.`id_przepis` = $id_przepisu AND `id_uzytkownika` = $id;";
  $usun = "DELETE FROM `ulubione` WHERE `ulubione`.`id_przepis` = $id_przepisu AND `id_uzytkownika` = $id;";

  if(mysqli_query($connection, $usun)) {
   $_SESSION['komunikat'] ="<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>DOBRZE! </strong>USUNIĘTO Z LISTY ULUBIONYCH PRZEPISÓW ID
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";

   header("Location: przepis.php?ID=$id_przepisu");

} else {
   $_SESSION['komunikat'] ="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>UWAGA! </strong>BŁĄD W TRAKCIE USUWANIA
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
   header("Location: przepis.php?ID=$id_przepisu");
  }
}


if (isset($_POST['dodaj_ulubione'])) {  // DODAWANIE PRZEPISU DO OBSERWOWANYCH
  $id_przepisu = $_POST['id_przepisu'];
  echo "INSERT INTO `ulubione` ( `id_przepis`, `id_uzytkownika`, `identyfikator`) VALUES ('$id_przepisu', '$id', '$id$id_przepisu')";
  $usun = "INSERT INTO `ulubione` ( `id_przepis`, `id_uzytkownika`, `identyfikator`) VALUES ('$id_przepisu', '$id', '$id$id_przepisu'); ";

  if(mysqli_query($connection, $usun)) {
   $_SESSION['komunikat'] ="<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>DOBRZE! </strong>DODANO DO ULUBIONYCH
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";

   header("Location: przepis.php?ID=$id_przepisu");

} else {

   $_SESSION['komunikat'] ="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>UWAGA! </strong>BŁĄD W TRAKCIE USUWANIA
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
   header("Location: przepis.php?ID=$id_przepisu");
  }
}


?>