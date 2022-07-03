<?php
session_start();
if (isset($_POST) && isset($_SESSION['login']) && $_SESSION['login']){

  $userid = $_SESSION['userid'];

  include "../../con.php";

  $stmt = $conn->prepare("INSERT INTO address(userid, address_line1, address_line2, postalcode, state, phone) VALUES( ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param('ssssss', $userid, $_POST['address-line-1'],  $_POST['address-line-2'], $_POST['postalcode'],  $_POST['state'], $_POST['phone'] );
  $stmt->execute();

  $stmt->close;
  echo "success";
  header("Location:../useracc.php");
}



 ?>
