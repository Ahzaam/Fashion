<?php
session_start();
if(isset($_SESSION['login']) && $_SESSION['login']){
  include '../con.php';
  $query = "SELECT * FROM cart WHERE customer_id = '". $_SESSION['userid']. "'";
  $result = $conn->query($query); //
  if($result->num_rows > 0){
    $cart=[];
    while($row = $result->fetch_assoc()){
      $cart[] = $row['product_id'];
    }
  }

  $query = "SELECT * FROM wish_list WHERE customer_id = '". $_SESSION['userid']. "' ";
  $result = $conn->query($query); //
  if($result->num_rows > 0){
    $wish=[];
    while($row = $result->fetch_assoc()){
      $wish[] = $row['product_id'];
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <title>NZ-Fasions</title>
  <link rel="icon" href="images/logo-min-c.jpg">
  <link rel="stylesheet" href="css/body.css">


  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
  integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
  integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>




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


  <!-- Grid -->
  <link rel="stylesheet" href="../files/grid/grid.css">

  <style media="screen">
  a{
    text-decoration: none;
  }
  </style>
</head>


<body>


<div class="container-fluid">

    <!--Start Floating cart and Wish lidt Container -->

    <div class=" text-center align-center allcontain position-relative m-auto my-3">
      <div class="fixed-top align-middle d-flex d-none" id='cartandwish' style='z-index:1000;top: 15%; max-width:100px;'>
        <div class="col-2 px-lg-5 my-lg-5">
          <?php

          if(isset($_SESSION['login']) && $_SESSION['login']){
            $id = $_SESSION['userid'];
            include '../con.php';
            $getcart = "SELECT * FROM product_table WHERE id in (SELECT product_id FROM cart WHERE customer_id = '$id') ";
            $result = $conn->query($getcart);
            $numrows = $result->num_rows;



            ?>

            <!-- Start of floating cart icon -->
            <div class="btn-group w-100 my-3 dropend">
              <button  type="button" class="btn btn-primary rounded-pill dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <i class=" fas fa-shopping-cart  "></i><span class="badge text-bg-secondary mx-2" id='numofcart'><?php echo $numrows  ?></span>
              </button>
              <?php
              if($numrows > 0){
                ?>
                <ul class="dropdown-menu dropdown-menu-dark col-12 w-100 mx-3" id='cartitemsdrpd' style='min-width:200px;'>
                  <?php

                  $i = 0;
                  while($row = $result->fetch_assoc()){
                    if($i == 6){
                      break;
                    }
                    ?>
                    <li>
                    <a href="view.php?product=<?php echo $row['id']?>">
                      <div class="dropdown-item my-2 dropdown-item-a w-100"  >
                        <div class="row">
                          <div class="col-4">
                            <img src="../<?php echo $row['image'] ?>" class='w-100' alt="Image">
                          </div>
                          <div class="col-7">
                            <?php echo $row['name'] ?>
                          </div>
                        </div>

                      </div>
                    </a>
                    </li>

                    <?php
                    $i++;
                  }
                  echo '<li><a class="dropdown-item bg-primary" href="cart.php">Go To Cart</a></li></ul>';
                }



                ?>

              </div>
              <!-- End Of of floating cart icon -->



              <!-- Start Of Wish List -->
              <?php




              $getwish = "SELECT * FROM product_table WHERE id in (SELECT product_id FROM wish_list WHERE customer_id = '$id') ";
              $wishresult = $conn->query($getwish);
              $numrows = $wishresult->num_rows;



              ?>



              <div class="btn-group dropend my-lg-5">
                <button type="button" class="btn btn-light text-danger rounded-pill dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fas fa-heart"></i>
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id='numofwish'><?php echo $numrows; ?></span>
                  </button>
                  <?php if($numrows > 0){


                    ?>
                    <ul class="dropdown-menu dropdown-menu-dark" style='min-width:200px;'>
                      <?php
                      $j = 0;
                      while($row = $wishresult->fetch_assoc()){
                        if($j == 6){
                          break;
                        }
                        ?>
                        <li>
                          <a href="index.php">
                          <div class="dropdown-item my-2 dropdown-item-a w-100"  >
                            <div class="row">
                              <div class="col-4">
                                <img src="../<?php echo $row['image'] ?>" class='w-100' alt="Image">
                              </div>
                              <div class="col-7">
                                <?php echo $row['name'] ?>
                              </div>
                            </div>

                          </div>
                        </a>
                        </li>

                        <?php
                        $j++;
                      }
                      echo '<li><a class="dropdown-item bg-primary" href="wish.php">Go To Wishlist</a></li></ul>';
                      ?>
                    </ul>
                    <?php
                  }

                  ?>
                </div>


                <?php

              }

              ?>

              <!--End of floating cart icon  -->
            </div>
          </div>
  <!-- End of flaoting container -->



  <!-- Start of Navbar -->

          <nav class="navbar navbar-expand-lg text-center bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">
        <img src="images/logo-min-c.jpg" alt="" width="30" height="30" class="d-inline-block align-text-top">
        NZ - Fasions
      </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>


                  <li class="nav-item dropdown">
                    <!-- first is the link in your navbar -->
                    <a class="nav-link dropdown-toggle ms-5" href="#" id="servicesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services</a>

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



                  <li class="nav-item d-none" id='logintoggle'>
                    <a class="btn btn-danger mx-lg-5 rounded-pill" href="login.php">Login</a>
                  </li>

                  <li>
                  <div class="account d-none mx-lg-5"  id='account'>
                    <div class="btn-group">
                      <div class="btn-group">
                        <button type="button" id='holdersname' class="btn btn-success rounded-pill dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">

                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                          <p class="dropdown-item" id='emaildrp'>Email</p>
                          <a class="dropdown-item" href="useracc.php">My Account</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item text-white bg-danger" href="api/logout.php">Log Out</a>
                        </ul>




                      </div>

                    </div>


                  </div>
                  </li>
                </ul>

          <form class="d-flex col-12 col-lg-3  d-lg-block" role="search">
            <div class=" row btn-group w-100">
              <div class="dropdown  w-100">
                <input class="form-control w-100 dropdown-toggle " type="search" id='searchinput' autocomplete="off" placeholder="Search"  aria-label="Search">
                <ul class="dropdown-menu dropdown-menu-end w-100" style="width: 300px;" aria-labelledby="dropdownMenuButton1" id='searchresultsdropdown'>

                </ul>

              </div>

          </div>
        </form>

      </div>
    </div>
  </nav>

  <!-- End of the Navbar -->




  <!-- Start of Carousel Banner -->
  <div class="container-fluid d-xl-flex justify-content-center">
    <div id="carouselExampleIndicators" class="carousel slide w-100" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="images/perfume-logo.jpg" type="sldimg" class="d-block "  alt="...">
          <div class="right text-white sectionglass px-3 p-3 text-start">
            <h5 class="display-3" >
              Best Collection of Perfumes</h5>
              <p class="lead text-white">We have the best collection of Perfumes in Srilanka </p>
              <a href="#" class="btn btn-primary rounded-pill">Shop Now</a>
            </div>
          </div>



          <div class="carousel-item" style="">
            <img src="images/blazer-logo.jpg" class="d-block "  alt="...">
            <div class="left p-3 text-dark text-start  px-3">
              <h5 class="display-3" >Best Collection Of Blazers</h5>
              <p class="lead ">Blazers for all events Official, Wedding, Casual.</p>
              <a href="#" class="btn btn-primary rounded-pill">Shop Now</a>
            </div>
          </div>




          <div class="carousel-item">
            <img src="images/tshirtsbanner-logo.jpg" class="d-block "  alt="...">
            <div class="left p-3 text-start   px-3">
              <h5 class="display-1 text-dark">Best Collection Of T-Shirts</h5>
              <p class="lead text-dark  ">Elegance is always in style for men. There are all different kinds of elegance.<br> It can be silk, it can be a T-shirt.</p>
              <a href="#" class="btn btn-danger rounded-pill">Shop Now</a>
            </div>
          </div>

          <div class="carousel-item  w-flex">
            <img src="images\allkindmen-logo.jpg" class="d-block"  alt="...">
            <div class="right  text-start  px-2">
              <h5 class="display-3 text-dark">All Kind of Men Accesories in One Place</hh5>
                <p class="lead  text-dark my-lg-5">Best place for buy mens accesories</p>
                <!-- <button type="button1" class="btn btn-primary rounded-pill" name="button">Shop Now</button> -->
                <a href="#" class="btn btn-primary rounded-pill">Shop Now</a>
              </div>
            </div>



          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>

      <!-- End of the Banner -->



      <div class="container-fluid mt-5" style="text-align:center;" style="max-width:2000px;">
        <div class="row">
          <div class="col-lg-4 col-md-12 d-inline-block position-relative mt-5">
            <div class=" d-inline-block">
              <img src="images/easy-return.jpg" class='w-100' alt="">
            </div>
          </div>


        <div class="col-lg-4  col-md-12 d-inline-block position-relative  mt-5">
          <div class=" d-inline-block">
            <img src="images/replacement.jpg" class='w-100' alt="">
          </div>
        </div>

      <div class="col-lg-4  col-md-12 d-inline-block position-relative   mt-5 ">
        <div class=" d-inline-block">
          <img src="images/free-shipping.jpg" class='w-100' alt="">

        </div>

      </div>
    </div>
  </div>

  <!-- End of Feature -->


  <div class="container-fluid text-center">
    <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-12 mt-5 dressimgsec">
        <img src="images/kidsdress.jpg" class="owl-banner d-inline-block dressimg" type='q1' alt="">
        <div class="divcentered display-5"></div>
        <div class="centered2 ">
          <i class="fa-solid fa-eye my-3 display-5"></i><br>
          <span class='h6'>Visit</span>
          <p class="lead text-info">Kids Clothings</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-12 mt-5 dressimgsec">
        <img src="images/womensdress.jpg" class="owl-banner d-inline-block dressimg " type='54' alt="">
        <div class="divcentered display-5"></div>
        <div class="centered2 ">
          <i class="fa-solid fa-eye my-3 display-5"></i><br>
          <span class='h6'>Visit</span>
          <p class="lead text-info">Womens Clothings</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-12 mt-5 dressimgsec">
        <img src="images/mensdress.jpg" class="owl-banner d-inline-block dressimg " type='54' alt="">
        <div class="divcentered display-5"></div>
        <div class="centered2 ">
          <i class="fa-solid fa-eye my-3 display-5"></i><br>
          <span class='h6'>Visit</span>
          <p class="lead text-info">Mens Clothings</p>
        </div>
      </div>
    </div>
  </div>
  <br><br><br><br><br>

  <!-- Start of the parallax -->
  <div class="margin d-flex my-5" style="align-items:center;">
    <section class="parallax w-100" style="background: url('images/sldimg1.jpg')no-repeat fixed 100%;">
      <div class="parallax-inner text-center">
        <br><br><br>
        <h1 class="display-3 text-muted">Buy all baby Accesorien in one place</h1>
        <br><br><br>
        <a href=""><button class='btn my-3 rounded-pill ' style="background-color:#00c9c3; font-size:20px;" type="button-baby-corner" name="button">Visit</button></a>
      </div>
    </section>
  </div>
  <br><br><br><br><br>
  <!-- End of the parallax -->



  <!-- carousel -->


  <div class="container-fluid mt-5 text-start " >
  <h1 class='display-2 m-3 text-dark'>Mens Blazer's</h1>
  <section class="sectionglas my-5 mx-lg-5" style="">
    <div class="container-fluid shadow text-center  py-lg-5 " >
      <div class="container-fluid text-center">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-12 mt-5 dressimg">
            <img src="images/thumb1.jpg" class="owl-banner d-inline-block dressimg" type='q1' alt="">
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12 mt-5 dressimg">
            <img src="images/thumb3.jpg" class="owl-banner d-inline-block dressimg d-none d-md-block" type='54' alt="">
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12 mt-5 dressimg">
            <img src="images/thumb2.jpg" class="owl-banner d-inline-block dressimg d-none" type='54' alt="">
          </div>
        </div>
      </div>






      <div class="row pt-3">
        <div class="owl-carousel owl-theme">

          <?php
          include '../con.php';
          $query = "SELECT id, image, name FROM product_table WHERE display='owl-carousel' AND status='selling' AND stock > 0";
          $result = $conn->query($query);

          if ($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
              ?>
              <div class="item dressimgcaro lightboxsupport" id='<?php echo $row['id'] ?>'>
                <div class="card border-0">
                  <img src="../<?php echo $row['image'] ?>" class="card-img-top">

                </div>
              </div>

              <?php
            }
          }



          ?>





        </div>
      </div>
    </div>
  </section>
  </div>


  <div class="container my-5">

    <div class="row">




      <?php
      include '../con.php';
      $query = "SELECT id, image, name, price FROM product_table WHERE display='grid' AND status='selling'  AND stock > 0";
      $result = $conn->query($query);

      if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
          ?>


          <div class="col-md-3 col-sm-6 mt-5 col-6 " >
            <div class="product-grid shadow rounded">
              <div class="product-image">
                <a href="#">
                  <img class="pic-1" src="../<?php echo $row['image'] ?>">
                  <img class="pic-2" src="../<?php echo $row['image'] ?>">
                </a>
                <span class="product-trend-label">Trend</span>
                <span class="product-discount-label">-20%</span>
                <ul class="social">
                  <li><a data-tip="Add to Cart" class="add-cart" id='cart-<?php echo $row['id'] ?>'  data-pro-id='<?php echo $row['id'] ?>' ><i class="fa fa-shopping-cart"></i></a></li>
                  <li><a class="wish" data-tip="Wishlist" id='wish-<?php echo $row['id'] ?>' data-pro-id='<?php echo $row['id'] ?>'><i class="fa fa-heart"></i></a></li>

                  <li><a  class='lightboxsupport' id='<?php echo $row['id'] ?>' data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                </ul>
              </div>
              <div class="product-content px-3">
                <h3 class="title"><a href="#"><?php echo $row['name'] ?></a></h3>
                <div class="price discount"><span> </span> <?php echo $row['price'] ?> LKR</div>
              </div>
            </div>
          </div>




          <?php
        }
      }



      ?>





    </div>
  </div>

  <div class="container-fluid mt-5" style="background-color:#020016;">
    <!-- background-image:url('../bg-images/pattern-dot.png'); -->
    <div class="container offset-lg-2 py-5 text-white">
      <div class="row">
        <div class="col-lg-6 col-sm-11 text-start">
          <h1 class="display-6">Our Mission</h1>
          <p class="lead text-white">
            Our mission is to help nurture our future leaders, inventors and creative thinkers.
            We inspire the next generation to lead meaningful, happy and productive lives.
            We encourage all families to laugh,
            grow and play together because we know that making the world a better place for our children is the greatest legacy we can leave. </p>
          </div>


          <div class="col-lg-4 col-sm-11 text-start">
            <p><i class="fas fa-map-marker me-3 text-primary " ></i>344 Peradeniya Rd, Kandy 20000 </p>
            <p><i class="fas fa-phone me-3 text-primary" ></i>(+94) 77 788 8199</p>
            <p><i class="fas fa-envelope me-3 text-primary" ></i>bcas.kc.info@gmail.com</p>

            <?php
            if(isset($_SESSION['login']) && $_SESSION['login']){
              ?>
              <div class="input-group my-5 rounded-pill">
                <input type="text" class="form-control" id='feedbackinput' placeholder=" Feedback & Questions" aria-label="Recipient's username" aria-describedby="button-addon2">
                  <button class="btn btn-outline-danger" id='feedbacksubmit' type="button" id="button-addon2">Send</button>
              </div>

              <?php
            }else{

              ?>
              <div class="input-group my-5 rounded-pill">
                <input type="text" class="form-control" readonly placeholder="Login To send Feedback & Questions" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-primary disabled" type="button" id="button-addon2">Send</button>
              </div>

              <?php
            }


             ?>
             <div class="row text-end w-100">
               <div class="col-lg-12 col-md-12 text-end text-white">
                 <p  >All Rights Reserved &reg; Copyright GLiDE.Ceylon.launchs Ahzam  &copy; <span id='date' class='text-white'></span> - <span class='text-white' id='datefu'> </span </p>
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

        </div>
      </div>
    </div>



  </div>
  <div id='lightbox'>

  </div>

  </div>
</div>

<script>
$('.owl-carousel').owlCarousel({
  loop:true,
  margin:10,
  nav:true,
  autoplay: true,
  autoplayTimeout:2000,
  autoplayHoverPause:true,
  responsive:{
    0:{
      items:2
    },
    600:{
      items:3
    },
    1000:{
      items:5
    }
  }
});
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script src='js/home.js'> </script>
</body>


</html>
