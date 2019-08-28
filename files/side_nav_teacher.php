
<ul class="list-group">

    <?php $url =  basename(parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH)); ?>
    <li class="list-group-item border <?php echo $url == 'teacher_dashboard.php' ? 'border-success':'' ?>"><a href="teacher_dashboard.php">Dashboard</a></li>
    <li class="list-group-item border <?php echo $url == 'teacher_courses.php' ? 'border-success':'' ?>"><a href="teacher_courses.php">My Courses</a></li>
    <li class="list-group-item border <?php echo $url == 'student_course_register.php' ? 'border-success':'' ?>"><a href="student_course_register.php">Student Course Register</a></li>
    <li class="list-group-item border <?php echo $url == 'teacher_report.php' ? 'border-success':'' ?>"><a href="teacher_report.php">Report</a></li>

</ul>
