<?php
error_reporting(0);
session_start();
 if(!isset($_SESSION['zalogowany'])) {

   $_SESSION['wyloguj'] ="<div class='alert alert-danger alert-dismissible fade show' role='alert' style='position: absolute; width: 100%; top: 20%; text-align: center; z-index: 1;'>
  <strong>UWAGA! </strong>Nie byłeś zalogowany!!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
	header('Location: index.php');
}

 else{
 unset($_SESSION['zalogowany']);
  $_SESSION['wyloguj'] ="<div class='alert alert-success alert-dismissible fade show' role='alert' style='position: absolute; width: 100%; top: 20%; text-align: center; z-index: 1;'>
  <strong>Dziękuję! </strong>Wylogowanie prawidłowe!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
header('Location: index.php');
}
?>
