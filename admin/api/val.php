<?php
session_start();

$name = $_POST['uname'];
$decrypt = $_POST['pword'];
$password = $_POST['pword'];
include "../../con.php";

$query = "SELECT password, admin_type, admin_id FROM admin_table WHERE email ='$name'";

$result = $conn->query($query);

$pass = "";
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  include "crypt.php";
  $adminid = $row['admin_id'];
  $pass = $row["password"];
  $type = $row["admin_type"];
  if($pass == "notset") {

    header("Location:../index.php?request=you are not verified yet pls come with the url that admin shared");
  }else{
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



// $email = $row["email"];
$conn->close();
if($pass == $newencrypt ){
  $_SESSION['dbpassalloc'] =$pass;
  $_SESSION['dbpasscode'] = 'secure';
  $_SESSION['admintype'] = $type;
  $_SESSION['adminid'] = $adminid;


echo "pass";

header("Location: ../admin.php?pass=$pass?hghgjyg");

}else{
  echo 'false';
  header("Location:../index.php?pass=$password");
}
  }
  echo $pass;


} else {
 header("Location:../index.php?pass=$password");
//
}

 ?>
