<?php
session_start();
if (isset($_POST) && $_SESSION['admintype'] == 'super'){
  $id = uniqid();
  $veriid = uniqid();
  $query = "INSERT INTO admin_table(`admin_id`, `name`, `email`) VALUES('".$id."', '". $_POST['name'] ."', '". $_POST['email'] ."')";

    include '../../con.php';
  $result = $conn->query($query);

    if($result){
      $server = $_SERVER['SERVER_NAME'];
      echo $server. '/newadmin.php?adminid='.$id;
    }else{
      echo "Email Already Exists";
    }


}
  ?>
