<?php

include '../../con.php';

if(isset($_POST)){

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
