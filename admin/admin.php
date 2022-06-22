<?php
session_start();

if(  $_SESSION['dbpasscode'] == 'unsecure'){
  header('Location:../home.php');
}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../bootsrap/icon_css/all.css">
    <script defer src="../bootsrap/icon_js/all.js"></script>
    <link rel="stylesheet" href="../bootsrap/css/bootstrap.css">
    <script defer src="../bootsrap/js/bootstrap.js"></script>
    <style media="screen">
    .fa-check-circle{
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
      }
    </style>
  </head>
  <body>
       <table>
         <tr>
           <th>Name</th>
           <th>Type</th>
           <th>Price</th>
           <th>Discount</th>
           <th>description</th>
           <th>Stock</th>
           <th>model</th>
           <th>image</th>
        </tr>

       <?php

       include "../con.php";
            $query = "SELECT * FROM prduct_table";
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
                  <tr style='margin-top:10px;'>
                     <td>" . $row['name']       . " </td>
                     <td>" . $row['display']       . " </td>
                     <td style='text-align:right; padding-right:50px;'>" . $prc      . " </td>
                     <td>" . $row['status']. " </td>
                     <td>" . $row['description']      . " </td>
                     <td>" . $row['stock']. " </td>
                     <td>" . $row['colors']      . " </td>
                     <td>" . $row['image']. " </td>
                     <td><a href='edit.php?edit=".$row['id']."'  >Edit </a> </td>

                  </tr>
                   ";



               }

          ?>
          <tr>
          <form class="from" action="add.php" method="post" enctype="multipart/form-data">

              <td><input type="text" name="name" id="name"  required placeholder="Name"></td>
              <td><select name='type'>
                <option value="owl-carousel">Owl Carousel</option>
                  <option value="grid" >Grid</option>
                  <option value="none">None</option>
              </select></td>

              <td><input type="text" name="price" id="price" required placeholder="Price"></td>
              <td><input type="text" name="discount" id="discount" required placeholder="Discount"></td>

              <td><input type="text" name="description" id="description" required placeholder="Description"></td>

              <td><input type="text" name="stock" id="stock" required placeholder="Stock"></td>
              <td><input type="text" name="model" id="model" required placeholder="model"></td>

              <!-- <td><input type="file" name="my_image" required></td> -->
              <td><input type="file" name="my_image"></td>
              <td><input type="submit" name="submit" value="Upload"></td>

            </form>
            </tr>
            <?php
               echo "</table>";
           } else {
             echo "0 results";

           }
           $conn->close();
           // strval(); str_split()

        ?>
    </div>

     <?php
     if(isset($_REQUEST['status'])){
       if($_REQUEST['suc'] == 0){
         ?>
         <div  class="alert alert-success alert-dismissible fade show" role="alert">
           <strong>Success</strong> New record successfully created.

           <button type="buttonxc" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>

         <?php
       }else{
         ?>
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
           <strong>Sorry</strong> The details you entered
             not to be saved in the database. please check your Inputs.
           <button type="buttonxc" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
         <?php
       }
     }
      ?>

  </body>
</html>
