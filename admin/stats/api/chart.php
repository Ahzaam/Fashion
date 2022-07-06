<?php
  session_start();
  if(isset($_SESSION['dbpasscode']) && $_SESSION['dbpasscode'] == 'secure' ){

    include '../../../con.php';

    $query = 'SELECT * FROM payments WHERE date = CURDATE() AND status != "cancelled" ORDER BY time ';
    $result = $conn->query($query);

    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
        $labels[] = $row['time'];
        $total[] = (int) $row['total'];
      }

      $total = json_encode($total);
      $labels = json_encode($labels);
      $data = '{"name":  "Today\'s Online Pucharse", "total" : '.$total.', "labels" : '.$labels.'}';
      echo $data;

    }
  }

 ?>
