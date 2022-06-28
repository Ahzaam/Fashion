<?php
  session_start();
  if(isset($_POST['id']) && isset($_SESSION['login']) && $_SESSION['login']){
    $userid = $_SESSION['userid'];
    $proid = $_POST['id'];
    include '../../con.php';
    $query = "SELECT * FROM wish_list WHERE customer_id = '". $userid ."' &&  product_id='". $proid ."'";
    $result = $conn->query($query);
    if($result->num_rows > 0){
      echo 201;
    }else{
      $stmt = $conn->prepare("INSERT INTO wish_list (customer_id, product_id) VALUES( ?, ?)");
      $stmt->bind_param('ss', $userid,  $proid);
      $stmt->execute();
      echo 200;
    }





  }else{
    if($_POST['id']){
      echo 404  ;
    }
  }
 ?>
