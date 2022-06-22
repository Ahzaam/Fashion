<?php
include '../con.php';
  if(isset($_POST)){
    $id = $_POST['id'];
    $reply = $_POST['reply'];
      $query = "UPDATE comments_feedback SET `status`='read', reply='$reply' WHERE `id`= $id";
      $result = $conn->query($query);
      echo "{'status' : 'success', 'status_code' : 200 }";
  }


 ?>
