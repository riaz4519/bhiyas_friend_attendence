
<!--top meta tags-->
<?php include "../partials/header_meta.php"?>

<!--after submit-->
<?php
include 'action/Connection.php';
include 'action/Department.php';
if(isset($_POST['submit_department'])){

    /**/

    //making object
    $department = new Department();
    //
    $department->register($_POST['department_name'],$_POST['department_short_name']);


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
                <div class="col-6">

                    <div class="card">

                        <div class="card-header">
                            <h3 class="text-center">Register Department</h3>


                        </div>

                        <div class="card-body">

                            <form action="<?php echo  $_SERVER['PHP_SELF']?>" method="post">


                                <div class="form-group">

                                    <label for="department_name">Department Name</label>
                                    <input type="text" class="form-control" id="department_name" name="department_name" required>

                                </div>

                                <div class="form-group">

                                    <label for="department_short_name">Department Short Name</label>
                                    <input type="text" class="form-control" id="department_short_name" name="department_short_name"   required>

                                </div>

                                <div class="form-group text-center">

                                    <input type="submit" class="btn btn-success " name="submit_department" value="Register Department">


                                </div>


                            </form>
                        </div>

                    </div>




                </div>

                <!--all the departments-->
                <div class="col-5">

                    <div class="card">

                        <div class="card-header">

                            <h3 class="text-center">All Department</h3>

                        </div>

                        <div class="card-body">

                            <table class="table table-bordered">

                                <thead>
                                <tr>
                                    <th>Dep. Name</th>
                                    <th>Dep. Short Name</th>
                                </tr>
                                </thead>

                                <tbody>

                                <!--getting all the department-->

                                <?php



                                $dep_obj = new Department();

                                $departments = $dep_obj->getAllDepartment();

                                //traversing department

                                while ($department = $departments->fetch_object()){

                                    ?>
                                    <tr>
                                        <td><?php echo $department->name ?></td>
                                        <td><?php echo $department->sort_name ?></td>
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

                <!--end of all the departments-->



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
