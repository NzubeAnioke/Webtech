<?php

include_once '../config/database_connect.php';
// start session to keep track of user that is logged in
session_start();
$trackid = session_id();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartpage </title>

    <link rel="stylesheet" href="style.css">
</head>

<body>



    <div class="container">
        <div class="heading">
            <h1>
                <span class="shopper">ENSL</span> Stock shopping Cart
            </h1>


        </div>

        <div class="cart transition is-open">
            <!-- table headings -->

            <table class="center">
                <tr>
                    <th>Stock_ID</th>
                    <th>Company Name</th>
                    <th>Stock Name</th>
                    <th>Quantity bought</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
                <?php


                //    select query to get data from database

                $sqll = "SELECT * , Price*Quantity_bought AS total_price FROM Orders WHERE person_id ='$trackid'";
                $resullt = $conn->query($sqll);

                if ($resullt->num_rows > 0) {
                    // output data of each row




                    while ($row = $resullt->fetch_assoc()) {
                        $orderID =  $row["orderID"];

                        //assigning row data

                        echo "<tr>
        <td>" . $row["StockID"] . "</td>
        <td>" . $row["companyname"] . "</td>
        <td>" . $row["stock_name"] .   "</td>
       <td>" . $row["Quantity_bought"] . "</td>
        <td>" . $row["Price"] . "</td>
        <td>" . $row["total_price"] . "</td>";

                        // calculating total price

                        $qty = $row["Quantity_bought"];
                        $price = $row["Price"];
                        $total = $qty * $price;

                        echo "
        <td>
        
        <form method='POST'  action ='remove.php'>
        <input type = 'hidden' value = '$orderID' name = 'orderID'>
        <button type='submit' name='remove'>REMOVE</button> 
            </td>
        
        </td>";

                        echo "<td>

        </form>
        </td>
        </tr>";
                    }
                }
                echo "</table>";


                ?>
            </table>

            <!-- forms and buttons for delete, update and checkout -->
            <form method='POST' action='delete.php'>
                <button onclick="javascript: return confirm('Please confirm delete all rows');" type='submit' name='empty'>EMPTY CART</button>
            </form>

            <form method='POST' action='add_to_cart.php'>
                <button type='submit' name='add'>ADD TO CART</button>
            </form>

            <form method='POST' action='payment.php'>
                <button type='submit' name='checkout'>CHECK OUT</button>

            </form>


            <?php
            ?>