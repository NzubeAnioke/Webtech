<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>payment</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="../assets/css/style.css" rel="stylesheet">

</head>

<body>

  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->
      <h2 class="active"> Credit Card Details </h2>


      <!-- Icon -->
      <div class="fadeIn first">
        <h6 class="logo me-auto"><a href="index.html">ENSL</a></h6>
      </div>

      <!-- Login Form -->
      <form>

        <input type="text" id="login" class="fadeIn second" name="login" required placeholder="Cardholder Name">
        <input type="text" id="password" class="fadeIn third" name="login" required placeholder="Card Number">
        <input type="text" id="password" class="fadeIn third" name="login" required placeholder="Expiration Date">
        <input type="text" id="password" class="fadeIn third" name="login" required placeholder="CVV">
        <input type="submit" onclick="window.location.href='checkout.php'" class="fadeIn fourth" value="PAY NOW">
      </form>



    </div>
  </div>
</body>

</html>