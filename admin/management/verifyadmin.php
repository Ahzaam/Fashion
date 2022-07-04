<?php

session_start();
if(isset($_POST) && $_SESSION['ID']){

  include '../../con.php';
  $password = $_POST['password'];
  $postemail = $_POST['email'];

  $query = "SELECT * FROM admin_table WHERE email='".$postemail."'";
  $result = $conn->query($query);

  $stmt = $conn->prepare("SELECT * FROM admin_table WHERE email = ? ");
  $stmt->bind_param('s', $postemail);
  $stmt->execute();

  $result = $stmt->get_result();



  if ($result->num_rows >0){
    $row = $result->fetch_assoc();

    if ($row['password'] == 'notset'){

      $email = $row['email'];
      $hashed = password_hash($password, PASSWORD_DEFAULT);


      $update = $conn->prepare("UPDATE admin_table SET password= ? WHERE email= ? ");
      $update->bind_param('ss', $hashed, $email);
      $update->execute();

      if($update){
        echo "Verification Success now you can go to admin page with your Credentials";
      }else{
        echo "Verification Fail Try again";

      }

    }else{
      echo "You Alredy have a acoount";

    }

  }else{
    echo "Enter the email that you shared with your admin";

  }

}else{
  echo "Session Expired";

}
?>
