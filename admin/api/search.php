<?php
include '../../con.php';
  if(isset($_POST)){

      $search = $_POST['search'];
      $fullsearch = $_POST['search'];
      $arr[] = explode(' ', $search);
      $search = implode('|', $arr[0]) ;


      if($search == '' || $search == ' '){
        $query = "SELECT id, name, description, image, stock FROM product_table ORDER BY date DESC LIMIT 6";
      }else{
        $query = "SELECT id, name, description, image, stock FROM product_table WHERE(id LIKE '%$fullsearch%' OR description LIKE  '%$fullsearch%' OR name LIKE  '%$fullsearch%' OR category LIKE  '$fullsearch' )  LIMIT   6 "; // OR name REGEXP '[[:<:]]$search[[:>:]]' OR category LIKE '%$search%'
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
        // OR
      }else{

        $query = "SELECT id, name, description, image, stock FROM product_table WHERE(description REGEXP  '$search' OR name REGEXP  '$search' OR category REGEXP  '$search') LIMIT   6 ";
        $regresults = $conn->query($query);
        if($regresults->num_rows > 0){
          while ($row = $regresults->fetch_assoc()){
            $resarray[] = $row;

          }
          echo json_encode($resarray);
        }else{
          echo  '[{"status":"noresults"}]';
        }

        }



  }

 ?>
