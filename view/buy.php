
<?php

// user must enter quantity before clikcing on buy
//if the user clicks on buy, grab the qunatity, stock and person id
//verify that the quantity selected is within 1 and the quantity in the database
//if not a valid number, echo, enter a number within the quantity available
//else, if a valid number, proceed to cart page 


// cart page should have an add to cart button, remove from cart, delete cart- all functioning
//when the user clicks on add to cart, redirect ot the buy page and go through the validation again
//remove from cart and delete - similar processes, ahould have an alert for user to confirm

// on the cart page, arrange and sum the total cost and respective quanitities
// from cart page, proceed to check out. 
// on the check-out page, confirm order using a confirm-yes/no button. 
//if the user clicks on yes, proceed to payment page
// if the user clicks on no, direct to the cart page
// from payment page, direct to the payment page
//after payment, display a confimation message and subtarct quantities from their respective stocks. 
// Display a thank you message and back to home, back to trade, and log out button. 



//echo $remainder_stocks;
if (isset($_POST['submit'])) {


    $quantity_from_db = $_POST['quantity_from_db'];
    $user_quantity = (int) $_POST['user_quantity'];

    if (empty($user_quantity)) {
        echo '<script>
        alert("Enter Quantity!");
        window.location.href = "stocklist.php";
         </script>';
    }



    $rem_quantity = $quantity_from_db - $user_quantity;



    if ($rem_quantity < 0) {



        echo '<script>
   alert("Enter a number within the quantity available");
   window.location.href = "stocklist.php";
    </script>';
    } else {

        // get variables from stocktable


        $stock_id = $_POST['stock_id'];
        $company_name = $_POST['company_name'];
        $price = $_POST['price'];
        $stock_name = $_POST['stock_name'];
        $trackid = $_POST['trackid'];




        //insert into db order table
        // Create connection
        $conn = mysqli_connect("localhost", "root", "admin", "ensl_stock_market_76112023");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {

            $sql = "INSERT INTO orders (person_id, StockID, companyname, stock_name, Quantity_bought, Price)
                    VALUES ('$trackid', '$stock_id', '$company_name',  '$stock_name', '$user_quantity', '$price')";


            if ($conn->query($sql) === TRUE) {
                echo "Order created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        $conn->close();
    }

    //proceed to cart page
    echo '<script>
        
            window.location.href = "cart.php";
            </script>';
}










?>
