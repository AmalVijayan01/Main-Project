<?php 
    include 'conn.php';
    if(isset($_POST['submit'])){
        $del_name= $_POST['del_name'];
        $addr= $_POST['addr'];
        $del_mob= $_POST['mob'];
        $city= $_POST['city'];
        $pincode = $_POST['pincode'];
        $amount = $_POST['amnt'];
        $qty=$_POST['qty'];
        $stat=0;
        $custid=$_POST['custid'];
        $foodid=$_POST['custid'];

        $order_insert="INSERT INTO tbl_orders(order_qty, 
        order_price, cust_id,order_status) VALUES 
        ('$qty','$amount','$custid','ordered')";
        $order_ins_res=mysqli_query($con,$order_insert);

        $order_id_fetch="SELECT order_id FROM tbl_orders WHERE cust_id='$custid' 
        ORDER BY order_id DESC LIMIT 1 ;";
        $id_fetch_res=mysqli_query($con,$order_id_fetch);
        $fetch_res=mysqli_fetch_array($id_fetch_res);
        $odr_id=$fetch_res['order_id'];

        $del_insert="INSERT INTO `tbl_delivery`(del_name, del_addr, del_pin, 
        del_city, del_mob, order_id, del_status) VALUES ('$del_name',
        '$addr','$pincode','$city','$del_mob','$odr_id','$stat')";
        $del_ins_res=mysqli_query($con,$del_insert);

        // $cart_delete="DELETE FROM tbl_cart WHERE cust_id = '$cust_id' AND food_id = ''"
    }
    header("Location:cust_cart.php");
?>