<?php
include('conn.php');
$cart_id=$_GET['ct_id'];

$cart_select="SELECT cart_amount FROM tbl_cart WHERE cart_id='$cart_id'";
$cart_select_result=mysqli_query($con,$cart_select);
$cart_fetch=mysqli_fetch_array($cart_select_result);
$cart_qty=$cart_fetch['cart_amount'];

if($cart_qty>1){

$newamt=$cart_qty-1;

$update_cart="UPDATE tbl_cart SET cart_amount='$newamt' WHERE cart_id='$cart_id'";
$update_result=mysqli_query($con,$update_cart);
}
header("Location:cust_cart.php");
?>