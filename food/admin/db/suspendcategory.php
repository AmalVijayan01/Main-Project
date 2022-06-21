<?php
include 'connection.php';
$rid = $_GET['lid'];
$status=1;
mysqli_query($con," UPDATE tbl_category set cat_status=1 WHERE cat_id=$rid");
header("Location: ../categories.php");
?>