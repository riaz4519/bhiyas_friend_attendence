
<!--top meta tags-->
<?php include "../partials/header_meta.php"?>

<!--after submit-->
<?php
include 'action/Connection.php';
include 'action/Teacher.php';



?>

<!--title tag will be there always-->
<title>Teacher Dashboard</title>

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

                    <!--get the attendance list-->

                    <table class="table table-bordered">

                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>View</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php

                            $course = $_GET['course'];
                            $semester = $_GET['semester'];

                            $teacher = new Teacher();

                            $get_attendance_data = $teacher->allAttendanceForCourse($course,$semester);

                            while ($date = $get_attendance_data->fetch_object()){


                        ?>

                            <tr>
                                <td><?php

                                    $date_create = date_create($date->date);
                                    echo date_format($date_create,"d M y");
                                    ?></td>
                                <td><a href="teacher_take_attendance.php?course=<?php echo $course ?>&semester=<?php echo $semester ?>&date=<?php echo $date->date ?>" class="btn btn-primary">View</a></td>

                            </tr>

                        <?php
                            }
                        ?>

                        </tbody>

                    </table>





                </div>

            </div>

            <div class="row justify-content-center">





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
