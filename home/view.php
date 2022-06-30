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
  .image_area {
    position: relative;
  }

  img {
    display: block;
    max-width: 100%;
  }

  .preview {
    overflow: hidden;
    width: 160px;
    height: 160px;
    margin: 10px;
    border: 1px solid red;
  }

  .modal-lg{
    /* max-width:400px !important; */
  }

  .overlay {
    position: absolute;
    bottom: 10px;
    left: 0;
    right: 0;
    background-color: rgba(255, 255, 255, 0.5);
    overflow: hidden;
    height: 0;
    transition: .5s ease;
    width: 100%;
  }

  .image_area:hover .overlay {
    height: 50%;
    cursor: pointer;
  }

  .text {
    color: #333;
    font-size: 20px;
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    text-align: center;
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

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary d-none" data-bs-toggle="modal" id='savechanges' data-bs-target="#exampleModal">

    </button>


    <div class="container position-relative ">
      <div class="my-5 position-absolute top-0 start-0">
        <a type="button" class="btn btn-light nav-link active m-lg-2 m-2 w-100 " onclick="history.back()">
          <i class="fa fa-arrow-left" aria-hidden="true"></i><span class="badge text-bg-secondary"></span>
        </a>
      </div>
    </div>
    <br><br>



    <div class="container my-5">



      <div class="">
        <h1 class='display-6'> Item  No: <?php echo $row['id'] ?></h1>
        <input readonly type="hidden" name="id" id='hiddenid' value="<?php echo $row['id'] ?>">
      </div>



        <div class="row">

          <div class="mb-3 col-lg-5">
            <!-- <label for="exampleFormControlInput1" class="form-label">Images</label> -->
            <!-- <input readonly type="file" class="form-control d-none "  required id="upload_image" > -->
            <!-- <input readonly type="hidden" id='hiddeninputimg'  name="my_image" value=""> -->
            <div class="  " style=' cursor: pointer;' id='uploadimgicon'>
              <div class="text-start ">
                <img src="../<?php echo $row['image'] ?>" class=' text-center' style='max-height:400px; border-radius:10px;' alt="Image" id='img_prev'>
                <div class="row row-cols-4" id='resdiv'>
                  <?php
                  if(isset($row['moreimg'])){
                    $samples = explode('##', $row['moreimg']);

                    foreach($samples as $src) {
                      echo "<img src='../$src' class='col text-center' style=' border-radius:10px;' alt='$src' id='img_prev'>";
                    }


                  }
                  ?>
                </div>
              </div>

            </div>

          </div>

          <div class="mb-3 col-lg-7 ">
            <div class="">
              <label for="exampleFormControlInput1" class="form-label">Name: <?php echo $row['name'] ?></label>
              <br>
              <label for="exampleFormControlTextarea1" class="form-label">About Product : <?php echo $row['description'] ?></label>
              <br>
              <label for="exampleFormControlInput1" class="form-label">Price: <?php echo $row['price'] ?>LKR</label>
              <br>

              <div class="row">
                <label for="exampleFormControlInput1" class="form-label col-2">Color</label>
                <input readonly type="color" class="form-control deafultinput col-3 w-25" data-prev-data='<?php echo $row['colors'] ?>' value="<?php echo $row['colors'] ?>" name='color'  id="exampleFormControlInput1">

              </div>
            </div>
            <div class="">
              <label for="exampleFormControlTextarea1" class="form-label">Category: <?php echo $row['category'] ?> </label>


            </div>

            <div class="">
              <label for="exampleFormControlInput1" class="form-label">Size: <?php echo $row['size'] ?></label>


            </div>




            <div class="">
              <label for="exampleFormControlInput1"  class="form-label">Stock: <?php echo $row['stock'] ?></label>

            </div>

                      <?php
                      if(isset($_SESSION['login']) && $_SESSION['login']){
                        ?>

                        <div class="my-5">
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
            console.log(year)
          </script>
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
