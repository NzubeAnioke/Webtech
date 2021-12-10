<?php
//connect to database class
require_once (dirname(__FILE__)).'/../config/database_connect.php';

class personmodel extends Database_connection {
    // registers new user
    public function register ($fname, $lname, $email, $tel, $password){
        

       $results= mysqli_query($this->connect(), 
        "INSERT INTO `person`(`fname`, `lname`, `email`, `Tel`,`p_password`) VALUES ('$fname','$lname', '$tel','$email', '$password')"
    );
    return $results;
    }

    public function validate ($email, $password){
        

        $results= mysqli_query($this->connect(), 
        "SELECT `email`, `p_password` FROM `person` WHERE email='$email' AND p_password='$password'"
     );
     return $results;
     }
    
}