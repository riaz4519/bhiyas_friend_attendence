
<!--top meta tags-->
<?php include "../partials/header_meta.php"?>

<?php

/*including the teacher class*/
include 'action/Connection.php';
include 'action/Teacher.php';
include 'action/Department.php';
/*when the register button is clicked it will come here*/
if(isset($_POST['submit_teacher'])){


    /*making object of teacher class*/
    $teacher = new Teacher();

    /*sending the values to teacher class - register function*/
    $result = $teacher->register($_POST['teacher_id'],$_POST['teacher_name'],$_POST['teacher_email'],$_POST['teacher_password'],$_POST['department_id']);


}

/*end of register*/


?>

<!--title tag will be there always-->
<title>Register Teacher</title>

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


        <div class="col-9">

            <div class="row justify-content-center">

                <div class="col-8">


                    <div class="card">

                        <div class="card-header">
                            <h3 class="text-center">Register Teacher</h3>


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

                                    <label for="teacher_id">Teacher ID (unique)</label>
                                    <input type="text" class="form-control" id="teacher_id" name="teacher_id" required>

                                </div>

                                <div class="form-group">

                                    <label for="teacher_name">Teacher Name</label>
                                    <input type="text" class="form-control" id="teacher_name" name="teacher_name"   required>

                                </div>

                                <div class="form-group">

                                    <label for="teacher_email">Email</label>
                                    <input type="email" class="form-control" id="teacher_email" name="teacher_email"  required>

                                </div>

                                <div class="form-group">

                                    <label for="teacher_password">Password</label>
                                    <input type="password" class="form-control" id="teacher_password" name="teacher_password" required>

                                </div>


                                <div class="form-group text-center">

                                    <input type="submit" class="btn btn-success btn-lg" value="Register Teacher" name="submit_teacher">

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
