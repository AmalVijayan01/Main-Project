<?php
include 'conn.php';
$orderid=$_GET['hid'];
$Updt="UPDATE tbl_orders SET order_status='accepted' WHERE order_id='$orderid'";
$run=mysqli_query($con,$Updt) ;
header("Location:orders_recent.php");  
?>
