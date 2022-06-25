<?php
  require('pageauth.php')
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Home</title>

      <!-- CSS only -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
      <!-- JavaScript Bundle with Popper -->
      <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

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
    <div class="container">
    <div class="my-5">

      <ul class="nav nav-pills nav-justified">
        <a type="button" class="btn btn-primary nav-link active m-lg-2 m-2 w-100 " href="admin.php">
          <strong>Home </strong> <span class="badge text-bg-secondary"></span>
        </a>
        <a type="button" class="btn btn-primary nav-link active m-lg-2 m-2 w-100 " href="adminhomegal.php">
          Selling <span class="badge text-bg-secondary"> <?php echo $ins; ?></span>
        </a>


        <a type="button" class="nav-link active m-lg-2 m-2 w-100 position-relative" href="adminoofs.php">
          Out Of Stock
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            <?php echo $ofs; ?>
            <span class="visually-hidden">outofstock</span>
          </span>
        </a>

        <!-- <a class="nav-link active " href="#">Comments and Feedback</a> -->
        <a type="button" class="nav-link active m-lg-2 m-2 w-100 position-relative" href="comments.php">
          Feedback
          <span class="position-absolute <?php echo $display ?>  top-0 start-100 translate-middle badge rounded-pill bg-danger">
            <?php echo $comments; ?>
            <span class="visually-hidden">Unread</span>
          </span>
        </a>






        <a type="button" class="nav-link active m-lg-2 m-2 w-100 position-relative" href="adminadd.php">
          Add Product
        </a>
      </ul>
    </div>
      </div>
  </body>
</html>
