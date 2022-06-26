<?php
session_start();

if(  $_SESSION['dbpasscode'] == 'unsecure'){
  header('Location:../index.php?i=khfuewhfheawfbgyu');
}

// Ahzam is a good boy
function check(){
  $uniqid = uniqid();
  if(isset($_POST['submit'])){
      $uniqid = uniqid();
    $data =  $_POST['my_image'];
    $image_array_1 = explode(";", $data);

    $image_array_2 = explode(",", $image_array_1[1]);

    $data = base64_decode($image_array_2[1]);

    $image_name = 'media/' . $uniqid . '-' . date("Y-m-d") . '.png';

    file_put_contents('../../'.$image_name, $data);

    savedata($image_name, $uniqid);

  }


}

function savedata($img_path, $uniqid){
  $adminid = $_SESSION['adminid'];

  include "../../con.php";
  $query = "INSERT INTO `product_table`(`id`, `name`, `description`, `price`, `size`, `colors`, `image`, `stock`, `status`, `display`,  `category`, `addedby`)
  VALUES ('". $uniqid . "','"  . $_POST['name'] . "','" . $_POST['description']. "','" . $_POST['price'] ."','". $_POST['size'] ."','".$_POST['color']."','".$img_path."','".$_POST['stock']. "','".$_POST['status']."','".$_POST['display']."','".$_POST['category']."', '". $adminid ." ')";//
  echo $query;
  $result = $conn->query($query);
  header("Location:../adminadd.php?suc=1");
}
//

check();

?>
