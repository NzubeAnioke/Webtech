<?php
//connect to database class
include_once '../config/database_connect.php';
//require_once '../controller/person_controller.php';

// define variables to keep track of errors

$fnameErr = $lnameErr = $telErr = $emailErr = $passwordErr = "";
$fname = $lname = $tel = $email = $password = "";
$errors = array();

// check if button is clicked
if (isset($_POST["signup_submit"])) {
  // grab form data
  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $tel = $_POST["tel"];
  $email = $_POST["email"];
  $password = $_POST["password"];


  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  // validate data

  // check if fields are empty
  if (empty($_POST['fname'])) {
    $errors['fnameErr'] = "first name is required";
  } else {
    $fname = test_input($_POST["fname"]);
  }

  if (empty($_POST['lname'])) {
    $errors['lnameErr'] = "last name is required";
  } else {
    $lname = test_input($_POST["lname"]);
  }

  if (empty($_POST['tel'])) {
    $errors['telErr'] = "Tel is required";
  } else {
    $tel = test_input($_POST["tel"]);
  }

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


  // check if fields are of appropriate length
  if (strlen($fname) > 20) {
    $errors['fname'] = "name must be under 20 characters";
  }
  if (strlen($lname) > 20) {
    $errors['lname'] = "name must be under 20 characters";
  }
  if (strlen($tel) > 20) {
    $errors['tel'] =  "tel must be under 20 characters";
  }
  if (strlen($email) > 50) {
    $errors['email'] =  "email must be under 50 characters";
  }

  // validate email with regex
  $regex = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
  // set error if not an email
  if (!preg_match($regex, $email)) {
    $errors['email'] =  "enter a valid email";
  }
  // print_r ($errors);
  // return;
  if (count($errors) == 0) {



    // check if user already exists
    $query = "SELECT * FROM person WHERE email='$email'";
    //$connection = mysqli_connect(servername,username,password,database);

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) != 0) {
      echo '<script>
    alert("User already exists, Log in instead");
    window.location.href = "login_page.php";
     </script>';
    } else {

      $password = md5($password);

      $sql =  "INSERT INTO `person`(`fname`, `lname`, `email`, `Tel`,`p_password`) VALUES ('$fname','$lname', '$email','$tel', '$password')";

      if ($conn->query($sql) === TRUE) {

        echo "Sign up successful";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

      $conn->close();

      // $person_controller = new person_controller();
      // $register_user = $person_controller->add_new_user($fname, $lname, $tel, $email, $password); 
      // echo 'success';
      header("Location:login_page.php");
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
  <title>Signup page </title>

  <link href="../assets/css/style.css" rel="stylesheet" />
</head>

<body>


  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->
      <h2 class="inactive"> Sign UP </h2>


      <!-- Icon -->
      <div class="fadeIn first">
        <h6 class="logo me-auto"><a href="index.html">ENSL</a></h6>
      </div>

      <!-- Login Form -->
      <form method="POST" action="">

        <input type="text" id="fname" class="fadeIn second" name="fname" placeholder="First name">
        <span class='error' style="color:red"> <?php if (isset($errors['fnameErr'])) {
                                                  echo $errors['fnameErr'];
                                                } else {
                                                  echo '';
                                                }; ?></span></br>
        <input type="text" id="lname" class="fadeIn third" name="lname" placeholder="Last name"></br>
        <span class='error' style="color:red"> <?php if (isset($errors['lnameErr'])) {
                                                  echo $errors['lnameErr'];
                                                } else {
                                                  echo '';
                                                }; ?></span></br>
        <input type="text" id="tel" class="fadeIn third" name="tel" placeholder="tel">
        <span class='error' style="color:red"> <?php if (isset($errors['telErr'])) {
                                                  echo $errors['telErr'];
                                                } else {
                                                  echo '';
                                                }; ?></span></br>
        <input type="text" id="email" class="fadeIn second" name="email" placeholder="email"></br>
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
        <input type="submit" class="fadeIn fourth" name='signup_submit' value="Sign Up">

      </form>

      <!-- Remind Passowrd -->
      <div id="formFooter">
        <a class="underlineHover" href="login_page.php">Already have an account, Login instead?</a>
      </div>

    </div>
  </div>



</body>



</html>