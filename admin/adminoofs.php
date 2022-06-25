<?php
  require('pageauth.php')
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Out Of Stock</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">


      <!-- CSS only -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
      <!-- JavaScript Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

  </head>
  <body>
    <?php

          include "../con.php";
               $outofstock = "SELECT * FROM product_table WHERE stock = 0";
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
          Home <span class="badge text-bg-secondary"></span>
        </a>
        <a type="button" class="btn btn-primary nav-link active m-lg-2 m-2 w-100 " href="adminhomegal.php">
          Selling <span class="badge text-bg-secondary"> <?php echo $ins; ?></span>
        </a>


        <a type="button" class="nav-link active m-lg-2 m-2 w-100 position-relative" href="adminoofs.php">
          <strong>Out Of Stock</strong>
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            <?php echo $ofs; ?>
            <span class="visually-hidden">outofstock</span>
          </span>
        </a>

        <!-- <a class="nav-link active " href="#">Comments and Feedback</a> -->
        <a type="button" class="nav-link active m-lg-2 m-2 w-100 position-relative" href="comments.php">
          Feedback
          <span class="position-absolute top-0 start-100 <?php echo $display ?>  translate-middle badge rounded-pill bg-danger">
            <?php echo $comments; ?>
            <span class="visually-hidden">Unread</span>
          </span>
        </a>






        <a type="button" class="nav-link active m-lg-2 m-2 w-100 position-relative" href="adminadd.php">
          Add Product
        </a>
      </ul>
    </div>
    <div class="grid">
      <div class="row row-cols-1 row-cols-md-2 g-4">
      <?php

           $query = "SELECT * FROM product_table WHERE stock = 0";
           $result = $conn->query($query);

           if ($result->num_rows > 0) {
             while ($row = $result->fetch_assoc()){


                 echo "
                 <div class='card mb-3 mx-lg-5' style='max-width: 540px;'>
                 <div class='row g-0'>
                 <div class='col-md-4 my-4'>
                  <img src=../". $row['image']." class='img-fluid rounded-start' alt='Image'>

                    <h5 class='card-title text-center'>" . $row['name']       . "</h5>
                    <div class='card-footer'>
                    <small class='text-muted  '> Upadated " . $row['date']      . "</small>
                    </div>
                 </div>
                 <div class='col-md-8'>
                 <div class='card-body text-start m-2'>

                   <p class='card-text'>" . $row['description']      . " </p>
                    <p class='card-text'> Price: " . $row['price']      . "LKR  ||  Size:  <span class='badge text-bg-info'>" . $row['size'] . "</span> || Color:</span> <span class='badge text-bg-light'>" . $row['colors'] . "</p>
                   <p class='card-text'> Display: <span class='badge text-bg-secondary'>" . $row['display']      . "</span> </p>
                   <button type='button' class='btn btn-danger my-2'>
                   Stock <span class='badge rounded-pill text-bg-primary'>" . $row['stock'] . "</span>
                   </button>
                   <button type='button' class='btn btn-light my-2'>
                   Selled  <span class='badge text-bg-success'>" . $row['selled'] . "</span>
                   </button>
                   <a href='edit.php?id=". $row['id'] ."' class='btn btn-primary my-2 w-100'>Edit Now</a>

                 </div>
                 </div>
                 </div>

                 </div>

                  ";



              }

}
         ?>

    </div>
  </div>


  </div>
  </body>
</html>
