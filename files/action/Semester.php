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

    public function singleSemester($semester_id){

        $connection = new Connection();

        $query = "select * from semester where id = '$semester_id' limit 1";




        try{

            return $connection->connect()->query($query);

        }catch (Exception $exception){

            return $exception->getMessage();
        }

    }

    public function update($semester,$semester_id){


        $connect = new Connection();
        $query = "update semester set semester = '$semester' where id = '$semester_id'";


        try{

            $connect->connect()->query($query);
            $_SESSION['update_semester'] = 'updated';

        }catch (Exception $exception){

            return $exception->getMessage();
        }

    }


}