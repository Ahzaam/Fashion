<?php
session_start();
if(isset($_POST['type']) && isset($_POST['id']) && isset($_SESSION['login']) && $_SESSION['login']){

  $userid = $_SESSION['userid'];
  $total = 0;

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

    $uniqid =  uniqid();

    $query = "INSERT INTO orders(orderuid, userid, product_id, quantity) VALUES('$uniqid', '$userid', '$product_id', '$quantity')";
    $result = $conn->query($query);

    $getproprice = "SELECT price FROM product_table WHERE id='$product_id'";
    $price = $conn->query($getproprice);

    $price = $price->fetch_assoc()['price'];


    $paymentquery = "INSERT INTO payments(order_uid, userid, total) VALUES('$uniqid', '$userid', '$price')";
    $payment = $conn->query($paymentquery);

    if($result){
      echo 200;
    }else{
      echo 401;
    }

  }else if($_POST['type'] == 'cart'){
    $uniqid = uniqid();
    $getcart = "SELECT product_id, count FROM cart WHERE customer_id='$userid'";
    $cartresult = $conn->query($getcart);
    $suc = True;



    if($cartresult->num_rows > 0 ){
      while($row = $cartresult->fetch_assoc()){
        $product_id = $row['product_id'];
        $count = $row['count'];

        $prodet = $conn->query("SELECT stock, price FROM product_table WHERE  id='$product_id'")->fetch_assoc();
        $stock = $prodet['stock'];

        if($stock == 0){
          continue;
        }elseif($stock < $count){
          $count = $stock;
        }else if($count == 0){
          $count = 1;
        }

        $deduct = "UPDATE product_table SET stock= stock- $count WHERE id='$product_id' AND stock > 0";
        $deduct = $conn->query($deduct);

        if($deduct){
          $total += $prodet['price'] * $count;

          $query = "INSERT INTO orders(orderuid, userid, product_id, quantity) VALUES('$uniqid', '$userid', '$product_id', '$count')";
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
      if($total > 0){
        $paymentquery = "INSERT INTO payments(order_uid, userid, total) VALUES('$uniqid', '$userid', '$total')";
        $payment = $conn->query($paymentquery);
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
