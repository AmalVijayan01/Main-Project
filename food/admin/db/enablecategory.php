<?php
include 'connection.php';
$cid = $_GET['id'];
mysqli_query($con," UPDATE tbl_category set cat_status=0 WHERE cat_id=$cid");
header("Location: ../categories.php");
?>