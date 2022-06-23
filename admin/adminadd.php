<?php
session_start();

if(  $_SESSION['dbpasscode'] == 'unsecure'){
  header('Location:../index.php');
}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootsrap/icon_css/all.css">
  <script defer src="../bootsrap/icon_js/all.js"></script>



  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

  <style media="screen">
  /* .fa-check-circle{
  color:rgb(28, 255, 0);
  padding-right: 15px;
}
label{
padding-left: 100px;
outline: none;
border: none;
font-size:20px;
width:300px;
height:100px;

}

input{
width: 200px;
height: 30px;

}

.container{
text-align:center;
padding-top: 100px;
}

input[type="submit"],button{
width: 240px;
height: 40px;
background-color: rgb(20, 171, 255);
border: none;
font-size:24px;
color:white;
}
input[type="submit"]:hover,button:hover{
cursor: pointer;
background-color:rgb(0, 141, 219);
}
table {
width: 100%;
}
th{
text-align: left;
border-bottom: 1px solid grey;
font-size: 19px;
font-weight: 10px;
}
td{
text-align: left;
}
tr{
margin-top:10px;
}
.container {

text-align: center;
}

button[type="button"]{
margin-top:50px;
width: 200px;
height:50px;
background-color:rgb(52, 236, 130);
border:none;
font-size: 25px;
}
a{
background-color:rgb(52, 236, 130);
border:none;
font-size: 25px;
padding:0px 100px;
link-style:none;
text-decoration:none;
color:white;

}
tr:hover{
background-color:rgb(218, 217, 217);
cursor:pointer;
}
button[type="buttonx"]{
margin:10px;
}
input[type="textx"]{
margin:10px ;
}
input[type="text"],select{
margin:0px ;
border:none;
outline:none;
border-bottom:1px solid black;
}
a[type="edit"]{
width:100px;
padding:0px 12px;
background-color:rgb(255, 18, 53);
margin-top:100px;
} */
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
  <div class="container">
    <div class="my-5">

      <ul class="nav nav-pills nav-justified">
        <a type="button" class="btn btn-primary nav-link active m-lg-2 m-2 w-100 " href="adminhomegal.php">
          In Stock <span class="badge text-bg-secondary"> <?php echo $ins; ?></span>
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





    <form class="from" action="add.php" method="post" enctype="multipart/form-data">
      <div class="row">

        <div class="mb-3 col-lg-5">
          <label for="exampleFormControlInput1" class="form-label">Name</label>
          <input type="text" class="form-control" name='name' id="exampleFormControlInput1" required placeholder="Name">
        </div>

        <div class="mb-3 col-lg-4">
          <label for="exampleFormControlInput1" class="form-label">Price(LKR)</label>
          <input type="number" class="form-control" name='price' id="exampleFormControlInput1" required placeholder="1000 LKR">
        </div>


        <div class="mb-3 col-lg-3">
          <label for="exampleFormControlInput1" class="form-label">Color</label>
          <input type="color" class="form-control" name='color'  id="exampleFormControlInput1">
        </div>

      </div>

      <div class="row">

        <div class="mb-3 col-lg-3">
          <label for="exampleFormControlInput1" class="form-label">Images</label>
          <input type="file" class="form-control" name='my_image' required id="exampleFormControlInput1" >
        </div>

        <div class="mb-3 col-lg-3">
          <label for="exampleFormControlInput1" class="form-label">Size</label>
          <input type="text" class="form-control" name='size' id="exampleFormControlInput1" placeholder="S, M, L, XL ">
          <p class="text-success" style="font-size:12px;">You can add multiple sizes with comma separated</p>
        </div>




        <div class="mb-3 col-lg-2">
          <label for="exampleFormControlInput1" class="form-label">Stock</label>
          <input type="number" class="form-control" name='stock' required id="exampleFormControlInput1" placeholder="120">
        </div>

        <div class="mb-3 col-lg-2">
          <label for="exampleFormControlTextarea1" class="form-label">Display </label>
          <select class="form-select" name='display' aria-label="Default select example">
            <option selected value="none">None</option>
            <option value="owl-carousel">Owl Carousel</option>
            <option value="grid" >Grid</option>

          </select>
        </div>

        <div class="mb-3 col-lg-2">
          <label for="exampleFormControlTextarea1" class="form-label">Category </label>
          <select class="form-select" name='category' aria-label="Default select example" required>
            <option selected value="none">--Select Category --</option>
            <option value="Mens Dress">Mens Dress</option>
            <option value="Womens Dress">Womens Dress</option>
            <option value="Kids" >Kids</option>
            <option value="Kids Dress" >Kids Dress</option>
            <option value="Teens Dress" >Teens Dress</option>
            <option value="Kids Toys" >Kids Toys</option>
            <option value="Mens Accesorie" >Mens Accesorie</option>
            <option value="Womens Accesorie" >Womens Accesorie</option>
          </select>
                  </div>

                </div>

                <div class="row">
                  <div class="mb-3 my-3 col-lg-6">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea class="form-control" name='description' required id="exampleFormControlTextarea1" rows="4"></textarea>
                  </div>
                  <div class="mb-3 col-lg-5 my-3">
                    <label for="exampleFormControlInput1" class="form-label">Status</label>
                    <select name='status' class="form-select" aria-label="Default select example">
                      <option selected value='selling'>Selling</option>
                      <option value="stopped">Stopped</option>

                    </select>
                  </div>


                </div>












                <button type="submit" class='btn btn-primary' name='submit'>Save</button>
              </form>

            </div>
          </body>
          </html>
