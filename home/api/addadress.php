<?php
session_start();
if (isset($_POST) && isset($_SESSION['login']) && $_SESSION['login']){
  $userid = $_SESSION['userid'];
  echo '<pre>';
  print_r($_POST);


  include "../../con.php";

  $stmt = $conn->prepare("INSERT INTO address(userid, address_line1, address_line2, postalcode, state, phone) VALUES( ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param('ssssss', $userid, $_POST['address-line-1'],  $_POST['address-line-2'], $_POST['postalcode'],  $_POST['state'], $_POST['phone'] );
  $stmt->execute();
  echo "<h1> registeration successful </h1>";
  // mail($email,"Register","your Register to megatron using your email");
  $stmt->close;
  header("Location:../useracc.php");
}



 ?>
