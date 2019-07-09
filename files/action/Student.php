<?php


class Student
{

    public function register($department_id,$name,$student_id,$email){

        //connection

        $connect = new Connection();

        //query

         $query = "insert into student(department_id,name,student_id,email)values ('$department_id','$name','$student_id','$email')";

        try{

            return $connect->connect()->query($query);

        }catch (Exception $exception){

            return $exception->getMessage();

        }

    }

    public function getAllStudent(){

        $connect = new Connection();

        $query = "select st.student_id as student_id,st.name  as name,st.email as email,dep.name as depart from student as st join department as dep on st.department_id = dep.id";

        try{

            return $connect->connect()->query($query);

        }catch (Exception $exception){

            return $exception->getMessage();
        }

    }

}