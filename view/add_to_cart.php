

<?php
include '../config/database_connect.php';
// redirecting browser to update cart
if (isset($_POST['add'])) {
    echo '<script>
    alert("Redirecting to stocklist");
    window.location.href = "stocklist.php";
     </script>';
}

?>