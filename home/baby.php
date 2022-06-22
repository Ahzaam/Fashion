<?php
session_start(); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>

    <meta charset="utf-8">
    <title>MegaTrons</title>
    <link rel="stylesheet" href="../home/nav_style.css">
    <link rel="stylesheet" href="body.css">


    <!-- Font Awesome -->
    <link rel="stylesheet" href="../files/icon_css/all.css">
    <script defer src="../files/icon_js/all.js"></script>


    <!-- owl carousel -->
    <script src="../files/owl-carousel/jquery-3.6.0.js"></script>
    <script src="../files/owl-carousel/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="../files/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="../files/owl-carousel/carousel.css">

    <!-- bootstrap -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../files/css/bootstrap.css">
    <script type="text/javascript" src="../files/js/bootstrap.bundle.js"></script>

    <!-- Grid -->
    <link rel="stylesheet" href="../files/grid/grid.css">
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
    </style>

  </head>


  <body>

      <nav class="navbar navbar-expand-lg navbar-light bg-light" style="">

  <div class="container-fluid" >

        <a href="#" >
          <img src="../bg-images/logo.png" style="" type="logo" alt=""><span class="logo-txt d-none d-lg-inline-block d-md-inline-block" style="color:#00f7ff; margin-left:20px;">Mega</span>
          <span class="logo-txt d-none d-lg-inline-block d-md-inline-block" style="color:#ff00e6;">Trons</span>
         </a>


    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"  data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon" ></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item activenav ms-5">
          <a class="nav-link " aria-current="page" href="../home.php">Home</a>
        </li>
        <li class="nav-item ms-5" ><!--style="background:linear-gradient(90deg, #0affda, #ff71e4);border-radius:25px;"-->
          <a class="nav-link activenavp" href="#">Baby Conner
          </a>
        </li>

        <li class="nav-item dropdown activenav ms-5">
          <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Drop Down
          </a>
          <ul class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>

        <li class="nav-item activenav ms-5">
          <a class="nav-link " href="#">Pricing</a>
        </li>
        <a href="../login/login.php?page=../baby-corner"><button class="btn btn-outline-success btn-lg ms-5 "  style="<?php echo ($_SESSION['login'])?'display:none;':''; ?> width:180px;" type="submit">Login</button></a>

                <?php
                if($_SESSION['login']){

                  ?>

                          <li class="nav-item dropdown ms-5" style="border:4px solid #75ffea ; ">
                            <a class="nav-link " href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style='color:#ff00e6;font-size:24px; text-align:center; '>
                              <?php echo ucfirst($_SESSION['uname']) ?>
                            </a>
                            <ul class="dropdown-menu " style="background-color:rgba(255, 245, 255, 0.9);" aria-labelledby="navbarDropdownMenuLink">
                              <!--  -->

                              <?php
                                if($_SESSION['profile'] == NULL){
                                  $arr = str_split($_SESSION['uname']);
                                  ?>

                                    <li style="background-color:rgba(5, 255, 0, 0.6);margin:auto; width: 80px;height:80px;padding-top:12px; border-radius:40px; text-align:center;margin-bottom: 20px;"> <a href="../profile"><h1><?php echo strtoupper($arr[0]) ;?></h1></a></li>
                                  <?php
                                }else{
                                  ?>

                                  <li > <a href="../profile"><img    type="profile" src="../profile/<?php echo $_SESSION['profile'] ?>" alt="<?php echo $_SESSION['profile'] ?>" class="dropdown-item"></a> <li>

                                    <?php
                                }

                               ?>

                              <li><a class="dropdown-item" style="color:black; font-size:12px;"href="http://gmail.com?email=<?php echo  $_SESSION['email'];?>"><?php echo $_SESSION['email'] ?></a></li>
                              <li><a class="dropdown-item" style="color:red;"href="../login/logout.php?page=../baby-corner/">Logout</a></li>

                            </ul>
                          </li>


                  <?php
                }
                 ?>

      </ul>
      <br><br><br>

      <br><br>
    </div>
  </div>
</nav>

<!-- End of the Navbar -->


