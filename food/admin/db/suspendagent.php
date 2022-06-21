<?php
include 'connection.php';
$rid = $_GET['lid'];
$status=1;
mysqli_query($con,"UPDATE tbl_login set status='$status' where login_id = '$rid'");
header("Location: ../agents.php");
?>