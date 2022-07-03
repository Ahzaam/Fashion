<?php
session_start();
if(isset($_SESSION['dbpasscode']) && $_SESSION['dbpasscode'] == 'secure'){
  if(isset($_POST)){

    include '../../con.php';



    $cusdetails = "SELECT address_line1, address_line2, postalcode, state, phone FROM address WHERE userid in (SELECT userid FROM orders WHERE orderid = " . $_POST['orderid'] . ")";
    $address = $conn->query($cusdetails);

    $product = "SELECT image, name, price, stock FROM product_table WHERE id in (SELECT product_id FROM orders WHERE orderid = " . $_POST['orderid'] . ")";
    $details = $conn->query($product);

    $customer = "SELECT name FROM user_table WHERE user_uuid in (SELECT userid FROM orders WHERE orderid = " . $_POST['orderid'] . ")";
    $name = $conn->query($customer);

    $address = $address->fetch_assoc();
    $details = $details->fetch_assoc();
    $name = $name->fetch_assoc();

    echo '{ "product": ' . json_encode($details) . ', "address": ' . json_encode($address) . ', "name": ' . json_encode($name) . ' }';



  }
}


 ?>
