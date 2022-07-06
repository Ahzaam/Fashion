<?php
session_start();

if(isset($_SESSION['dbpasscode'])){

  if($_SESSION['dbpasscode'] == 'unsecure'){
    header('Location:../index.php');
  }else{


  }
}else{
  header('Location:../index.php');
}


?>
