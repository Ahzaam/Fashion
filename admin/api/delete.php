<?php
session_start();
include '../../con.php';

if(isset($_POST) && isset($_SESSION['dbpasscode']) && $_SESSION['dbpasscode'] == 'secure'){

  $backup = "INSERT INTO deleted_product_table SELECT * FROM product_table WHERE id='". $_POST["id"] . "'";
  $backup = $result = $conn->query($backup);

  $postid = $_POST["id"] ;

  $wishdel = "DELETE FROM wish_list WHERE product_id='".   $postid . "'";
  $wishdel = $conn->query($wishdel);

  $cartdel = "DELETE FROM cart WHERE product_id='". $postid . "'";
  $cartdel = $conn->query($cartdel);


  $query = "DELETE FROM product_table WHERE id='".   $postid . "'";
  $result = $conn->query($query);



  $query = "DELETE FROM product_table WHERE id='". $_POST["id"] . "'";
  $result = $conn->query($query);
if ($result){
  echo "Product Deleted successfully";
}else{
  echo "Error" . $result;
}

}

 ?>
