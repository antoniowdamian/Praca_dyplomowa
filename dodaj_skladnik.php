
<html>
<head>

<script type="text/javascript" src="walidacja_hasel.js"></script>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Responsywna aplikacja internetowa e-kuchnia</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">



  <!-- =======================================================
  * Template Name: Restaurantly - v1.1.0
  * Template URL: https://bootstrapmade.com/restaurantly-restaurant-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> 

    <!-- CDN link used below is compatible with this example -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css"> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script> 
    <style type="text/css">

      table, th, td {
  border: 0px solid black;
}
        .hide {
            display: none!important;
        }

        .category {
          margin-left: -12px;
          font-size: 1.3em;
          /*safari won't respect many/any of these but color?*/
          /*font-style: italic;*/
          font-weight: bold !important;
          color: #000000 !important;
          /*straight black makes it pop*/
          /*background: #000;*/
        }

            body {
        counter-reset: ingredient;
    }
     
    .ingredient-count::before {
        counter-increment: ingredient;
        content: counter(ingredient);
    }
    .wybierz-skladnik{
        max-width: 50%;
        height: 200%;
    }
    .wybierz-skladnik1{
        max-width: 50%;
        height: 200%;
    }

    .dropdown.bootstrap-select {
      height: 40px;
    }

    .filter-option-inner-inner {
      line-height: 28px;
    }

    button.btn.dropdown-toggle.bs-placeholder.btn-light {
      height: 40px;
    }

    button.btn.dropdown-toggle.btn-light {
      height: calc(1.5em + .75rem + 2px);;
    }
    textarea.form-control.wybierz-krok.kroki {
      height: calc(1.5em + .75rem + 2px);
      max-width: 80%;
    }
    </style>

<script>
$(document).ready(function(){
  var i=1;
  $('#add').click(function(){
    i++;
    $('#dynamic_field').append('<tr id="row'+i+'"><td style="border:none;"><input type="text" name="name[]" placeholder="Podaj kolejny składnik" class="form-control name_list" required /></td><td style="border: none;"><button type="button" name="remove" id="'+i+'" class="btn btn-outline-warning btn_remove">X</button></td></tr>');
  });
  
  $(document).on('click', '.btn_remove', function(){
    var button_id = $(this).attr("id"); 
    $('#row'+button_id+'').remove();
  });
  
 /* $('#submit').click(function(){    
    $.ajax({
      url:"name.php",
      method:"POST",
      data:$('#add_name').serialize(),
      success:function(data)
      {
        alert(data);
        $('#add_name')[0].reset();
      }
    });
  });
  */
});
</script>
</head>
<body >

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
        <?php menu('admin.php'); ?>
  </header><!-- End Header -->


  <main id="main">
<section id="specials" class="specials" style="margin-top: 5%;">
    <div class="container">
<div class="section-title">
          <h2>Dodaj przepis</h2>
          <p>Dodawanie jest proste</p>
        </div>
    <form name="add_name" id="add_name" action="admin_opcje.php" method="get">
                <div class="row">

          <div class="col-lg-9 mt-4 mt-lg-0">


                <div class="tab-pane">
                <div class="row">
                <div class="col-lg-12 details order-2 order-lg-1">
                <h3>Podaj składniki</h3>


<!-- TYTUŁOWY INPUT SKŁADNIKI !-->
 <div class='form-group skladniki-list'>
  <?php
if(isset($_SESSION['komunikat'])){ // WYŚWIETLA KOMUNIKAT O POMYSLNEJ REJESTRACJI/LOGOWANIU
  echo($_SESSION['komunikat']);
  unset($_SESSION['komunikat']);
}
  ?>

<div class='input-group'>
        
          <div class="table-responsive">
            <table class="table table-bordered" id="dynamic_field" style="border:none;">
              <tr>
                <td style="border: none;"><input type="text" name="name[]" placeholder="Podaj nazwę składniku" class="form-control name_list" required=" " /></td>
                <td style="border: none;"><button type="button" name="add" id="add" class="btn btn-outline-warning">
                Kolejny składnik</button></td>
              </tr>
                            <tr>
                <td style="border: none;"><input type="text" name="name[]" placeholder="Podaj nazwę składniku" class="form-control name_list" required=" " /></td>
              </tr>
            </table>
            <input type="submit" class="btn btn-outline-warning" value="Wyślij" name="dodaj_produkt_btn">
          </div>
        </form>

    
</div>
</div>


            

             



       
</form>
</section>
</main><!-- End #main -->


  





  <script src="assets/vendor/aos/aos.js"></script>


<!--   <script src="assets/js/main.js"></script> DO KARUZELI-->

</body>


</html>