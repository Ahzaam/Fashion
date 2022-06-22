<?php
  $host = 'localhost';
  $username = 'root';
  $password = '';
  $database = 'megatron';


  $conn = new mysqli('localhost', 'root', '', 'megatron');
  if($conn->connect_error){
    die(mysqli_error($conn));
    header('Location: ../admin.php?error=database error');
  }else{
    echo "Database not connected";
  }
 ?>
