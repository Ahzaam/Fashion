<?php
require "pageauth.php";

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Management</title>

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



</head>
<body>
  <div class="container position-relative ">
    <div class="my-5 position-absolute top-0 start-0">
      <a type="button" class="btn btn-light nav-link active m-lg-2 m-2 w-100 " href="../admin.php">
        <i class="fa fa-arrow-left" aria-hidden="true"></i><span class="badge text-bg-secondary"></span>
      </a>
    </div>
  </div>
  <br><br>
  <div class="container my-5">
    <h1 class='display-1'>Admin's</h1>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Type</th>
        </tr>
      </thead>
      <tbody>


        <?php
        include "../../con.php";
        $query = "SELECT * FROM admin_table WHERE admin_type = 'staff '";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $id = $row['admin_id'];
            $pass = $row['password'] ;
            ?>
            <tr>
              <th scope="row">@</th>
              <td><?php echo ($pass == 'notset' || !$_SESSION['admintype'] == 'super')  ? 'Pending' :$id; ?></td>
              <td><?php echo $row['name']?></td>
              <td><?php echo ($pass == 'notset' || !$_SESSION['admintype'] == 'super')  ? 'Pending' :$row['email']; ?></td>
              <td><?php echo $row['admin_type']?></td>
              <?php
              if($_SESSION['admintype'] == 'super'){
                if($pass != 'notset'){
                  echo '<td><i class="fa-solid fa-circle-check text-success"></i> Verified</td>';
                }else{
                  echo '<td><i class="fa-solid fa-circle-xmark text-danger"></i> Pending</td>';
                }
                echo '<td><button type="button" id='.$id.' class="removeadmin btn btn-danger rounded-pill">Remove</button></td>';
              }

              ?>
            </tr>
            <?php
          }
        }

        ?>




      </tbody>

    </table>



    <?php
    if($_SESSION['admintype'] == 'super'){
      echo '<td><button type="button" id="addadmin" class=" btn btn-primary">Create Staff</button></td>';

      ?>
      <div id='newdmindetails' class="d-none">
        <form class="" id='newadminform'>
          <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label" required>Name</label>
            <div class="col-sm-10">
              <input type="text"  class="form-control" name='name' id="newemail" placeholder="Name">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label" required>Email</label>
            <div class="col-sm-10">
              <input type="email"  class="form-control" name='email' id="newname" placeholder="email@example.com">
            </div>
          </div>
          <div class="mb-3 row">

            <div class="col-sm-10">
              <button type="button" class='btn btn-primary' id='addnewadmin' name="button">Add</button>
            </div>
          </div>
        </form>
        <div class="mb-3 input-group d-none" id='newadmincode'>
          <input type="text" class="form-control " id='newadmincodeout'  readonly name="" value="Code">
          <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fa-solid fa-copy"></i></button>
        </div>
      </div>



      <script   src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
      integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
      crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script type="text/javascript">
      $(document).ready(function () {
        $('#addadmin').click(function () {
          $('#newdmindetails').removeClass('d-none');
          $('#addnewadmin').removeClass('disabled');
          $('#newadminform')[0].reset();
        })

        $('#addnewadmin').click(function () {
          let name = $('#newname').val();
          let email = $('#newemail').val();

          if(name === '' || email === '') return
          let data = $('#newadminform').serialize();
          console.log(data);
          let url = 'newadmin.php';

          $.post({
            url:url,
            data:data,
            success:function(data, status){
              $('#newadmincodeout').val(data);
              $('#addnewadmin').addClass('disabled');
              $('#newadmincode').removeClass('d-none');
              console.log(data + '<<<');
            }
          })

        })

        $('#button-addon2').click(function () {
          /* Get the text field */
          var copyText = document.getElementById("newadmincodeout");

          /* Select the text field */
          copyText.select();
          copyText.setSelectionRange(0, 99999); /* For mobile devices */

          /* Copy the text inside the text field */
          navigator.clipboard.writeText(copyText.value);

          /* Alert the copied text */
          $('#button-addon2').html('<i class="fa-solid fa-check"></i>')
        })



      })
      </script>


      <?php
    }

    ?>




  </div>




</body>
</html>
