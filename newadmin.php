<?php

  session_start();
  if(!isset($_REQUEST['adminid'])){
    ?>
    <!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
<html><head>
<title>404 Not Found</title>
</head><body>
<h1>Not Found</h1>
<p>The requested URL was not found on this server.</p>
<hr>
<address>Apache/2.4.52 (Win64) OpenSSL/1.1.1m PHP/8.1.2 Server at localhost Port 80</address>
</body></html>

    <?php
  }else{
    $query = "SELECT admin_id FROM admin_table WHERE admin_id='".$_REQUEST['adminid']. "'";

    include 'con.php';

    $result = $conn->query($query);
    // echo $result;
    if ($result->num_rows >0){
      $_SESSION['ID'] = True;
      ?>

          <!DOCTYPE html>
          <html lang="en" dir="ltr">
          <head>
            <meta charset="utf-8">
            <title>New Admin</title>
            <!-- CSS only -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
            <!-- JavaScript Bundle with Popper -->
            <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

            <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
            integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

            <script  src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
            integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
          </head>
          <body>
            <div class="container col-lg-4 my-5">
              <form id='form'>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                  <input type="email" name='email' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  <div id="emailHelp" class="form-text">Enter the email you shared to management</div>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" name='password' class="password form-control" id="exampleInputPassword1">
                  <div class="invalid-feedback">
                check passoword
              </div>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" class="password form-control" id="exampleInputPassword2">
                </div>


                <button type="submit" id='submit' class="btn btn-primary">Submit</button>
              </form>
              <div class="alert alert-warning my-5 d-none" id='alert' role="alert">

          </div>
            </div>

            <script type="text/javascript">
              $(document).ready(function() {
                $('#submit').click(function(e) {
                  e.preventDefault()
                  let pass1 = $('#exampleInputPassword1').val();
                  let pass2 = $('#exampleInputPassword2').val();

                  if(pass1 !== pass2){
                    $('#exampleInputPassword1').addClass('is-invalid')
                    return
                  }else{
                    let data = $('form').serialize();

                    $.post({
                      url:'admin/management/verifyadmin.php',
                      data:data,
                      success:function(data, status){
                        $('#alert').html(data);
                        $('#alert').removeClass('d-none');

                      }
                    })
                  }


                })
              })
            </script>
          </body>



















          </html>



      <?php
    }else{
      ?>
      <!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
  <html><head>
  <title>404 Not Found</title>
  </head><body>
  <h1>Not Found</h1>
  <p>The requested URL was not found on this server.</p>
  <hr>
  <address>Apache/2.4.52 (Win64) OpenSSL/1.1.1m PHP/8.1.2 Server at localhost Port 80</address>
  </body></html>

      <?php
    }


  }






 ?>
