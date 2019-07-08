<?php

require_once 'Connection.php';
class login extends Connection
{

 public function adminLogin($email,$password){

     $query = "select * from admin where email='$email' and password='$password'";

     if($login_success = $this->connect()->query($query)){

         $admin= $login_success->fetch_object();

         $_SESSION['admin_id'] = $admin->id;
         $_SESSION['admin_name'] = $admin->name;

         header('Location: files/admin_dashboard.php');



     }

 }

 public function teacherLogin($email,$password){

     return $email;


 }




}


