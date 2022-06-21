<?php
include 'connection.php';
$rid = $_GET['id'];
mysqli_query($con,"UPDATE tbl_foods set food_status='1' where food_id = '$rid'");
header("Location: ../allitems.php");
?>