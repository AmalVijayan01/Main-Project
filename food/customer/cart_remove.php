<?php
include('conn.php');
$cart_id=$_GET['ct_id'];
$cust_id=$_GET['cust_id'];

$delete_cart="DELETE  FROM tbl_cart WHERE cart_id='$cart_id' AND cust_id='$cust_id'";
$update_result=mysqli_query($con,$delete_cart);
header("Location:cust_cart.php");
?>