<div class="container-fluid d-xl-flex justify-content-center">
  <div id="carouselExampleIndicators" class="carousel slide w-100" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/sldimg2.jpg" type="sldimg" class="d-block "  alt="...">
          <div class="centered text-white text-start">
            <h5 class="display-3" >
      Best Babies <br>Soft Toys</h5>
            <p class="lead">Some representative placeholder <br>content for the first slide.</p>
          </div>
      </div>
      <div class="carousel-item" style="">
        <img src="images/sldimg1.jpg" class="d-block "  alt="...">
        <div class="centered text-white text-start">
          <h5 class="display-3" >First slide label</h5>
          <p class="lead">Some representative placeholder <br>content for the first slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/sldimg3.jpg" class="d-block "  alt="...">
        <div class="centered  text-start">
          <h5 class="display-3">First slide label</h5>
          <p class="lead text-dark">Some representative placeholder <br> content for the first slide.</p>
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

<!-- End of the Slide -->



<div class="container-fluid mt-5" style="text-align:center;" style="max-width:2000px;">
    <div class="col-lg-3 col-md-12 d-inline-block position-relative mt-5">
      <div class="option d-inline-block">
        <img src="images/about1.png" alt="">
        <h2 class=" mt-5 ">Exclusive collection</h1>
        <p class="text-muted mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, </p>
      </div>
    </div>


    <div class="d-none d-lg-inline-block overflow-auto mx-lg-4" >
        <img src="images\divi.png" class="" alt="">
    </div>

    <div class="col-lg-3  col-md-12 d-inline-block position-relative  mt-5">
      <div class="option d-inline-block">
        <img src="images/about3.png" alt="">
        <h2 class="mt-5">Happiness </h1>
        <p class="text-muted mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, </p>
      </div>
    </div>

    <div class="	d-none d-lg-inline-block overflow-auto mx-lg-4">
        <img src="images\divi.png" class=".d-sm-none .d-md-block d-lg-block" alt="">
          </div>

    <div class="col-lg-3  col-md-12 d-inline-block position-relative   mt-5 ">
      <div class="option d-inline-block">
        <img src="images/about2.png" alt="">
        <h2 class="mt-5 ">Trending Toys</h1>
        <p class="text-muted mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, </p>
    </div>

  </div>
</div>
<!-- End of Feature -->
<div class="container-fluid" >
  <div class="row justify-content-center" >
    <div class="add-image d-inline-block position-relative  col-lg-5 col-md-9 col-sm-12 col-10 mt-5 mx-4" style="background-image: linear-gradient(to right, #a8f6f9, #2cf8fe);">
      <img src="images/add1.png"  alt="">
      <div class="top-left">
        <br>
        <h2 type='1'>New Born <br>Baby essentials</h2>
        <button type="button1" name="button">Shop Now</button>
      </div>
    </div>

    <div class="add-image d-inline-block position-relative offset-lg-1 col-lg-5 col-md-9 col-sm-12 col-10 mt-5 mx-4" style="background-image: linear-gradient(to left, #fcccf6, #fa87eb);">
      <img src="images/add2.png"   alt="">
      <div class="top-left">
        <br>
        <h2 type='2'>Best collection of<br>Gift for babies  </h2>
        <button type="button2" name="button">Shop Now</button>
      </div>
    </div>
  </div>
</div>

  <!-- End of Dress -->
<!-- carousel -->


