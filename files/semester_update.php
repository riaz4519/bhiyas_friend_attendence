

<!--top meta tags-->
<?php include "../partials/header_meta.php"?>

<!--after submit-->
<?php

include 'action/Connection.php';
include 'action/Semester.php';

if(isset($_POST['update_semester'])){

    /**/

    //making object
    $semester = new Semester();

    $selected_semester = $_POST['semester'].'-'.$_POST['year'];

    $semester->update($selected_semester,$_POST['semester_id']);


}


?>

<!--title tag will be there always-->
<title>Update Semester</title>

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
                <div class="col-8">

                    <div class="card">

                        <div class="card-header">
                            <h3 class="text-center">Update Semester

                                <?php

                                if (isset($_SESSION['update_semester'])){
                                    ?>
                                    <sub class="btn btn-success">Semester Updated</sub>
                                <?php

                                    unset($_SESSION['update_semester']);
                                }

                                ?>
                            </h3>


                        </div>

                        <div class="card-body">

                            <form action="<?php echo  $_SERVER['PHP_SELF']."?semester_id=".$_GET['semester_id']?>" method="post">


                                <?php

                                    $semester = new Semester();

                                    $semester_info = $semester->singleSemester($_GET['semester_id'])->fetch_object();
                                ?>

                                <div class="form-group">

                                    <label for="semester">Semester</label>
                                    <select id="semester" class="form-control" name="semester">
                                        <option  <?php if (explode('-',$semester_info->semester)[0] == 'summer') echo 'selected'?>value="summer">Summer</option>
                                        <option <?php if (explode('-',$semester_info->semester)[0] == 'fall') echo 'selected'?> value="fall">Fall</option>
                                        <option <?php if (explode('-',$semester_info->semester)[0] == 'winter') echo 'selected'?> value="winter">Winter</option>
                                    </select>

                                </div>

                                <div class="form-group">

                                    <label for="year">Year</label>
                                    <input type="text" class="form-control" value="<?php echo (explode('-',$semester_info->semester)[1]) ?>" id="year" name="year"   required>

                                </div>
                                <input type="text" value="<?php echo $_GET['semester_id']?>" class="form-control" name="semester_id" hidden required>


                                <div class="form-group text-center">

                                    <input type="submit" class="btn btn-success " name="update_semester" value="Update">


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
