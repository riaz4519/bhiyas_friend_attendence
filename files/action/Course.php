<?php



class Course
{

    //course register
    public function register($course_code,$course_name,$department_id,$course_credit){

        $connect = new Connection();

        $query = "insert into course(course_code,course_name,department_id,credit)values ('$course_code','$course_name','$department_id','$course_credit')";

        try{
            return $result = $connect->connect()->query($query);
        }catch (Exception $exception){

            return $exception->getMessage();
        }


    }

    public function getAllCourse(){

        $connect = new Connection();

        $query = "select c.id as id ,c.course_code as course_code,c.course_name as course_name ,c.credit as credit, dept.name as dept_name,dept.sort_name as dept_sort from course as c join department as dept on c.department_id = dept.id ";

        try{
            return $connect->connect()->query($query);
        }catch (Exception $exception){

            return $exception->getMessage();
        }



    }

}