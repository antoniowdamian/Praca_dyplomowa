<?php
error_reporting(0);
  require('baza.php');
      // Zaczyna sesje
    session_start();
  $error=''; //Zmienna do przechowywania erroru
 if(isset($_POST['zaloguj_btn'])) {
    if(empty($_POST['login']) && empty($_POST['password'])) {
      echo "Wprowadź adres email i hasło";
    }
    elseif(empty($_POST['login'])) {
      echo "Wprowadź adres login";
    }
    elseif(empty($_POST['haslo'])) {
      echo "Wprowadź hasło";
    }
    else
    {
      //Zdefiniowanie loginu i hasła
      $login=$_POST['login'];
      $password=$_POST['haslo'];
      echo $login . " | " . $password . "<br>";
      $passwordMD5 = md5($password);
      
      //Wybranie loginu i hasła z bazy danych
      $query = mysqli_query($connection, "SELECT * FROM uzytkownicy WHERE login='$login' AND haslo='$passwordMD5'");
      $rows = mysqli_num_rows($query);
      $query1 = mysqli_query($connection, "SELECT * FROM uzytkownicy WHERE login='$login'");
      $rows1 = mysqli_num_rows($query1);
      $userRow = mysqli_fetch_array($query);
      if($rows == 1)
      {
        // Store data in session variables
        session_start(); 
                $_SESSION["zalogowany"] = true;
                $_SESSION["id"] = $userRow["id"];
                $_SESSION["imie"] = $userRow["imie"];
                $_SESSION["nazwisko"] = $userRow["nazwisko"];
                $_SESSION["email"] = $userRow["email"];
                $_SESSION["login"] = $userRow["login"];
                $_SESSION["poziom_konta"] = $userRow["poziom_konta"];
                $_SESSION['komunikat'] = "<div class='alert alert-success alert-dismissible fade show' role='alert' style='position: absolute; width: 100%; top: 20%; text-align: center; z-index: 1;'>
                                            <strong>OK! </strong>Zalogowano pomyślnie.
                                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                              <span aria-hidden='true'>&times;</span>
                                            </button>
                                          </div>";
        
        header("Location: index.php?zalogowano"); // Przenoszenie po zalogowaniu
      }
      else
      {
        if($rows1 == 1)
        {
 $_SESSION['komunikat'] ="<div class='alert alert-danger alert-dismissible fade show' role='alert' style='position: absolute; width: 100%; top: 20%; text-align: center; z-index: 1;'>
  <strong>UWAGA! </strong>WPROWADZONO NIEPRAWIDŁOWE DANE LOGOWANIA
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
header('Location: index.php');
        }
        else
        {
 $_SESSION['komunikat'] ="<div class='alert alert-danger alert-dismissible fade show' role='alert' style='position: absolute; width: 100%; top: 20%; text-align: center; z-index: 1;'>
  <strong>UWAGA! </strong>WPROWADZONO NIEPRAWIDŁOWE DANE LOGOWANIA
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
header('Location: index.php');
        }
      }
      
      mysqli_close($connection); // Zamykanie połączenia


    }
  }

  if(isset($_POST['zarejstruj_btn'])) {
$imie = htmlspecialchars(stripslashes(strip_tags(trim($_POST["imie"]))), ENT_QUOTES);
$nazwisko = htmlspecialchars(stripslashes(strip_tags(trim($_POST["nazwisko"]))), ENT_QUOTES);
$email = htmlspecialchars(stripslashes(strip_tags(trim($_POST["email"]))), ENT_QUOTES);
$login = htmlspecialchars(stripslashes(strip_tags(trim($_POST["login"]))), ENT_QUOTES);
$haslo = htmlspecialchars(stripslashes(strip_tags(trim($_POST["haslo"]))), ENT_QUOTES);
$haslo1 = htmlspecialchars(stripslashes(strip_tags(trim($_POST["haslo1"]))), ENT_QUOTES);
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $email = $_POST['email'];
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];
    $haslo1= $_POST['haslo1'];


    if(empty($_POST['imie'])) {
      echo "Wprowadź imię";
    }
    elseif(empty($_POST['nazwisko'])) {
      echo "Wprowadź nazwisko";
    }
    elseif(empty($_POST['email'])) {
      echo "Wprowadź adres email";
    }
    elseif(empty($_POST['login'])) {
      echo "Wprowadź login";
    }
    elseif(empty($_POST['haslo'])) {
      echo "Wprowadź hasło";
    }
    elseif(empty($_POST['haslo1'])) {
      echo "Powtórz hasło";
    }
    else {
      if($haslo!=$haslo1)
      {
        $_SESSION['komunikat'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='position: absolute; width: 100%; top: 20%; text-align: center; z-index: 1;'>
  <strong>BŁĄD! </strong>Hasła nie są identyczne.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
header('Location: index.php');
      }
      else
      {
        $query = mysqli_query($connection, "SELECT * FROM uzytkownicy WHERE email='$email' OR login ='$login' ");
        $rows = mysqli_num_rows($query);
        if($rows == 1)
        {
          $_SESSION['komunikat'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='position: absolute; width: 100%; top: 20%; text-align: center; z-index: 1;'>
  <strong>BŁĄD! </strong>Podany adres email lub login jest już w bazie. Wpisz inne dane.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
header('Location: index.php');
        }
        else
        {
          $PasswordMD5 = md5($haslo);
          $sql = "INSERT INTO `uzytkownicy` (`imie`, `nazwisko`, `email`, `login`, `haslo`, `poziom_konta`) VALUES ('$imie', '$nazwisko', '$email', '$login', '$PasswordMD5', '1')";
              if(mysqli_query($connection, $sql)){
                $_SESSION['komunikat'] = "<div class='alert alert-success alert-dismissible fade show' role='alert' style='position: absolute; width: 100%; top: 20%; text-align: center; z-index: 1;'>
  <strong>OK! </strong>Konto zostało utworzone
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
            $imie = NULL;
            $nazwisko = NULL;
            $email = NULL;
            $haslo = NULL;
            $haslo1 = NULL;
            header('Location: index.php');
              } 
              else{
                  $_SESSION['komunikat'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='position: absolute; width: 100%; top: 20%; text-align: center; z-index: 1;'>
  <strong>BŁĄD! </strong>Wystąpił błąd.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
header('Location: index.php');
              }
        }
      }
    }
  }
?>