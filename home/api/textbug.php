<?php
include '../../con.php';
$stock = $conn->query("SELECT stock FROM product_table WHERE  id='62b37513e123a'")->fetch_assoc()['stock'];
  echo $stock;

 ?>
