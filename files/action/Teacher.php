<?php

require_once 'Connection.php';

class Teacher
{

    /*this function is for registering the teacher */
    public function register($teacher_id,$teacher_name,$email,$password){

        $connect = new Connection();
        /*query of registering the teacher */
       $query = "insert into teacher(teacher_id_number,name,email,password)values ('$teacher_id','$teacher_name','$email','$password')";


        try{

            /*executing the  query*/
           return $teacher_register =  $connect->connect()->query($query);


        }catch (Exception $exception){

            return $exception->getMessage();
        }



    }

    public function getAllTeacher(){

        $connect = new Connection();

        $query = "select * from teacher";

        try{

            return $connect->connect()->query($query);

        }catch (Exception $exception){

            return $exception->getMessage();
        }

    }

}