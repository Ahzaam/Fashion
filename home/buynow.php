<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Check Out</title>
  <link rel="icon" href="images/logo-min-c.jpg">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
  integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
  integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


  <!-- Ajax CDN -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
  integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <style media="screen">
  body{
    margin-top:20px;
    color: #1a202c;
    text-align: left;

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
    max-height:500px;
    overflow:auto;
    padding:0 !important;
  }

  </style>


</head>
<body>
  <?php
  session_start();
  if(isset($_SESSION['login']) && $_SESSION['login'] ){
    include '../con.php';
    $userid = $_SESSION['userid'];


    ?>
    <div class="container my-lg-5">

          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirm Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <span id='updatingitems' class='text-success fw-bold'>Press Ok to Place Order </span>
              </div>
              <div class="modal-footer">

                  <button type="button" class="btn btn-secondary" id='clearchanges' data-bs-dismiss="modal">Cancel</button>
                  <button type="button" id="confirmorder"   class="btn btn-primary" data-bs-dismiss="modal" >Ok</button>

              </div>
            </div>
          </div>
        </div>
      <div class="row">


        <div class="col-lg-8 bg-white p-2">

          <?php
          $userdetail = "SELECT name, email FROM user_table WHERE user_uuid ='$userid'";
          $details = $conn->query($userdetail);

          $det = $details->fetch_assoc();

          ?>
          <div class=" border px-4 py-2 rounded">
            <h3 class=''>Login <i class="fa-solid fa-circle-check text-success mx-3"></i></h3>
            <p class='fw-bold'><?php echo $det['name'] ?></p>
            <p class='fw-bold'><?php echo $det['email'] ?></p>
          </div>

          <div class="row mx-1 border my-3 rounded  px-4 py-2">
            <div class="col-lg-6 cardc p-3">
              <h5>Shipping Address</h5>
              <?php
              $address = "SELECT * FROM address WHERE userid ='$userid'";
              $address = $conn->query($address);



              if($address->num_rows > 0){
                $address = $address->fetch_assoc();
                ?>

                <div class=" my-4">
                  <div class="row col-lg-12">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address Line 1</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $address['address_line1'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address Line 2</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $address['address_line2'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">State</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $address['state'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mobile</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $address['phone'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $address['postalcode'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <a type="button" class="btn btn-primary" href='useracc.php'>Edit</a>
                    </div>
                  </div>
                </div>
                <input type="hidden"  id='address' value="set">
                <?php

              }else{
                ?>

                <input type="hidden"  id='address' value="notset">
                <div class=" mb-3 my-3">
                  <div class="card-body">
                    <div class="row ">
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
                        <a type="button" class="btn btn-primary" href='useracc.php'>Add</a>

                      </div>
                    </div>
                  </div>
                </div>

                <?php

              }
              ?>

            </div>
            <div class="col-lg-5  mx-lg-4 rounded  px-4 py-3">
              <h5>Payment Method</h5>
              <div class="">
                <label for="">Card Holders Name</label>
                <input class="form-control my-2 "  disabled type="text" name="" placeholder="Name">
              </div>
              <div class="">
                <label for="">Card No</label>
                <input class="form-control my-2" disabled type="text" name="" placeholder="Card No">
              </div>

              <div class="row">
                <div class="col-6">
                  <label for="">Expire Date</label>
                  <input class="form-control col-4 my-2" disabled type="text" name="" placeholder="Card No">
                </div>

                <div class="col-5">
                  <label for="">CVV</label>
                  <input class="form-control col-4 my-2" disabled type="text" name="" placeholder="CVV">
                  <p style="font-size:10px;">No on Cards Back</p>
                </div>

              </div>

              <div class="col-12">
                <button type="button" class="btn btn-primary w-100 disabled" name="button">Pay Now</button>
              </div>
            </div>
            <div class=" my-2 col-12 me-5">
              <div class="row p-3   ">
                <div class="col-lg-4">
                  <label for="">Payment Method</label>
                  <select class="form-select" disabled>
                    <option value="">Cash On Delivery</option>
                  </select>
                </div>


                <div class="col-lg-3">
                  <button type="button" class="btn  my-4 w-100 fw-bold" data-bs-toggle="modal" id='savechanges' data-bs-target="#exampleModal" style='background-color: #00ffff' name="button">Confirm Order</button>
                </div>

              </div>
            </div>
          </div>

        </div>

        <div class="col-lg-4 h-100">
          <?php
          if(isset($_REQUEST['item'])){
            $item = $_REQUEST['item'];



            $query = "SELECT  image, name, description, price, category, stock FROM product_table WHERE id='$item' AND stock > 0 AND status ='selling'";
            $result = $conn->query($query);

            if($result->num_rows > 0){
              $row = $result->fetch_assoc();

              ?>

              <input type="hidden" id='ordertype' value="single">
              <input type="hidden" id='thisid' name="" value="<?php echo $item ?>">
              <!-- Product -->
              <div class="card text-center h-100">
                <div class="position-relative">
                  <img class="card-img-top" src="../<?php echo $row['image'] ?>" alt="Image Description">


                  <div class="position-absolute top-0 right-0 pt-3 pr-3">

                  </div>
                </div>

                <div class="card-body pt-4 px-4 pb-0">
                  <div class="mb-2">
                    <a class="d-inline-block text-secondary small font-weight-medium mb-1" href="#"><?php echo $row['category'] ?></a>
                    <h3 class="font-size-1 font-weight-normal">
                      <a class="text-secondary" href="view.php?product=<?php echo $item ?>"><?php echo $row['name'] ?></a>
                    </h3>
                    <div class="d-block font-size-1">
                      <span class="font-weight-medium"><?php echo $row['price'] ?> LKR</span>
                    </div>
                  </div>
                </div>


              </div>
              <div class="col-12 border text-center my-2 py-4">

                <h5>Quantity:
                  <?php if(isset($_REQUEST['quantity'])){
                    $quantity = $_REQUEST['quantity'];
                    if($row['stock'] <= $quantity){
                      $quantity = $row['stock'];
                    }else if($quantity < 1){
                      $quantity = 1;
                    }
                  }else{
                    $quantity = 1;
                  }
                  echo '<input type="hidden" id="quantity" value="' . $quantity . '">';
                  echo $quantity;
                  $price = $row['price'];
                  $total = $price * $quantity;

                  ?>
                </h5>

              </div>
              <div class="col-12 border text-center my-2 py-4">

                <input type="hidden" id='fulltextprice' name="" value="<?php echo $total ?>">
                <label for="" class='h4 w-100'>Total: <span id='total'> </span> LKR</label>
              </div>
              <!-- End Product -->

              <?php
            }else{
              echo '<div class="container text-center">';
              echo '<h1 class="display-3 text-center" >Sorry!, Item was missing or deleted</h1>';
              echo '</div>';
            }



          }else if(isset($_REQUEST['usercart'])){

            $getcart = "SELECT * FROM product_table WHERE id in (SELECT product_id FROM cart WHERE customer_id = '$userid')  AND stock > 0 AND status='selling'";
            $cartresult = $conn->query($getcart);
            ?>
            <input type="hidden" id='ordertype' value="cart">
            <input type="hidden" id='thisid' name="" value="<?php echo $userid ?>">
            <div class="w-100 mb-3" >

              <div class="card h-100 ">

                <div class="card-body lists">

                  <ul >

                    <?php
                    $total = 0;
                    if($cartresult->num_rows > 0) {
                      while($cartrow = $cartresult->fetch_assoc()){

                        $cart[] = $cartrow['id'];
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
                        $total += $cartrow['price'];
                      }
                      // print_r($cart);
                    }
                    ?>

                  </ul>
                </div>
              </div>
            </div>
            <div class="col-12 border text-center my-2 py-4">
              <input type="hidden" id='fulltextprice' name="" value="<?php echo $total ?>">
              <label for="" class='h4 w-100'>Total: <span id='total'> </span> LKR</label>

            </div>
            <?php
          }
          ?>
        </div>
      </div>
    </div>
    <script type="text/javascript">
    let price = document.getElementById('fulltextprice');

    price = price.value.toString()

    function addcomma(price){
      let lenght = price.length - 1
      let csprc = ''
      let arrlenght = 0
      for(let i = lenght ; i >= 0; i--){


        if(arrlenght % 3 == 0 && arrlenght != 0){
          csprc += ','
        }
        csprc += price[i]
        arrlenght ++
      }

      price = ''

      csprc = csprc.toString()

      for(let i = csprc.length - 1 ; i >= 0; i--){
        price += csprc[i]

      }

      return price
    }

    document.getElementById('total').innerHTML = addcomma(price)

    </script>
    <script src='js/buynow.js'></script>
    <?php

  }else{
    echo '<div class="container text-center">';
    echo '<h1 class="display-3 text-center" >Login To Purchase</h1>';
    echo '<a class="btn btn-primary text-center" href="login.php" >Login</a>';
    echo '</div>';
  }








  ?>


</body>
</html>
