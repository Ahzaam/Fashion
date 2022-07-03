<?php
require "pageauth.php";

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User's</title>

  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
  integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
  integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script  src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
  integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body>
  <div class="container position-relative ">
    <div class="my-5 position-absolute top-0 start-0">
      <a type="button" class="btn btn-light nav-link active m-lg-2 m-2 w-100 " href="admin.php">
        <i class="fa fa-arrow-left" aria-hidden="true"></i><span class="badge text-bg-secondary"></span>
      </a>
    </div>
  </div>
  <br><br>
  <div class="container my-5">
    <h1 class='display-1'>Order's</h1>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Order ID</th>
          <th scope="col">User ID</th>
          <th scope="col">Product ID</th>
          <th scope="col">Status</th>

        </tr>
      </thead>
      <tbody>


        <?php
        include "../con.php";
        $query = "SELECT * FROM orders ";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $id = $row['orderuid'];

            ?>
            <tr>
              <th scope="row">@</th>
              <td><?php echo $id; ?></td>
              <td><?php echo $row['userid']?></td>
              <td><?php echo $row['product_id']?></td>
              <td><?php echo $row['status']?></td>

            </tr>
            <?php
          }
        }

        ?>




      </tbody>

    </table>

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

      </script>
    </div>


  </div>




</body>
</html>
