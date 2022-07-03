<?php
require('pageauth.php')
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Admin Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

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


  <style media="screen">





  body {
    font-family: tahoma;
    height: 100%;
    /* background-image: url(https://picsum.photos/g/1920/1080); */
    background-size: cover;
    background-position: center;
    display: flex;
    align-items: center;
  }

  .our-team {
    border-radius:10px;
    padding: 30px 0 40px;
    margin-bottom: 30px;
    background-color: #f7f5ec;
    text-align: center;
    overflow: hidden;
    position: relative;
    cursor: pointer;
  }

  .our-team .picture {
    display: inline-block;
    height: 130px;
    width: 130px;
    margin-bottom: 50px;
    z-index: 1;
    position: relative;
  }

  .our-team .picture::before {
    content: "";
    width: 100%;
    height: 0;
    border-radius: 50%;
    background-color: rgba(#1369cf, 0);
    position: absolute;
    bottom: 135%;
    right: 0;
    left: 0;
    opacity: 0.9;
    transform: scale(3);
    transition: all 0.3s linear 0s;
  }

  .our-team:hover .picture::before {
    height: 100%;
  }

  .our-team .picture::after {
    content: "";
    width: 100%;
    height: 100%;
    /* border-radius: 50%; */
    background-color: #f7f5ec;
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1;
  }

  .our-team .picture img {
    width: 100%;
    height: auto;
    border-radius: 10px;
    transform: scale(1);
    transition: all 0.9s ease 0s;
  }

  .our-team:hover .picture img {
    box-shadow: 0 0 0 14px #f7f5ec;
    transform: scale(0.7);
  }

  .our-team .title {
    display: block;
    font-size: 15px;
    color: #4e5052;
    text-transform: capitalize;
  }

  .our-team .social {
    width: 100%;
    padding: 0;
    margin: 0;
    background-color: #1369ce;
    position: absolute;
    bottom: -100px;
    left: 0;
    transition: all 0.5s ease 0s;
  }

  /* .our-team:hover .social {
  bottom: 0;
  } */

  .our-team .social li {
    display: inline-block;
  }

  .our-team .social li a {
    display: block;
    padding: 10px;
    font-size: 17px;
    color: white;
    transition: all 0.3s ease 0s;
    text-decoration: none;
  }
  /*
  .our-team .social li a:hover {
  color: #1369ce;
  background-color: #f7f5ec;
  } */

  </style>
</head>
<body>
  <?php

  include "../con.php";
  $outofstock = "SELECT * FROM product_table WHERE stock <= 0";
  $count = $conn->query($outofstock);
  $ofs = $count->num_rows;

  $instock = "SELECT * FROM product_table WHERE stock > 0";
  $count = $conn->query($instock);
  $ins = $count->num_rows;

  $comments = "SELECT * FROM comments_feedback WHERE status = 'unread'";
  $count = $conn->query($comments);
  $comments = $count->num_rows;


  $display = ($comments > 0) ?'':'d-none';
  ?>
<div class="my-5 py-5">
  <br><br><br><br><br><br><br><br><br><br>
</div>


<div class="container my-lg-5 my-2">
  <div class="row">

    <div class="col-6 col-sm-6 col-md-4 col-lg-3 position-relative" onclick="location.href='adminhomegal.php'">
      <div class="our-team">
        <div class="picture">
          <img class="img-fluid" src="images/gallery.png">
        </div>
        <div class="team-content">
          <h3 class="name">Gallery <span class="badge text-bg-secondary"><?php echo $ins ?></span></h3>

        </div>

      </div>

    </div>


    <div class="col-6 col-sm-6 col-md-4 col-lg-3 position-relative" onclick="location.href='comments.php'">
      <div class="our-team">
        <div class="picture">
          <img class="img-fluid" src="images/feedback.jpg">
        </div>
        <div class="team-content">
          <h3 class="name">Message</h3>

        </div>

      </div>
      <span class="position-absolute <?php echo $display ?>  top-0 start-12 translate-middle badge rounded-pill bg-danger">
        <?php echo $comments; ?>
        <span class="visually-hidden">Unread</span>
      </span>
    </div>


    <div class="col-6 col-sm-6 col-md-4 col-lg-3 position-relative" onclick="location.href='adminoofs.php'">
      <div class="our-team">
        <div class="picture">
          <img class="img-fluid" src="images/outofstock.jpg">
        </div>
        <div class="team-content">
          <h3 class="name">Out of Stock</h3>

        </div>

      </div>
      <span class="position-absolute <?php echo ($ofs > 0) ?'':'d-none'; ?> top-0 start-20 translate-middle badge rounded-pill bg-danger">
        <?php echo $ofs; ?>
        <span class="visually-hidden">outofstock</span>
      </span>
    </div>


    <div class="col-6 col-sm-6 col-md-4 col-lg-3" onclick="location.href='adminadd.php'">
      <div class="our-team">
        <div class="picture">
          <img class="img-fluid" src="images/newproduct.jpg">
        </div>
        <div class="team-content">
          <h3 class="name">Add Product</h3>

        </div>

      </div>
    </div>


    <div class="col-6 col-sm-6 col-md-4 col-lg-3" onclick="location.href='management/'">
      <div class="our-team">
        <div class="picture">
          <img class="img-fluid" src="images/admin.jpg">
        </div>
        <div class="team-content">
          <h3 class="name">Manage Admins</h3>

        </div>

      </div>
    </div>


    <div class="col-6 col-sm-6 col-md-4 col-lg-3" onclick="location.href='orders.php'">
      <div class="our-team">
        <div class="picture">
          <img class="img-fluid" src="images/shipment.png">
        </div>
        <div class="team-content">
          <h3 class="name">Orders & Shipments</h3>

        </div>

      </div>
    </div>


    <div class="col-6 col-sm-6 col-md-4 col-lg-3">
      <div class="our-team">
        <div class="picture">
          <img class="img-fluid" src="images/stats.png">
        </div>
        <div class="team-content">
          <h3 class="name">Statics</h3>

        </div>

      </div>
    </div>


    <div class="col-6 col-sm-6 col-md-4 col-lg-3" onclick="location.href='deleted.php'">
      <div class="our-team">
        <div class="picture">
          <img class="img-fluid" src="images/deleted.jpg">
        </div>
        <div class="team-content">
          <h3 class="name">Deleted Items</h3>

        </div>

      </div>
    </div>
    <div class="col-6 col-sm-6 col-md-4 col-lg-3" onclick="location.href='../'">
      <div class="our-team">

        <div class="team-content">
          <h3 class="name">View Site <i class="fa fa-heart mx-2" style='color:#ff70a6;' aria-hidden="true"></i></h3>

        </div>

      </div>
    </div>
    <div class="col-6 col-sm-6 col-md-4 col-lg-3" >
      <div class="our-team">

        <div class="team-content">
          <h3 class="name">Top Search <i class="fa fa-search mx-2" style='color:#4361ee;' aria-hidden="true"></i> </h3>

        </div>

      </div>
    </div><div class="col-6 col-sm-6 col-md-4 col-lg-3" onclick="location.href='management/users.php'">
      <div class="our-team">

        <div class="team-content" >
          <h3 class="name">Users <i class="fa fa-users mx-2" style='color:#70d6ff;' aria-hidden="true"></i></h3>

        </div>

      </div>
    </div>
    <div class="col-6 col-sm-6 col-md-4 col-lg-3" onclick="location.href='api/logout.php'">
      <div class="our-team">

        <div class="team-content text-danger">
          <h3 class="name">Logout <i class="fa fa-sign-out"  aria-hidden="true"></i></h3>

        </div>

      </div>
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
      console.log(year)
    </script>
  </div>
</div>
</body>
</html>
