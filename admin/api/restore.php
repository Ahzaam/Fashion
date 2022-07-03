<?php
session_start();
include '../../con.php';

if(isset($_REQUEST['productid']) && isset($_SESSION['dbpasscode']) && $_SESSION['dbpasscode'] == 'secure'){

  $postid = $_REQUEST["productid"] ;


  $restore = "INSERT INTO product_table SELECT * FROM deleted_product_table WHERE id='". $postid. "'";
  $restore = $result = $conn->query($restore);



  $query = "DELETE FROM deleted_product_table WHERE id='". $postid. "'";
  $result = $conn->query($query);
if ($result){
  header('Location:../deleted.php');
}else{
  echo "Error" . $result;
}

}else

 ?>
