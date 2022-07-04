<?php
  session_start();
  function validate() {

    $email = $_POST['email'];
    $password =  $_POST['password'];

    include "../../con.php";

    $stmt  = $conn->prepare("SELECT * FROM user_table WHERE  email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $hashed = $row["password"];
      $email = $row["email"];
      $userid = $row["user_uuid"];
      $name = $row["name"];

  } else {
    echo 204;
    return 0;

  }


  if(password_verify($password, $hashed)){
    $_SESSION['userid'] = $userid;
    $_SESSION['login'] = True;

    echo 200;

    }else{
      echo 401;
    }
  }

if(isset($_POST)){
    validate();
}

 ?>
