

<!--top meta tags-->
<?php include "../partials/header_meta.php"?>

<!--after submit-->
<?php

include 'action/Connection.php';
include 'action/Course.php';
include 'action/Department.php';

if(isset($_POST['submit_course'])){

    /**/


    //making object
    $course = new Course();
    //
    $course->register($_POST['course_code'],$_POST['course_name'],$_POST['department_id'],$_POST['course_credit']);


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
                <div class="col-5">

                    <div class="card">

                        <div class="card-header">
                            <h3 class="text-center">Register Course</h3>


                        </div>

                        <div class="card-body">

                            <form action="<?php echo  $_SERVER['PHP_SELF']?>" method="post">


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
                                            <option value="<?php echo $single_dept->id ?>"><?php echo  $single_dept->name ?></option>

                                        <?php } ?>

                                    </select>

                                </div>
                                <div class="form-group">

                                    <label for="course_code">Course Code</label>
                                    <input type="text" class="form-control" id="course_code" name="course_code" required>

                                </div>

                                <div class="form-group">

                                    <label for="course_name">Course Name</label>
                                    <input type="text" class="form-control" id="course_name" name="course_name"   required>

                                </div>
                                <div class="form-group">

                                    <label for="course_credit">Course Credit</label>
                                    <input type="text" class="form-control" id="course_credit" name="course_credit"   required>

                                </div>

                                <div class="form-group text-center">

                                    <input type="submit" class="btn btn-success " name="submit_course" value="Register Course">


                                </div>


                            </form>
                        </div>

                    </div>




                </div>

                <!--all the course-->
                <div class="col-6">

                    <div class="card">

                        <div class="card-header">

                            <h3 class="text-center">All course</h3>

                        </div>

                        <div class="card-body">

                            <table class="table table-bordered">

                                <thead>
                                <tr>
                                    <th>Course Code</th>
                                    <th>Course Name</th>
                                    <th>Credit</th>
                                    <th>Dept</th>
                                </tr>
                                </thead>

                                <tbody>

                                <!--getting all the department-->

                                <?php

                                $course_obj = new Course();

                                $courses = $course_obj->getAllCourse();



                                //traversing department

                                while ($course = $courses->fetch_object()){

                                    ?>
                                    <tr>
                                        <td><?php echo $course->course_code ?></td>
                                        <td><?php echo $course->course_name ?></td>
                                        <td><?php echo $course->credit ?></td>
                                        <td><?php echo $course->dept_sort ?></td>
                                    </tr>

                                    <?php

                                }

                                ?>

                                <!--end of getting department-->
                                </tbody>

                            </table>

                        </div>

                    </div>




                </div>

                <!--end of all the course-->



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
