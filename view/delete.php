<?php
// session to keep track of the user
session_start();
$trackid = session_id();

include '../config/database_connect.php';
if (isset($_POST['empty'])) {
       
        // query for deletion
      $del = mysqli_query($conn,"DELETE FROM orders WHERE person_id = '$trackid'"); 
      
      echo '<script>
      alert("Cart Emptied");
      window.location.href = "cart.php";
       </script>';

}
