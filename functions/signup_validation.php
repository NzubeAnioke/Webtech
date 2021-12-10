
<?php

//connect to database class
require_once '../controller/person_controller.php';

// keeping track of errors
$errors = array();

// check if button is clicked
if(isset($_POST["signup_submit"])){
    // grab form data
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $tel = $_POST["tel"];
    $email = $_POST["email"];
    $password = $_POST["password"];
   


    // validate data

    // check if fields are empty
    if(empty($fname)){array_push($errors, "first name is required");}
    if(empty($lname)){array_push($errors, "last name is required");}
    if(empty($tel)){array_push($errors, "Tel is required");}
    if(empty($email)){array_push($errors, "email is required");}
    if(empty($password)){array_push($errors, "password is required");}
    

    // check if fields are of appropriate length
    if(strlen($fname) > 20){array_push($errors, "name must be under 20 characters");}
    if(strlen($lname) > 20){array_push($errors, "name must be under 20 characters");}
    if(strlen($tel) > 20){array_push($errors, "tel must be under 20 characters");}
    if(strlen($email) > 50){array_push($errors, "email must be under 50 characters");}

    // validate email with regex
    $regex = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
    // set error if not an email
    if(!preg_match($regex, $email)){
        array_push($errors, "enter a valid email");
    }   

     // check if user is registered
     if(count($errors)===0){





// encrypt password
$password = md5($password);
$person_controller = new person_controller();
$register_user = $person_controller->add_new_user($fname, $lname, $tel, $email, $password);
//echo "success";
header("location:../view/login_page.php");
 }else{
    session_start();
    // store errors inside session
    $_SESSION["errors"] = $errors;
    print_r($errors);
    
        
     }

}



?>

