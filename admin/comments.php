<?php
  require('pageauth.php')
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Comments</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../files/icon_css/all.css">
  <script defer src="../files/icon_js/all.js"></script>


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
  <div class="container position-relative ">
    <div class="my-5 position-absolute top-0 start-0">
      <a type="button" class="btn btn-light nav-link active m-lg-2 m-2 w-100 " href="admin.php">
        <i class="fa fa-arrow-left" aria-hidden="true"></i><span class="badge text-bg-secondary"></span>
      </a>
    </div>
  </div>
  <br><br>  <br><br>
  <div class="container">


    <div class="comments">
      <h1 class='display-6'>Feedbacks</h1>
      <?php
      include '../con.php';
      $query = "SELECT * FROM comments_feedback WHERE status = 'unread'";
      $result = $conn->query($query);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()){
          $id = $row['id'];
          $msg = $row['comment'];
          $name = $row['name'];

          ?>

          <div class="feed my-lg-4">
            <p class="h5">  <?php echo $name ?></p>
            <div class="row row-cols-2">

              <div class="col">
                <p>
                  <?php echo $msg ?>
                </p>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" id='input<?php echo $id ?>' placeholder="Reply" aria-label="Reply" aria-describedby="button-addon2">
                  <button class="marktik btn btn-primary" sty id='<?php echo $id ?>' type="button" id="button-addon2"><i class="fa fa-check  text-white" aria-hidden="true"></i></button>
                  <button class="tik btn btn-success" id='<?php echo $id ?>' type="button" id="button-addon2">Reply</button>
                  <button class="deltik btn btn-danger" id='<?php echo $id ?>' type="button" id="button-addon2">Delete</button>

                </div>
              </div>

            </div>
          </div>

          <?php
        }
      }
      ?>

    </div>

  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
  integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script type="text/javascript">
  $(document).ready(function () {
    $('.tik').click(function () {
      console.log($(this).attr('id'))
      let id = 'input' + $(this).attr('id')
    })
    $('.deltik').click(function () {
      console.log($(this).attr('id'))
    })
    $('.marktik').click(function () {
      let inid = 'input' + $(this).attr('id')
      let reply = $('#' + inid).val()
      let data = {id: $(this).attr('id'), reply:reply}
      $.post({
        url:'api/commentmark.php',
        data:data,
        success: function (data, status) {
          location.reload()
        }
      })
    })
  });
  </script>


</body>
</html>
