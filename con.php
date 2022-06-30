<?php

$dbhost = 'YOUR_DB_HOST';// Ex: localhost
$dbusername = 'YOUR_DB_USERNAME';//Default: root
$dbpword = 'YOUR_DB_PASSWORD';//Default: ''
$dbdatabase = 'nzfashion';// import DB to your libary using nzfasion.sql (uploaded in this directory)

  $conn = new mysqli($dbhost, $dbusername, $dbpword, $dbdatabase);
  if($conn->connect_error){
    die(mysqli_error($conn));
    header('Location: home.php');
  }else{
    // echo "Database Connected <br/>";
  }

 ?>
