<?php
  session_start();
  if(isset($_POST['type']) && isset($_POST['id']) && isset($_SESSION['login']) && $_SESSION['login']){

    $userid = $_SESSION['userid'];
    include '../../con.php';
    if($_POST['type'] == 'single'){
      if(isset($_POST['quantity'])){
        $quantity = $_POST['quantity'];
      }else{
        $quantity = 1;
      }
      $product_id = $_POST['id'];

      $deduct = "UPDATE product_table SET stock= stock - $quantity WHERE id='$product_id' AND stock > 0";
      $deduct = $conn->query($deduct);
  

      $query = "INSERT INTO orders(orderuid, userid, product_id, quantity) VALUES('". uniqid() . "', '$userid', '$product_id', '$quantity')";
      $result = $conn->query($query);
      if($result){
        echo 200;
      }else{
        echo 401;
      }

    }else if($_POST['type'] == 'cart'){
      $uniqid = uniqid();
      $getcart = "SELECT product_id FROM cart WHERE customer_id='$userid'";
      $cartresult = $conn->query($getcart);
      $suc = True;
      if($cartresult->num_rows > 0 ){
        while($row = $cartresult->fetch_assoc()){
          $product_id = $row['product_id'];
          $deduct = "UPDATE product_table SET stock= stock-1 WHERE id='$product_id' AND stock > 0";
          $deduct = $conn->query($deduct);

          if($deduct){
            $query = "INSERT INTO orders(orderuid, userid, product_id) VALUES('$uniqid', '$userid', '$product_id')";
            $result = $conn->query($query);
          }else{
            $result = False;
          }

          if($result){
            $suc = True;
          }else{
            $suc = False;
          }
        }
      }
      if($suc){
        $query = "DELETE FROM cart WHERE customer_id='$userid'";
        $result = $conn->query($query);
        echo 200;
      }else{
        echo 401;
      }

    }




  }else{
    echo 500;
  }



 ?>
