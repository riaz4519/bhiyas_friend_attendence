
<!--top meta tags-->
<?php include "../partials/header_meta.php"?>

<!--after submit-->
<?php
include 'action/Connection.php';
include 'action/Teacher.php';
include 'action/Semester.php';
include 'action/Student.php';
include 'action/Course.php';
include 'action/Download.php';

?>

<?php

if (isset($_POST['download'])){



    $current = $_SERVER['HTTP_REFERER'];

    $selected_course = $_POST['course_id'];

    $teacher_id = $_SESSION['teacher_id'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $semester_id = $_POST['semester_id'];

    $download = new Download();

   $download->dload($semester_id,$teacher_id,$selected_course,$start_date,$end_date);

    //header('Location: '.$current);

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

                <div class="col-11">

                    <!--getting all the teacher-->
                    <div class="card">

                        <div class="card-header">

                            <h3 class="text-center">Get Report</h3>

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
                                            <input id="submit" type="submit" class="form-control btn btn-secondary" name="search_course" value="Get Course">

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


            <!--show student added course and left courses-->

            <?php

            if (isset($_GET['semester'])){




                ?>

                <div class="row justify-content-center mt-5">


                    <!--already added-->
                    <div class="col-11">

                        <div class="card">

                            <div class="card-header">

                                <h3 class="text-center">Download Report</h3>

                            </div>
                            <div class="card-body">

                                <!--course -->

                                <!--course -->

                                <div class="search-for-course">

                                    <form action="action/dload.php" method="post">


                                        <input type="text" name="semester_id" value="<?php echo $_GET['semester'] ?>" hidden>

                                        <?php

                                        $course = new Course();

                                        $semester_id = $_GET['semester'];

                                        $courses = $course->getAllCourseOfTeacher($semester_id);


                                        ?>

                                        <div class="form-row">

                                            <div class="col">
                                                <label for="course_name">Course Name</label>
                                                <select id="course_name" name="course_id" class="form-control" required>




                                                    <?php

                                                    while ($single_course = $courses->fetch_object()){


                                                        ?>

                                                        <option value="<?php echo $single_course->id ?>"><?php echo  $single_course->course_name ?></option>



                                                        <?php

                                                    }
                                                    ?>
                                                </select>

                                            </div>

                                            <div class="col">

                                                <div class="form-row">

                                                    <div class="col">
                                                        <label for="start_date">Start Date</label>
                                                        <input id="start_date" name="start_date" type="date" class="form-control" required>
                                                    </div>
                                                    <div class="col">
                                                        <label for="end_date">End Date</label>
                                                        <input id="end_date" name="end_date" type="date" class="form-control" required>
                                                    </div>

                                                </div>



                                            </div>


                                        </div>
                                        <?php


                                        ?>

                                        <input type="submit" name="download" value="Download" class="btn btn-secondary mt-5 text-center">

                                    </form>

                                </div>

                                <!--end  course-->

                                <!--end  course-->

                            </div>

                        </div>

                    </div>
                    <!--end of already added-->




                </div>

            <?php }  ?>

            <!--end of student added course and left courses-->


        </div>

    </div>
</div>
<!--end side nav-->


<!--end of content-->

<!--scripts jquery and bootstrap-->
<?php include "../partials/basic_script.php"; ?>

<!--footer tags body and html-->
<?php include "../partials/footer_tag.php"; ?>
