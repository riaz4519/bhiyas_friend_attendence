


<!--top meta tags-->
<?php include "../partials/header_meta.php"?>
<?php

if (!isset($_SESSION['admin_id'])) {

    header('Location: index.php');
}


?>
<!--title tag will be there always-->
<title>Admin Dashboard</title>

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


        <div class="col-9">

            <?php echo  $_SESSION['admin_name'] ?>

        </div>

    </div>
</div>
<!--end side nav-->


<!--end of content-->

<!--scripts jquery and bootstrap-->
<?php include "../partials/basic_script.php"; ?>

<!--footer tags body and html-->
<?php include "../partials/footer_tag.php"; ?>
