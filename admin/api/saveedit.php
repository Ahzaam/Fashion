<?php
include '../../con.php';
session_start();
if(isset($_POST) && isset($_SESSION['dbpasscode']) && $_SESSION['dbpasscode'] == 'secure'){

$id           = $_POST['id'];
$size         = $_POST["size"];
$name         = $_POST["name"];
$color        = $_POST["color"];
$stock        = $_POST["stock"];
$price        = $_POST["price"];
$status       = $_POST["status"];
$display      = $_POST["display"];
$category     = $_POST["category"];
$description  = $_POST["description"];



  if($_POST['my_image'] == ''){

    $query = "UPDATE product_table SET name ='$name', price ='$price', description='$description',
    size ='$size', colors='$color', stock='$stock',status ='$status', display='$display', category ='$category' WHERE `id` = '$id'";

  }else{

    $data =  $_POST['my_image'];

    $image_array_1 = explode(";", $data);
    $image_array_2 = explode(",", $image_array_1[1]);
    $data = base64_decode($image_array_2[1]);

    $image_name = 'media/' . uniqid() . '-' . date("Y-m-d") . '.png';
    file_put_contents('../../'.$image_name, $data);

    $query = "UPDATE product_table SET name ='$name', price ='$price', description='$description',  size ='$size', colors='$color', image ='$image_name', stock='$stock',status ='$status', display='$display', category ='$category' WHERE `id` = '$id'";

  }

  $result = $conn->query($query);

  if ($result){

    echo "Product update successful";

  }else{

    echo "Error" . $result;

  }

}

?>
