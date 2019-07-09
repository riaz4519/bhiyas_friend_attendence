<?php




class Department
{

    public function register($name,$sort_name){

        $connect = new Connection();

        $query = "insert into department(name,sort_name)values ('$name','$sort_name')";

        try{

            return $connect->connect()->query($query);

        }catch (Exception $exception){

            return $exception->getMessage();
        }


    }

    public function getAllDepartment(){

        $connect = new Connection();
        $query = "SELECT * from department where 1";

        return $connect->connect()->query($query);

    }

}