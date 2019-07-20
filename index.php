<!--top meta tags-->
<?php include "./partials/header_meta.php"?>


<!--if already login then redirect-->

<?php
    if (isset($_SESSION['admin_id'])){

        header('Location: files/admin_dashboard.php');
    }


?>

<!--catch login -->
<?php

if (isset($_POST['admin_login'])){
    include 'files/action/Login.php';

    $login = new Login();

    echo  $login->adminLogin($_POST['email'],$_POST['password']);
}elseif(isset($_POST['teacher_login'])){
    include 'files/action/Login.php';



    $login = new Login();

    echo  $login->teacherLogin($_POST['email'],$_POST['password']);

}






?>



    <!--title tag will be there always-->
    <title>login</title>

<!--style bootstrap css -->
<link rel="stylesheet" href="files/bootstrap/css/bootstrap.min.css">

<!--extra css-->

<!--end extra css-->

<!--middle head and body tag-->
<?php include "./partials/header_middle.php"; ?>

<!--content goes here-->

<div class="container-fluid">

    <div class="row justify-content-center mt-5">

        <div class="col-6">



            <ul class="nav nav-tabs text-center" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#admin" role="tab" aria-controls="home" aria-selected="true">Admin Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#teacher" role="tab" aria-controls="profile" aria-selected="false">Teacher Login</a>
                </li>

            </ul>
            <div class="tab-content" id="myTabContent">

                <!--admin login-->
                <div class="tab-pane fade show active" id="admin" role="tabpanel" aria-labelledby="home-tab">

                    <div class="card">

                        <div class="card-header text-center">
                            <h3>Admin Login</h3>
                        </div>

                        <div class="card-body">


                            <form action="<?php echo  $_SERVER['PHP_SELF']?>" method="post">
                                <div class="form-group">

                                    <label for="email">Email</label>
                                    <input id="email" type="email" name="email" class="form-control" required>

                                </div>

                                <div class="form-group">

                                    <label for="password">Password</label>
                                    <input id="password" name="password" type="password" class="form-control" required>

                                </div>


                                <input type="submit" value="Login" name="admin_login" class="btn btn-success btn-lg float-right">


                            </form>


                        </div>

                    </div>

                </div>
                <!--end admin login-->

                <!--teacher login-->
                <div class="tab-pane fade" id="teacher" role="tabpanel" aria-labelledby="profile-tab">

                    <div class="card">

                        <div class="card-header text-center">
                            <h3>Teacher Login</h3>
                        </div>

                        <div class="card-body">


                            <form action="<?php echo  $_SERVER['PHP_SELF']?>" method="post">
                                <div class="form-group">

                                    <label for="email">Email</label>
                                    <input id="email" type="email" name="email" class="form-control" required>

                                </div>

                                <div class="form-group">

                                    <label for="password">Password</label>
                                    <input id="password" name="password" type="password" class="form-control" required>

                                </div>


                                <input type="submit" value="Login" name="teacher_login" class="btn btn-success btn-lg float-right">


                            </form>


                        </div>

                    </div>

                </div>
                <!--end teacher login-->

            </div>


        </div>

    </div>

</div>

<!--end of content-->

<!--scripts jquery and bootstrap-->
<script src="files/jquery/jquery-3.4.1.js"></script>
<script src="files/bootstrap/js/bootstrap.min.js"></script>

<!--footer tags body and html-->
<?php include "./partials/footer_tag.php"; ?>
