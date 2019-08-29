
<!--top meta tags-->
<?php include "../partials/header_meta.php"?>

<!--after submit-->
<?php
include 'action/Connection.php';
include 'action/Department.php';
if(isset($_POST['update_department'])){

    /**/

    //making object
    $department = new Department();
    //
    $department->update($_POST['department_name'],$_POST['department_short_name'],$_POST['dept_id']);


}


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


        <div class="col-10">

            <div class="row justify-content-center">

                <!--department register-->
                <div class="col-8">

                    <div class="card">

                        <div class="card-header">
                            <h3 class="text-center">Update Department

                                <?php

                                if (isset($_SESSION['dept_update'])){

                                    ?>

                                    <sub class="btn btn-success">Department Updated</sub>

                                <?php

                                    unset($_SESSION['dept_update']);
                                }

                                ?>
                            </h3>


                        </div>

                        <div class="card-body">

                            <form action="<?php echo  $_SERVER['PHP_SELF']."?dept_id=".$_GET['dept_id']?>" method="post">

                                <?php

                                $department = new Department();

                                $department_info = $department->single_dept($_GET['dept_id'])->fetch_object();

                                ?>

                                <div class="form-group">

                                    <label for="department_name">Department Name</label>
                                    <input type="text" class="form-control" id="department_name" value="<?php echo $department_info->name?>" name="department_name" required>

                                </div>

                                <div class="form-group">

                                    <label for="department_short_name">Department Short Name</label>
                                    <input type="text" class="form-control" id="department_short_name" value="<?php echo $department_info->sort_name?>" name="department_short_name"   required>

                                </div>
                                <input type="text" value="<?php echo  $_GET['dept_id']; ?>" class="form-control" name="dept_id" hidden  required>


                                <div class="form-group text-center">

                                    <input type="submit" class="btn btn-secondary " name="update_department" value="Update">


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
