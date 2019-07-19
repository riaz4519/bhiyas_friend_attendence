
<!--top meta tags-->
<?php include "../partials/header_meta.php"?>

<!--after submit-->
<?php
include 'action/Connection.php';
include 'action/Teacher.php';
include 'action/Semester.php';

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

                            <h3 class="text-center">Select Semester</h3>

                        </div>
                        <div class="card-body">

                            <!--search teachers course -->

                            <div class="search-for-teacher">

                                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">

                                    <div class="form-row">



                                        <!--getting the semester-->
                                        <div class="col">

                                            <label for="semester">Select Semester</label>
                                            <select id="semester" name="semester" class="form-control" required>
                                                <option disabled></option>
                                                <?php

                                                $semester = new Semester();

                                                $semesters  = $semester->getAllSemester();

                                                while ($single_semester = $semesters->fetch_object()){



                                                    ?>

                                                    <option  value="<?php echo $single_semester->id ?>"><?php echo $single_semester->semester ?></option>

                                                    <?php

                                                }
                                                ?>


                                            </select>

                                        </div>

                                        <!--end of getting the semester-->
                                        <div class="col">

                                            <label for="submit">..</label>
                                            <input id="submit" type="submit" class="form-control btn btn-secondary" name="search_course" value="Course">

                                        </div>




                                    </div>

                                </form>

                            </div>

                            <!--end of search teacher course-->

                        </div>

                    </div>



                    <!--end of getting teacher-->






                </div>

            </div>

            <?php

            if (isset($_GET['semester'])){




            ?>

            <div class="row justify-content-center">


                <!--already added-->
                <div class="col-10">

                    <div class="card">

                        <div class="card-header">

                            <h3 class="text-center">Already Added</h3>

                        </div>
                        <div class="card-body">

                            <!--course -->

                            <div class="search-for-teacher">

                                <ul class="list-group">



                                <?php

                                $course = new Teacher();

                                $teacher_id = $_SESSION['teacher_id'];
                                $semester_id = $_GET['semester'];

                                $courses = $course->courseAlreadyAdded($teacher_id,$semester_id);

                                while ($added_course = $courses->fetch_object()) {


                                    ?>


                                        <li class="list-group-item"><?php echo $added_course->course_name ?></li>




                                    <?php

                                }

                                ?>
                                </ul>


                            </div>

                            <!--end  course-->

                        </div>

                    </div>

                </div>
                <!--end of already added-->




            </div>

            <?php }  ?>


        </div>

    </div>
</div>
<!--end side nav-->


<!--end of content-->

<!--scripts jquery and bootstrap-->
<?php include "../partials/basic_script.php"; ?>

<!--footer tags body and html-->
<?php include "../partials/footer_tag.php"; ?>
