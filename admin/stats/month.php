<?php
require('pageauth.php')
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Stats</title>
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
  .chart{

  }
  </style>
</head>
<body>
  <div class="container">
    <div class="container position-relative ">
      <div class="my-5 position-absolute top-0 start-0">
        <a type="button" class="btn btn-light nav-link active m-lg-2 m-2 w-100 " href="../admin.php">
          <i class="fa fa-arrow-left" aria-hidden="true"></i><span class="badge text-bg-secondary"></span>
        </a>
      </div>
    </div>
    <br><br>
    <div class="container col-lg-12 my-5 ">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="index.php">Today</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="month.php">Month</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="year.php">Year</a>
        </li>

      </ul>
      <div class="chart" id='canvas'>
        <canvas id="myChart" ></canvas>
      </div>

      <div class="my-5 mx-4">
        <div class="row">
          <div class="col-4">
            <h3 class='display-4'>Puchases: <span id='count'></span> </h3>
          </div>
            <div class="col-8">
              <h3 class='display-4'>Total Income: <span id='total'></span> LKR</h3>
            </div>

        </div>
      </div>
    </div>
  </div>




  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
  integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src='js/month.js'></script>
</body>
</html>
