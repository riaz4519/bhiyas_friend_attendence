
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
<?php include 'header_nav_admin.php' ?>
<!--end nav header -->

<!--side nav-->
<div class="container-fluid mt-3">
    <div class="row">

        <div class="col-2">

            <?php include 'side_nav_admin.php'?>

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
                        <form class="card-body" action="<?php echo $_SERVER['PHP_SELF'] ?>">

                            <table class="table table-bordered">

                                <thead >
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Select</th>
                                        </tr>
                                </thead>

                                <tbody>


                                <?php

                                    $students = new Student();

                                    $all_students = $students->studentNotAddedTheCourse($_GET['course'],$_GET['semester'],$course_detail->id);

                                    while($single = $all_students->fetch_object()){

                                       ?>

                                        <tr>
                                            <td><?php echo ucwords($single->student_id) ?></td>
                                            <td><?php echo ucwords($single->name) ?></td>
                                            <td><?php echo ucwords($single->email) ?></td>
                                            <td><input type="checkbox" class="form-control" name="students[]"></td>
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
