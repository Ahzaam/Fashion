<?php
session_start(); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <title>Gallery</title>


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
    integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>





  <!-- bootstrap -->

  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="css/gallery.css">


</head>


<body>

  <div class="container-fluid allcontain">

    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">NZ-Fasions</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../home">Home</a>
            </li>


            <li class="nav-item dropdown">
              <!-- first is the link in your navbar -->
              <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services</a>

              <!-- your mega menu starts here! -->
              <div class="dropdown-menu dropdown-menu-right text-start" aria-labelledby="servicesDropdown">

                <!-- the standard dropdown items -->
                <a class="dropdown-item" href="#">What we do</a>
                <a class="dropdown-item" href="#">How we fit your needs</a>

                <!-- next, a divider to tidy things up -->
                <div class="dropdown-divider"></div>

                <!-- finally, using flex to create your layout -->
                <div class="d-md-flex align-items-start justify-content-start">

                  <div>
                    <div class="dropdown-header">Development</div>
                    <a class="dropdown-item" href="#">Bespoke software</a>
                    <a class="dropdown-item" href="#">Mobile apps</a>
                    <a class="dropdown-item" href="#">Websites</a>
                  </div>

                  <div>
                    <div class="dropdown-header">Professional Services</div>
                    <a class="dropdown-item" href="#">Project rescue</a>
                    <a class="dropdown-item" href="#">Source code recovery</a>
                    <a class="dropdown-item" href="#">Application support &amp; maintenance</a>
                  </div>

                  <div>
                    <div class="dropdown-header">Fixed Price Services</div>
                    <a class="dropdown-item" href="#">Add cookie consent</a>
                    <a class="dropdown-item" href="#">Add captcha</a>
                    <a class="dropdown-item" href="#">Add core data</a>
                    <a class="dropdown-item" href="#">Custom error pages</a>
                    <a class="dropdown-item" href="#">Contact form creation</a>
                    <a class="dropdown-item" href="#">Automated backups</a>
                    <a class="dropdown-item" href="#">Image to HTML</a>
                  </div>
                </div>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="gallery.php">Gallery</a>
            </li>


          </ul>

        </div>
      </div>
    </nav>

    <!-- End of the Navbar -->

    <div class="container my-5 ">
      <div class="input-group mb-3 my-5 ">
    <input type="text" class="form-control" onsearch='postsearch()' id='searchingallery' placeholder="Search" aria-label="Recipient's username" aria-describedby="button-addon2">
    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
  </div>

  <div class="gridcont my-5" >
    <div class="row row-cols-1 row-cols-md-4  row-cols-2 g-4 " id='gridcont'>
    </div>
  </div>
      <div class="row row-cols-1 row-cols-md-4 g-4 ">
        <?php

        include "../con.php";

        $query = "SELECT * FROM product_table WHERE stock > 0 AND status = 'selling' ORDER BY category ASC";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()){


            echo "
            <div class='col'>
            <div class='card lightboxsupport' data-id='" . $row['id'] ."'>
            <img src='../". $row['image'] ."' class='card-img-top' alt='Image'>
            <div class='card-body text-start'>
            <h5 class='card-title'>". $row['name'] ."</h5>
            <p class='card-text'>". $row['description'] ."</p>
            </div>
            </div>
            </div>
            ";



          }

        }
        ?>
      </div>
      <div class="row text-end w-100 my-5">
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
    <div id='lightbox'>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src='js/gallery.js'></script>


  </body>
  </html>
