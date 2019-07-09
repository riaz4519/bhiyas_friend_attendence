<?php



class Course
{

    //course register
    public function register($course_code,$course_name){

        $connect = new Connection();

        $query = "insert into course(course_code,course_name)values ('$course_code','$course_name')";

        try{
            return $result = $connect->connect()->query($query);
        }catch (Exception $exception){

            return $exception->getMessage();
        }


    }

    public function getAllCourse(){

        $connect = new Connection();

        $query = "select * from course where  1";

        try{
            return $connect->connect()->query($query);
        }catch (Exception $exception){

            return $exception->getMessage();
        }



    }

}