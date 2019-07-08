
<ul class="list-group">

    <?php $url =  $_SERVER['REQUEST_URI']; ?>
    <li class="list-group-item border <?php echo $url == '/bhiyas_friend/attendance/files/register_teacher.php' ? 'border-success':'' ?>"><a href="register_teacher.php">Register Teacher</a></li>
    <li class="list-group-item border <?php echo $url == '/bhiyas_friend/attendance/files/show_all_teacher.php' ? 'border-success':'' ?>"><a href="show_all_teacher.php">Show Teacher</a></li>
    <li class="list-group-item  <?php echo $url == '/bhiyas_friend/attendance/files/register_student.php' ? 'border-success':'' ?>"><a href="">Register Student</a></li>
    <li class="list-group-item  <?php echo $url == '/bhiyas_friend/attendance/files/department.php' ? 'border-success':'' ?>"><a href="department.php">Department</a> </li>
    <li class="list-group-item"><a href="">Course</a></li>
    <li class="list-group-item"><a href="">Semester</a></li>
</ul>
