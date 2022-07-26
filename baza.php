<?php
    $DB_HOST = "localhost";
    $DB_USER = "root";
    $DB_PASSWORD = "";
    $DB_DATABASE = "db0500";

    $connection = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_DATABASE);
    mysqli_set_charset($connection,"utf8");
if ($connection->connect_error) {
    die("Połączenie z bazą nie powiodło się: " . $connection->connect_error);
exit();
}


?>

