<?php
session_start();
if(isset($_POST['feedback']) && isset($_SESSION['login']) && $_SESSION['login']){
  $userid = $_SESSION['userid'];
  $feedback = $_POST['feedback'];
    include '../../con.php';

    $query = "SELECT name FROM user_table WHERE user_uuid = '".$userid."'";
    $result = $conn->query($query);

    if($result->num_rows > 0){
      $name = $result->fetch_assoc()['name'];
    
    }else{
      echo 500;
    }

    //
    $stmt = $conn->prepare("INSERT INTO comments_feedback (user_id, name, comment) VALUES(?, ?, ?)");
    $stmt->bind_param('sss', $userid , $name, $feedback);
    $stmt->execute();

    echo 200;


}else{
  echo 401;
}


 ?>
