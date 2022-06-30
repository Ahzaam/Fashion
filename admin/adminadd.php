<?php
require('pageauth.php')
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Add Product</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link defer href="js/cropper.css" rel="stylesheet"/>
  <script defer src="js/cropper.js"></script>
  <script defer src="js/cropperjs.js"></script>



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
          <?php if(isset($_REQUEST['suc']) && isset($_REQUEST['error'])){
            $suc = $_REQUEST['error'];
            echo $suc;
          }

          ?>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
  </div>
  <div class="container position-relative ">
    <div class="my-5 position-absolute top-0 start-0">
      <a type="button" class="btn btn-light nav-link active m-lg-2 m-2 w-100 " href="admin.php">
        <i class="fa fa-arrow-left" aria-hidden="true"></i><span class="badge text-bg-secondary"></span>
      </a>
    </div>
  </div>
  <br><br>
  <div class="container   my-5">



    <form class="from my-5" action="api/add.php" method="post" enctype="multipart/form-data">
      <div class="row">

        <div class="mb-3 col-lg-4">
          <label for="exampleFormControlInput1" class="form-label">Name</label>
          <input type="text" class="form-control" name='name' id="exampleFormControlInput1" required placeholder="Name">


        </div>

        <div class="mb-3 col-lg-4">
          <label for="exampleFormControlInput1" class="form-label">Price(LKR)</label>
          <input type="number" class="form-control" name='price' id="exampleFormControlInput1" required placeholder="1000 LKR">


        </div>
        <div class="mb-3 col-lg-4">

          <label for="exampleFormControlInput1" class="form-label">Color</label>
          <input type="color" class="form-control" name='color'  id="exampleFormControlInput1">
        </div>



      </div>

      <div class="row">

        <div class="mb-3 col-lg-5">
          <label for="exampleFormControlInput1" class="form-label">Display Image</label>
          <input type="file" class="form-control"  required id="upload_image" >
          <input type="hidden" id='hiddeninputimg'  name="my_image" value="">



          <div class="  " style=' cursor: pointer;' id=''>
            <div class="text-start row">
              <div class="col-12">
                <img src="../home/images/uploadpng.png" class=' text-center' style='max-height:300px; border-radius:10px;' alt="Image" id='img_prev'>

              </div>

              <label for="exampleFormControlInput1" class="form-label">More Images</label>
              <input type="file" id='moreimages' class="form-control"  name="my_images[]"  multiple>
                <p class="text-success" style="font-size:12px;">You can add multiple 4 images at Ones For this Field</p>
              <div class="col-12 row row-cols-4 my-2" id='imgprev2'>

              </div>

              <div class="d-none" id='resdiv'>
                <p class=''>Resolution <span id='resolution'></span> </p>
              </div>
            </div>

          </div>

        </div>

        <div class="mb-3 col-lg-7 ">
          <div class="">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" name='description' required id="exampleFormControlTextarea1" rows="7"></textarea>
          </div>
          <div class="">
            <label for="exampleFormControlTextarea1" class="form-label">Category </label>
            <select class="form-select" name='category' aria-label="Default select example" required>
              <option selected value="none">--Select Category --</option>
              <option value="Mens Dress">Mens Dress</option>
              <option value="Womens Dress">Womens Dress</option>
              <option value="Islamic Girls Dress">Islamic Girls Dress</option>
              <option value="Blazer">Blazer</option>
              <option value="Kids Toy" >Kids Toy</option>
              <option value="Kids Dress" >Kids Dress</option>
              <option value="Teens Dress" >Teens Dress</option>
              <option value="Kids Toys" >Kids Toys</option>
              <option value="Baby Dress">Baby Dress</option>
              <option value="Baby Accesorie">Baby Accesorie</option>

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

              <button type="submit" id='submit' class='btn btn-primary w-100' name='submit'>Save</button>

            </select>
          </div>

        </div>
      </div>
    </div>
  </form>
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
      console.log(year)
    </script>
  </div>
</div>






<div class="modal fade" id="modal"     tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg h-100" role="document">
    <div class="modal-content">

      <div class="modal-body">
        <div class="img-container">

          <div class="w-100">
            <img src="" style='min-width:300px; max-width:400px;' id="sample_image" />
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
