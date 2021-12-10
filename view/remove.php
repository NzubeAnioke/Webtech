<?php

include '../config/database_connect.php';
if (isset($_POST['remove'])) {
       
    $orderID =  $_POST['orderID'];
        
      $del = mysqli_query($conn,"DELETE FROM orders WHERE orderID = '$orderID'"); // delete query
      
      echo '<script>
      alert("order removed");
      window.location.href = "cart.php";
       </script>';

}
