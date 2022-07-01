<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Font Awesome -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
  integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />


  <!-- Bootstrap --><!-- CSS only -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <style media="screen">
    .nav{
      cursor: pointer;
    }
  </style>



</head>
<body>
  <!-- <link rel="stylesheet" href="{% static 'service/css/style.css' %}"> -->
  <div class="container px-lg-5 text-center my-5" id='form-container'>
    <div id="formContentsignin" class='formContent col-lg-5 offset-lg-3 text-start'>
      <!-- Tabs Titles -->
      <div class="row">
        <div class="offset-2 nav col-3" onclick="window.location='index.php'" style="cursor:pointer;">
          <h2 class="lead"> Home </h2>
        </div>
        <div class=" col-3">
          <h2 class="active nav lead text-primary"> Sign In </h2>
        </div>
        <div class="col-3">
          <h2 class="inactive nav underlineHover lead" id='change1'>Register </h2>
        </div>
      </div>

      <!-- Icon -->
      <div class="fadeIn first text-center my-5 rounded-circle">
        <i class="fas fa-user fa-3x"></i>

      </div>

      <!-- Login Form -->
      <form class="form-control" id='logform'>

        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Email address</label>
          <input type="email" class="form-control" name='email' id='logemail' autocomplete placeholder="Email">
          <div id='logemailerror'  class="invalid-feedback">

          </div>
        </div>

        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Password</label>
          <input type="password" class="form-control" id='logpassword' autocomplete name='password' placeholder="Password">
          <div class="form-check my-3">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Show Password
            </label>
          </div>
        </div>


        <div class="text-center">
          <input class="btn btn-primary my-5" type="submit" id='loginbtn' value="Login">
        </div>
      </form>

    </div>



    <!-- Sign UP -->

    <div id="formContentregister" class='formContent col-lg-5 offset-lg-3 text-start' style='display: none;'>

      <div class="row ">
        <div class="offset-2  col-3" onclick="window.location='/'" style="cursor:pointer;">
          <h2 class="lead"> Home </h2>
        </div>
        <div class="col-3">
          <h2 class="active lead" id='change2'> Sign In </h2>
        </div>
        <div class="col-3">
          <h2 class="inactive underlineHover lead text-primary" >Register </h2>
        </div>
      </div>


      <!-- Icon -->
      <div class="fadeIn first text-center my-5 rounded-circle">
        <i class="fas fa-user fa-3x"></i>

      </div>

      <div class=" form-control ">
        <form class="" id='regform' novalidate>

          <div class="row">
            <div class="my-3 col-md-5">
              <label for="validationTooltip04" name='firstname' class="form-label">Name</label>
              <input type="text" class="form-control" placeholder="Ahzam" name='name' id='nameper' aria-label="name">
            </div>
            <div class="my-3 col-md-7">
              <label for="inputEmail4" class="form-label">Email</label>
              <input type="email" class="form-control" name='email' id="email" placeholder="example@example.com">
              <div id='emailerror'  class="invalid-feedback">

              </div>
            </div>

            <div class="my-3 col-md-6">
              <label for="inputPassword4" class="form-label">Password</label>
              <input type="password" class="form-control" name='regpassword' id="regpassword">
              <div id="passworderror" class="invalid-feedback">

              </div>
            </div>
            <div class="my-3 col-md-6">
              <label for="inputPassword4" class="form-label">Retype Password</label>
              <input type="password" class="form-control" id="checkpassword">
            </div>



          </div>




          <div class="col-12">
            <button class="btn btn-primary my-5" type="submit" id='registerbtn'>Register</button>
          </div>


        </form>

      </div>
    </div>
    <div class="row text-end w-100">
      <div class="col-lg-12 col-md-12 text-end text-dark">
        <p  >All Rights Reserved &reg; Copyright GLiDE.Ceylon.launchs Ahzam  &copy; <span id='date' ></span> - <span  id='datefu'> </span </p>
      </div>
      <script type="text/javascript">
        let date = document.getElementById('date'); //
        let datefu = document.getElementById('datefu');
        const d = new Date();
        let year = d.getFullYear();
        date.innerHTML = year;
        datefu.innerHTML = year + 5;
        
      </script>
    </div>
  </div>


  <div class="container d-none" id='regredirect'>
    <div class=" col-lg-8">
      <h1 class='display-3'>Hi <span id='sucname'></span>!, Account Created <span class='text-success'>Succesfully</span> </h1>
      <h1 class='display-5'>You can Sign in now as <span class='text-muted' id='sucemail'> </span></h1>
      <a href="login.php" class="btn btn-primary my-5">Login Now</a>
    </div>
  </div>



  <!-- Link Javascript Script Files--><!-- Link Javascript Script Files-->


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>

    // Show password
    $('#flexCheckDefault').click(function() {
      $(this).is(':checked') ? $('#logpassword').attr('type', 'text') : $('#logpassword').attr('type', 'password');
    })
    </script>
  <!-- Login Script Files-->
  <script src="js/login.js"></script>




  <!-- Bootstrap -->

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


  <!-- Font Awesome -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
  integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
</html>
