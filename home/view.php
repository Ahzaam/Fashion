
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Edit Product</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">


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

           $cus_id = $_REQUEST['product'];


           $query = "SELECT * FROM product_table WHERE `id` = '$cus_id'" ;
           $rs = $conn->query($query);
           //
           if(mysqli_num_rows($rs)>0){

             $row = mysqli_fetch_assoc($rs);
       ?>

  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary d-none" data-bs-toggle="modal" id='savechanges' data-bs-target="#exampleModal">

</button>



  <div class="container my-5">


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirm Update</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <span id='updatingitems' class='text-success fw-bold'>Are you sure to update </span>
        </div>
        <div class="modal-footer">
          <div class="" id='formsubmitbtn'>
            <button type="button" class="btn btn-secondary" id='clearchanges' data-bs-dismiss="modal">Close</button>
            <button type="submit" id="editformsubmit"  class="btn btn-primary" name='submit'>Save</button>
          </div>
          <div class="" id='doneformsubmit'>
            <button type="submit" id="doneformsubmit"  class="btn btn-danger" onclick="history.back()" name='submit'>Exit</button>
            <button type="submit" id="doneformsubmit"  class="btn btn-success" data-bs-dismiss="modal" name='submit'>Edit</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-succes" id='delete-modal-delete'>
        Confirm Delete
      </div>
      <div class="modal-footer">
        <button type="submit" id="doneformsubmit"  class="btn btn-secondary" data-bs-dismiss="modal" name='submit'>Cancel</button>
        <button type="button" class="btn btn-danger" id='deleteitem' data-bs-dismiss="modal">Delete</button>


      </div>
    </div>
  </div>
</div>

    <div class="">
      <h1 class='display-6'> Item  No:<?php echo $row['id'] ?></h1>
    </div>
    <form class="from" id='editform' enctype="multipart/form-data">

      <div class="row">

        <div class="mb-3 col-lg-5">
          <input readonly type="hidden" name="id" id='hiddenid' value="<?php echo $row['id'] ?>">
          <label for="exampleFormControlInput1" class="form-label">Name</label>
          <input readonly type="text" class="form-control  deafultinput" data-prev-data='<?php echo $row['name'] ?>' value="<?php echo $row['name'] ?>" name='name' id="exampleFormControlInput1" required placeholder="Name">
          <div class="valid-feedback">

    </div>
          <label for="exampleFormControlInput1" class="form-label">Price(LKR)</label>
          <input readonly type="number" class="form-control deafultinput" data-prev-data='<?php echo $row['price'] ?>' value="<?php echo $row['price'] ?>"  name='price' id="exampleFormControlInput1" required placeholder="1000 LKR">
          <div class="valid-feedback">

    </div>
          <label for="exampleFormControlInput1" class="form-label">Color</label>
          <input readonly type="color" class="form-control deafultinput" data-prev-data='<?php echo $row['colors'] ?>' value="<?php echo $row['colors'] ?>" name='color'  id="exampleFormControlInput1">
          <div class="valid-feedback">

    </div>
        </div>

        <div class="mb-3 col-lg-7">
          <div class="">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control deafultinput" name='description' data-prev-data='<?php echo $row['description'] ?>' required id="exampleFormControlTextarea1" rows="7"><?php echo $row['description'] ?></textarea>
            <div class="valid-feedback">

      </div>
          </div>
        </div>




      </div>

      <div class="row">

        <div class="mb-3 col-lg-5">
          <!-- <label for="exampleFormControlInput1" class="form-label">Images</label> -->
          <!-- <input readonly type="file" class="form-control d-none "  required id="upload_image" > -->
          <!-- <input readonly type="hidden" id='hiddeninputimg'  name="my_image" value=""> -->
          <div class="  " style=' cursor: pointer;' id='uploadimgicon'>
            <div class="text-start ">
                <img src="../<?php echo $row['image'] ?>" class=' text-center' style='max-height:400px; border-radius:10px;' alt="Image" id='img_prev'>
              <div class="d-none" id='resdiv'>
                <p class=''>Resolution <span id='resolution'></span> </p>
              </div>
            </div>

          </div>

        </div>

        <div class="mb-3 col-lg-7 ">
          <div class="">
            <label for="exampleFormControlTextarea1" class="form-label">Category </label>
            <select class="form-select deafultinput" data-prev-data='<?php echo $row['category'] ?>' value=""  name='category' aria-label="Default select example" required>
              <option selected value="<?php echo $row['category'] ?>"><?php echo $row['category'] ?></option>
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
            <div class="valid-feedback">

      </div>
          </div>

          <div class="">
            <label for="exampleFormControlInput1" class="form-label">Size</label>
            <input readonly type="text" class="form-control deafultinput" data-prev-data='<?php echo $row['size'] ?>' value="<?php echo $row['size'] ?>"  name='size' id="exampleFormControlInput1" placeholder="S, M, L, XL ">
            <div class="valid-feedback">

      </div>
            <p class="text-success" style="font-size:12px;">You can add multiple sizes with comma separated</p>
          </div>




          <div class="">
            <label for="exampleFormControlInput1"  class="form-label">Stock</label>
            <input readonly type="number" class="form-control deafultinput" data-prev-data='<?php echo $row['stock'] ?>' value="<?php echo $row['stock'] ?>"  name='stock' required id="exampleFormControlInput1" placeholder="120">
            <div class="valid-feedback">

      </div>
          </div>

          <div class="">
            <label for="exampleFormControlTextarea1"  class="form-label">Display </label>
            <select class="form-select deafultinput" name='display' data-prev-data='<?php echo $row['display'] ?>' aria-label="Default select example">
              <option selected value="<?php echo $row['display'] ?>"><?php echo $row['display'] ?></option>
              <option  value="none">None</option>
              <option value="owl-carousel">Owl Carousel</option>
              <option value="grid" >Grid</option>

            </select>
            <div class="valid-feedback">

      </div>
          </div>


          <div class="row">
            <div class="mb-3 col-lg-4 my-3">
              <label for="exampleFormControlInput1"  class="form-label">Status</label>
              <select name='status' class="form-select deafultinput" data-prev-data='<?php echo $row['status'] ?>' aria-label="Default select example">
                <option selected value="<?php echo $row['status'] ?>"><?php echo $row['status'] ?></option>
                <option value='selling'>Selling</option>
                <option class='text-bg-danger' value="stopped">Stopped</option>

              </select>
              <div class="valid-feedback">

        </div>
            </div>
            <div class="mb-3 row col-lg-8 my-4">
              <label for="exampleFormControlInput1" class="form-label"></label><br>
              <!-- <button type='button'  class='btn btn-primary col-5 ' id='modeltogller' data-bs-toggle="modal" id='savechanges' data-bs-target="#exampleModal">Save</button>
              <button type='button'  class='btn btn-danger col-4 mx-3' data-bs-toggle="modal" data-bs-target="#deleteModal" name='submit'>Delete</button>
              <button type='button' class='btn btn-secondary col-2 ' onclick="history.back()" name='submit'>Back</button> -->
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
        <input readonly type="file" name="image" class="image" id="upload_image" style="display:none" />
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

  <?php
}else{
  echo "<h1 class='display-1 text-danger text-center my-5'>Item has been Deleted</h1>";

}

   ?>
</body>
</html>