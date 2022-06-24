<?php
session_start();

if(isset($_SESSION['dbpasscode'])){

  if($_SESSION['dbpasscode'] == 'unsecure'){
    header('Location:index.php');
  }else{


  }
}else{
  header('Location:index.php');
}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  </body>
</html>
