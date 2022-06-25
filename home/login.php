<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="{% static 'service/css/login.css' %}">
  <!-- Font Awesome -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
  integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />


  <!-- Bootstrap --><!-- CSS only -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">




</head>
<body>
  <!-- <link rel="stylesheet" href="{% static 'service/css/style.css' %}"> -->
  <div class="container px-lg-5 text-center my-5" id='form-container'>
    <div id="formContentsignin" class='formContent col-lg-5 offset-lg-3 text-start'>
      <!-- Tabs Titles -->
      <div class="row">
        <div class="offset-2 col-3" onclick="window.location='/'" style="cursor:pointer;">
          <h2 class="lead"> Home </h2>
        </div>
        <div class=" col-3">
          <h2 class="active lead text-primary"> Sign In </h2>
        </div>
        <div class="col-3">
          <h2 class="inactive underlineHover lead" id='change1'>Register </h2>
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
          <input type="email" class="form-control" name='email' id='logemail' placeholder="Email">
          <div id='logemailerror'  class="invalid-feedback">

          </div>
        </div>

        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Password</label>
          <input type="password" class="form-control" id='logpassword' name='password' placeholder="Password">
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

            <div class="col-md-6">
              <label for="inputCity" class="form-label">City</label>
              <input type="text" class="form-control" name='city' id="inputcity">
              <div  class="invalid-feedback">
                Enter City
              </div>
            </div>

            <div class="col-md-6">
              <label for="inputState" class="form-label">State</label>
              <select id="inputstate" class="form-select" name='state'>
                <option selected>Choose...</option>

                <option value="Central">Central</option>
                <option value="North Central">North Central</option>
                <option value="North Eastern">North Eastern</option>
                <option value="North Western">North Western</option>
                <option value="Sabaragamuwa">Sabaragamuwa</option>
                <option value="Southern">Southern</option>
                <option value="Uva">Uva</option>
                <option value="Western">Western</option>

              </select>
              <div  class="invalid-feedback">
                Select a State
              </div>
            </div>

          </div>




          <div class="col-12">
            <button class="btn btn-primary my-5" type="submit" id='registerbtn'>Register</button>
          </div>


        </form>
        <div class="col-md-12 d-none" id='otpsec'>
          <label for="" class='form-label text-success'>We have sent a verification code via email. Check your inbox</label>
          <div class="row">

            <form id='otpform' >

              <div class="col-md-5">
                <input type="text" name="otp" id='confotp' class='form-control  mt-3' placeholder="Enter Code">
                <div  class="invalid-feedback">
                  Invalid OTP
                </div>
              </div>
              <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3 mt-3" id='confotpbtn'>Confirm OTP</button>
              </div>
            </form>

          </div>

        </div>
      </div>
    </div>
  </div>


  <div class="container d-none" id='regredirect'>
    <div class=" col-lg-8">
      <h1 class='display-3'>Hi <span id='sucname'></span>!, Account Created <span class='text-success'>Succesfully</span> </h1>
      <h1 class='display-5'>You can Sign in now as <span class='text-muted' id='sucemail'> </span></h1>
      <a href="/auth" class="btn btn-primary my-5">Login Now</a>
    </div>
  </div>



  <!-- Link Javascript Script Files--><!-- Link Javascript Script Files-->



  <!-- Ajax Script Files-->
  <script src="/static/service/js/Ajax/jquery.min.js"></script>
  <script>

    // Show password
    $('#flexCheckDefault').click(function() {
      $(this).is(':checked') ? $('#logpassword').attr('type', 'text') : $('#logpassword').attr('type', 'password');
    })
    </script>
  <!-- Login Script Files-->
  <script src="/static/service/js/login.js"></script>




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
