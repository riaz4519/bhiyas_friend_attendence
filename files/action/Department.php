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

    public function single_dept($dept_id){

        $connection = new Connection();

        $update_query = "select * from department where id = '$dept_id' limit 1";

        return $connection->connect()->query($update_query);

    }
    public function update($name,$sort_name,$dept_id){

        $connect = new Connection();

        //$query = "insert into department(name,sort_name)values ('$name','$sort_name')";
        $update_query = "update department set name='$name',sort_name='$sort_name' where id = '$dept_id'";

        try{

            $connect->connect()->query($update_query);

            $_SESSION['dept_update'] = 'updated';


        }catch (Exception $exception){

            return $exception->getMessage();
        }
    }

}