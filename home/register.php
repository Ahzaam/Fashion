<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../files/css/bootstrap.css">
    <!-- <link rel="stylesheet" href="baby-corner/body.css"> -->
    <link rel="stylesheet" href="style.css"> <!--load all styles -->
    <script type="text/javascript" src="../files/js/bootstrap.bundle.js">
    </script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../files/icon_css/all.css">
    <script defer src="../files/icon_js/all.js"></script>

    <script defer src="validation.js"></script>
    <style media="screen">
    .in{
      position:relative;
      padding-top:0;

    }

    </style>
  </head>
  <body>
    <div class="section-top col-sm-12   col-bg-3">
      <div class="in my-lg-5 py-lg-5" >
        <a href="<?php echo $_REQUEST['page'] ?>"><i style="  position: absolute; transform: translate(0, 0);top: 0;  left: 0; margin:10px;color:white; cursor:pointer;" type="arrow" class="fa fa-arrow-left"></i></a>
        <form class="login_form" action='reg_val.php?page=<?php echo $_REQUEST['page']; ?>' method='post'  name="form" >
          <h1>LOGIN</h1>
  <!-- action="../home/home.html" -->
          <br><br>
          <!-- <label for="">Name</label><br>
          <input type="text" name="name" id="name" value=""><br /><br> -->
          <label for="uname" style="margin-right:105px;">Name</label><br>
          <input type="text" name="uname" id="uname" value=""
          class="from-control" required autofocus>
          <br>
          <br>
          <label for="uname" style="margin-right:105px;">Email</label><br>
          <input type="email" name="email" id="email" value=""
          class="from-control" required >
          <div style="height:10px;">
            <label id="uname_error" type="val">Username or password Incorrect</label>
          </div>
          <br />

          <label for="pword" style="margin-right:105px;">Password</label><br>
          <input style="color:white;" type="password" name="pword" id="pword" value=""><br />
          <label  for="pword" id="pword_error" style="width:200px; margin-right:65px; font-size:12px; color:red;"></label>
          <script type="text/javascript">
            pword.addEventListener("keyup", () => {
              if(document.getElementById("pword").value.length < 8){
                document.getElementById("pword_error").innerHTML = "Password too short";
              }else{
                document.getElementById("pword_error").innerHTML = "";
                
              }

            });
          </script>
          <br>
          <br>


          <button type="submit" class="btn btn-primary" id='submit' onclick="validate()"style="height: 40px; width:260px;">Register</button>
          <img src="../bg-images/social.PNG" class="mt-5" alt="sdghwrsjsj">

        </form>
        <p  style='color:white;'>Already have a acount ? <a href="login.php?page=<?php echo $_REQUEST['page'];?>">Login</a></p>



      </div>
    </div>
  </body>
</html>
<!--

    <div class="container d-xl-flex justify-content-center mt-5" >
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner ">
          <div class="carousel-item active" style="text-align:center;">
            <img src="E:\BCAS\WDD\Wed site\Login\banner_01.jpg" type="sldimg" class="d-block w-auto"  alt="...">
            <div class="bannercen text-dark">
              <h1 class="display-4 fw-bold"> Enjoy daily deals</h1>
              wsvk ukuhvwoievh
            </div>
          </div>
        </div>
      </div>
    </div>


  <div class="container d-xl-flex justify-content-center mt-5" >
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner ">

        <div class="carousel-item active" style="text-align:center;">
          <img src="E:\BCAS\WDD\Wed site\Login\banner_01.jpg" type="sldimg" class="d-block w-auto"  alt="...">
          <div class="bannercen text-dark">
            <h1 class="display-4 fw-bold"> Enjoy daily deals</h1>
            wsvk ukuhvwoievh
          </div>
        </div>
      </div>
    </div>
  </div> -->
<!-- <img src="banner_1.jpg" type="sldimg" class="d-block w-auto"  alt="..."> -->

<!-- <div class="out" style="height:5px; background-color:#42f481;">
