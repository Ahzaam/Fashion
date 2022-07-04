<?php
session_start();

$email = $_POST['uname'];
$password = $_POST['pword'];
include "../../con.php";

$stmt = $conn->prepare("SELECT password, admin_type, admin_id FROM admin_table WHERE email = ?");
$stmt->bind_param('s', $email);
$stmt->execute();

$result = $stmt->get_result();


if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $adminid = $row['admin_id'];
  $hashed = $row["password"];
  $type = $row["admin_type"];

  if($pass == "notset") {
    header("Location:../index.php?request=you are not verified yet pls come with the url that admin shared");
  }else{


    $conn->close();
    if(password_verify($password, $hashed) ){

      $_SESSION['dbpasscode'] = 'secure';
      $_SESSION['admintype'] = $type;
      $_SESSION['adminid'] = $adminid;



      header("Location: ../admin.php");

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
