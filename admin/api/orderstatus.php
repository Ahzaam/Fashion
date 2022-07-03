<?php
session_start();
if(isset($_SESSION['dbpasscode']) && $_SESSION['dbpasscode'] == 'secure'){
  if(isset($_POST)){

    include '../../con.php';
    $orderid = $_POST['orderid'];
    $status = $_POST['status'];

    if($status == 'cancelled'){
      $product_id = $_POST['productid'];
      $increment = "UPDATE product_table SET stock= stock+1 WHERE id='$product_id'";
      $deduct = $conn->query($increment);
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
