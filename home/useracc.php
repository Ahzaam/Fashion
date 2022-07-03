<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Profile</title>
  <link rel="icon" href="images/logo-min-c.jpg">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
  integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
  integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- <link rel="stylesheet" href="../files/icon_css/all.css">
  <script defer src="../files/icon_js/all.js"></script> -->


  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


  <style media="screen">

  body{
    margin-top:20px;
    color: #1a202c;
    text-align: left;
    background-color: #e2e8f0;
  }
  a{
    text-decoration: none;
    color:black;
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
    max-height: 660px !important;
    overflow-x:hidden !important;
  }

  .card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
    overflow-x: hidden !important;
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

  .scroll::-webkit-scrollbar {
    width: 3px;

  }

  .scroll::-webkit-scrollbar-track {
    box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
    border-radius:50%;
  }

  .scroll::-webkit-scrollbar-thumb {
    background-color: darkgrey;

    outline: 1px solid slategrey;
  }
  .lists::-webkit-scrollbar {
    width: 3px;

  }

  .lists::-webkit-scrollbar-track {
    box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
    border-radius:50%;
  }

  .lists::-webkit-scrollbar-thumb {
    background-color: darkgrey;

    outline: 1px solid slategrey;
  }
  .items{
    padding:5px;

  }
  .items:hover{

    background-color:#e4e4e4;
    transition: 0.2s;
  }
  ul{

    padding:0;
  }
  .lists{
    min-height:290px;
    max-height:290px;
    overflow:auto;
    padding:0 !important;
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

      $commentquery = "SELECT * FROM comments_feedback WHERE user_id = '$sesuserid' AND viewreply='unread'  ORDER BY id DESC";
      $comments = $conn->query($commentquery);


      $addquery = "SELECT * FROM address WHERE userid = '$sesuserid'";
      $address = $conn->query($addquery);


      $getwish = "SELECT * FROM product_table WHERE id in (SELECT product_id FROM wish_list WHERE customer_id = '$sesuserid')  AND status='selling' ";
      $wishresult = $conn->query($getwish);




      $getcart = "SELECT * FROM product_table WHERE id in (SELECT product_id FROM cart WHERE customer_id = '$sesuserid')  AND status='selling'";
      $cartresult = $conn->query($getcart);


      ?>




      <div class="container">
        <div class="main-body">

          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <a type="button" class="text-start btn btn-light nav-link active m-lg-2 m-2 w-100 " onclick="history.back()">
              <i class="fa fa-arrow-left dark" aria-hidden="true"></i><span class="badge text-bg-secondary"></span>

            </a>
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




            <div class="col-md-4 my-sm-3 " >

              <div class="row gutters-sm">

                <div class="w-100 mb-3" >

                  <div class="card h-100 ">
                    <a class="d-flex align-items-center text-muted pt-2 ps-2" href='wish.php'><i class="fa fa-heart px-2" style='color:#e425c6;'></i>Wish List</a>
                    <div class="card-body lists">

                      <ul >
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">


                        </li>
                        <?php
                        if($wishresult->num_rows > 0) {
                          while($wishrow = $wishresult->fetch_assoc()){


                            ?>
                            <div class="row items"  >
                              <div class="col-3 col-md-2   pr-0">
                                <div class="bg-img-hero-center rounded-left h-100"><img src="../<?php echo $wishrow['image']; ?>" class='w-100' alt=""></div>

                              </div>

                              <div class="col-4 offset-1">
                                <div class="card-bodyc" >
                                  <div class="mb-2">
                                    <a class="d-inline-block text-secondary small font-weight-medium mb-1" href="#"><?php echo $wishrow['category']; ?></a>
                                    <h2 class="h6 font-weight-normal">
                                      <a class="text-secondary" href="view.php?product=<?php echo $wishrow['id']?>"><?php echo $wishrow['name']; ?></a>

                                    </h2>

                                  </div>



                                </div>
                              </div>
                              <div class="col-4 offset-lg-1">
                                <div class="card-bodyc" >
                                  <div class="mb-2">
                                    <div class="">
                                      <a class="d-inline-flex align-items-center small" href="#">
                                        <div class="text-warning mr-2" style="font-size:10px;">
                                          <small class="fas fa-star "></small>
                                          <small class="far fa-star text-muted"></small>
                                          <small class="far fa-star text-muted"></small>
                                          <small class="far fa-star text-muted"></small>
                                          <small class="far fa-star text-muted"></small>
                                        </div>

                                      </a>
                                    </div>
                                    <h2 class="h6 font-weight-normal">
                                      <a class="text-danger " href="#"><?php echo $wishrow['price']; ?> LKR</a>

                                    </h2>

                                  </div>



                                </div>
                              </div>

                            </div>



                            <?php
                          }
                        }


                        ?>

                      </ul>


                      <!-- <div class="p-5">
                      <p style='font-size:100px;color:#ff70a6;'><i class='fas fa-heart' style=''></i> <?php echo $wishcount; ?></p>

                    </div> -->
                  </div>
                </div>



              </div>


              <div class="w-100 mb-3" >

                <div class="card h-100 ">
                  <a class="d-flex align-items-center text-muted pt-2 ps-2" href='cart.php'><i class="fa fa-shopping-cart px-2" style='color:#25e4ab;'></i>Cart</a>
                  <div class="card-body lists">

                    <ul >

                      <?php
                      if($cartresult->num_rows > 0) {
                        while($cartrow = $cartresult->fetch_assoc()){


                          ?>
                          <div class="row items" >
                            <div class="col-3 col-md-2 pr-0">
                              <div class="bg-img-hero-center rounded-left h-100"><img src="../<?php echo $cartrow['image']; ?>" class='w-100' alt=""></div>

                            </div>

                            <div class="col-4 offset-lg-1">
                              <div class="card-bodyc" >
                                <div class="mb-2">
                                  <a class="d-inline-block text-secondary small font-weight-medium mb-1" href="#"><?php echo $cartrow['category']; ?></a>
                                  <h2 class="h6 font-weight-normal">
                                    <a class="text-secondary" href="view.php?product=<?php echo $cartrow['id']?>"><?php echo $cartrow['name']; ?></a>

                                  </h2>

                                </div>



                              </div>
                            </div>
                            <div class="col-4 offset-1">
                              <div class="card-bodyc" >
                                <div class="mb-2">
                                  <div class="">
                                    <a class="d-inline-flex align-items-center small" href="#">
                                      <div class="text-warning mr-2" style="font-size:10px;">
                                        <small class="fas fa-star "></small>
                                        <small class="far fa-star text-muted"></small>
                                        <small class="far fa-star text-muted"></small>
                                        <small class="far fa-star text-muted"></small>
                                        <small class="far fa-star text-muted"></small>
                                      </div>

                                    </a>
                                  </div>
                                  <h2 class="h6 font-weight-normal">
                                    <a class="text-danger " href="#"><?php echo $cartrow['price']; ?> LKR</a>

                                  </h2>

                                </div>



                              </div>
                            </div>

                          </div>



                          <?php
                        }
                        ?>
                        <a href="buynow.php?usercart=<?php echo $sesuserid  ?>" class="btn btn-primary m-2" >Buy Now</a>

                        <?php
                      }



                      ?>

                    </ul>


                    <!-- <div class="p-5">
                    <p style='font-size:100px;color:#ff70a6;'><i class='fas fa-heart' style=''></i> <?php echo $wishcount; ?></p>

                  </div> -->
                </div>
              </div>



            </div>



          </div>
        </div>






<div class="col-lg-4 my-3">
  <div class="  lists" >

    <div class="card scroll " >
      <ul class="list-group list-group-flush ">

        <?php
        if($comments->num_rows > 0) {
          while($comment = $comments->fetch_assoc()) {
            $com = $comment['comment'];
            $reply = $comment['reply'];

            $display = ($reply)?'':'d-none';
            $status = ($reply)?'<p class="text-success">*** replied</p>':'<p class="text-success">** Seen</p>';
            if($comment['product_id']  != ''){
              $ahref = '<a class="h5 btn btn-primary" href="view.php?product='.$comment['product_id'].'">View Product</a>';
            }else{
              $ahref = '<p class="h5">Comments</p>';
            }
            echo '
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
            <div class="">
            '.$ahref. '   '. $status .'

            </div>
            <div class="w-100 border rounded-pill lead px-2 text-end my-2">
            '.$com.'
            </div>
            <div class="w-100 my-2 rounded-pill lead '.$display.'  border text-start   px-2 ">
            *** '.$reply.'
            </div>
            </li>';
          }
        }


        ?>


      </ul>
    </div>

  </div>


          <div class="  lists my-3" >

            <div class="card scroll " >
              <a class="d-flex align-items-center text-muted pt-2 ps-2" href='cart.php'><i class="fa fa-truck px-2" style='color:#25e4ab;'></i>Orders</a>
              <ul class="list-group list-group-flush ">

                <?php

                $orpro = "SELECT * FROM orders WHERE userid = '$sesuserid'";
                $opros = $conn->query($orpro);







                if($orders->num_rows > 0) {
                  while($order = $orders->fetch_assoc()) {
                    $getorders = "SELECT * FROM orders WHERE id in ('62b9b37da8a9b', '62b9b37da8a9b', '62b9b37da8a9b') ";
                    $orders = $conn->query($getorders);
                  ?>
                  <div class="row items" >
                    <div class="col-3 col-md-2 pr-0">
                      <div class="bg-img-hero-center rounded-left h-100"><img src="../<?php echo $order['image']; ?>" class='w-100' alt=""></div>

                    </div>

                    <div class="col-4 offset-lg-1">
                      <div class="card-bodyc" >
                        <div class="mb-2">
                          <a class="d-inline-block text-secondary small font-weight-medium mb-1" href="#"><?php echo $order['category']; ?></a>
                          <h2 class="h6 font-weight-normal">
                            <a class="text-secondary" href="view.php?product=<?php echo $order['id']?>"><?php echo $order['name']; ?></a>

                          </h2>

                        </div>



                      </div>
                    </div>

                    <?php
                    // $query = "SELECT status FROM orders WHERE  product_id='".$order['id']."'";
                    // $result = $conn->query($query);
                    //
                    // $status = $result->fetch_assoc();

                     ?>
                    <div class="col-4 offset-1">
                      <div class="card-bodyc" >
                        <div class="mb-2">
                          <div class="">
                            <a class="d-inline-flex align-items-center small" href="#">


                            </a>
                          </div>
                          <h2 class="h6 font-weight-normal">

                          </h2>

                        </div>



                      </div>
                    </div>
                  </div>



                  <?php
                  }
                }


                ?>


              </ul>
            </div>

          </div>

</div>

      </div>

    </div>
    <div class="row text-end w-100 ">
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
