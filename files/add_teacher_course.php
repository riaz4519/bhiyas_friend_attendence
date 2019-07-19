
<!--top meta tags-->
<?php include "../partials/header_meta.php"?>




<?php
include 'action/Connection.php';

include 'action/Teacher.php';

//semester
include 'action/Semester.php';
?>
<?php

    if (isset($_POST['add_course'])){

        $current = $_SERVER['HTTP_REFERER'];

        $selected_course = $_POST['course_add'];
        $teacher_id = $_POST['teacher_id'];
        $semester_id = $_POST['semester_id'];

        if (count($selected_course) > 0){


            $teacher = new Teacher();
            $teacher->addCourse($teacher_id,$semester_id,$selected_course);

        }

        header('Location: '.$current);

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

            <!--showing the course-->

            <?php

                if (isset($_GET['semester']) && isset($_GET['teacher']) ){



            ?>

            <div class="row justify-content-center mt-5 ">

                <div class="col-10">

                    <div class="row">

                        <!--left to add-->

                        <div class="col">

                            <div class="card">

                                <div class="card-header">

                                    <h3 class="text-center">Course Left to Add</h3>

                                </div>
                                <div class="card-body">

                                    <!--course -->

                                    <div class="search-for-teacher">

                                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

                                            <input type="text" name="teacher_id" value="<?php echo $_GET['teacher'] ?>" hidden>
                                            <input type="text" name="semester_id" value="<?php echo $_GET['semester'] ?>" hidden>

                                            <?php

                                                $course = new Teacher();
                                                $teacher_id = $_GET['teacher'];
                                                $semester_id = $_GET['semester'];

                                                $courses = $course->courseLeftToAdd($teacher_id,$semester_id);


                                                while ($single_course = $courses->fetch_object()){


                                            ?>

                                            <div class="form-check">
                                                <input class="form-check-input" name="course_add[]" type="checkbox" value="<?php echo $single_course->id?>" id="course<?php echo $single_course->id?>" >
                                                <label class="form-check-label" for="course<?php echo $single_course->id?>">
                                                    <?php echo  $single_course->course_name ?>
                                                </label>
                                            </div>

                                            <?php

                                                }


                                            ?>

                                            <input type="submit" name="add_course" value="Add Course" class="btn btn-secondary mt-5 text-center">

                                        </form>

                                    </div>

                                    <!--end  course-->

                                </div>

                            </div>
                        </div>

                        <!--end of left to add-->

                        <!--already added-->
                        <div class="col">

                            <div class="card">

                                <div class="card-header">

                                    <h3 class="text-center">Already Added</h3>

                                </div>
                                <div class="card-body">

                                    <!--course -->

                                    <div class="search-for-teacher">

                                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">


                                            <?php

                                            $course = new Teacher();

                                            $teacher_id = $_GET['teacher'];
                                            $semester_id = $_GET['semester'];

                                            $courses = $course->courseAlreadyAdded($teacher_id,$semester_id);

                                            while ($added_course = $courses->fetch_object()) {


                                                ?>

                                                <ul class="list-group">
                                                    <li class="list-group-item"><?php echo $added_course->course_name ?></li>

                                                </ul>


                                                <?php

                                            }

                                            ?>

                                        </form>

                                    </div>

                                    <!--end  course-->

                                </div>

                            </div>

                        </div>
                        <!--end of already added-->

                    </div>

                </div>

            </div>

            <?php

                }

            ?>

            <!--end showing the course-->



        </div>

    </div>
</div>
<!--end side nav-->


<!--end of content-->

<!--scripts jquery and bootstrap-->
<?php include "../partials/basic_script.php"; ?>

<!--footer tags body and html-->
<?php include "../partials/footer_tag.php"; ?>
