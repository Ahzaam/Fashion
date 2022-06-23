<?php
  if(isset($_POST)){
    $search = $_POST['search'];
    include '../con.php';
    if($search == '' || $search == ' '){
      $query = "SELECT id, name, description, image FROM product_table  ORDER BY date DESC LIMIT 5";
    }else{
      $query = "SELECT id, name, description, image FROM product_table WHERE(description LIKE '%$search%' OR name LIKE '%$search%') LIMIT 5";
    }

    $results = $conn->query($query);

    if ($results->num_rows > 0) {
      while ($row = $results->fetch_assoc()){
        $resarray[] = $row;

      }
      echo json_encode($resarray);
    }else{
      echo '[{"status":"noresults"}]';
    }


  }

 ?>
