<!DOCTYPE html>
<html>

<head>
  <title> ENSL Stocklist</title>
  <style>
    .headstocks {
      display: flex;
      justify-content: center;
    }

    table {
      table-layout: auto;
      border-collapse: collapse;
      width: 80%;
      color: #588c7e;
      font-family: monospace;
      font-size: 25px;
      text-align: center;
    }

    th {
      background-color: #fff;
      color: black;
    }

    .center {
      margin-left: auto;
      margin-right: auto;

    }

    tr:nth-child(even) {
      background-color: #f2f2f2
    }
  </style>
  <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>


  <!-- ======= Header ======= -->


  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="../index.php">ENSL</a></h1>

      <button type="button" onclick="window.location.href='index.php'" class="btn btn-warning">BACK TO HOME</button>


      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>



      </nav><!-- .navbar -->
  </header>

  <h1 class="headstocks"> AVAILABLE STOCKS </h1>
  <table class="center">
    <tr>
      <th>Stock_ID</th>
      <th>Company</th>
      <th>Stock Name</th>
      <th>Quantity</th>
      <th>Price</th>
    </tr>
    <?php
    //include 'login_page.php';

    session_start();
    $trackid = session_id();
    // print_r($trackid);
    $conn = mysqli_connect("localhost", "root", "admin", "ensl_stock_market_76112023");
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // select query to get data from stock table in the database

    $sql = "SELECT * FROM stock";
    $result = $conn->query($sql);
    //$user_quantity = null;
    if ($result->num_rows > 0) {
      // output data of each row




      while ($row = $result->fetch_assoc()) {
        //assigning row data to variables

        $stock_id = $row["StockID"];
        $company_name = $row["companyname"];
        $stock_name = $row["stock_name"];
        $price =  $row["Price"];
        $quantity_from_db = $row['Quantity'];



        echo "<tr>
          <td>" . $row["StockID"] . "</td>
          <td>" . $row["companyname"] . "</td>
          <td>" . $row["stock_name"] .   "</td>
          <td>" . $row["Quantity"] . "</td>
          <td>" . $row["Price"] . "</td>";

        echo "
           <td>
           
            <form method='POST' action ='buy.php'>
            <input type='number' id='Quantity'  name='user_quantity' placeholder='Quantity'></td>
            
            </td>";

        //  hidden values to keep track and variables and allow it to be used on the next page

        echo "<td>
       
            <input type = 'hidden' value = '$trackid' name = 'trackid'>
            <input type = 'hidden' value = '$quantity_from_db' name = 'quantity_from_db'>
            <input type = 'hidden' value = '$stock_id' name = 'stock_id'>
            <input type = 'hidden' value = '$company_name' name = 'company_name'>
            <input type = 'hidden' value = '$stock_name' name = 'stock_name'>
            <input type = 'hidden' value = '$price' name = 'price'>
            <button type = 'submit'  name = 'submit' >BUY</button>
            </form>
            </td>
            </tr>";
      }




      echo "</table>";
    } else {
      echo "0 results";
    }

    $conn->close();

    // verifies that the user enters a quantity before clicking on buy

    // if (empty($_POST["user_quantity"])) {

    //   echo '<script>alert("Enter Quantity")</script>';
    // }

    ?>
  </table>
  <br><br><br>
</body>

</html>
