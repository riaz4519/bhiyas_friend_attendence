<?php


class Semester
{

    public function register($semester){

        $connect = new Connection();
        $query = "insert into semester(semester)value('$semester')";


        try{

             return $connect->connect()->query($query);

        }catch (Exception $exception){

            return $exception->getMessage();
        }



    }

    public function getAllSemester(){

        $connect = new Connection();
        $query = "select * from semester where  1";

        try{

            return $connect->connect()->query($query);
        }catch (Exception $exception){

            return $exception->getMessage();
        }
    }


}