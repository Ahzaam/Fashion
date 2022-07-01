<?php
session_start();

if(isset($_SESSION['login']) && isset($_POST) && $_SESSION['login']){

  $userid = $_SESSION['userid'];

  include "../../con.php";

  $stmt = $conn->query("SELECT name, email  FROM user_table WHERE  user_uuid = '$userid'");


  if ($stmt->num_rows > 0) {
    $row = $stmt->fetch_assoc();
    echo json_encode($row);
  }else{
    echo 404;
  }


}else{
  echo 404;
}
?>
