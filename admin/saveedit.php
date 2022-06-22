<?php

$dbhost = 'localhost';
$dbusername = 'root';
$dbpword = '';
$dbdatabase = 'db_ad';

 $conn = new mysqli($dbhost, $dbusername, $dbpword, $dbdatabase);

  if($conn -> connect_error){
       echo "<pre>";
       echo $mysqli -> connect_error;
       echo "Conncetion Failed";
       echo "<pre/>";
       header("Location: additem.php?status=fail");
     }else{

       $id = $_REQUEST['id'];
       $name = $_REQUEST['name'];
       $price = $_REQUEST['price'];
       $description = $_REQUEST['description'];
       $stock = $_REQUEST['stock'];

       $stmt = $conn->prepare("UPDATE products SET name ='$name', price ='$price', description='$description', stock='$stock' WHERE `pro-id` = '$id'");
       $stmt->execute();

       header("Location: additem.php?status=pass");

     }


 ?>
