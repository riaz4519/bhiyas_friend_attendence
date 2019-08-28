<?php

require_once 'Connection.php';

class Teacher
{

    /*this function is for registering the teacher */
    public function register($teacher_id,$teacher_name,$email,$password,$department_id){

        $connect = new Connection();
        /*query of registering the teacher */
       $query = "insert into teacher(teacher_id_number,name,email,password,department_id)values ('$teacher_id','$teacher_name','$email','$password','$department_id')";


        try{

            /*executing the  query*/
           return $teacher_register =  $connect->connect()->query($query);


        }catch (Exception $exception){

            return $exception->getMessage();
        }



    }

    public function getAllTeacher(){

        $connect = new Connection();

        $query = "select t.id as id,t.teacher_id_number as teacher_id_number,t.name as name,t.email as email,department.name as dept_name  from teacher as t join department on t.department_id = department.id";

        try{

            return $connect->connect()->query($query);

        }catch (Exception $exception){

            return $exception->getMessage();
        }

    }

    public function courseAlreadyAdded($teacher_id,$semester_id){

        $connect = new Connection();

        $query = "select course.course_name as course_name,course.id as id,course.credit as credit from course_teacher join course on course.id = course_teacher.course_id where course_teacher.teacher_id ='$teacher_id' and course_teacher.semester_id='$semester_id'";



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

    public function courseLeftToAddStudent($teacher_id,$semester_id){

        $connect = new Connection();

        $added_course =  $this->studentCourseAddedAlready($teacher_id,$semester_id);

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

    public function studentCourseAddedAlready($student_id,$semester_id){

        $connect = new Connection();



        $query = "select course.course_name as course_name,course.id as id,course.credit as credit from course_student join course on course.id = course_student.course_id where course_student.student_id ='$student_id' and course_student.semester_id='$semester_id'";



        try{
            return $connect->connect()->query($query);
        }catch (Exception $exception){

            return $exception->getMessage();
        }


    }

    public function teacherAddCourseToStudent($students,$semester_id,$course){

        $connect = new Connection();
        $teacher = $_SESSION['teacher_id'];

        foreach ($students as $student){

            $query = "insert into course_student(student_id,semester_id,course_id,teacher_id)values ('$student','$semester_id','$course','$teacher')";

            $connect->connect()->query($query);

        }

    }

    public function attendanceDetect($course_id,$teacher_id,$semester_id,$date){

        //return true or false

        $query = "select * from attendance_taken where course_id ='$course_id' and teacher_id='$teacher_id' and semester_id='$semester_id' and date='$date'";

        $connect = new Connection();

        if($connect->connect()->query($query)->num_rows >0){

            return true;

        }else{
            return false;
        }


    }

    public function takeAttendance($date,$students,$course,$semester,$teacher){

        $connect = new Connection();
        //first insert into attendance taken
            $query_attendance_taken = "insert into attendance_taken(course_id,teacher_id,semester_id,date)values ('$course','$teacher','$semester','$date')";
            $connect->connect()->query($query_attendance_taken);

        //insert into attendance

        $students_obj = new Student();
        $all_the_students = $students_obj->allTheStudentForAttendance($semester,$course,$teacher);

        while($single_students = $all_the_students->fetch_object()){

            if(in_array($single_students->id,$students)){

                $query_attendance = "insert into attendance(student_id,present,date,course_id,semester_id,teacher_id)values('$single_students->id',1,'$date','$course','$semester','$teacher')";
                $connect->connect()->query($query_attendance);
            }else{
                $query_attendance = "insert into attendance(student_id,present,date,course_id,semester_id,teacher_id)values('$single_students->id',0,'$date','$course','$semester','$teacher')";
                $connect->connect()->query($query_attendance);
            }

        }

        //insert one by one

    }

    public function updateAttendance($date,$students,$course,$semester,$teacher){


        $connect = new Connection();
        $students_obj = new Student();
        $all_the_students = $students_obj->allTheStudentForAttendance($semester,$course,$teacher);

        while($single_students = $all_the_students->fetch_object()){

            if(in_array($single_students->id,$students)){

                $query_attendance = "update attendance set present=1 where student_id ='$single_students->id'and date='$date' and course_id='$course' and semester_id = '$semester' and teacher_id='$teacher'";
                $connect->connect()->query($query_attendance);
            }else{
                $query_attendance = "update attendance set present=0 where student_id ='$single_students->id'and date='$date' and course_id='$course' and semester_id = '$semester' and teacher_id='$teacher'";

                $connect->connect()->query($query_attendance);
            }

        }





    }

}