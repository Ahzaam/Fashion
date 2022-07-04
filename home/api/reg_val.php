<?php
session_start();

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['regpassword'];


include "../../con.php";
$query = "SELECT email FROM user_table WHERE email = '$email'";
$result = $conn->query($query);

if($result->num_rows == 0){

  $userid = uniqid();
  $hashed = password_hash($password, PASSWORD_DEFAULT);


  $stmt = $conn->prepare("INSERT INTO user_table(user_uuid, name, email, password) VALUES(?, ?, ?, ?)");
  $stmt->bind_param('ssss', $userid , $name, $email, $hashed );
  $stmt->execute();


  echo 200;

}else{
  echo 226;
}






 ?>
