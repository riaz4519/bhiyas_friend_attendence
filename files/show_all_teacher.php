
<!--top meta tags-->
<?php include "../partials/header_meta.php"?>

<?php
include 'action/Connection.php';

include 'action/Teacher.php';
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

                <div class="col-10">

                    <!--getting all the teacher-->
                    <div class="card">

                        <div class="card-header">

                            <h3>All Teacher</h3>

                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">

                                <thead>
                                <tr>
                                    <th>Teacher ID</th>
                                    <th>Name </th>
                                    <th>Teacher Email</th>
                                    <th>Dept.</th>
                                    <th>Action.</th>

                                </tr>

                                </thead>

                                <tbody>

                                <!--value-->

                                <?php



                                $teacher_obj = new Teacher();

                                $teachers = $teacher_obj->getAllTeacher();

                                while ($teacher = $teachers->fetch_object()){

                                    ?>

                                    <tr>
                                        <td><?php echo $teacher->teacher_id_number?></td>
                                        <td><?php echo $teacher->name?></td>
                                        <td><?php echo $teacher->email?></td>
                                        <td><?php echo $teacher->dept_name?></td>
                                        <td><a href="teacher_profile_update.php?teacher_id=<?php echo $teacher->id ?>"class="btn btn-primary">Edit</a></td>
                                    </tr>

                                    <?php

                                }
                                ?>


                                </tbody>

                            </table>
                        </div>

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
