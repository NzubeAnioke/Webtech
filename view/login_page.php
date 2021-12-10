<?php
include_once '../config/database_connect.php';
// check if the login button has been clicked
// if the button has been clicked, grab the email and password
// select * from the database, where the email = email the user provided, fetch data and store in a variable
//check if the varibale used to store user input is empty
//echo email/password is wrong

//if the varibale is not empty, encrpt the current password and comapre to the password in the database (in the variable from fetchassoc)
//if the passwords are not the same, echo email/password is wrong
//if the passwords are the same, start a session and store the user id and email as session variables
//then redirect to user profile page

// $_SESSION["email"] = $_POST["email"];
// $_SESSION["password"] = $_POST["password"];
$emailErr = $passwordErr = "";
$email = $password = "";
$errors = array();


function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


// check if the login button has been clicked
if (isset($_POST["login_submit"])) {
  // if the button has been clicked, grab the email and password
  $email = $_POST["email"];
  $password = $_POST["password"];

  if (empty($_POST['email'])) {
    $errors['emailErr'] = "email is required";
  } else {
    $email = test_input($_POST["email"]);
  }

  if (empty($_POST['password'])) {
    $errors['passwordErr'] = "password is required";
  } else {
    $password = test_input($_POST["password"]);
  }

  if (count($errors) == 0) {
    // select * from the database, where the email = email the user provided, fetch data and store in a variable
    $query = "SELECT * FROM person WHERE email='$email'";
    //$connection = mysqli_connect(servername,username,password,database);
    $result = mysqli_query($conn, $query);


    $numrows = mysqli_num_rows($result);
    //check if the varibale used to store user input is empty
    if (!$numrows = 0) {
      //if the variable is not empty, encrpt the current password and compare to the password in the database

      while ($row = mysqli_fetch_array($result)) {
        $person_id = $row['person_id'];
        $password = md5($password);
        $email2 = $row["email"];
        $password2 = $row["p_password"];

        if ($email == $email2 && strpos($password, $password2) !== false) {
          //echo email/password is wrong
          echo '<script>alert("Login Successful")</script>';
          //echo $person_id;
          session_id($person_id);
          session_start();
          /* Redirect browser */
          echo '<script>
        alert("Redirecting to profile!");
        window.location.href = "profile.php";
         </script>';
        } else
        //if the passwords are the same, start a session and store the user id and email as session variables
        {
          echo '<script>alert("Login Failed")</script>';
        }
      }
    }
    // if empty,echo email/password is wrong
    else {
      echo 'All fields are required';
    }
  }
}
?>


<!-- Form -->


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login page </title>

  <link href="../assets/css/style.css" rel="stylesheet" />
</head>

<body>


  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->
      <h2 class="active"> Log In </h2>
      <a href="signup_page.php">
        <h2 class="inactive underlineHover">Sign Up </h2>
      </a>


      <!-- Icon -->
      <div class="fadeIn first">
        <h6 class="logo me-auto"><a href="index.html">ENSL</a></h6>
      </div>

      <!-- Login Form -->
      <form method="POST" action="login_page.php">
        <input type="text" id="email" class="fadeIn second" name="email" placeholder="email">
        <span class='error' style="color:red"> <?php if (isset($errors['emailErr'])) {
                                                  echo $errors['emailErr'];
                                                } else {
                                                  echo '';
                                                }; ?></span></br>
        <input type="password" id="pass" class="fadeIn third" name="password" placeholder="password">
        <span class='error' style="color:red"> <?php if (isset($errors['passwordErr'])) {
                                                  echo $errors['passwordErr'];
                                                } else {
                                                  echo '';
                                                }; ?></span></br>
        <input type="submit" class="fadeIn fourth" name='login_submit' value="Log In">
      </form>

      <!-- Remind Passowrd -->
      <div id="formFooter">
        <a class="underlineHover" href="#">Forgot Password?</a>
      </div>

    </div>
  </div>

</body>



</html>