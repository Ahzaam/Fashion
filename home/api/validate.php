<?php
  session_start();
  function validate() {

    $name = $_POST['uname'];
    $decrypt =  $_POST['pword'];

    include "../con.php";


    $query = "SELECT * FROM registeration WHERE name = '$name' OR email = '$name'";
    $result = $conn->query($query);

    $pass = "";
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $pass = $row["password"];
      $email = $row["email"];


  } else {
    echo "0 results";

  }

  include "../admin/crypt.php";

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
    $_SESSION['uname'] = $row["name"];
    $_SESSION['login'] =true;
    $_SESSION['email'] = $email;
    $_SESSION['profile'] = NULL;

    include "record.php";
      record($name,$email, $crypt_pass,"TRUE");
      mail($email,"Login","your login to megatron using your emai");
      header("Location:".$_REQUEST["page"]);


    }else{
      include "record.php";
      record($name,$email, $crypt_pass,"FALSE");
      header("Location:login.php?page=" . $_REQUEST["page"] . "&pas=0");
    }
  }

  validate();
 ?>
