<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Profile</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
  integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
  integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- <link rel="stylesheet" href="../files/icon_css/all.css">
  <script defer src="../files/icon_js/all.js"></script> -->


  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


  <style media="screen">
  body{
    margin-top:20px;
    color: #1a202c;
    text-align: left;
    background-color: #e2e8f0;
  }
  .main-body {
    padding: 15px;
  }
  .card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
  }

  .card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;

  }
  .scroll{
    max-height: 600px !important;
    overflow-x:hidden !important;
  }

  .card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
  }

  .gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
  }

  .gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
  }
  .mb-3, .my-3 {
    margin-bottom: 1rem!important;
  }

  .bg-gray-300 {
    background-color: #e2e8f0;
  }
  .h-100 {
    height: 100%!important;
  }
  .shadow-none {
    box-shadow: none!important;
  }
  </style>
</head>
<body>
  <?php
  session_start();
  if(isset($_SESSION['login']) && $_SESSION['login']){
    include '../con.php';
    $sesuserid = $_SESSION['userid'];
    $query = "SELECT * FROM user_table WHERE user_uuid = '$sesuserid'";
    $result = $conn->query($query);

    if($result->num_rows > 0){
      $row = $result->fetch_assoc();

      $commentquery = "SELECT * FROM comments_feedback WHERE user_id = '$sesuserid' AND viewreply='unread' ";
      $comments = $conn->query($commentquery);


      $addquery = "SELECT * FROM address WHERE userid = '$sesuserid'";
      $address = $conn->query($addquery);


      $getwish = "SELECT * FROM product_table WHERE id in (SELECT product_id FROM wish_list WHERE customer_id = '$sesuserid') ";
      $wishresult = $conn->query($getwish);
      $wishcount = $wishresult->num_rows;



      $getcart = "SELECT * FROM product_table WHERE id in (SELECT product_id FROM cart WHERE customer_id = '$sesuserid') ";
      $cartresult = $conn->query($getcart);
      $cartcount = $cartresult->num_rows;

      ?>




      <div class="container">
        <div class="main-body">

          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->

          <div class="row gutters-sm">
            <div class="col-md-4 my-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4><?php echo $row['name'] ?></h4>
                      <p class="text-secondary mb-1"><?php echo $row['email'] ?></p>
                      <!-- <button class="btn btn-primary">Follow</button>
                      <button class="btn btn-outline-primary">Message</button> -->
                    </div>
                  </div>
                </div>
              </div>



              <?php
              if($address->num_rows > 0){
                $data = $address->fetch_assoc();
              ?>
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Enter Your Address</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                      <form action="api/addadress.php" id="example" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                          <label for="recipient-name" class="col-form-label">Address Line 1</label>
                          <input type="text" class="form-control" name='address-line-1' value='<?php echo $data['address_line1'] ?>' required id="address-line-1" placeholder='Address Line 1'>
                        </div>
                        <div class="mb-3">
                          <label for="recipient-name" class="col-form-label">Address Line 2 (optinal)</label>
                          <input type="text" class="form-control" name='address-line-2' value='<?php echo $data['address_line2'] ?>' id="address-line-2" placeholder='Address Line 2'>
                        </div>
                        <div class="mb-3">
                          <label for="recipient-name" class="col-form-label">State</label>
                          <select id="inputstate" class="form-select" name='state'  required id='state'>
                            <option value='<?php echo $data['state'] ?>'><?php echo $data['state'] ?></option>

                            <option value="Central">Central</option>
                            <option value="North Central">North Central</option>
                            <option value="North Eastern">North Eastern</option>
                            <option value="North Western">North Western</option>
                            <option value="Sabaragamuwa">Sabaragamuwa</option>
                            <option value="Southern">Southern</option>
                            <option value="Uva">Uva</option>
                            <option value="Western">Western</option>

                          </select>
                        </div>
                        <div class="row">
                          <div class="mb-3 col-6">
                            <label for="recipient-name" class="col-form-label">Phone Number</label>
                            <input type="text" class="form-control" name='phone' value='<?php echo $data['phone'] ?>' required id="phone" placeholder='077 2000 200 '>
                          </div>
                          <div class="mb-3 col-6">
                            <label for="recipient-name" class="col-form-label">Postal Code</label>
                            <input type="text" class="form-control" name='postalcode' value='<?php echo $data['postalcode'] ?>' required id="postalcode" placeholder='10000'>
                          </div>
                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit"  class="btn btn-primary disabled">Save</button>
                        </div>
                      </form>

                    </div>

                  </div>
                </div>
              </div>



                            <div class="card mb-3 my-3">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-sm-3">
                                    <h6 class="mb-0">Address Line 1</h6>
                                  </div>
                                  <div class="col-sm-9 text-secondary">
                                    <?php echo $data['address_line1'] ?>
                                  </div>
                                </div>
                                <hr>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <h6 class="mb-0">Address Line 2</h6>
                                  </div>
                                  <div class="col-sm-9 text-secondary">
                                      <?php echo $data['address_line2'] ?>
                                  </div>
                                </div>
                                <hr>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <h6 class="mb-0">State</h6>
                                  </div>
                                  <div class="col-sm-9 text-secondary">
                                    <?php echo $data['state'] ?>
                                  </div>
                                </div>
                                <hr>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <h6 class="mb-0">Mobile</h6>
                                  </div>
                                  <div class="col-sm-9 text-secondary">
                                    <?php echo $data['phone'] ?>
                                  </div>
                                </div>
                                <hr>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                  </div>
                                  <div class="col-sm-9 text-secondary">
                                    <?php echo $data['postalcode'] ?>
                                  </div>
                                </div>
                                <hr>
                                <div class="row">
                                  <div class="col-sm-12">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Edit</button>
                                  </div>
                                </div>
                              </div>
                            </div>

              <?php

            }else{
               ?>
               <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                       <h5 class="modal-title" id="exampleModalLabel">Enter Your Address</h5>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <div class="modal-body">

                       <form action="api/addadress.php" id="example" method="post" enctype="multipart/form-data">
                         <div class="mb-3">
                           <label for="recipient-name" class="col-form-label">Address Line 1</label>
                           <input type="text" class="form-control" name='address-line-1' required id="address-line-1" placeholder='Address Line 1'>
                         </div>
                         <div class="mb-3">
                           <label for="recipient-name" class="col-form-label">Address Line 2 (optinal)</label>
                           <input type="text" class="form-control" name='address-line-2' id="address-line-2" placeholder='Address Line 2'>
                         </div>
                         <div class="mb-3">
                           <label for="recipient-name" class="col-form-label">State</label>
                           <select id="inputstate" class="form-select" name='state' required id='state'>
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
                         </div>
                         <div class="row">
                           <div class="mb-3 col-6">
                             <label for="recipient-name" class="col-form-label">Phone Number</label>
                             <input type="text" class="form-control" name='phone' required id="phone" placeholder='077 2000 200 '>
                           </div>
                           <div class="mb-3 col-6">
                             <label for="recipient-name" class="col-form-label">Postal Code</label>
                             <input type="text" class="form-control" name='postalcode' required id="postalcode" placeholder='10000'>
                           </div>
                         </div>

                         <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                           <button type="submit"  class="btn btn-primary">Save</button>
                         </div>
                       </form>

                     </div>

                   </div>
                 </div>
               </div>




               <div class="card mb-3 my-3">
                 <div class="card-body">
                   <div class="row">
                     <div class="col-sm-3">
                       <h6 class="mb-0">Address Line 1</h6>
                     </div>
                     <div class="col-sm-9 text-secondary">
                       Not Set
                     </div>
                   </div>
                   <hr>
                   <div class="row">
                     <div class="col-sm-3">
                       <h6 class="mb-0">Address Line 2</h6>
                     </div>
                     <div class="col-sm-9 text-secondary">
                         Not Set
                     </div>
                   </div>
                   <hr>
                   <div class="row">
                     <div class="col-sm-3">
                       <h6 class="mb-0">State</h6>
                     </div>
                     <div class="col-sm-9 text-secondary">
                      Not Set
                     </div>
                   </div>
                   <hr>
                   <div class="row">
                     <div class="col-sm-3">
                       <h6 class="mb-0">Mobile</h6>
                     </div>
                     <div class="col-sm-9 text-secondary">
                       Not Set
                     </div>
                   </div>
                   <hr>
                   <div class="row">
                     <div class="col-sm-3">
                       <h6 class="mb-0">Address</h6>
                     </div>
                     <div class="col-sm-9 text-secondary">
                       Not Set
                     </div>
                   </div>
                   <hr>
                   <div class="row">
                     <div class="col-sm-12">
                       <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Add</button>

                     </div>
                   </div>
                 </div>
               </div>

               <?php

             }
                ?>





            </div>




            <div class="col-md-4 my-sm-3" >

            <div class="row gutters-sm">

              <div class="w-100 mb-3" onclick="location.href='wish/'">
                <div class="card h-100">
                  <div class="card-body">
                    <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2"></i>Wish List</h6>
                    <div class="p-5">
                      <p style='font-size:100px;color:#ff70a6;'><i class='fas fa-heart' style=''></i> <?php echo $wishcount; ?></p>

                    </div>
                  </div>
                </div>
              </div>
              <div class="w-100 mb-3" onclick="location.href='wish/'">
                <div class="card h-100">
                  <div class="card-body ">
                    <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2"></i>Cart</h6>
                    <div class="p-5">
                      <p class='text-secondary' style='font-size:100px;'><i class='fas fa-shopping-cart x'></i>  <?php echo $cartcount; ?></p>

                    </div>
                  </div>
                </div>
              </div>
            </div></div>






            <div class="col-md-4 my-sm-3" >
              <div class="card scroll" style='overflow: scroll'>
                <ul class="list-group list-group-flush ">

                    <?php
                      if($comments->num_rows > 0) {
                        while($comment = $comments->fetch_assoc()) {
                          $com = $comment['comment'];
                          $reply = $comment['reply'];

                          $display = ($reply)?'':'d-none';
                          $status = ($reply)?'<p class="text-success">*** replied</p>':'<p class="text-success">** Seen</p>';
                          if($comment['product_id']  != ''){
                            $ahref = '<a class="h5" href="view.php?product='.$comment['product_id'].'">@'.$comment['product_id'].'</a>';
                          }else{
                            $ahref = '<p class="h5">Comments</p>';
                          }
                          echo '
                              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <div class="">
                                  '.$ahref. '   '. $status .'

                                </div>
                                <div class="w-100 border lead px-2 text-end my-2">
                                  '.$com.'
                                </div>
                                <div class="w-100 my-2 lead '.$display.'  border text-start   px-2 ">
                                  *** '.$reply.'
                                </div>
                              </li>';
                      }
                        }


                     ?>

                       <!-- <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <div class="">
                      <a class="h5" href="view.php?id= ">@62bn7c3ilx2</a>
                    </div>
                    <div class="w-100 border px-2 text-end my-2">
                      Hello
                    </div>
                    <div class="w-100 my-2 border text-start   px-2 ">
                      Hi
                    </div>
                  </li> -->

                  <!-- =================== -->
                  <!-- <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
                    <span class="text-secondary">https://bootdey.com</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
                    <span class="text-secondary">bootdey</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                    <span class="text-secondary">@bootdey</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                    <span class="text-secondary">bootdey</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                    <span class="text-secondary">bootdey</span>
                  </li> -->
                </ul>
              </div>

            </div>
          </div>

        </div>
      </div>

      <?php

    }else{
      echo '<div class="text-center">';
      echo '<h1 class="display-2 text-info text-center">Some Thing Went Wrong Pls Try Again Later</h1>';
      echo '<p class="lead" > We have a problem with your data, we let you know when its ready ';
      echo '<a href="index.php" class="btn btn-primary text-center">Home</a>';
      echo '</div>';
    }

  }else{
    echo '<div class="text-center">';
    echo '<h1 class="display-2 text-info text-center">Session Expired</h1>';
    echo '<a href="login.php" class="btn btn-primary mx-3 text-center">Login</a>';
    echo '<a href="index.php" class="btn btn-primary text-center">Home</a>';
    echo '</div>';
  }


  ?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
  integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src='js/user.js'>

  </script>


</body>
</html>
