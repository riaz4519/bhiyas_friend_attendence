


<!--top meta tags-->
<?php include "../partials/header_meta.php"?>
<?php

if (!isset($_SESSION['admin_id'])) {

    header('Location: index.php');
}


?>

<?php

include 'action/Connection.php';
include 'action/Teacher.php';
include 'action/Department.php';

/*when the register button is clicked it will come here*/
if(isset($_POST['update_teacher'])){


    /*making object of teacher class*/
    $teacher = new Teacher();

    /*sending the values to teacher class - register function*/
    $result = $teacher->register($_POST['teacher_id'],$_POST['teacher_name'],$_POST['teacher_email'],$_POST['teacher_password'],$_POST['department_id']);


}

/*end of register*/


?>
<!--title tag will be there always-->
<title>Admin Dashboard</title>

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
                            <h3 class="text-center">Edit Teacher Info</h3>


                        </div>

                        <div class="card-body">

                            <form action="<?php echo  $_SERVER['PHP_SELF']?>" method="post">


                                <!--teacher info-->

                                <?php

                                    $teacher = new Teacher();

                                    $teacher_info = $teacher->singleTeacher($_GET['teacher_id'])->fetch_object();

                                ?>

                                <!--end teacher info-->


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
                                            <option <?php if ($teacher_info->department_id == $single_dept->id ) echo 'selected'?> value="<?php echo $single_dept->id ?>"><?php echo  $single_dept->name ?></option>

                                        <?php } ?>

                                    </select>

                                </div>
                                <div class="form-group">

                                    <label for="teacher_id">Teacher ID (unique)</label>
                                    <input type="text" class="form-control" value="<?php echo $teacher_info->teacher_id_number ?>" id="teacher_id" name="teacher_id" required>

                                </div>

                                <div class="form-group">

                                    <label for="teacher_name">Teacher Name</label>
                                    <input type="text" value="<?php echo $teacher_info->name ?>" class="form-control" id="teacher_name" name="teacher_name"   required>

                                </div>

                                <div class="form-group">

                                    <label for="teacher_email">Email</label>
                                    <input type="email" value="<?php echo $teacher_info->email ?>" class="form-control" id="teacher_email" name="teacher_email"  required>

                                </div>

                                <input type="text" value="<?php echo $_GET['teacher_id'] ?>"   name="teacher_id_primary" hidden required>





                                <div class="form-group text-center">

                                    <input type="submit" class="btn btn-success btn-lg" value="Register Teacher" name="update_teacher">

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
