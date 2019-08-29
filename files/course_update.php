

<!--top meta tags-->
<?php include "../partials/header_meta.php"?>

<!--after submit-->
<?php

include 'action/Connection.php';
include 'action/Course.php';
include 'action/Department.php';

if(isset($_POST['update_course'])){

    /**/


    //making object
    $course = new Course();
    //
    $course->update($_POST['course_code'],$_POST['course_name'],$_POST['department_id'],$_POST['course_credit'],$_POST['course_id']);


}


?>

<!--title tag will be there always-->
<title>Course</title>

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

                <!--course register register-->
                <div class="col-8">

                    <div class="card">

                        <div class="card-header">
                            <h3 class="text-center">Update Course
                            <?php

                                if (isset($_SESSION['course_update'])){

                                    ?>

                                    <sub class="btn btn-success">Course Update</sub>

                                <?php
                                    unset($_SESSION['course_update']);
                                }

                            ?>
                            </h3>


                        </div>

                        <div class="card-body">

                            <form action="<?php echo  $_SERVER['PHP_SELF']."?course_id=".$_GET['course_id']?>" method="post">

                                <?php

                                $course = new Course();

                                $course_info = $course->getSingleCourse($_GET['course_id'])

                                ?>

                                <div class="form-group">

                                    <label for="department_id">Select Department</label>
                                    <select class="form-control" id="department_id" name="department_id" required>
                                        <option selected disabled></option>

                                        <!--get all the department-->
                                        <?php

                                        $department = new Department();

                                        $departments = $department->getAllDepartment();

                                        //traversing the department

                                        while ($single_dept = $departments->fetch_object()){

                                            ?>
                                            <option <?php if ($course_info->department_id == $single_dept->id) echo 'selected'?> value="<?php echo $single_dept->id ?>"><?php echo  $single_dept->name ?></option>

                                        <?php } ?>

                                    </select>

                                </div>
                                <div class="form-group">

                                    <label for="course_code">Course Code</label>
                                    <input type="text" class="form-control" value="<?php echo $course_info->course_code?>" id="course_code" name="course_code" required>

                                </div>

                                <div class="form-group">

                                    <label for="course_name">Course Name</label>
                                    <input type="text" class="form-control"  value="<?php echo $course_info->course_name?>" id="course_name" name="course_name"   required>

                                </div>
                                <div class="form-group">

                                    <label for="course_credit">Course Credit</label>
                                    <input type="text" class="form-control"  value="<?php echo $course_info->credit?>" id="course_credit" name="course_credit"   required>

                                </div>

                                <input type="text" class="form-control" name="course_id" value="<?php echo $course_info->id?>" hidden  required>


                                <div class="form-group text-center">

                                    <input type="submit" class="btn btn-success " name="update_course" value="Update">


                                </div>


                            </form>
                        </div>

                    </div>




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