<div class="container-fluid mt-5">
  <section class="">
    <div class="container-fluid shadow text-center  py-lg-5 " >
      <div class="container-fluid text-center">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-12 mt-5">
            <img src="images/thumb1.jpg" class="owl-banner d-inline-block" type='q1' alt="">
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12 mt-5">
            <img src="images/thumb3.jpg" class="owl-banner d-inline-block" type='54' alt="">
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12 mt-5">
            <img src="images/thumb2.jpg" class="owl-banner d-inline-block" type='54' alt="">
          </div>
        </div>
      </div>
      <div class="row pt-3">
        <div class="owl-carousel owl-theme">

           <div class="item">
            <div class="card border-0">
              <img src="images\product-1.jpg" class="card-img-top">
              <div class="card-body">
                <a href="../home/view.php?id=0<?php //echo $row['item-id']?>" style="padding:0 40px;  " data-tip="Wishlist" class="cancel btn btn-info btn-block text-white w-100 "><i class="fa fa-search"></i> View  </a>
              </div>
            </div>
          </div>

          <div class="item">
           <div class="card border-0">
             <img src="images\product-2.jpg" class="card-img-top">
             <div class="card-body">
               <a href="../home/view.php?id=0<?php //echo $row['item-id']?>" style="padding:0 40px;  " data-tip="Wishlist" class="cancel btn btn-info btn-block text-white w-100 "><i class="fa fa-search"></i> View  </a>
             </div>
           </div>
         </div>

         <div class="item">
          <div class="card border-0">
            <img src="images\product-3.jpg" class="card-img-top">
            <div class="card-body ">
              <a href="../home/view.php?id=0<?php //echo $row['item-id']?>" style="padding:0 40px;  " data-tip="Wishlist" class="cancel btn btn-info btn-block text-white w-100 "><i class="fa fa-search"></i> View  </a>
            </div>
          </div>
        </div>

        <div class="item">
         <div class="card border-0">
           <img src="images\product-4.jpg" class="card-img-top">
           <div class="card-body">
             <a href="../home/view.php?id=0<?php //echo $row['item-id']?>" style="padding:0 40px;  " data-tip="Wishlist" class="cancel btn btn-info btn-block text-white w-100 "><i class="fa fa-search"></i> View  </a>
           </div>
         </div>
       </div>

       <div class="item">
        <div class="card border-0">
          <img src="images\product-5.jpg" class="card-img-top">
          <div class="card-body">
            <a href="../home/view.php?id=0<?php //echo $row['item-id']?>" style="padding:0 40px;  " data-tip="Wishlist" class="cancel btn btn-info btn-block text-white w-100 "><i class="fa fa-search"></i> View  </a>
          </div>
        </div>
      </div>

      <div class="item">
       <div class="card border-0">
         <img src="images\product-6.jpg" class="card-img-top">
         <div class="card-body">
           <a href="../home/view.php?id=0<?php //echo $row['item-id']?>" style="padding:0 40px;  " data-tip="Wishlist" class="cancel btn btn-info btn-block text-white w-100 "><i class="fa fa-search"></i> View  </a>
         </div>
       </div>
     </div>

     <div class="item">
      <div class="card border-0">
        <img src="images\product-7.jpg" class="card-img-top">
        <div class="card-body">
          <a href="../home/view.php?id=0<?php //echo $row['item-id']?>" style="padding:0 40px;  " data-tip="Wishlist" class="cancel btn btn-info btn-block text-white w-100 "><i class="fa fa-search"></i> View  </a>
        </div>
      </div>
    </div>

    <div class="item">
     <div class="card border-0">
       <img src="images\product-8.jpg" class="card-img-top">
       <div class="card-body">
         <a href="../home/view.php?id=0<?php //echo $row['item-id']?>" style="padding:0 40px;  " data-tip="Wishlist" class="cancel btn btn-info btn-block text-white w-100 "><i class="fa fa-search"></i> View  </a>
       </div>
     </div>
   </div>

    <div class="item">
     <div class="card border-0">
       <img src="images\product-9.jpg" class="card-img-top">
       <div class="card-body">
         <a href="../home/view.php?id=0<?php //echo $row['item-id']?>" style="padding:0 40px;  " data-tip="Wishlist" class="cancel btn btn-info btn-block text-white w-100 "><i class="fa fa-search"></i> View  </a>
       </div>
     </div>
   </div>


    <div class="item">
     <div class="card border-0">
       <img src="images\product-10.jpg" class="card-img-top">
       <div class="card-body">
         <a href="../home/view.php?id=0<?php //echo $row['item-id']?>" style="padding:0 40px;  " data-tip="Wishlist" class="cancel btn btn-info btn-block text-white w-100 "><i class="fa fa-search"></i> View  </a>
       </div>
     </div>
   </div>


    <div class="item">
     <div class="card border-0">
       <img src="images\product-11.jpg" class="card-img-top">
       <div class="card-body">
         <a href="../home/view.php?id=0<?php //echo $row['item-id']?>" style="padding:0 40px;  " data-tip="Wishlist" class="cancel btn btn-info btn-block text-white w-100 "><i class="fa fa-search"></i> View  </a>
       </div>
     </div>
   </div>


    <div class="item">
     <div class="card border-0">
       <img src="images\product-12.jpg" class="card-img-top">
       <div class="card-body">
         <a href="../home/view.php?id=0<?php //echo $row['item-id']?>" style="padding:0 40px;  " data-tip="Wishlist" class="cancel btn btn-info btn-block text-white w-100 "><i class="fa fa-search"></i> View  </a>
       </div>
     </div>
   </div>


    <div class="item">
     <div class="card border-0">
       <img src="images\product-13.jpg" class="card-img-top">
       <div class="card-body">
         <a href="../home/view.php?id=0<?php //echo $row['item-id']?>" style="padding:0 40px;  " data-tip="Wishlist" class="cancel btn btn-info btn-block text-white w-100 "><i class="fa fa-search"></i> View  </a>
       </div>
     </div>
   </div>


    <div class="item">
     <div class="card border-0">
       <img src="images\product-14.jpg" class="card-img-top">
       <div class="card-body">
         <a href="../home/view.php?id=0<?php //echo $row['item-id']?>" style="padding:0 40px;  " data-tip="Wishlist" class="cancel btn btn-info btn-block text-white w-100 "><i class="fa fa-search"></i> View  </a>
       </div>
     </div>
   </div>


    <div class="item">
     <div class="card border-0">
       <img src="images\product-15.jpg" class="card-img-top">
       <div class="card-body">
         <a href="../home/view.php?id=0<?php //echo $row['item-id']?>" style="padding:0 40px;  " data-tip="Wishlist" class="cancel btn btn-info btn-block text-white w-100 "><i class="fa fa-search"></i> View  </a>
       </div>
     </div>
   </div>


    <div class="item">
     <div class="card border-0">
       <img src="images\product-16.jpg" class="card-img-top">
       <div class="card-body">
         <a href="../home/view.php?id=0<?php //echo $row['item-id']?>" style="padding:0 40px;  " data-tip="Wishlist" class="cancel btn btn-info btn-block text-white w-100 "><i class="fa fa-search"></i> View  </a>
       </div>
     </div>
   </div>


    <div class="item">
     <div class="card border-0">
       <img src="images\product-17.jpg" class="card-img-top">
       <div class="card-body">
         <a href="../home/view.php?id=0<?php //echo $row['item-id']?>" style="padding:0 40px;  " data-tip="Wishlist" class="cancel btn btn-info btn-block text-white w-100 "><i class="fa fa-search"></i> View  </a>
       </div>
     </div>
   </div>


    <div class="item">
     <div class="card border-0">
       <img src="images\product-18.jpg" class="card-img-top">
       <div class="card-body">
         <a href="../home/view.php?id=0<?php //echo $row['item-id']?>" style="padding:0 40px;  " data-tip="Wishlist" class="cancel btn btn-info btn-block text-white w-100 "><i class="fa fa-search"></i> View  </a>
       </div>
     </div>
   </div>


    <div class="item">
     <div class="card border-0">
       <img src="images\product-19.jpg" class="card-img-top">
       <div class="card-body">
         <a href="../home/view.php?id=0<?php //echo $row['item-id']?>" style="padding:0 40px;  " data-tip="Wishlist" class="cancel btn btn-info btn-block text-white w-100 "><i class="fa fa-search"></i> View  </a>
       </div>
     </div>
   </div>




        </div>
      </div>
    </div>
  </section>
