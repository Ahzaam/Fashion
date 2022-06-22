<?php
session_start();
if(isset($_SESSION['dbpasscode'])){
  if(  $_SESSION['dbpasscode'] == 'unsecure'){
    header('Location:../index.php');
  }else{
    echo "";
  }


}else{
  header('Location:index.php');
}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link rel="stylesheet" href="../files/icon_css/all.css">
  <script defer src="../files/icon_js/all.js"></script>


  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

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
      <a type="button" class="nav-link active m-lg-2 m-2 w-100 position-relative" href="adminhomegal.php">
        <strong>In Stock</strong>
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
          <?php echo $ins; ?>
          <span class="visually-hidden">instock</span>
        </span>
      </a>

      <a type="button" class="nav-link active m-lg-2 m-2 w-100 position-relative" href="adminoofs.php">
        Out Of Stock
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
          <?php echo $ofs; ?>
          <span class="visually-hidden">outofstock</span>
        </span>
      </a>

      <!-- <a class="nav-link active " href="#">Comments and Feedback</a> -->
      <a type="button" class="nav-link active m-lg-2 m-2 w-100 position-relative" href="comments.php">
        Feedback
        <span class="position-absolute <?php echo $display ?>  top-0 start-100 translate-middle badge rounded-pill bg-danger">
          <?php echo $comments; ?>
          <span class="visually-hidden">Unread</span>
        </span>
      </a>






      <a type="button" class="nav-link active m-lg-2 m-2 w-100 position-relative" href="adminadd.php">
        Add Product
      </a>
    </ul>
  </div>
    <div class="">

  <div class="grid w-100">
    <div class="row row-cols-1 row-cols-md-2 g-4">
    <?php

    include "../con.php";
         $query = "SELECT * FROM product_table WHERE stock > 0";
         $result = $conn->query($query);

         if ($result->num_rows > 0) {
           while ($row = $result->fetch_assoc()){
             $prc = '';
             $pr = array_reverse(str_split(strval($row['price'])));
             $i = count($pr) ;
             $j = $i;
             while($i  > 0 ){
               if($i != $j & $i % 3 == 0 ) {
                 $prc = $prc.', '.$pr[$i -1];
               }else{
                 $prc = $prc . $pr[$i - 1];
               }
               $i--;
             }


               echo "
               <div class='card mb-3 mx-lg-5' style='max-width: 540px;'>
               <div class='row g-0'>
               <div class='col-md-4 my-4'>
                <img src=../". $row['image']." class='img-fluid rounded-start' alt='Image'>

                  <h5 class='card-title text-center'>" . $row['name']       . "</h5>
                  <div class='card-footer'>
                  <small class='text-muted  '> Upadated " . $row['date']      . "</small>
                  </div>
               </div>
               <div class='col-md-8'>
               <div class='card-body text-start m-2'>

                 <p class='card-text'>" . $row['description']      . " </p>
                  <p class='card-text'> Price: " . $row['price']      . "LKR  ||  Size:  <span class='badge text-bg-info'>" . $row['size'] . "</p>
                 <p class='card-text my-4'> Display: <span class='badge text-bg-secondary'>" . $row['display']      . "</span>|| Color:</span> <span style='height:30px;width:30px; border:1px solid black ;background-color:" . $row['colors'] . "';>" . $row['colors'] . "</span>  </p>
                 <button type='button' class='btn btn-light my-2'>
                 Stock <span class='badge rounded-pill text-bg-primary'>" . $row['stock'] . "</span>
                 </button>
                 <button type='button' class='btn btn-light my-2'>
                 Selled  <span class='badge text-bg-success'>" . $row['selled'] . "</span>
                 </button>
                 <a href='#' class='btn btn-primary my-2 w-100'>Edit Now</a>

               </div>
               </div>
               </div>

               </div>

                ";



            }

  }
       ?>

  </div>
  </div>

</div>

</body>
</html>