
<!--top meta tags-->
<?php include "../partials/header_meta.php"?>

<!--after submit-->
<?php
include 'action/Connection.php';
include 'action/Teacher.php';
include 'action/Semester.php';
include 'action/Student.php';

?>

<?php

if (isset($_POST['add_course'])){

    $current = $_SERVER['HTTP_REFERER'];

    $selected_course = $_POST['course_add'];
    $student_id= $_POST['student_id'];
    $semester_id = $_POST['semester_id'];

    if (count($selected_course) > 0){


        $teacher = new Teacher();
        $teacher->teacherAddCourseToStudent($student_id,$semester_id,$selected_course);

    }

    header('Location: '.$current);

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

                            <h3 class="text-center">Add Course To Student</h3>

                        </div>
                        <div class="card-body">

                            <!--search teachers course -->

                            <div class="search-for-teacher">

                                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">

                                    <div class="form-row">


                                        <!--student id-->

                                        <div class="col">

                                            <label for="student_id">Student Id</label>
                                            <select class="form-control" name="student_id" id="student_id" required>
                                                <option selected <?php echo isset($_GET['student_id']) ? "":"selected" ?> disabled></option>

                                                <?php

                                                    $student = new Student();

                                                    $students = $student->getAllStudent();

                                                    while ($single_student = $students->fetch_object()){




                                                ?>

                                                        <option value="<?php echo $single_student->id?>" ><?php echo $single_student->student_id ?></option>

                                                <?php } ?>
                                            </select>

                                        </div>

                                        <!--end student id-->


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

            <!--show student added course and left courses-->

            <?php

            if (isset($_GET['semester']) && isset($_GET['student_id'])){




                ?>

                <div class="row justify-content-center mt-5">


                    <!--already added-->
                    <div class="col-5">

                        <div class="card">

                            <div class="card-header">

                                <h3 class="text-center">Left To Add</h3>

                            </div>
                            <div class="card-body">

                                <!--course -->

                                <!--course -->

                                <div class="search-for-course">

                                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

                                        <input type="text" name="student_id" value="<?php echo $_GET['student_id'] ?>" hidden>
                                        <input type="text" name="semester_id" value="<?php echo $_GET['semester'] ?>" hidden>

                                        <?php

                                        $course = new Teacher();
                                        $student_id = $_GET['student_id'];
                                        $semester_id = $_GET['semester'];

                                        $courses = $course->courseLeftToAddStudent($student_id,$semester_id);


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

                                <!--end  course-->

                            </div>

                        </div>

                    </div>
                    <!--end of already added-->
                    <!--already added-->
                    <div class="col-6">

                        <div class="card">

                            <div class="card-header">

                                <h3 class="text-center">Already Added</h3>

                            </div>
                            <div class="card-body">

                                <!--course -->

                                <div class="search-for-teacher">

                                    <table class="table table-bordered">

                                        <thead>

                                        <tr>
                                            <th>Course Name</th>
                                            <th>Credit</th>
                                        </tr>

                                        </thead>

                                        <tbody>







                                        <?php

                                        $course = new Teacher();

                                        $student_id = $_GET['student_id'];
                                        $semester_id = $_GET['semester'];

                                        $courses = $course->studentCourseAddedAlready($student_id,$semester_id);

                                        while ($added_course = $courses->fetch_object()) {


                                            ?>


                                            <tr>
                                                <td><?php echo $added_course->course_name ?></td>
                                                <td><?php echo $added_course->credit ?></td>
                                            </tr>




                                            <?php

                                        }

                                        ?>

                                        </tbody>


                                    </table>




                                </div>

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
