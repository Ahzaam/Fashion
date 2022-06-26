<?php

session_start();
if(isset($_POST) && $_SESSION['ID']){

  $postemail = $_POST['email'];
  $query = "SELECT * FROM admin_table WHERE email='".$postemail."'";
  include '../../con.php';
  $decrypt = $_POST['password'];
  $result = $conn->query($query);
  // echo $result;
  if ($result->num_rows >0){
    $row = $result->fetch_assoc();
    if ($row['password'] == 'notset'){

      $email = $row['email'];


      include '../api/crypt.php';
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


      $update = "UPDATE admin_table SET password='$newencrypt' WHERE email='$email'";
      $result = $conn->query($update);

      if($result){
        echo "Verification Success now you can go to admin page with your Credentials";
      }else{
        echo "Verification Fail Try again";
      }



    }else{
      echo "You Alredy created a acoount";
    }

  }else{
    echo "Enter the email that you shared with your admin";
  }

}else{
  echo "Session Expired";
}
?>
