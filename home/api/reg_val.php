<?php
session_start();
$_SESSION['uname'] = $_POST['uname'];
$_SESSION['login'] = true;
$_SESSION['email'] = $_POST['email'];

$name = $_POST['uname'];
$email = $_POST['email'];
$decrypt = $_POST['pword'];

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
    $newencrypt = openssl_encrypt($decrypt, $ciphering ,  $encryption_iv, $options, $newkey);



include "../con.php";

$stmt = $conn->prepare("INSERT INTO registeration(name, email, password) VALUES( ?, ?, ?)");
$stmt->bind_param('sss', $name, $email, $newencrypt );
$stmt->execute();
echo "<h1> registeration successful </h1>";
// mail($email,"Register","your Register to megatron using your email");
$stmt->close;


include "record.php";
  record($name,$email, $newencrypt,"REGISTER");


header('Location:'.$_REQUEST['page']);






 ?>
