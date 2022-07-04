<?php
session_start();
if(isset($_SESSION['login']) && $_SESSION['login']){
  if(isset($_POST)){

    include '../../con.php';
    $orderid = $_POST['orderid'];
    $status = $_POST['status'];

    if($status == 'remove'){
      $remove = "DELETE FROM orders WHERE orderid='$orderid'";
      $deduct = $conn->query($remove);
      $deduct = True;
      if($deduct){
        echo 200;
      }else{
        echo 401;
      }
    }else{
      $query = "UPDATE orders SET status='$status' WHERE orderid='$orderid'";
      $result = $conn->query($query);
      if($result){
        echo 200;
      }else{
        echo 401;
      }
    }




  }
}


 ?>
