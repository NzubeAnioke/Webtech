<?php
//connect to database class
require_once (dirname(__FILE__)).'/../models/personmodel.php';

class person_controller extends personmodel {
    // registers new user
    public function add_new_user ($fname, $lname, $email, $tel, $password){
        
       $new_user=$this-> register($fname, $lname, $email, $tel, $password);
       return $new_user;
      

    }
}