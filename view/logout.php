<?php

if (isset($_POST['logout'])) {

    // Redirecting To Home Page
    session_start();
    session_destroy();
    echo '<script>
    alert("Redirecting to home page");
    window.location.href = "index.php";
     </script>';

}
