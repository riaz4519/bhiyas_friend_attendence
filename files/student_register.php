

<!--top meta tags-->
<?php include "../partials/header_meta.php"?>

<!--after submit-->
<?php

include 'action/Connection.php';
include 'action/Student.php';
include "action/Department.php";

if(isset($_POST['submit_student'])){

    /**/

    //making object
    $student = new Student();

    echo $student->register($_POST['department_id'],$_POST['name'],$_POST['student_id'],$_POST['email']);


}


?>

<!--title tag will be there always-->
<title>Register Student</title>

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

                <!--student register-->

                <div class="col-10">

                    <div class="card">

                        <div class="card-header">
                            <h3 class="text-center">Register Student</h3>


                        </div>

                        <div class="card-body">

                            <form action="<?php echo  $_SERVER['PHP_SELF']?>" method="post">


                                <div class="form-group">

                                    <label for="department_id">Select Department</label>
                                    <select id="department_id" class="form-control" name="department_id">

                                        <!--get all the department-->
                                        <?php

                                            $department_obj = new Department();

                                            $departments = $department_obj->getAllDepartment();

                                            //traversing the department

                                        while ($department = $departments->fetch_object()){



                                        ?>

                                        <option value="<?php echo $department->id; ?>"><?php echo $department->name.'-('.$department->sort_name.')'; ?></option>


                                        <?php

                                        }

                                        ?>
                                    </select>

                                </div>

                                <div class="form-group">

                                    <label for="name">Student Name</label>
                                    <input type="text" class="form-control" id="name" name="name"   required>

                                </div>
                                <div class="form-group">

                                    <label for="student_id">Student ID:</label>
                                    <input type="text" class="form-control" id="student_id" name="student_id"   required>

                                </div>



                                <div class="form-group">

                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email"   required>

                                </div>

                                <div class="form-group text-center">

                                    <input type="submit" class="btn btn-success " name="submit_student" value="Register Student">


                                </div>



                            </form>
                        </div>

                    </div>




                </div>

                <!--end of student register-->





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
