# Fashions
 Ecommerce dress website


For Insatallation:

1.Download the zip file to server folder in my case XAMPP htdocs folder
2.Go to your SQL admin panel and import DB file (nzfashion.sql (in same directory ) )
3.create a con.php file in project directory
4.COPY AND PASTE THE FOLLOWING 

********/ \**********
<?php

$dbhost = 'YOUR_DB_HOST';// Ex: localhost
$dbusername = 'YOUR_DB_USERNAME';//Default: root
$dbpword = 'YOUR_DB_PASSWORD';//Default: ''
$dbdatabase = 'nzfashion';// import DB to your libary using nzfasion.sql (uploaded in this directory)

  $conn = new mysqli($dbhost, $dbusername, $dbpword, $dbdatabase);
  if($conn->connect_error){
    die(mysqli_error($conn));
    header('Location: home.php');
  }else{
    // echo "Database Connected <br/>";
  }

 ?>
********/ \**********





4.replace con.php file with you details
5.open the file from localhost

****DEFAULT ADMIN PANEL  CREDENTIALS ***

USERNAME = admin@gmail.com
PASSWORD = rootadmin

*****************
