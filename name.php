<?php
session_start();
error_reporting(0);
include 'baza.php';
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
  $_SESSION['komunikat'] ="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>OK! </strong>Produkty zostały dodane
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
  header("Location: admin.php?zakladka=usuniete&strona=1");
}
else
{

     $_SESSION['komunikat'] ="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>UWAGA! </strong>Wystąpił nieoczekiwany błąd
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
  header("Location: aaaaa.php?");
}
?>