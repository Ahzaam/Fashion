<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>View Product</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
  integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />




  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

  <style media="screen">

  * {
    box-sizing: border-box;

  }

  /* Position the image container (needed to position the left and right arrows) */
  .container {
    position: relative;
  }

  /* Hide the images by default */
  .mySlides {
    display: none;
  }

  /* Add a pointer when hovering over the thumbnail images */
  .cursor {
    cursor: pointer;
  }

  /* Next & previous buttons */
  .prev,
  .next {
    color: #000000;
    cursor: pointer;
    position: absolute;
    top: 40%;
    width: auto;
    padding: 16px;
    margin-top: -50px;

    font-weight: bold;
    font-size: 20px;
    border-radius: 0 3px 3px 0;
    user-select: none;
    -webkit-user-select: none;
  }

  /* Position the "next button" to the right */
  .next {
    right: 10px;
    border-radius: 3px 0 0 3px;
  }

  /* On hover, add a black background color with a little bit see-through */
  .prev:hover,
  .next:hover {
    background-color: rgba(0, 0, 0, 0.8);
  }

  /* Number text (1/3 etc) */
  .numbertext {
    color: #f2f2f2;
    font-size: 12px;
    padding: 8px 12px;
    position: absolute;
    top: 0;
  }

  /* Container for image text */
  .caption-container {
    text-align: center;
    background-color: #222;
    padding: 2px 16px;
    color: white;
  }

  .row:after {
    content: "";
    display: table;
    clear: both;
  }

  /* Six columns side by side */
  .column {
    float: left;
    width: 16.66%;
  }

  /* Add a transparency effect for thumnbail images */
  .demo {
    opacity: 0.6;
  }

  .active,
  .demo:hover {
    opacity: 1;
  }
  img {
    min-height:400px;
  }
  .dark{
    color: #000000 !important;
  }
