
<!--top meta tags-->
<?php include "../partials/header_meta.php"?>




<?php
include 'action/Connection.php';

include 'action/Teacher.php';

include 'action/Student.php';

include 'action/Course.php';

//semester
include 'action/Semester.php';
?>

<?php

if (isset($_GET['set_date'])){

    $return_same = $_SERVER['HTTP_REFERER'];

    $date = $_GET['date'];

    header('Location: '.$return_same."&date=".$date);

}


?>

<?php

    if (isset($_POST['take_attendance'])){


        if (isset($_GET['date'])){



        }else{


        }

    }



?>



<!--title tag will be there always-->
<title>Teacher Add Student</title>

<!--style bootstrap css -->
<?php include '../partials/basic_css.php'?>

<!--extra css-->

<!--end extra css-->

<!--middle head and body tag-->
<?php include "../partials/header_middle.php"; ?>

<!--content goes here-->


<!--nav header-->
<?php include 'header_nav_teacher.php' ?>
<!--end nav header -->

<!--side nav-->
<div class="container-fluid mt-3">
    <div class="row">

        <div class="col-2">

            <?php include 'side_nav_teacher.php'?>

        </div>


        <div class="col-10">

            <div class="row justify-content-center">

                <div class="col-10">

                    <!--getting all the teacher-->
                    <div class="card">

                        <div class="card-header">

                            <?php

                            $course = new Course();

                            $course_detail = $course->getSingleCourse($_GET['course']);

                            ?>


                            <h3 class="text-center">Add Student To <?php echo ucwords($course_detail->course_name) ?> - <?php echo strtoupper($course_detail->course_code)?></h3>

                        </div>

                            <form action="<?php $_SERVER['PHP_SELF'] ?>" class="ml-3">
                                <p>Select Date:</p>
                                <div class="row">
                                    <input id="date" type="date" value="<?php if (isset($_GET['date'])){

                                       $date =  date_create($_GET['date']);
                                       echo date_format($date,'Y-m-d');

                                    } ?>" class="form-control col-5" name="date" required>
                                    <input type="submit" name="set_date" value="Select" class="btn btn-primary" >
                                </div>




                            </form>

                        <?php

                        $students = new Student();


                        $attendance_sure = false;

                        if (isset($_GET['date'])){

                            $teacher_object = new Teacher();
                            $attendance_sure = $teacher_object->attendanceDetect($_GET['course'],$_SESSION['teacher_id'],$_GET['semester'],$_GET['date']);

                            if($attendance_sure){

                                $all_students = $students->alreadyTakenAttendance($_GET['semester'],$_GET['course'],$_SESSION['teacher_id'],$_GET['date']);

                            }else{

                                $all_students = $students->allTheStudentForAttendance($_GET['semester'],$_GET['course'],$_SESSION['teacher_id']);

                            }



                        }else{
                            $all_students = $students->allTheStudentForAttendance($_GET['semester'],$_GET['course'],$_SESSION['teacher_id']);

                        }



                        ?>


                        <form class="card-body" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">


                            <input type="text" name="course" value="<?php echo $_GET['course']?>" hidden>
                            <input type="text" name="semester" value="<?php echo $_GET['semester']?>" hidden>
                            <?php

                            if ($attendance_sure == true){

                                ?>
                                <input type="submit" name="update_attendance" value="update" class="btn btn-success float-right mb-2" >

                                <?php
                            }
                            else{
                                ?>

                                <input type="submit" name="take_attendance" value="save" class="btn btn-success float-right mb-2" >

                                <?php
                            }

                            ?>
                            <table class="table table-bordered">

                                <thead >
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Present</th>
                                </tr>
                                </thead>


                                <tbody>


                                <?php


                                while($single = $all_students->fetch_object()){

                                    ?>


                                    <tr>
                                        <td><?php echo ucwords($single->student_id) ?></td>
                                        <td><?php echo ucwords($single->name) ?></td>

                                        <?php

                                        if ($attendance_sure == true){

                                            ?>
                                            <td><input type="checkbox" value="<?php echo $single->id ?>" class="form-control" name="students[]"></td>

                                            <?php

                                        }
                                        else{

                                            ?>

                                            <td><input type="checkbox" value="<?php echo $single->id ?>" class="form-control" name="students[]"></td>


                                            <?php
                                        }
                                        ?>
                                    </tr>

                                    <?php

                                }

                                ?>
                                </tbody>

                            </table>



                        </form>

                    </div>



                    <!--end of getting teacher-->






                </div>

            </div>





        </div>

    </div>
</div>
<!--end side nav-->


<!--end of content-->

<!--scripts jquery and bootstrap-->
<?php include "../partials/basic_script.php"; ?>

<!--footer tags body and html-->
<?php include "../partials/footer_tag.php"; ?>
