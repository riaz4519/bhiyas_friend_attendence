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

        $query = "select st.id as id ,st.student_id as student_id,st.name  as name,st.email as email,dep.name as depart from student as st join department as dep on st.department_id = dep.id";

        try{

            return $connect->connect()->query($query);

        }catch (Exception $exception){

            return $exception->getMessage();
        }

    }

    public function studentNotAddedTheCourse($course_id,$semester_id,$department_id){

        /*get all the students which is added to the course first*/
        $connect = new Connection();
        $query = "select student_id from course_student where course_id = '$course_id' and semester_id = '$semester_id'";

        $query_result = $connect->connect()->query($query);
        $already_added_to_course = '';
        while ($id = $query_result->fetch_object()){

            $already_added_to_course .= $id->student_id.',';


        }

        $already_added_to_course = substr($already_added_to_course, 0, -1);

        $query_all_students = "select * from student where id not in ($already_added_to_course) and department_id = '$department_id'";

        return $query_students = $connect->connect()->query($query_all_students);


    }

}