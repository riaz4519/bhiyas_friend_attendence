

<!--top meta tags-->
<?php include "../partials/header_meta.php"?>

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

                    <!--getting all the teacher-->

                        <table class="table table-bordered">

                            <thead>
                            <tr>
                                <th>Teacher ID</th>
                                <th>Name </th>
                                <th>Teacher Email</th>

                            </tr>

                            </thead>

                            <tbody>

                            <!--value-->

                            <?php

                            include 'action/Teacher.php';

                            $teacher_obj = new Teacher();

                            $teachers = $teacher_obj->getAllTeacher();

                            while ($teacher = $teachers->fetch_object()){

                                ?>

                                <tr>
                                    <td><?php echo $teacher->teacher_id_number?></td>
                                    <td><?php echo $teacher->name?></td>
                                    <td><?php echo $teacher->email?></td>
                                </tr>

                            <?php

                            }
                            ?>


                            </tbody>

                        </table>

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
