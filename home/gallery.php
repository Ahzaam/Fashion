<?php
session_start(); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <title>MegaTrons</title>
  <link rel="stylesheet" href="../home/nav_style.css">
  <link rel="stylesheet" href="css/body.css">


  <!-- Font Awesome -->
  <link rel="stylesheet" href="../files/icon_css/all.css">
  <script defer src="../files/icon_js/all.js"></script>


  <!-- owl carousel -->
  <script src="../files/owl-carousel/jquery-3.6.0.js"></script>
  <script src="../files/owl-carousel/owl.carousel.min.js"></script>
  <link rel="stylesheet" href="../files/owl-carousel/owl.carousel.min.css">
  <link rel="stylesheet" href="../files/owl-carousel/carousel.css">

  <!-- bootstrap -->

  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

  <style media="screen">
  .dropdown{border-radius:5px;width:180px;}
  .dropdown:hover .dropdown-menu{
    display:block;
  }
  .dropdown-menu{
    text-align:center;

  }
  img[type='profile']{
    margin-bottom:25px;
    max-width:170px;
    height:auto;

  }
  .allcontain{
    max-width:1800px;
  }
  body{
    text-align:center;
  }
  .dressimg{
    border-radius:20px;
  }
  .dressimgcaro{
    border-radius:100px;
  }


  .sectionglass {

    box-shadow: 0 0 1rem 0 rgba(0, 0, 0, .2);
    border-radius: 5px;
    position: relative;
    z-index: 1;
    background: inherit;
    overflow: hidden;
  }

  .sectionglass:before {
    content: "";
    position: absolute;
    background: inherit;
    z-index: -1;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    box-shadow: inset 0 0 2000px rgba(255, 255, 255, .5);
    filter: blur(10px);
    margin: -20px;
  }
  .searchdesc {
     word-wrap: break-word;
  }

.gridserchanimation {
    transition: 1s;
    opacity: 0.1;

}


.card-text{
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;

}
.gridserchanimation{

}
#gridcont{

    transition:0.5;
    -webkit-transition: 0.5s;
    -moz-transition: 0.5s;
    -o-transition: 0.5s;
    transition: 0.5s;
}

  </style>


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

        $query = "SELECT * FROM product_table WHERE stock > 0 AND display='grid'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()){


            echo "
            <div class='col'>
            <div class='card'>
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

    </div>
    <div class="container my-5">
      <div class="row row-cols-1 row-cols-md-4 g-4">
        <?php

        include "../con.php";

        $query = "SELECT * FROM product_table WHERE stock > 0 AND display='owl-carousel'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()){


            echo "
            <div class='col'>
            <div class='card'>
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

    </div>
    <script src='js/gallery.js'></script>


  </body>
  </html>
