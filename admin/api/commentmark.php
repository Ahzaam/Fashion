<?php
session_start();
include '../../con.php';
  if(isset($_POST) && isset($_SESSION['dbpasscode']) && $_SESSION['dbpasscode'] == 'secure'){
    $id = $_POST['id'];
    $reply = $_POST['reply'];
      $query = "UPDATE comments_feedback SET `status`='read', reply='$reply', viewreply='unread' WHERE `id`= $id";
      $result = $conn->query($query);
      echo "{'status' : 'success', 'status_code' : 200 }";
  }


 ?>
