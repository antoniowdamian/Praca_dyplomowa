<?php
error_reporting(0);
session_start();
include 'baza.php';

  $imie = $_POST['imie'];
  $nazwisko = $_POST['nazwisko'];
  $email = $_POST['email'];
  $login = $_POST['login'];
  $haslo = $_POST['haslo'];
 
 $dodaj = "INSERT INTO `uzytkownicy` (`id`, `imie`, `nazwisko`, `email`, `login`, `haslo`, `poziom_konta`) VALUES (NULL, '$imie', '$nazwisko',  '$email', '$login', ".md5($haslo).", '1')";
 
 
// komunikat przy dodawaniu rekordu
if(mysqli_query($connection, $dodaj)) {

  echo "dodało się";
 $_SESSION['rejestracja'] ="<div class='alert alert-success alert-dismissible fade show' role='alert' style='margin-bottom:50%;'>
  <strong>Dziękuję! </strong>Konto zostało utworzone
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
 // header('Location: index.php');

} else {
  echo "nie dodało się";
   echo "INSERT INTO `uzytkownicy` (`id`, `imie`, `nazwisko`, `email`, `login`, `haslo`, `poziom_konta`) VALUES (NULL, '$imie', '$nazwisko',  '$email', '$login', ".md5($haslo).", '1')";
 $_SESSION['rejestracja'] ="<div class='alert alert-danger alert-dismissible fade show' role='alert' style='margin-bottom:50%;'>
  <strong>UWAGA! </strong>Rejestracja nie powiodła się użytkownik o podanym loginie już istnieje
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
	//header('Location: index.php');
}
// zakonczenie po��czenia
mysqli_close($connection);

?>