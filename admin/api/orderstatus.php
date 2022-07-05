<?php
session_start();
if(isset($_SESSION['dbpasscode']) && $_SESSION['dbpasscode'] == 'secure'){
  if(isset($_POST)){

    include '../../con.php';
    $orderid = $_POST['orderid'];
    $status = $_POST['status'];

    if($status == 'cancelled'){
      $product_id = $_POST['productid'];
      $quantity = $_POST['quantity'];


      $increment = "UPDATE product_table SET stock= stock + $quantity WHERE id='$product_id'";
      $deduct = $conn->query($increment);
    }else if($status == 'confirmed'){
      $product_id = $_POST['productid'];
      $quantity = $_POST['quantity'];

      $selled = "UPDATE product_table SET selled= selled + $quantity WHERE id='$product_id'";
      $inc = $conn->query($selled);
    }

    $query = "UPDATE orders SET status='$status' WHERE orderid='$orderid'";
    $result = $conn->query($query);

    if($result){
      echo 200;
    }else{
      echo 401;
    }
  }
}


 ?>
