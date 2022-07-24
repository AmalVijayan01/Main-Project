<?php
include 'conn.php';
if($_GET['oid']){
    $orderid=$_GET['oid'];
    $Updt="UPDATE tbl_orders SET order_status='accepted' WHERE order_id='$orderid'";
    $run=mysqli_query($con,$Updt) ;
}if($_GET['aid']){
    $orderid=$_GET['aid'];
    $Updt="UPDATE tbl_orders SET order_status='prep' WHERE order_id='$orderid'";
    $run=mysqli_query($con,$Updt) ;
}if($_GET['pid']){
    $orderid=$_GET['pid'];
    $Updt="UPDATE tbl_orders SET order_status='readytodispatch' WHERE order_id='$orderid'";
    $run=mysqli_query($con,$Updt) ;
}
header("Location:orders_recent.php");  
?>