<!DOCTYPE html>
<html>
<head>
  <?php
  require '../functions.php';
  ?>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
  <?php title(); ?>
  <link rel="shortcut icon" type="image/png" href="/media/images/favicon.png">
  <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
  <link rel="stylesheet" type="text/css" href="/media/css/site-examples.css?_=76e0beef271cda75893495a30c11a693">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">
  <style type="text/css" class="init">
  
  </style>

  <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" language="javascript" src="tabelka.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>

  <script type="text/javascript" class="init">
  


$(document).ready(function() {
  $('#example').DataTable();
} );



  </script>
</head>

<body class="wide comments example dt-example-bootstrap4">
  <div class="fw-background">
    <div></div>
  </div>
  <div class="fw-container">
    <div class="fw-body">
      <div class="content">
        <h1 class="page_title">Panel administratora</h1>
        <div class="demo-html">
      
          <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
            <thead>
             <tr>
                <th>ID</th>
                <th>Imię</th>
                <th>Nazwisko</th>
                <th>E-mail</th>
                <th>Login</th>
                <th>Zablokuj</th>
                <th>Edytuj</th>
                <th>Usuń</th>
              </tr>

              
            </thead>
            <tbody>

                          <?php
                          include '../baza.php';
              $uzytkownicy = mysqli_query($connection,"SELECT * FROM `uzytkownicy` WHERE poziom_konta != 0");
                while($row = mysqli_fetch_array($uzytkownicy)){

   echo" <form action='admin_opcje.php?zakladka=". $zakladka . "&strona=" . $strona . "' method='get'>
    <input type='hidden' name='strona' value='". $strona . "'>
    <tr>
      <input type='hidden' name='id_user_delete' value='". $row['id'] . "'>
      <input type='hidden' name='nazwisko' value='". $row['nazwisko'] . "'>
      <td>".$row['id']."</td>
      <td>".$row['imie']."</td>
      <td>".$row['nazwisko']."</td>
      <td>".$row['email']."</td>
      <td>".$row['login']."</td>
      <td><button type='submit' class='btn btn-info' name='zablokuj'>Zablokuj</button></td>
      <td><button type='submit' class='btn btn-secondary' name='edit_user_btn'>Edytuj</button></td>
      <td><button type='submit' class='btn btn-danger' name='delete_user_btn'>Usuń</button></td>
    </tr>
    </form>";
                              }
                ?>
            </tbody>
          </table>
        </div>


        </div>
      </div>
    </div>
  </div>
</body>
</html>