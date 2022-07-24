<?php
include 'conn.php';

$payment_id=$_GET['pid'];
$order_id=$_GET['oid'];
$cust_id=$_GET['cusid'];

$payment_update=mysqli_query($con,"UPDATE tbl_payments SET pay_status='paid' WHERE pay_id='$payment_id' 
AND order_id='$order_id' AND cust_id='$cust_id'");
if($payment_update){
    $pay_stat=1;
}
$query=mysqli_query($con,"select cust_email from tbl_customer where cust_id='$cust_id'");
$data=mysqli_fetch_array($query);
$eml=$data['cust_email'];

//header("Location:dashboard.php?paystat=$pay_stat");

header("Location:chef_email.php?eml=$eml&&paystat=$pay_stats");
?>