<?php
include '../../con.php';
  if(isset($_POST)){
    if(isset($_POST['event'])){
      if($_POST['event'] == 'lightbox'){
        $id = $_POST['id'];
        $query = "SELECT * FROM product_table WHERE id='$id' ";
        $result = $conn->query($query);

        if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
            $lightboxarr[] = $row;
          }
          echo json_encode($lightboxarr);
        }

      }else{
        echo 'Error';
      }




    }else{
      $search = $_POST['search'];
      $fullsearch = $_POST['search'];
      $arr[] = explode(' ', $search);
      $search = implode('|', $arr[0]) ;


      if($search == '' || $search == ' '){
        $query = "SELECT id, name, description, image FROM product_table ORDER BY date DESC LIMIT 6";
      }else{
        $query = "SELECT id, name, description, image FROM product_table WHERE(id LIKE '%$search%' OR description LIKE  '%$search%' OR name LIKE  '%$search%' OR description REGEXP  '$search' OR name REGEXP  '$search' OR category REGEXP  '$search')  LIMIT   6 "; // OR name REGEXP '[[:<:]]$search[[:>:]]' OR category LIKE '%$search%'
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


  }

 ?>