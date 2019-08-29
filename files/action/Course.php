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

    public function getSingleCourse($course_id){

        $connect = new Connection();

        $query = "select * from course where id ='$course_id'";

        $query_result = $connect->connect()->query($query)->fetch_object();

        return $query_result;


    }
    public function getAllCourseOfTeacher($semester_id){

        $connect = new Connection();
        $teacher_id = $_SESSION['teacher_id'];
        $query = "select course.course_name as course_name,course.id as id from course_teacher join course on course.id = course_teacher.course_id where course_teacher.teacher_id ='$teacher_id' and course_teacher.semester_id='$semester_id'";
        try{
            return $connect->connect()->query($query);
        }catch (Exception $exception){

            return $exception->getMessage();
        }



    }
    public function update($course_code,$course_name,$department_id,$course_credit,$course_id){

        $connect = new Connection();

        //$query = "insert into course(course_code,course_name,department_id,credit)values ('$course_code','$course_name','$department_id','$course_credit')";
        $update_query = "update course set course_code='$course_code',course_name='$course_name',department_id='$department_id',credit='$course_credit' where id = '$course_id'";

        $_SESSION['course_update'] = 'updated';

        try{
            $result = $connect->connect()->query($update_query);
        }catch (Exception $exception){

            return $exception->getMessage();
        }
    }



}