<?php
session_start();

if(  $_SESSION['dbpasscode'] == 'unsecure'){
  header('Location:../home.php');
}

function check(){
  echo "Checking";
  echo "<pre>";
  echo print_r($_POST);
  echo $_POST['submit'] . "/ mada fuckers " . $_FILES['my_image'];
  if(isset($_POST['submit']) && isset($_FILES['my_image'])){

    echo "hello ";
    echo "<pre>";
    print_r($_FILES['my_image']);
    echo "</pre>";
    $img_name = $_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $error = $_FILES['my_image']['error'];

    if($error === 0){
    
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);
        $allowed_exs = array("jpg", "jpeg", "png");


        if(in_array($img_ex_lc, $allowed_exs)){ //
          $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
          $from_folder = 'Home/items/' . $new_img_name;
          $img_upload_path = '../Home/items/' . $new_img_name;
          move_uploaded_file($tmp_name ,$img_upload_path);
          echo $tmp_name ." file moved to " . $img_upload_path;
          savedata($from_folder);


        }else{
          $em = "Unsupported Image Format";
          echo "Unsupported image format";
          header("Location:admin.php?error=$em&suc=0");
        }

    }else{
      $em = " Unknown Error Occurred!";
      echo "unknown error occurred!";
      header("Location:admin.php?error=$em&suc=0");
    }
  }else{
    echo "Unknown Error Occurred task failed Successfully";
    header("Location:admin.php");
  }

}

function savedata($img_path){
    include "../con.php";

    $stmt = $conn->prepare("INSERT INTO home(name, type, price, discount, description, model,stock, image) VALUES( ?, ?, ?, ?, ?, ?, ?, ?)");
    echo "INSERT INTO home(name, type, price, discount, description, model,stock, image) VALUES( ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt->bind_param('ssiissis', $_POST['name'], $_POST['type'], $_POST['price'], $_POST['discount'], $_POST['description'], $_POST['model'] ,$_POST['stock'], $img_path);
    $stmt->execute();
    $em = "Upload Successful";
    echo "<h1> $em </h1>";
    $stmt->close();
    $conn->close();
    header("Location:admin.php?error=$em&suc=1");
}
//
//
  include "crypt.php";
    $decrypt = 'mega123';
    if(strlen($decrypt) < 16){
      $cou = floor(16 / strlen($decrypt));
      $remain = 16 - ($cou * strlen($decrypt));
      $i = 0;
      $remainstr = substr($remstr,0, $remain);
      $newkey = "";

      while($i < $cou){
        $newkey = $newkey . $decrypt;
        $i++;
      }

      $newkey = $newkey . $remainstr;

    }else{
      $newkey = substr($decrypt,0, 15);
    }
    $newencrypt = openssl_encrypt($decrypt, $ciphering ,  $encryption_iv, $options, $newkey);

if($_SESSION['dbpassalloc'] == $newencrypt){
check();
}else{
  header("Location:../home.php");
}
 ?>
