
<!--top meta tags-->
<?php include "../partials/header_meta.php"?>

<!--after submit-->
<?php
include 'action/Connection.php';



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

                    <!--getting all the teacher-->
                    <div class="card">

                        <div class="card-header">

                            <h3 class="text-center">Add Course To Teacher</h3>

                        </div>
                        <div class="card-body">

                            <!--search teachers course -->

                            <div class="search-for-teacher">

                                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">

                                    <div class="form-row">

                                        <!-- getting the teacher  -->
                                        <div class="col">

                                            <label for="teacher">Select Teacher</label>
                                            <select id="teacher" name="teacher" class="form-control" required>


                                                <option disabled <?php echo isset($_GET['semester']) ? '' :'selected' ?>></option>
                                                <?php

                                                $teacher = new Teacher();

                                                $teachers  = $teacher->getAllTeacher();

                                                while ($single_teacher = $teachers->fetch_object()){



                                                    ?>

                                                    <option <?php echo  $_GET['teacher'] == $single_teacher->id ? 'selected':'' ?>  value="<?php echo $single_teacher->id ?>"><?php echo $single_teacher->name ?></option>

                                                    <?php

                                                }
                                                ?>


                                            </select>

                                        </div>
                                        <!--end of getting the teacher-->

                                        <!--getting the semester-->
                                        <div class="col">

                                            <label for="semester">Select Semester</label>
                                            <select id="semester" name="semester" class="form-control" required>
                                                <option disabled <?php echo isset($_GET['semester']) ? '' :'selected' ?>></option>
                                                <?php

                                                $semester = new Semester();

                                                $semesters  = $semester->getAllSemester();

                                                while ($single_semester = $semesters->fetch_object()){



                                                    ?>

                                                    <option <?php echo  $_GET['semester'] == $single_semester->id ? 'selected':'' ?> value="<?php echo $single_semester->id ?>"><?php echo $single_semester->semester ?></option>

                                                    <?php

                                                }
                                                ?>


                                            </select>

                                        </div>
                                        <!--end of getting the semester-->
                                        <!--submit button-->
                                        <div class="col">

                                            <label for="submit">..</label>
                                            <input id="submit" type="submit" class="form-control btn btn-secondary" name="search_teacher" value="Add">

                                        </div>
                                        <!--end of submit button-->



                                    </div>

                                </form>

                            </div>

                            <!--end of search teacher course-->

                        </div>

                    </div>



                    <!--end of getting teacher-->






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