<?php
session_start();

if(  $_SESSION['dbpasscode'] == 'unsecure'){
  header('Location:../index.php?i=khfuewhfheawfbgyu');
}
// Ahzam is a good boy
function check(){

  if(isset($_POST['submit'])){
    $data =  $_POST['my_image'];
    $image_array_1 = explode(";", $data);

    $image_array_2 = explode(",", $image_array_1[1]);

    $data = base64_decode($image_array_2[1]);

    $image_name = 'media/' . uniqid() . '-' . date("Y-m-d") . '.png';

    file_put_contents('../'.$image_name, $data);

    savedata($image_name);

}







  //   echo "hello ";
  //   echo "<pre>";
  //   print_r($_FILES['my_image']);
  //   echo "</pre>";
  //   $img_name = $_FILES['my_image']['name'];
  //   $img_size = $_FILES['my_image']['size'];
  //   $tmp_name = $_FILES['my_image']['tmp_name'];
  //   $error = $_FILES['my_image']['error'];
  //
  //   if($error === 0){
  //
  //       $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
  //       $img_ex_lc = strtolower($img_ex);
  //       $allowed_exs = array("jpg", "jpeg", "png");
  //
  //
  //       if(in_array($img_ex_lc, $allowed_exs)){ //
  //         $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
  //         $from_folder = 'media/' . $new_img_name;
  //         $img_upload_path = '../media/' . $new_img_name;
  //         move_uploaded_file($tmp_name ,$img_upload_path);
  //         echo $tmp_name ." file moved to " . $img_upload_path;
  //         savedata($from_folder);
  //
  //
  //       }else{
  //         $em = "Unsupported Image Format";
  //         echo "Unsupported image format";
  //         header("Location:admin.php?error=$em&suc=0");
  //       }
  //
  //   }else{
  //     $em = " Unknown Error Occurred!";
  //     echo "unknown error occurred!";
  //     header("Location:admin.php?error=$em&suc=0");
  //   }
  // }else{
  //   echo "Unknown Error Occurred task failed Successfully";
  //   header("Location:admin.php");
  // }

}

function savedata($img_path){
    include "../con.php";
    $query = "INSERT INTO `product_table`(`id`, `name`, `description`, `price`, `size`, `colors`, `image`, `stock`, `status`, `display`,  `category`)
        VALUES ('". uniqid() . "','"  . $_POST['name'] . "','" . $_POST['description']. "','" . $_POST['price'] ."','". $_POST['size'] ."','".$_POST['color']."','".$img_path."','".$_POST['stock']. "','".$_POST['status']."','".$_POST['display']."','".$_POST['category']."')";//
    $result = $conn->query($query);
    header("Location:adminadd.php?suc=1");
}
//

check();

 ?>
