<?php
include('conn.php');
$cust_id=$_GET['cust_id'];

$delete_cart="DELETE  FROM tbl_cart WHERE cust_id='$cust_id'";
$update_result=mysqli_query($con,$delete_cart);
header("Location:cust_cart.php");
?>