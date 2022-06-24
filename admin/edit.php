<?php
session_start();

if(isset($_SESSION['dbpasscode'])){
  if($_SESSION['dbpasscode'] == 'unsecure'){

  }else{
    header('Location:index.php');
  }
}else{
  header('Location:index.php');
}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit Record</title>
    <link rel="stylesheet" href="../files/css/bootstrap.css">

    <script type="text/javascript" src="../files/js/bootstrap.js">

    </script>


  </head>
  <body>

        <div class="container">
          <?php
            //search in the database for the customer record if found
            //display the details of the customer record in the following htm
            //form, otherwise display an error message - alertbox from bootstrap

            //lest connect to database
            include "../con.php";

            /*echo "<pre>";
            print_r($_REQUEST);
            echo "</pre>";*/

            //building the dynamic sql command using the cus_id passed in for
            //searching the record in the database table
            $cus_id = $_REQUEST['edit'];


            $query = "SELECT * FROM prduct_table WHERE `id` = $cus_id" ;
            $rs = $conn->query($query);

            //lets see how many records were founds

            if(mysqli_num_rows($rs)>0){
              //yes record is found (1)
              //now that the record is found lets display  its contents inside
              //html form below
              //$row = mysqli_fetch_array($rs);
              $row = mysqli_fetch_assoc($rs);

              //echo "<pre>";
              //print_r($row);
              //echo "</pre>";

              //echo "name : " . $row['name'];
              ?>



          <div class="row">
            <div class="col-lg-4 col-md-4">
              <img src="../<?php echo $row['image']; ?>" alt="<?php echo $row['image']; ?>" style="width:100%;">
            </div>

            <div class="col-lg-8 col-md-8">
              <h2>Update Info Step</h2>




              <form class="" action="saveedit.php?del=true" method="post">

                <input type="hidden" name="id" value="<?php echo $row['id'];?>">


                <label for="" class="label">Name</label>
                <input type="text" name="name" value="<?php echo $row['name']; ?>"
                class="form-control">

                <label for="" class="label">Type</label>
                <select name='type' value="<?php echo $row['display']; ?>" class="form-control">
                  <option value="owl-carousel">Owl Carousel</option>
                  <option value="owl-carousel">Owl Carousel</option>
                  <option value="grid" >Grid</option>
                  <option value="none">None</option>

                </select>

                <label for="" class="label">Price</label>
                <input type="text" name="price" value="<?php echo $row['price']; ?>"
                class="form-control">

                <!-- <label for="" class="label">Discount</label>
                <input type="text" name="discount" value="<?php echo $row['discount']; ?>"
                class="form-control"> -->

                <label for="" class="label">Description</label>
                <input type="text" name="description" value="<?php echo $row['description']; ?>"
                class="form-control">

                <!-- <label for="" class="label">Model</label>
                <input type="text" name="model" value="<?php echo $row['model']; ?>"
                class="form-control"> -->

                <label for="" class="label">Image</label>
                <input type="file" name="image" value="<?php echo $row['image']; ?>"
                class="form-control">

                <label for="" class="label">Stock</label>
                <input type="number" name="stock" value="<?php echo $row['stock']; ?>"
                class="form-control">
                <br>
                <label for="" class="label"></label>
                <input type="submit" name="" value="Save Changes"
                  class="btn btn-success">

                <a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>
                <a href="admin.php" class="btn btn-primary">Cancel</a>


              </form>

              <?php
            }
            else{
              //no records were found (0)
              //echo "no records were found";
              ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Record Not Found</strong> The customer  number you entered
                  not to be found in the database. please try again with another
                  customer number.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <hr>
                <hr>
                  <a href="dashboard.php" class="btn btn-dark">Dashboard</a>
                  <a href="edit_customer_1.php" class="btn btn-danger">Try Again</a>
              </div>

              <?php
            }

           ?>


            </div><!-- end of col-8 main form content goes here -->



          </div><!-- end of row-->




          <div class="row">
            <div class="col-lg-12 col-md-12">
              <p style="text-align:center;">All Rights Reserved &reg; Copyright Ahzam &copy; 2022</p>
            </div>
          </div><!-- end of footer-->



        </div><!--end of container -->



  </body>
</html>