</div>


<div class="container my-5">

<div class="row">

    <div class="col-md-3 col-sm-6 mt-5">
        <div class="product-grid shadow rounded">
            <div class="product-image">
                <a href="#">
                    <img class="pic-1" src="items/shop-1.jpg">
                    <img class="pic-2" src="items/shop-1.jpg">
                </a>
                <span class="product-trend-label">Trend</span>
                <ul class="social">
                    <li><a data-tip="Add to Cart" class="add-cart"><i class="fa fa-shopping-cart"></i></a></li>
                    <li><a class="wish" data-tip="Wishlist"><i class="fa fa-heart"></i></a></li>
                    <li><a href="#" data-tip="Compare"><i class="fa fa-random"></i></a></li>
                    <li><a href="#" data-tip="Quick View"><i class="fa fa-search"></i></a></li>

                    <!-- <li><a data-tip="Add to Cart" class="add-cart"><i class="fa fa-shopping-cart"></i></a></li>
                    <li><a href="#" data-tip="Quick View"><i class="fa fa-ca"></i></a></li>
                    <li><a class="wish" data-tip="Wishlist"><i class="fa fa-heart"></i></a></li>
                    <li><a href="#" data-tip="Compare"><i class="fa fa-random"></i></a></li>
                    <li><a href="#" data-tip="Quick View"><i class="fa fa-search"></i></a></li> -->
                </ul>
            </div>
            <div class="product-content px-3">
                <h3 class="title"><a href="#">Men's Blazer</a></h3>
                <div class="price discount"><span>$21.00</span></div>
            </div>
        </div>
    </div>



    <div class="col-md-3 col-sm-6 mt-5">
        <div class="product-grid shadow rounded">
            <div class="product-image">
                <a href="#">
                    <img class="pic-1" src="items/shop-2.jpg">
                    <img class="pic-2" src="items/shop-2.jpg">
                </a>
                <span class="product-trend-label">Trend</span>
                <span class="product-discount-label">-20%</span>
                <ul class="social">
                    <li><a data-tip="Add to Cart" class="add-cart"><i class="fa fa-shopping-cart"></i></a></li>
                    <li><a class="wish" data-tip="Wishlist"><i class="fa fa-heart"></i></a></li>
                    <li><a href="#" data-tip="Compare"><i class="fa fa-random"></i></a></li>
                    <li><a href="#" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                </ul>
            </div>
            <div class="product-content px-3">
                <h3 class="title"><a href="#">Grey Rabit</a></h3>
                <div class="price discount"><span>1000LKR </span> 800LKR</div>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 mt-5">
        <div class="product-grid shadow rounded">
            <div class="product-image">
                <a href="#">
                    <img class="pic-1" src="items/shop-3.jpg">
                    <img class="pic-2" src="items/shop-3.jpg">
                </a>
                <span class="product-trend-label">Trend</span>
                <span class="product-discount-label">-10%</span>
                <ul class="social">
                    <li><a data-tip="Add to Cart" class="add-cart"><i class="fa fa-shopping-cart"></i></a></li>
                    <li><a class="wish" data-tip="Wishlist"><i class="fa fa-heart"></i></a></li>
                    <li><a href="#" data-tip="Compare"><i class="fa fa-random"></i></a></li>
                    <li><a href="#" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                </ul>
            </div>
            <div class="product-content px-3">
                <h3 class="title"><a href="#">Grey Moon</a></h3>
                <div class="price discount"><span>500LKR</span> 450LKR</div>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 mt-5">
        <div class="product-grid shadow rounded">
            <div class="product-image">
                <a href="#">
                    <img class="pic-1" src="items/shop-4.jpg">
                    <img class="pic-2" src="items/shop-4.jpg">
                </a>
                <span class="product-trend-label">Trend</span>
                <ul class="social">
                    <li><a data-tip="Add to Cart" class="add-cart"><i class="fa fa-shopping-cart"></i></a></li>
                    <li><a class="wish" data-tip="Wishlist"><i class="fa fa-heart"></i></a></li>
                    <li><a href="#" data-tip="Compare"><i class="fa fa-random"></i></a></li>
                    <li><a href="#" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                </ul>
            </div>
            <div class="product-content px-3">
                <h3 class="title"><a href="#">Men's Blazer</a></h3>
                <div class="price discount"><span>$21.00</span></div>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 mt-5">
        <div class="product-grid shadow rounded">
            <div class="product-image">
                <a href="#">
                    <img class="pic-1" src="items/shop-5.jpg">
                    <img class="pic-2" src="items/shop-5.jpg">
                </a>
                <span class="product-trend-label">Trend</span>
                <ul class="social">
                    <li><a data-tip="Add to Cart" class="add-cart"><i class="fa fa-shopping-cart"></i></a></li>
                    <li><a class="wish" data-tip="Wishlist"><i class="fa fa-heart"></i></a></li>
                    <li><a href="#" data-tip="Compare"><i class="fa fa-random"></i></a></li>
                    <li><a href="#" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                </ul>
            </div>
            <div class="product-content px-3">
                <h3 class="title"><a href="#">Men's Blazer</a></h3>
                <div class="price discount"><span>$21.00</span></div>
            </div>
        </div>
    </div>


    <div class="col-md-3 col-sm-6 mt-5">
        <div class="product-grid shadow rounded">
            <div class="product-image">
                <a href="#">
                    <img class="pic-1" src="items/shop-6.jpg">
                    <img class="pic-2" src="items/shop-6.jpg">
                </a>
                <span class="product-trend-label">Trend</span>
                <ul class="social">
                    <li><a data-tip="Add to Cart" class="add-cart"><i class="fa fa-shopping-cart"></i></a></li>
                    <li><a class="wish" data-tip="Wishlist"><i class="fa fa-heart"></i></a></li>
                    <li><a href="#" data-tip="Compare"><i class="fa fa-random"></i></a></li>
                    <li><a href="#" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                </ul>
            </div>
            <div class="product-content px-3">
                <h3 class="title"><a href="#">Men's Blazer</a></h3>
                <div class="price discount"><span>$21.00</span></div>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 mt-5">
        <div class="product-grid shadow rounded">
            <div class="product-image">
                <a href="#">
                    <img class="pic-1" src="items/shop-9.jpg">
                    <img class="pic-2" src="items/shop-9.jpg">
                </a>
                <span class="product-trend-label">Trend</span>
                <ul class="social">
                    <li><a data-tip="Add to Cart" class="add-cart"><i class="fa fa-shopping-cart"></i></a></li>
                    <li><a class="wish" data-tip="Wishlist"><i class="fa fa-heart"></i></a></li>
                    <li><a href="#" data-tip="Compare"><i class="fa fa-random"></i></a></li>
                    <li><a href="#" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                </ul>
            </div>
            <div class="product-content px-3">
                <h3 class="title"><a href="#">Men's Blazer</a></h3>
                <div class="price discount"><span>$21.00</span></div>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 mt-5">
        <div class="product-grid shadow rounded">
            <div class="product-image">
                <a href="#">
                    <img class="pic-1" src="items/shop-8.jpg">
                    <img class="pic-2" src="items/shop-8.jpg">
                </a>
                <span class="product-trend-label">Trend</span>
                <ul class="social">
                    <li><a data-tip="Add to Cart" class="add-cart"><i class="fa fa-shopping-cart"></i></a></li>
                    <li><a class="wish" data-tip="Wishlist"><i class="fa fa-heart"></i></a></li>
                    <li><a href="#" data-tip="Compare"><i class="fa fa-random"></i></a></li>
                    <li><a href="#" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                </ul>
            </div>
            <div class="product-content px-3">
                <h3 class="title"><a href="#">Men's Blazer</a></h3>
                <div class="price discount"><span>$21.00</span></div>
            </div>
        </div>
    </div>



  </div>
