<?php
  session_start();
  function validate() {

    $email = $_POST['email'];
    $decrypt =  $_POST['password'];

    include "../../con.php";


    $query = "SELECT * FROM user_table WHERE  email = '$email'";
    $result = $conn->query($query);

    $pass = "";
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $pass = $row["password"];
      $email = $row["email"];
      $userid = $row["user_uuid"];
      $name = $row["name"];

  } else {
    echo 204;
    return 0;

  }

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

  $crypt_pass = openssl_encrypt($decrypt, $ciphering ,  $encryption_iv, $options, $newkey);

  if($pass == $crypt_pass){
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
