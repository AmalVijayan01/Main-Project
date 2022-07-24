<?php 
include 'conn.php';

$order_id=$_GET['did'];
$agent_id=$_GET['agid'];

$agent_update=mysqli_query($con,"UPDATE `tbl_delivery` SET `agent_id`='$agent_id' WHERE `order_id`='$order_id'");
header("Location:assign_delivery.php");
?>