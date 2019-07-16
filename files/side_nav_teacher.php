
<ul class="list-group">

    <?php $url =  basename(parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH)); ?>
    <li class="list-group-item border <?php echo $url == 'teacher_dashboard.php' ? 'border-success':'' ?>"><a href="teacher_dashboard.php">Dashboard</a></li>

</ul>
