<?php

include '../../con.php';

if(isset($_POST)){

  $backup = "INSERT INTO deleted_product_table SELECT * FROM product_table WHERE id='". $_POST["id"] . "'";
  $backup = $result = $conn->query($backup);


  $query = "DELETE FROM product_table WHERE id='". $_POST["id"] . "'";
  $result = $conn->query($query);
if ($result){
  echo "Product Deleted successfully";
}else{
  echo "Error" . $result;
}

}

 ?>
