

<!--top meta tags-->
<?php include "../partials/header_meta.php"?>

<?php if (!isset($_SESSION['admin_id'])) {

    header('Location: index.php');
} ?>

<!--after submit-->
<?php

include 'action/Connection.php';

include 'action/Student.php';

?>

<!--title tag will be there always-->
<title>Register Student</title>

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

                <!--student register-->

                <div class="col-10">

                    <div class="card">

                        <div class="card-header">
                            <h3 class="text-center">All students</h3>


                        </div>

                        <div class="card-body">

                            <table class="table table-bordered">

                                <thead>

                                    <tr>
                                        <th>

                                            Student id

                                        </th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Department</th>
                                    </tr>

                                </thead>
                                <tbody>

                                <?php

                                    $student_obj = new Student();

                                    $students = $student_obj->getAllStudent();

                                    while ($student = $students->fetch_object()){



                                ?>

                                    <tr>
                                        <td><?php echo $student->student_id ?></td>
                                        <td><?php echo $student->name ?></td>
                                        <td><?php echo $student->email ?></td>
                                        <td><?php echo $student->depart ?></td>
                                    </tr>

                                <?php

                                    }

                                ?>
                                </tbody>



                            </table>


                        </div>

                    </div>




                </div>

                <!--end of student register-->





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
