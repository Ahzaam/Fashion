<?php
session_start();

$name = $_POST['name'];
$email = $_POST['email'];
$decrypt = $_POST['regpassword'];


include "../../con.php";
$query = "SELECT email FROM user_table WHERE email = '$email'";
$result = $conn->query($query);

if($result->num_rows == 0){
  include "../../admin/api/crypt.php";

      if(strlen($decrypt) < 16){
        $cou = floor(16 / strlen($decrypt));
        $remain = 16 - ($cou * strlen($decrypt));
        $i = 0;
        $remainstr = substr($remstr,0, $remain);
        $newkey = "";

        while($i < $cou){
          $newkey = $newkey . $decrypt;
          $i++;
        }

        $newkey = $newkey . $remainstr;

      }else{
        $newkey = substr($decrypt,0, 15);
      }
      $newencrypt = openssl_encrypt($decrypt, $ciphering ,  $encryption_iv, $options, $newkey);



      $userid = uniqid();

  $stmt = $conn->prepare("INSERT INTO user_table(user_uuid, name, email, password) VALUES(?, ?, ?, ?)");
  $stmt->bind_param('ssss', $userid , $name, $email, $newencrypt );
  $stmt->execute();


  echo 200;

}else{
  echo 226;
}






 ?>
