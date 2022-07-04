<?php
session_start();

$name = 'AHzam';
$email = 'fake@example.com';
$password = 'ahzaam1233s';




  $userid = uniqid();
  $hashed = password_hash($password, PASSWORD_DEFAULT);


  echo $hashed;








 ?>