</div>

<div class="container-fluid mt-5" style="background-image:url('../bg-images/pattern-dot.png');background-color:#8cfffc;">
  <div class="container py-5">
    <div class="row">
      <div class="col-lg-3 col-sm-11 col-md-5">
        <h1 class="display-6">Our Mission</h1>
        <p class="lead">
          Our mission is to help nurture our future leaders, inventors and creative thinkers.
          We inspire the next generation to lead meaningful, happy and productive lives.
          We encourage all families to laugh,
          grow and play together because we know that making the world a better place for our children is the greatest legacy we can leave. </p>
      </div>
      <div class="col-lg-3 col-sm-11 col-md-5">
        <p><i class="fas fa-map-marker " style="color:red;font-size:16px;"></i>&nbsp&nbsp&nbsp218 Fifth Avenue, HeavenTower NewYork City </p>
        <p><i class="fas fa-phone" style="color:red;"></i>&nbsp&nbsp&nbsp(+68) 123 456 7890</p>
        <!-- <p><span style="color:red;">Email:&nbsp&nbsp&nbsp</span>Hot-Support@Dagon.com</p> -->
        <p><i class="fas fa-envelope" style="color:red;"></i>&nbsp&nbsp&nbspHot-Support@Dagon.com</p>
      </div>
      <div class="col-lg-3 col-sm-11 col-md-5">
        <h1 class="display-6">Our Mission</h1>
        <p class="lead">
          Our mission is to help nurture our future leaders, inventors and creative thinkers.
          We inspire the next generation to lead meaningful, happy and productive lives.
          We encourage all families to laugh,
          grow and play together because we know that making the world a better place for our children is the greatest legacy we can leave. </p>
      </div>
      <div class="col-lg-3 col-sm-11 col-md-5">
        <p><i class="fas fa-map-marker " style="color:red;font-size:16px;"></i>&nbsp&nbsp&nbsp218 Fifth Avenue, HeavenTower NewYork City </p>
        <p><i class="fas fa-phone" style="color:red;"></i>&nbsp&nbsp&nbsp(+68) 123 456 7890</p>
        <!-- <p><span style="color:red;">Email:&nbsp&nbsp&nbsp</span>Hot-Support@Dagon.com</p> -->
        <p><i class="fas fa-envelope" style="color:red;"></i>&nbsp&nbsp&nbspHot-Support@Dagon.com</p>
      </div>
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
          items:2
      },
      1000:{
          items:5
      }
  }
});
</script>
<script type="text/javascript" src="../files/addtocart.js"></script>
  </body>
</html>
<!--

 -->
