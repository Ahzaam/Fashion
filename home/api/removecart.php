<?php
session_start();
include '../../con.php';
if(isset($_SESSION['login']) && $_SESSION['login'] && isset($_POST)){

  $userid = $_SESSION['userid'];

  $stmt = $conn->prepare("DELETE FROM cart  WHERE cart_id = ? AND customer_id = '$userid'");
  $stmt->bind_param('i', $_POST['cartid']);
  $stmt->execute();


  if($stmt->affected_rows > 0) {
    echo 200;
  }else{
    echo 401;
  }




}else{
  echo "Bad Request";
}


 ?>
