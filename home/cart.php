<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Wish list</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/logo-min-c.jpg">

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

  </head>
  <body>
  <div class="container my-5">
    <a type="button" class="text-start btn btn-light nav-link active m-lg-2 m-2 w-100 " onclick="history.back()">
      <i class="fa fa-arrow-left dark" aria-hidden="true"></i><span class="badge text-bg-secondary"></span>

    </a>
    <h1 class='display-4'>Cart  <a href="buynow.php"></a>   </h1>
    <ul class="list-unstyled">

      <?php
      session_start();
      if(isset($_SESSION['login']) && $_SESSION['login']){
        include '../con.php';

        $sesuserid = $_SESSION['userid'];
        $query = "SELECT product_id, count, cart_id FROM cart WHERE customer_id = '$sesuserid'";
        $orders = $conn->query($query);




        if ($orders->num_rows > 0) {
          echo '<a class="text-end btn btn-primary my-2" href="buynow.php?usercart='.$sesuserid.'" > Buy Now!</a>';
          while ($ordrow = $orders->fetch_assoc()){

            $query = "SELECT * FROM product_table WHERE id='".$ordrow['product_id']."'  AND status='selling' ";
            $wishresult = $conn->query($query);

            $row = $wishresult->fetch_assoc();

       ?>
  <!-- Products -->
  <li class="card py-3 mb-5">
    <div class="row">
      <div class="col-2 px-3 pr-0">
        <div class="bg-img-hero-center rounded-left h-100"><img src="../<?php echo $row['image']; ?>" class='w-100' alt="Image"></div>
      </div>

      <div class="col-8 offset-lg-1 col-lg-4">
        <div class="card-body py-5 px-md-4">
          <div class="mb-2">
            <a class="d-inline-block text-secondary small font-weight-medium mb-1" href="category.php?category=<?php echo $row['category']; ?>"><?php echo $row['category']; ?></a>
            <h2 class="h6 font-weight-normal">
              <a class="text-secondary" href="view.php?product=<?php echo $row['id']?>" ><?php echo $row['name']; ?></a>
              <p class="text-muted my-2"><?php echo $row['description']; ?></p>
              <?php
              $stock = $row['stock'];
                if($stock == 0) {
                  echo '<span class="badge bg-danger badge-pill ml-1">Out of Stock</span>';
                }
               ?>
               <p>Available Stock: <?php echo $stock; ?></p>
            </h2>

            <div class="d-block">
              <span class="h5"><?php echo $row['price']; ?> LKR</span>
            </div>
          </div>


        </div>
      </div>
      <div class="col-4 text-center">
        <button type="button" data-cart-id='<?php echo $ordrow['cart_id'] ?>' class="remove btn btn-danger rounded-pill my-5" name="button">Remove</button>

                  <div class="col-12">
                    <div class="row">
                      <div class="col-4 h5">
                        <label for="">Quantity: </label>
                      </div>
                      <div class="col-2 mp-0 text-end">
                        <button type="button" data-input='input-<?php echo $row['id'] ?>' data-cart-id='<?php echo $ordrow['cart_id'] ?>'  class="decquantity mp-0 btn btn-secondary rounded-pill px-3 fw-bold" name="button">-</button>
                      </div>
                      <div class="col-3 mp-0">

                        <input  type='number' id='input-<?php echo $row['id'] ?>' step='1' disabled class='mp-0 form-control  col-5' value='<?php echo  ($ordrow['count'] > $stock)? $stock:$ordrow['count'] ?>'>
                      </div>
                      <div class="col-2 mp-0">
                        <button type="button"  data-availablestock='<?php echo $stock ?>' data-cart-id='<?php echo $ordrow['cart_id'] ?>' data-input='input-<?php echo $row['id'] ?>' class="incquantity btn mp-0 btn-secondary fw-bold rounded-pill" name="button">+</button>
                      </div>
                    </div>

                  </div>
      </div>

    </div>
  </li>
  <!-- End Products -->
  <?php
}
}else{
    echo '<h1 class="display-3 text-center" >Empty</h1>';
}
}else{
  echo '<h1 class="display-3 text-center" > Session Expired</h1>';
  echo '<a class="btn btn-primary" href="login.php">Login</a>';
}


   ?>
</ul>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
  integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="js/cart.js">

  </script>
  </body>
</html>
