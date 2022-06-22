<?php
session_start();

if(  $_SESSION['dbpasscode'] == 'unsecure'){
  header('Location:../home.php');
}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../bootsrap/icon_css/all.css">
    <script defer src="../bootsrap/icon_js/all.js"></script>
    <link rel="stylesheet" href="../bootsrap/css/bootstrap.css">
    <script defer src="../bootsrap/js/bootstrap.js"></script>
    
  </head>
  <body>
     
  </body>
</html>
