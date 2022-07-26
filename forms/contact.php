            <?php 
            session_start();
if(isset($_POST['wyslij'])){
    $admin = "s35449@s.pwste.edu.pl"; 
    $email = $_POST['email']; 
    $imie = $_POST['imie'];


    $temat = "Temat:" . "\n\n" . $_POST['temat'];
    $wiadomosc = $imie . " napisał wiadomość:" . "\n\n" . $_POST['wiadomosc'];
    $wiadomosc2 = "Kopia wiadomosci " . $imie . "\n\n" . $_POST['wiadomosc'];

    $headers = "email:" . $email;
    $headers2 = "email:" . $admin;
    mail($admin,$temat,$wiadomosc,$headers);
    mail($email,$temat2,$wiadomosc2,$headers2); 


    $_SESSION['email'] ="<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>OK! </strong>Wiadomość z adresu: " .$email . " została wysłana
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
  header('Location: ../index.php#contact');
    }
?>