
<!--top meta tags-->
<?php include "../partials/header_meta.php"?>

<!--after submit-->
<?php
include 'action/Connection.php';
include "action/Teacher.php";



?>

<?php

    if (isset($_POST['update_pass'])){

        $prev_pass = $_POST['prev_pass'];
        $new_pass = $_POST['new_pass'];

        $teacher = new Teacher();

        $teacher->updatePassword($new_pass,$prev_pass);
    }

?>

<!--title tag will be there always-->
<title>Teacher Dashboard</title>

<!--style bootstrap css -->
<?php include '../partials/basic_css.php'?>

<!--extra css-->

<!--end extra css-->

<!--middle head and body tag-->
<?php include "../partials/header_middle.php"; ?>

<!--content goes here-->


<!--nav header-->
<?php include 'header_nav_teacher.php' ?>
<!--end nav header -->

<!--side nav-->
<div class="container-fluid mt-3">
    <div class="row">

        <div class="col-2">

            <?php include 'side_nav_teacher.php'?>

        </div>


        <div class="col-10">
            <div class="row justify-content-center">

                <div class="col-10">


                    <div class="card">

                        <div class="card-header text-center">
                            <h3>Change Password <?php if (isset($_SESSION['update_pass'])){
                                ?>

                                    <sub class="btn btn-success">Password Updated</sub>
                                <?php

                                    unset($_SESSION['update_pass']);

                                } ?></h3>
                        </div>

                        <div class="card-body">


                            <form action="<?php echo  $_SERVER['PHP_SELF']?>" method="post">
                                <div class="form-group">

                                    <label for="prev_pass">Previous Password</label>
                                    <input id="prev_pass" type="password" name="prev_pass" class="form-control" required>

                                </div>

                                <div class="form-group">

                                    <label for="new_pass">New Password</label>
                                    <input id="new_pass" name="new_pass" type="password" class="form-control" required>

                                </div>


                                <input type="submit" value="Update Password" name="update_pass" class="btn btn-secondary btn-lg float-right">


                            </form>


                        </div>

                    </div>




                </div>

            </div>

            <div class="row justify-content-center">





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
