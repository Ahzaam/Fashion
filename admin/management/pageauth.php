<?php
session_start();

if(isset($_SESSION['dbpasscode'])){

  if($_SESSION['dbpasscode'] == 'unsecure'){
    header('Location:../');
  }else{


  }
}else{
  header('Location:index.php');
}


?>
