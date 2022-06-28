<?php
session_start();

if(  $_SESSION['dbpasscode'] == 'unsecure'){
  header('Location:../index.php?i=khfuewhfheawfbgyu');
}

// Ahzam is a good boy
function check($uniqid, $multiimagenames){

  if(isset($_POST['submit'])){

    $data =  $_POST['my_image'];
    $image_array_1 = explode(";", $data);

    $image_array_2 = explode(",", $image_array_1[1]);

    $data = base64_decode($image_array_2[1]);

    $image_name = 'media/' . date("Y-m-d") . '-' .  $uniqid. '.png';

    file_put_contents('../../'.$image_name, $data);

    savedata($image_name, $uniqid, $multiimagenames);

  }


}

function savedata($img_path, $uniqid, $multiimagenames){
  $adminid = $_SESSION['adminid'];

  include "../../con.php";
  $query = "INSERT INTO `product_table`(`id`, `name`, `description`, `price`, `size`, `colors`, `image`, `stock`, `status`, `display`,  `category`, `addedby`, `moreimg`)
  VALUES ('". $uniqid . "','"  . $_POST['name'] . "','" . $_POST['description']. "','" . $_POST['price'] ."','". $_POST['size'] ."','".$_POST['color']."','".$img_path."','".$_POST['stock']. "','".$_POST['status']."','".$_POST['display']."','".$_POST['category']."', '". $adminid ." ', '". $multiimagenames ." ')";//
  echo $query;
  $result = $conn->query($query);
  $em = "Item Upload Successfull";
  header("Location:../adminadd.php?error=$em&suc=1");
}
//



if(isset($_POST) &&  $_SESSION['dbpasscode'] == 'secure'){

  $multiimagenames = [];




  // Check if image file is a actual image or fake image
  $count = count($_FILES["my_images"]['tmp_name']);
  $uniqeid = uniqid();
  for ($i = 0; $i < $count; $i++) {
    $img_name = $_FILES['my_images']['name'][$i];
    $img_size = $_FILES['my_images']['size'][$i];
    $tmp_name = $_FILES['my_images']['tmp_name'][$i];
    $error = $_FILES['my_images']['error'][$i];

    if($error === 0){

        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);
        $allowed_exs = array("jpg", "jpeg", "png");


        if(in_array($img_ex_lc, $allowed_exs)){ //
          $new_img_name = date("Y-m-d") .'-'. $uniqeid  .'-('.$i.')'. '.' . $img_ex_lc;

          $img_upload_path = '../../media/' . $new_img_name;
          move_uploaded_file($tmp_name ,$img_upload_path);
          echo $tmp_name ." file moved to " . $img_upload_path;

          $multiimagenames[] = 'media/'. $new_img_name;


        }else{
          $em = "Unsupported Image Format";
          echo "Unsupported image format";
          header("Location:../adminadd.php?error=$em&suc=0");
        }

    }else{
      $em = " Unknown Error Occurred!";
      echo "unknown error occurred!";
      header("Location:../adminadd.php?error=$em&suc=0");
    }
  }
  $multiimagenames = implode("##", $multiimagenames);
  check($uniqeid, $multiimagenames);
  }else{
    $em =  "Unknown Error Occurred task failed Successfully";
    header("Location:admin.php?error=$em&suc=0");
  }




?>
