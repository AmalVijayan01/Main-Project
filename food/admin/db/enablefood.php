<?php
include 'connection.php';
$lid = $_GET['hid'];
mysqli_query($con,"UPDATE tbl_foods set food_status='0' where food_id = '$lid'");
header("Location: ../allitems.php");
?>