
<?php
session_start();
if(isset($_SESSION['dbpasscode'])){
  if(  $_SESSION['dbpasscode'] != 'unsecure'){
    header('Location:admin.php');
}else{
  echo "";
}
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../files/css/bootstrap.css">
    <link rel="stylesheet" href="baby-corner/body.css">
    <link rel="stylesheet" href="style.css"> <!--load all styles -->
    <script type="text/javascript" src="../files/js/bootstrap.bundle.js">
    </script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../files/icon_css/all.css">
    <script defer src="../files/icon_js/all.js"></script>

    <script defer src="validation.js"></script>
    <style media="screen">
    body{
      background-color: rgba(193, 193, 193, 0.67);
    }
    background-image{
      min-width: 200px;
      max-width: 450px;
    }
    div.in{
      padding: 100px 0 100px 0;
      text-align: center;
      margin: auto;
      background-color: rgba(0, 0, 0, 1);
      height:auto;
      min-height:700px;
      width: auto;
      max-width: 460px;
      border-radius: 5px;
      border-style: dashed;
      border-color: #fff500;
      /* border: 1px solid grey; */
      /* box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      box-shadow: 3px 3px px silver; */
    }

    .in:hover{
      border-style:solid;
      transition: 0.5s;
      border-color: #00d9ff;
      /* border-color: #fff500; */

    }
    h1{
      font-family:monospace;
      font-size: 40px;
      font-weight: bold;
      color: #ffffff;
      text-align: center;

    }

    .login_form{
      padding: 0 20px 20px 20px;
      margin: 0px;
      overflow-x: auto;

    }

    label{
      color: #ffffff;
      display:inline-block;
      height:40px;
      width:150px;
      text-align:left;
      padding-right:10px;
      /* font-family:monospace; */
      font-size:19px;
      /* color:#7140fc; */
    }

    input[type="text"],
    input[type="password"],
    input[type="email"]{
      padding-top: 10px;
      display: inline-block;
      /* border-radius: 3px; */
      border: none;
      outline: none;
      box-sizing: border-box;
      background-color: transparent;
      border-bottom:1px solid white;
      font-size: 18px;
      height: 30px;
      width: 260px;
      border:1px 1px ;
    }

    input[type="password"]{
      text-spacing:2;
    }

    .carousel-item .bannercen{
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }


    label[type="val"]{
      font-size: 10px;
      color: red;
      font-family: sans-serif;
      display: none;
    }
    .container{

      text-align:center;

    }


    .section-top{
      width: 100%;
      height: 100vh;
      overflow: hidden;
      position: relative;
      background-image: url('banner_01.jpg');
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      animation: change 20s infinite ease-in-out;
    }

    input[type='text']{
      color: white;
    }

    .in p{
      color: white;
    }
    .in{
      align-items: center;
    }

    .in{
      position:relative;
    }



    </style>
  </head>
  <body>
    <div class="section-top col-sm-12   col-bg-3" style="background-image: url('D/xampp/htdocs/websites/megatron/Login/banner_01.jpg');">
      <div class="in mt-lg-5">
        <form class="login_form" action="val.php"   method="post" name="form" id="form">
          <h1>LOGIN</h1>
          <br><br>

          <label for="uname" style="margin-right:105px;">Username</label><br>
          <input type="text" name="uname" id="uname" value=""
          class="from-control" required autofocus>

          <br />


          <label for="pword" style="margin-right:105px;">Password</label><br>
          <input type="password" name="pword" id="pword" class="text-white" value="" required ><br />
          <span><i class="fas fa-eye text-white" aria-hidden="true" id="eye"></i></span>
          <br>
          <br>


          <button type="submit" class="btn btn-primary" onclick="validate()"style="height: 40px; width:260px">Login</button>

        </form>

      </div>
    </div>
  </body>
</html>
