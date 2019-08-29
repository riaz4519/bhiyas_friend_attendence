


<!--top meta tags-->
<?php include "../partials/header_meta.php"?>
<?php

if (!isset($_SESSION['admin_id'])) {

    header('Location: index.php');
}


?>

<?php

include 'action/Connection.php';
include 'action/Student.php';
include "action/Department.php";

if(isset($_POST['update_student'])){

    /**/

    //making object
    $student = new Student();

    echo $student->update($_POST['department_id'],$_POST['name'],$_POST['student_id'],$_POST['email'],$_POST['primary_id']);


}


?>
<!--title tag will be there always-->
<title>Update Student Info</title>

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
                            <h3 class="text-center">Update Student Info

                                <?php

                                if (isset($_SESSION['update_student'])){
                                    ?>
                                    <sub class="btn btn-success">Student Info Updated</sub>
                                <?php

                                    unset($_SESSION['update_student']);
                                }

                                ?>
                            </h3>


                        </div>

                        <div class="card-body">

                            <form action="<?php echo  $_SERVER['PHP_SELF']."?student_id=".$_GET['student_id']?>" method="post">


                                <?php

                                    $student = new Student();

                                    $student_info = $student->singleStudent($_GET['student_id'])->fetch_object();

                                ?>

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

                                            <option <?php if ($student_info->department_id == $department->id) ?> value="<?php echo $department->id; ?>"><?php echo $department->name.'-('.$department->sort_name.')'; ?></option>


                                            <?php

                                        }

                                        ?>
                                    </select>

                                </div>

                                <div class="form-group">

                                    <label for="name">Student Name</label>
                                    <input type="text" class="form-control" value="<?php echo $student_info->name ?>" id="name" name="name"   required>

                                </div>
                                <div class="form-group">

                                    <label for="student_id">Student ID:</label>
                                    <input type="text" class="form-control" value="<?php echo $student_info->student_id ?>" id="student_id" name="student_id"   required>

                                </div>



                                <div class="form-group">

                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" value="<?php echo $student_info->email ?>" id="email" name="email"   required>

                                </div>
                                <input type="text" class="form-control" value="<?php echo $_GET['student_id']; ?>"  name="primary_id"   required hidden>


                                <div class="form-group text-center">

                                    <input type="submit" class="btn btn-success " name="update_student" value="Update">


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
