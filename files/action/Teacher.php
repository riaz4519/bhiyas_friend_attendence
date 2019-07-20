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

    public function courseAlreadyAdded($teacher_id,$semester_id){

        $connect = new Connection();

        $query = "select course.course_name as course_name,course.id as id from course_teacher join course on course.id = course_teacher.course_id where course_teacher.teacher_id ='$teacher_id' and course_teacher.semester_id='$semester_id'";



        try{
            return $connect->connect()->query($query);
        }catch (Exception $exception){

            return $exception->getMessage();
        }


    }

    public function courseLeftToAdd($teacher_id,$semester_id){

        $connect = new Connection();

        $added_course =  $this->courseAlreadyAdded($teacher_id,$semester_id);

        if ($added_course->num_rows > 0){
            $already_added = '';

            while ($single_course = $added_course->fetch_object()){


                $already_added .=  $single_course->id.',';


            }

            $already_added = substr($already_added, 0, -1);


            $query = "select * from course where  id not  in ($already_added)";
        }else{

            $query = "select * from course ";
        }



        try{
            return $connect->connect()->query($query);
        }catch (Exception $exception){

            return $exception->getMessage();
        }

    }

    public function addCourse($teacher_id,$semester_id,$courses){

        $connect = new Connection();

        foreach ($courses as $course){

            $query = "insert into course_teacher(teacher_id,semester_id,course_id)values ('$teacher_id','$semester_id','$course')";

            $connect->connect()->query($query);

        }



    }

}