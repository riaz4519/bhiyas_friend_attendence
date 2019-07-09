<?php

include 'Connection.php';

class Course extends Connection
{

    //course register
    public function register($course_code,$course_name){


        $query = "insert into course(course_code,course_name)values ('$course_code','$course_name')";

        try{
            return $result = $this->connect()->query($query);
        }catch (Exception $exception){

            return $exception->getMessage();
        }


    }

    public function getAllCourse(){


        $query = "select * from course where  1";

        return $this->connect()->query($query);

    }

}