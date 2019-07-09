
<ul class="list-group">

    <?php $url =  basename(parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH)); ?>
    <li class="list-group-item border <?php echo $url == 'register_teacher.php' ? 'border-success':'' ?>"><a href="register_teacher.php">Register Teacher</a></li>
    <li class="list-group-item border <?php echo $url == 'show_all_teacher.php' ? 'border-success':'' ?>"><a href="show_all_teacher.php">Show Teacher</a></li>
    <li class="list-group-item border <?php echo $url == 'register_student.php' ? 'border-success':'' ?>"><a href="">Register Student</a></li>
    <li class="list-group-item border <?php echo $url == 'department.php' ? 'border-success':'' ?>"><a href="department.php">Department</a> </li>
    <li class="list-group-item border <?php echo $url == 'course.php' ? 'border-success':'' ?>"><a href="course.php">Course</a></li>
    <li class="list-group-item border <?php echo $url == 'semester.php' ? 'border-success':'' ?>"><a href="semester.php">Semester</a></li>
</ul>
<?php echo $url == '/bhiyas_friend/attendance/files/course.php' ? 'border-success':'' ?>