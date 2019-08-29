

<!--top meta tags-->
<?php include "../partials/header_meta.php"?>

<!--after submit-->
<?php

include 'action/Connection.php';
include 'action/Semester.php';

if(isset($_POST['submit_semester'])){

    /**/

    //making object
    $semester = new Semester();

    $selected_semester = $_POST['semester'].'-'.date('Y',strtotime($_POST['year']));

    echo  $semester->register($selected_semester);


}


?>

<!--title tag will be there always-->
<title>Semester</title>

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
                <div class="col-6">

                    <div class="card">

                        <div class="card-header">
                            <h3 class="text-center">Register Semester</h3>


                        </div>

                        <div class="card-body">

                            <form action="<?php echo  $_SERVER['PHP_SELF']?>" method="post">


                                <div class="form-group">

                                    <label for="semester">Semester</label>
                                    <select id="semester" class="form-control" name="semester">

                                        <option value="fall">Fall</option>
                                        <option value="summer">Summer</option>
                                        <option value="winter">Winter</option>
                                    </select>

                                </div>

                                <div class="form-group">

                                    <label for="year">Course Name</label>
                                    <input type="date" class="form-control" id="year" name="year"   required>

                                </div>

                                <div class="form-group text-center">

                                    <input type="submit" class="btn btn-success " name="submit_semester" value="Register Semester">


                                </div>


                            </form>
                        </div>

                    </div>




                </div>

                <!--all the course-->
                <div class="col-5">

                    <div class="card">

                        <div class="card-header">

                            <h3 class="text-center">All Department</h3>

                        </div>

                      <div class="card-body">

                            <table class="table table-bordered">

                                <thead>
                                <tr>
                                    <th>Semester</th>
                                    <th>Action</th>

                                </tr>
                                </thead>

                                <tbody>

                                <!--getting all the department-->

                                <?php

                                $semester_obj = new Semester();

                                $semesters = $semester_obj->getAllSemester();

                                //traversing department

                                while ($semester = $semesters->fetch_object()){

                                    ?>
                                    <tr>
                                        <td><?php echo $semester->semester ?></td>
                                        <td><a href="semester_update.php?semester_id=<?php echo $semester->id ?>" class="btn btn-primary">Edit</a></td>

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

                <!--end of all the course-->



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
