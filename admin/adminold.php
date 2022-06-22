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
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="../files/icon_css/all.css">
    <script defer src="../files/icon_js/all.js"></script>

    <title>Admin Panel</title>
    <style media="screen">
      .in{
        <?php

         if(isset($_GET['suc'])){
           if($_GET['suc'] == 1){
             echo "border: 1px solid rgb(83, 255, 90);";
           }else{
             echo "border: 1px solid rgb(255, 43, 43);";
           }
        }else{echo "border: 1px solid rgb(255, 240, 43);";}


         ?>
      }
      .saving{

        <?php

         if(isset($_GET['suc'])){
           if($_GET['suc'] == 1){
             echo "background-color: rgb(83, 255, 90);";
           }else{
             echo "background-color:rgb(255, 43, 43);";
           }
        }


         ?>
        margin-top:10px;
        text-align:center;
      }
    </style>

  </head>
  <body>
    <div class="section-top col-sm-12   col-bg-3">
      <div class="in mt-lg-5">
        <h1 style="color:black;">Add details to Home</h1>
        <form  action="add.php" method="post" enctype="multipart/form-data">
            <label  >Name </label>
            <input type="text" name="name" value=""><br>



            <label >Disount Price</label>
            <input type="text" name="price" value=""><br>

            <label >Actual Price</label>
            <input type="text" name="discount" value=""><br>

            <label >Model</label>
            <input type="text" name="model" value=""><br>


            <label >Stock</label>
            <input type="text" name="stock" value=""><br>

            <label  >Display place</label>
            <select name='type'>
              <option value="banner" >Banner(1920 x 750)</option>
              <option value="owl-carousel">Owl-Carousel(square)</option>
              <option value="grid">grid(sqaure)</option>
            </select>
            <br/><br><br>

            <label style="margin-right:270px;" >description</label><br>
            <textarea style="font-size:16px;font-family:sans-serif; height:100px;" name="description" rows="20" cols="50"></textarea><br><br>

          <input type="file" name="my_image"><br/>
          <input type="submit" name="submit" value="Upload"><br>



          <div class="saving" style="height:100px;width:100% " >
            <p style="font-size:50px;">
              <i style="margin:10px 0 0 0;color:white; cursor:pointer; font-size:80px; float:left; margin-left:50px;"
               type="arrow" class="fa <?php if(isset($_GET['suc'])){
                 if($_GET['suc'] == 1){
                   echo "fa-check-circle";
                 }else{
                   echo "fa-error-circle";
                 }
              } ?>">
             </i>

           </p>
           <br>
           <span style="font-size:45px; color:white; cursor:pointer"><?php echo $_GET['error'] ?></span>
          </div>

        </form>
      </div>
    </div>
  </body>
</html>
