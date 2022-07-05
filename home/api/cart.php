<?php
session_start();
include '../../con.php';
if(isset($_SESSION['login']) && $_SESSION['login'] && isset($_POST)){

  $stmt = $conn->prepare('UPDATE cart SET count = ? WHERE cart_id = ?');
  $stmt->bind_param('is', $_POST['quantity'], $_POST['cartid']);
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
