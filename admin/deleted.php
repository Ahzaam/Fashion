<?php
  require('pageauth.php')
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Deleted Gallery</title>


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
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


  <style media="screen">
  .container-fluid{

  max-width:1800px;
}
  </style>
</head>
<body>

  <div class="container-fluid">
    <div class="container position-relative ">
      <div class="my-5 position-absolute top-0 start-0">
        <a type="button" class="btn btn-light nav-link active m-lg-2 m-2 w-100 " href="admin.php">
          <i class="fa fa-arrow-left" aria-hidden="true"></i><span class="badge text-bg-secondary"></span>
        </a>
      </div>
    </div>
    <br><br>
    <div class="container">
<h1 class='display-5 text-danger my-5'>Deleted Gallery</h1>

      <div class="input-group mb-3 my-5 ">
        <input type="text" class="form-control" onsearch='postsearch()' id='searchingallery' placeholder="Search" aria-label="Recipient's username" aria-describedby="button-addon2">
        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
      </div>

      <div class="gridcont my-5" >
        <div class="row row-cols-1 row-cols-md-4  row-cols-2 g-4 " id='gridcont'>
        </div>
      </div>
        </div>
      <div class="container-fluid mx-lg-5 text-center align-center">


      <div class="">

        <div class="grid w-100">
          <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php

            include "../con.php";
            $query = "SELECT * FROM deleted_product_table";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()){



                echo "
                <div class='card mb-3 mx-2' style='max-width: 540px;'>
                <div class='row g-0'>
                <div class='col-md-4 my-4'>
                <img src=../". $row['image']." class='img-fluid rounded-start' alt='Image'>

                <h5 class='card-title text-center'>" . $row['name']       . "</h5>
                <div class='card-footer'>
                <small class='text-muted  '> Added " . $row['date']      . "</small>
                </div>
                </div>
                <div class='col-md-8'>
                <div class='card-body text-start m-2'>

                <p class='card-text'>" . $row['description']      . " </p>
                <p class='card-text'> Price: " . $row['price']      . "LKR  ||  Size:  <span class='badge text-bg-info'>" . $row['size'] . "</p>
                <p class='card-text my-4'> Display: <span class='badge text-bg-secondary'>" . $row['display']      . "</span>|| Color:</span> <span style='height:30px;width:30px; border:1px solid black ;background-color:" . $row['colors'] . "';>" . $row['colors'] . "</span>  </p>
                <button type='button' class='btn btn-light my-2'>
                Stock <span class='badge rounded-pill text-bg-primary'>" . $row['stock'] . "</span>
                </button>
                <button type='button' class='btn btn-light my-2'>
                Selled  <span class='badge text-bg-success'>" . $row['selled'] . "</span>
                </button>
                <a href='api/restore.php?productid=". $row['id'] ."' class='btn btn-danger rounded-pill my-2 w-100'>Restore</a>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/delsearch.js">

    </script>
  </body>
  </html>
