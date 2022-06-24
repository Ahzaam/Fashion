<?php
session_start(); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <title>NZ-Fasions</title>

  <link rel="stylesheet" href="body.css">


  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
  integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
  integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- <link rel="stylesheet" href="../files/icon_css/all.css">
  <script defer src="../files/icon_js/all.js"></script> -->


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
  .card-img-top:hover{
    transition: 0.5s;
    opacity:1;
  }
  .card-img-top{
    transition: 0.5s;
    opacity:0.7;
  }

  .sectionglass {

    box-shadow: 0 0 1rem 0 rgba(0, 0, 0, .2);
    border-radius: 5px;
    position: relative;
    border-radius: 15px;
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
    box-shadow: inset 0 0 2000px rgba(0, 0, 0, 0.76);
    filter: blur(10px);
    margin: -20px;
  }
  .sectionglassdark {

    box-shadow: 0 0 1rem 0 rgba(0, 0, 0, .2);
    border-radius: 5px;
    position: relative;
    border-radius: 15px;
    z-index: 1;
    background: inherit;
    overflow: hidden;
  }

  .sectionglassdark:before {
    content: "";
    position: absolute;
    background: inherit;
    z-index: -1;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    box-shadow: inset 0 0 2000px rgba(0, 0, 0, 0.76);
    filter: blur(10px);
    margin: -20px;
  }
  .searchdesc {
    word-wrap: break-word;
  }
  #lightbox{
    position: fixed;
    z-index:1000;
    top: 0;

    width: 100%;
    max-width: 100%;
    height: 100%;
    background-color: rgba(69, 69, 69, 0.53);

    display: none;
  }

  #lightbox.active{
    display: flex;
    justify-content: center;
    align-items: center;
  }

  #lightbox img{
    border-radius:20px 20px 20px 20px ;
  }

  .bodydiv{
    margin: 0 15px 0 15px;
  }

  .dressimgsec{
    position: relative;
    cursor: pointer;
  }

  .divcentered{
    /* margin: 0 10px 0 10px; */
    transition:0.5s;
    position: absolute;
    height:100%;
    width: 96%;
    top: 50%;
    left: 50%;
    border-radius:20px 20px 20px 20px;
    transform: translate(-50%, -50%);
  }
  .centered2 {
    opacity:0;
    color:white;
    transition:0.5s;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
.dressimgsec:hover .divcentered{
  transition:0.5s;
  background-color: rgba(0, 0, 0, 0.69);
}

.dressimgsec:hover .centered2{
  transition:0.5s;
  opacity:1;
}


  /* img{
    border-radius:20px 20px 20px 20px;

  } */
  </style>

</head>


<body>



    <div class="container-fluid allcontain my-3">

      <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">NZ-Fasions</a>
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

                    <div>
                      <img src="images\woman-5461769_1280.jpg" class='mx-3' alt="Image">
                    </div>

                  </div>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="gallery.php">Gallery</a>
              </li>


            </ul>
            <form class="d-flex mx-lg-5 d-none d-lg-block" role="search">
              <div class=" row ">
                <div class="dropdown col-10 ">
                  <input class="form-control me-2 dropdown-toggle" type="search" id='searchinput' placeholder="Search"  aria-label="Search">
                  <ul class="dropdown-menu" style="width: 300px;" aria-labelledby="dropdownMenuButton1" id='searchresultsdropdown'>

                  </ul>

                </div>
                <div class="col-4 ">
                  <button class="btn btn-primary " type="submit" id="search">Search</button>
                </div>


              </div>
            </form>
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
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="images/sldimg2.jpg" type="sldimg" class="d-block "  alt="...">
              <div class="centered text-white sectionglass px-3 p-3 text-start">
                <h5 class="display-3" >
                  Babies Soft Toys</h5>
                  <p class="lead text-white">Soft and beautiful toys that suitable for under 3.</p>
                  <a href="#" class="btn btn-primary rounded-pill">Shop Now</a>
                </div>
              </div>

              <div class="carousel-item  w-flex">
                <img src="images\woman2.4.jpg" class="d-block"  alt="...">
                <div class="centered  text-start sectionglass px-2">
                  <h5 class="display-3 text-white">Best Dealers In Arabic CLothings</hh5>
                  <p class="lead  text-white my-lg-5">We have the best and the largest collection<br> of islamic womens cloths</p>
                  <!-- <button type="button1" class="btn btn-primary rounded-pill" name="button">Shop Now</button> -->
                  <a href="#" class="btn btn-primary rounded-pill">Shop Now</a>
                </div>
              </div>

              <div class="carousel-item" style="">
                <img src="images/sldimg1.jpg" class="d-block "  alt="...">
                <div class="centered p-3 text-white text-start sectionglass px-3">
                  <h5 class="display-3" >First slide label</h5>
                  <p class="lead ">Some representative placeholder <br>content for the first slide.</p>
                  <a href="#" class="btn btn-primary rounded-pill">Shop Now</a>
                </div>
              </div>




              <div class="carousel-item">
                <img src="images/t-shirts.jpg" class="d-block "  alt="...">
                <div class="centered p-3 text-start sectionglassdark  px-3">
                  <h5 class="display-1 text-white">Best Collection Of T-Shirts</h5>
                  <p class="lead text-white  ">Elegance is always in style for men. There are all different kinds of elegance.<br> It can be silk, it can be a T-shirt.</p>
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

        <!-- End of the Slide -->



        <div class="container-fluid mt-5" style="text-align:center;" style="max-width:2000px;">
          <div class="row">
            <div class="col-lg-4 col-md-12 d-inline-block position-relative mt-5">
              <div class=" d-inline-block">
                <img src="images/easy-return.jpg" class='w-100' alt="">
                <!-- <h2 class=" mt-5 ">Exclusive collection</h1> -->
                  <!-- <p class="text-muted mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, </p> -->
                </div>
              </div>

  <!--
              <div class="d-none d-lg-inline-block overflow-auto mx-lg-4" >
                <img src="images\divi.png" class="" alt="">
              </div> -->

              <div class="col-lg-4  col-md-12 d-inline-block position-relative  mt-5">
                <div class=" d-inline-block">
                  <img src="images/replacement.jpg" class='w-100' alt="">
                  <!-- <h2 class="mt-5">Happiness </h1> -->
                    <!-- <p class="text-muted mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, </p> -->
                  </div>
                </div>
  <!--
                <div class="	d-none d-lg-inline-block overflow-auto mx-lg-4">
                  <img src="images\divi.png" class=".d-sm-none .d-md-block d-lg-block" alt="">
                </div> -->

                <div class="col-lg-4  col-md-12 d-inline-block position-relative   mt-5 ">
                  <div class=" d-inline-block">
                    <img src="images/free-shipping.jpg" class='w-100' alt="">
                    <!-- <h2 class="mt-5 ">Trending Toys</h1> -->
                      <!-- <p class="text-muted mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, </p> -->
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





              <div class="container-fluid" >
                <div class="row justify-content-center" >
                  <div class="add-image d-inline-block position-relative  col-lg-5 col-md-9 col-sm-12 col-10 mt-5 mx-4" style="background-image: linear-gradient(to right, #a8f6f9, #2cf8fe);">
                    <img src="images/add1.png"  alt="">
                    <div class="top-left">
                      <br>
                      <h2 type='1'>New Born <br>Baby essentials</h2>
                      <button type="button1" class="btn btn-primary" name="button">Shop Now</button>
                    </div>
                  </div>

                  <div class="add-image d-inline-block position-relative offset-lg-1 col-lg-5 col-md-9 col-sm-12 col-10 mt-5 mx-4" style="background-image: linear-gradient(to left, #fcccf6, #fa87eb);">
                    <img src="images/add2.png"   alt="">
                    <div class="top-left">
                      <br>
                      <h2 type='2'>Best collection of<br>Gift for babies  </h2>
                      <button type="button2" class="btn btn-primary" name="button">Shop Now</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- End of Dress -->
              <!-- carousel -->


              <div class="container-fluid mt-5 text-start " style="border-radius:20px;  background-image: background: #bdc3c7;  /* fallback for old browsers */
              background: -webkit-linear-gradient(to right, #2c3e50, #bdc3c7);  /* Chrome 10-25, Safari 5.1-6 */
              background: linear-gradient(to right, #2c3e50, #bdc3c7); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
              ">
              <h1 class='display-2 m-3 text-white'>Baby Clothes</h1>
              <section class="sectionglass my-5 mx-lg-5" style="opacity:; border-radius:10px;">
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
                      $query = "SELECT id, image, name FROM product_table WHERE display='owl-carousel'";
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

                      <div class="item dressimgcaro lightboxsupport">
                        <div class="card border-0">
                          <img src="images\product-1.jpg" class="card-img-top">
                          <div class="card-body">

                          </div>
                        </div>
                      </div>

                      <div class="item dressimgcaro lightboxsupport">
                        <div class="card border-0">
                          <img src="images\product-2.jpg" class="card-img-top">
                          <div class="card-body">

                          </div>
                        </div>
                      </div>

                      <div class="item dressimgcaro lightboxsupport">
                        <div class="card border-0">
                          <img src="images\product-3.jpg" class="card-img-top">
                          <div class="card-body ">

                          </div>
                        </div>
                      </div>

                      <div class="item dressimgcaro lightboxsupport">
                        <div class="card border-0">
                          <img src="images\product-4.jpg" class="card-img-top">
                          <div class="card-body">

                          </div>
                        </div>
                      </div>

                      <div class="item dressimgcaro lightboxsupport">
                        <div class="card border-0">
                          <img src="images\product-5.jpg" class="card-img-top">
                          <div class="card-body">

                          </div>
                        </div>
                      </div>

                      <div class="item dressimgcaro lightboxsupport">
                        <div class="card border-0">
                          <img src="images\product-6.jpg" class="card-img-top">
                          <div class="card-body">

                          </div>
                        </div>
                      </div>

                      <div class="item dressimgcaro lightboxsupport">
                        <div class="card border-0">
                          <img src="images\product-7.jpg" class="card-img-top">
                          <div class="card-body">

                          </div>
                        </div>
                      </div>

                      <div class="item dressimgcaro lightboxsupport">
                        <div class="card border-0">
                          <img src="images\product-8.jpg" class="card-img-top">
                          <div class="card-body">

                          </div>
                        </div>
                      </div>

                      <div class="item dressimgcaro lightboxsupport">
                        <div class="card border-0">
                          <img src="images\product-9.jpg" class="card-img-top">
                          <div class="card-body">

                          </div>
                        </div>
                      </div>


                      <div class="item dressimgcaro lightboxsupport">
                        <div class="card border-0">
                          <img src="images\product-10.jpg" class="card-img-top">
                          <div class="card-body">

                          </div>
                        </div>
                      </div>


                      <div class="item dressimgcaro lightboxsupport">
                        <div class="card border-0">
                          <img src="images\product-11.jpg" class="card-img-top">
                          <div class="card-body">

                          </div>
                        </div>
                      </div>


                      <div class="item dressimgcaro lightboxsupport">
                        <div class="card border-0">
                          <img src="images\product-12.jpg" class="card-img-top">
                          <div class="card-body">

                          </div>
                        </div>
                      </div>


                      <div class="item dressimgcaro lightboxsupport">
                        <div class="card border-0">
                          <img src="images\product-13.jpg" class="card-img-top">
                          <div class="card-body">

                          </div>
                        </div>
                      </div>


                      <div class="item dressimgcaro lightboxsupport">
                        <div class="card border-0">
                          <img src="images\product-14.jpg" class="card-img-top">
                          <div class="card-body">

                          </div>
                        </div>
                      </div>


                      <div class="item dressimgcaro lightboxsupport">
                        <div class="card border-0">
                          <img src="images\product-15.jpg" class="card-img-top">
                          <div class="card-body">

                          </div>
                        </div>
                      </div>


                      <div class="item dressimgcaro lightboxsupport">
                        <div class="card border-0">
                          <img src="images\product-16.jpg" class="card-img-top">
                          <div class="card-body">

                          </div>
                        </div>
                      </div>


                      <div class="item dressimgcaro lightboxsupport">
                        <div class="card border-0">
                          <img src="images\product-17.jpg" class="card-img-top">
                          <div class="card-body">

                          </div>
                        </div>
                      </div>


                      <div class="item dressimgcaro lightboxsupport">
                        <div class="card border-0">
                          <img src="images\product-18.jpg" class="card-img-top">
                          <div class="card-body">

                          </div>
                        </div>
                      </div>


                      <div class="item dressimgcaro lightboxsupport">
                        <div class="card border-0">
                          <img src="images\product-19.jpg" class="card-img-top">
                          <div class="card-body">

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




                <?php
                include '../con.php';
                $query = "SELECT id, image, name, price FROM product_table WHERE display='grid'";
                $result = $conn->query($query);

                if ($result->num_rows > 0){
                  while ($row = $result->fetch_assoc()){
                    ?>


                    <div class="col-md-3 col-sm-6 mt-5 col-6 lightboxsupport" id='<?php echo $row['id'] ?>'>
                      <div class="product-grid shadow rounded">
                        <div class="product-image">
                          <a href="#">
                            <img class="pic-1" src="../<?php echo $row['image'] ?>">
                            <img class="pic-2" src="../<?php echo $row['image'] ?>">
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
                          <h3 class="title"><a href="#"><?php echo $row['name'] ?></a></h3>
                          <div class="price discount"><span> </span> <?php echo $row['price'] ?> LKR</div>
                        </div>
                      </div>
                    </div>




                    <?php
                  }
                }



                ?>



                <div class="col-md-3 col-sm-6 mt-5 col-6">
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
                      <div class="price discount"><span>$21.00</span> $ 15.99</div>
                    </div>
                  </div>
                </div>




                <div class="col-md-3 col-sm-6 mt-5 col-6">
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

                <div class="col-md-3 col-sm-6 mt-5 col-6">
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

                <div class="col-md-3 col-sm-6 mt-5 col-6">
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

                <div class="col-md-3 col-sm-6 mt-5 col-6">
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


                <div class="col-md-3 col-sm-6 mt-5 col-6">
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

                <div class="col-md-3 col-sm-6 mt-5 col-6">
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

                <div class="col-md-3 col-sm-6 mt-5 col-6">
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

            <div class="container-fluid mt-5" style="background-color:#8cfffc;">//background-image:url('../bg-images/pattern-dot.png');
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
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Feed Back" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-secondary" type="button" id="button-addon2">Button</button>
                      </div>
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
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
            integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script src='home.js'> </script>
          </body>


          </html>
