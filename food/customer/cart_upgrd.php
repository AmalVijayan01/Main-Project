<?php
include('conn.php');
$cart_id=$_GET['ct_id'];
$atc=1;
$cart_select="SELECT tbl_cart.cart_amount,tbl_foods.food_qty FROM tbl_cart,tbl_foods WHERE cart_id='$cart_id' AND tbl_cart.food_id = tbl_foods.food_id";
$cart_select_result=mysqli_query($con,$cart_select);
$cart_fetch=mysqli_fetch_array($cart_select_result);
$cart_qty=$cart_fetch['cart_amount'];
$food_qty=$cart_fetch['food_qty'];

if($cart_qty<=$food_qty){

$newamt=$cart_qty+1;

$update_cart="UPDATE tbl_cart SET cart_amount='$newamt' WHERE cart_id='$cart_id'";
$update_result=mysqli_query($con,$update_cart);
header("Location:cust_cart.php");
}else{
    echo"<script>alert('failed')</script>"; 
    header("Location:cust_cart.php");
}

?>
