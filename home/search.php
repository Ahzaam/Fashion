<?php
  if(isset($_POST)){
    $search = $_POST['search'];
    $arr[] = explode(' ', $search);
    $search = implode('|', $arr[0]) ;

    include '../con.php';
    if($search == '' || $search == ' '){
      $query = "SELECT id, name, description, image FROM product_table  ORDER BY date DESC LIMIT 4";
    }else{
      $query = "SELECT id, name, description, image FROM product_table WHERE(description REGEXP  '$search' OR name REGEXP  '$search' OR category REGEXP  '$search') LIMIT   5 "; // OR name REGEXP '[[:<:]]$search[[:>:]]' OR category LIKE '%$search%'
    }


  // echo $search;
    $arr[] = explode(' ', $search);
    $search = implode('|', $arr[0]) ;


  //
    $results = $conn->query($query);

    if ($results->num_rows > 0) {
      while ($row = $results->fetch_assoc()){
        $resarray[] = $row;

      }
      echo json_encode($resarray);
    }else{

            echo  '[{"status":"noresults"}]';

      }


  }

 ?>