</style>
</head>
<body>
  <?php

  include "../con.php";

  $pro_id = $_REQUEST['product'];


  $query = "SELECT * FROM product_table WHERE `id` = '$pro_id' && status = 'selling'" ;
  $rs = $conn->query($query);
  //
  if(mysqli_num_rows($rs)>0){

    $row = mysqli_fetch_assoc($rs);
    ?>
    <input readonly type="hidden" name="id" id='hiddenid' value="<?php echo $row['id'] ?>">




    <div class="container text-start my-5">

      <a type="button" class="text-start btn btn-light nav-link active m-lg-2 m-2 w-100 " onclick="history.back()">
        <i class="fa fa-arrow-left dark" aria-hidden="true"></i><span class="badge text-bg-secondary"></span>

      </a>
      <div class="row">

        <div class="mb-3 col-lg-5 offset-lg-1">
          <div class="container ">






            <!-- Full-width images with number text -->
            <div class="mySlides">
              <img src="../<?php echo $row['image'] ?>" style="width:100%">
            </div>
            <?php
            if(isset($row['moreimg']) && $row['moreimg'] != '') {
              $samples = explode('##', $row['moreimg']);

              foreach($samples as $src) {
                echo '<div class="mySlides">';
                echo '<div class="numbertext text-center"></div>';
                echo "<img src='../$src' class='col text-center w-100'  style=' border-radius:10px; ' alt='$src' id='img_prev'>";
                echo '</div>';
              }
              echo '<a class="prev" onclick="plusSlides(-1)">&#10094;</a>';
              echo '<a class="next" onclick="plusSlides(1)">&#10095;</a>';
            }
            ?>




          </div>

          <script type="text/javascript">
          let slideIndex = 1;
          showSlides(slideIndex);

          // Next/previous controls
          function plusSlides(n) {
            showSlides(slideIndex += n);
          }

          // Thumbnail image controls
          function currentSlide(n) {
            showSlides(slideIndex = n);
          }

          function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("demo");
            let captionText = document.getElementById("caption");
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
              slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
              dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
            captionText.innerHTML = dots[slideIndex-1].alt;
          }

        </script>



      </div>

      <div class="col-lg-5 offset-lg-1">
        <!-- Rating -->
        <div class="d-flex align-items-center small mb-2">
          <div class="text-warning mr-2">
            <small class="fas fa-star"></small>
            <small class="fas fa-star"></small>
            <small class="fas fa-star"></small>
            <small class="fas fa-star"></small>
            <small class="fas fa-star"></small>
          </div>
          <!-- <a class="js-go-to link-muted" href="#reviewSection"
          data-target="#reviewSection"
          data-compensation="#header"
          data-type="static">Read all 287 reviews</a> -->
        </div>
        <!-- End Rating -->

        <!-- Title -->
        <div class="mb-5">
          <h1 class="h3 font-weight-medium"><?php echo $row['name'] ?></h1>
          <p><?php echo $row['description'] ?></p>
        </div>
        <!-- End Title -->

        <!-- Price -->
        <div class="mb-5">
          <h2 class="font-size-1 text-secondary font-weight-medium mb-0">Total price:</h2>
          <span class="font-size-2 font-weight-medium"><?php echo $row['price'] ?> LKR</span>
          <span class="text-secondary ml-2"><del></del></span>
        </div>
        <!-- End Price -->

        <!-- Quantity -->
        <div class="border rounded py-2 px-3 mb-3">
          <div class="js-quantity row align-items-center">
            <div class="col-7">
              <small class="d-block text-secondary font-weight-medium">Available stock</small>
              <p><?php echo $row['stock'] ?></p>
            </div>

          </div>
        </div>
        <!-- End Quantity -->

        <!-- Quantity -->
        <div class="border rounded py-2 px-3 mb-3">
          <div class="js-quantity row align-items-center">
            <div class="col-7">
              <small class="d-block text-secondary font-weight-medium">Available Size</small>
              <p><?php echo $row['size'] ?></p>
            </div>

          </div>
        </div>
        <!-- End Quantity -->

        <!-- Accordion -->
        <div id="shopCartAccordion" class="accordion mb-5">

        </div>
        <!-- End Accordion -->

        <div class="mb-4">
          <button type="button" class="btn add-cart  btn-primary rounded-pill transition-3d-hover">Add to Cart</button>
          <button type="button" class="btn wish  btn-danger rounded-pill transition-3d-hover">Add to Wishlist</button>
        </div>


        <!-- Help Link -->
        <div class="media align-items-center">
          <span id="icon4" class="svg-preloader ie-height-48 w-50 max-width-6 mr-2">
            <i class="fa-solid fa-comments text-primary"></i>
            <span class="font-weight-medium mr-1">Need Help?</span>
          </span>
          <div class="media-body text-secondary small">
            <?php
            if(isset($_SESSION['login']) && $_SESSION['login']){
              ?>

              <div class="">
                <label for="exampleFormControlInput1"  class="form-label">Ask your Questions here an admministrator will reply you soon</label><br>
                <div class="input-group  rounded-pill">

                  <input type="text" class="form-control" id='feedbackinput' placeholder="Questions about this product" aria-label="Recipient's username" aria-describedby="button-addon2">
                  <button class="btn btn-primary" id='feedbacksubmit' type="button" id="button-addon2">Send</button>
                </div>
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

          </div>
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
        <!-- End Help Link -->
      </div>
      <!-- End Product Description -->
    </div>

    </div>






    <?php
  }else{
    echo '<div class="container position-relative ">
    <div class="my-5 position-absolute top-0 start-0">
    <a type="button" class="btn btn-light nav-link active m-lg-2 m-2 w-100 " onclick="history.back()">
    <i class="fa fa-arrow-left" aria-hidden="true"></i><span class="badge text-bg-secondary"></span>
    </a>
    </div>
    </div>';
    echo "<h1 class='display-1 text-danger text-center my-5'>Item Has Been Deleted</h1>";

  }

  ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
  integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src='js/view.js'>

  </script>
</body>
</html>
