<?php
session_start();
if(isset($_SESSION['login']) && $_SESSION['login']){
  if(isset($_POST)){

    include '../../con.php';
    $userid = $_SESSION['userid'];
    $orderid = $_POST['orderid'];
    $status = $_POST['status'];

    $query = "SELECT * FROM orders WHERE userid = '$userid' AND orderid = $orderid";
    $result = $conn->query($query);
    if($result->num_rows > 0) {
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
    }else{
      echo 401;
      echo 'Invalid user with invalid product';
        }






  }
}


 ?>
