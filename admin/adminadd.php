<?php
  require('pageauth.php')
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Add Product</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>
  <script defer src="https://unpkg.com/dropzone"></script>
  <script defer src="https://unpkg.com/cropperjs"></script>


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
  $outofstock = "SELECT * FROM product_table WHERE stock <= 0";
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

  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary d-none" data-bs-toggle="modal" id='savechanges' data-bs-target="#exampleModal">

</button>


  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Success</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Item Added Successfully
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
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
          Out Of Stock
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            <?php echo $ofs; ?>
            <span class="visually-hidden">outofstock</span>
          </span>
        </a>

        <!-- <a class="nav-link active " href="#">Comments and Feedback</a> -->
        <a type="button" class="nav-link  active m-lg-2 m-2 w-100 position-relative" href="comments.php">
          Feedback
          <span class="position-absolute  <?php echo $display ?> top-0 start-100 translate-middle badge rounded-pill bg-danger">
            <?php echo $comments; ?>
            <span class="visually-hidden">Unread</span>
          </span>
        </a>






        <a type="button" class="nav-link active m-lg-2 m-2 w-100 position-relative" href="adminadd.php">
          <strong>Add Product</strong>
        </a>
      </ul>
    </div>


    <form class="from" action="api/add.php" method="post" enctype="multipart/form-data">
      <div class="row">

        <div class="mb-3 col-lg-5">
          <label for="exampleFormControlInput1" class="form-label">Name</label>
          <input type="text" class="form-control" name='name' id="exampleFormControlInput1" required placeholder="Name">

          <label for="exampleFormControlInput1" class="form-label">Price(LKR)</label>
          <input type="number" class="form-control" name='price' id="exampleFormControlInput1" required placeholder="1000 LKR">

          <label for="exampleFormControlInput1" class="form-label">Color</label>
          <input type="color" class="form-control" name='color'  id="exampleFormControlInput1">
        </div>

        <div class="mb-3 col-lg-7">
          <div class="">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" name='description' required id="exampleFormControlTextarea1" rows="7"></textarea>
          </div>
        </div>




      </div>

      <div class="row">

        <div class="mb-3 col-lg-5">
          <label for="exampleFormControlInput1" class="form-label">Images</label>
          <input type="file" class="form-control"  required id="upload_image" >
          <input type="hidden" id='hiddeninputimg'  name="my_image" value="">
          <div class="  " style=' cursor: pointer;' id='uploadimgicon'>
            <div class="text-start m-lg-5 m-2">
              <img src="../home/images/uploadpng.png" class=' text-center' style='max-height:300px; border-radius:10px;' alt="Image" id='img_prev'>
              <div class="d-none" id='resdiv'>
                <p class=''>Resolution <span id='resolution'></span> </p>
              </div>
            </div>

          </div>

        </div>

        <div class="mb-3 col-lg-7 ">
          <div class="">
            <label for="exampleFormControlTextarea1" class="form-label">Category </label>
            <select class="form-select" name='category' aria-label="Default select example" required>
              <option selected value="none">--Select Category --</option>
              <option value="Mens Dress">Mens Dress</option>
              <option value="Womens Dress">Womens Dress</option>
              <option value="Kids Toy" >Kids Toy</option>
              <option value="Kids Dress" >Kids Dress</option>
              <option value="Teens Dress" >Teens Dress</option>
              <option value="Kids Toys" >Kids Toys</option>
              <option value="Mens Accesorie" >Mens Accesorie</option>
              <option value="Womens Accesorie" >Womens Accesorie</option>
              <!-- <option value="Kids" ></option> -->
              <option value="Kids" >Kids Toy</option>
            </select>
          </div>

          <div class="">
            <label for="exampleFormControlInput1" class="form-label">Size</label>
            <input type="text" class="form-control" name='size' id="exampleFormControlInput1" placeholder="S, M, L, XL ">
            <p class="text-success" style="font-size:12px;">You can add multiple sizes with comma separated</p>
          </div>




          <div class="">
            <label for="exampleFormControlInput1" class="form-label">Stock</label>
            <input type="number" class="form-control" name='stock' required id="exampleFormControlInput1" placeholder="120">
          </div>

          <div class="">
            <label for="exampleFormControlTextarea1" class="form-label">Display </label>
            <select class="form-select" name='display' aria-label="Default select example">
              <option selected value="none">None</option>
              <option value="owl-carousel">Owl Carousel</option>
              <option value="grid" >Grid</option>

            </select>
          </div>


          <div class="row">
            <div class="mb-3 col-lg-5 my-3">
              <label for="exampleFormControlInput1" class="form-label">Status</label>
              <select name='status' class="form-select" aria-label="Default select example">
                <option selected value='selling'>Selling</option>
                <option value="stopped">Stopped</option>

              </select>
            </div>
            <div class="mb-3 col-lg-7 my-4">
              <label for="exampleFormControlInput1" class="form-label"></label><br>

                <button type="submit" class='btn btn-primary w-100' name='submit'>Save</button>

              </select>
            </div>

          </div>
        </div>
      </div>
    </form>

  </div>







<!--
  <div class="image_area">
    <form method="post">
      <label for="upload_image">
        <img src="upload/user.png" id="uploaded_image" class="img-responsive img-circle" />
        <div class="overlay">
          <div class="text">Click to Change Profile Image</div>
        </div>
        <input type="file" name="image" class="image" id="upload_image" style="display:none" />
      </label>
    </form>
  </div> -->

  <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">

        <div class="modal-body">
          <div class="img-container">

              <div class="w-100">
                <img src="" style='min-width:300px;' id="sample_image" />
              </div>
              <div class="col-md-4">
                <div class="preview"></div>
              </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="crop" class="btn btn-primary">Crop</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>

  </div>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      <?php if(isset($_REQUEST['suc'])){
        $suc = $_REQUEST['suc'];
        echo "let val = ". $suc. ";";
      } else{
        echo "let val = 0;";
      }

      ?>

      if(val == 1){
        $('#savechanges').click()
      }
    })
  </script>
  <script src='js/adminadd.js'></script>


</body>
</html>
