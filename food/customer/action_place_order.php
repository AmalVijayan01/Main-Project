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
        $foodid=$_POST['foodid'];
        $chefid=$_POST['chefid'];
        
        //insert details into orders table
        $order_insert="INSERT INTO tbl_orders(order_qty, 
        order_price, cust_id,chef_id,order_status) VALUES 
        ('$qty','$amount','$custid','$chefid','ordered')";
        $order_ins_res=mysqli_query($con,$order_insert);

        $order_id_fetch="SELECT order_id FROM tbl_orders WHERE cust_id='$custid' 
        ORDER BY order_id DESC LIMIT 1 ;";
        $id_fetch_res=mysqli_query($con,$order_id_fetch);
        $fetch_res=mysqli_fetch_array($id_fetch_res);
        $odr_id=$fetch_res['order_id'];//order id

        //insert details into delivery table
        $del_insert="INSERT INTO `tbl_delivery`(del_name, del_addr, del_pin, 
        del_city, del_mob, order_id,agent_id, del_status) VALUES ('$del_name',
        '$addr','$pincode','$city','$del_mob','$odr_id',0,'$stat')";
        $del_ins_res=mysqli_query($con,$del_insert);

        //insert details into  place order table
        $plo_order_insert="SELECT * FROM `tbl_cart` WHERE cust_id='$custid'";
        $plo_ins_res=mysqli_query($con,$plo_order_insert);
        while($plo_fetch=mysqli_fetch_array($plo_ins_res)){
            $temp_fd=$plo_fetch['food_id'];
            $temp_cf= $plo_fetch['chef_id'];
            $food_qty= $plo_fetch['cart_amount'];
            $plo_ins="INSERT INTO `tbl_placeorder`(`order_id`, `food_id`, `chef_id`,`ordfd_qty`) 
            VALUES ('$odr_id','$temp_fd','$temp_cf','$food_qty')";
            $plo_insrt= mysqli_query($con,$plo_ins);
        }
        //empty the cart
        $cart_delete="DELETE FROM `tbl_cart` WHERE cust_id='$custid'";
        $cartres=mysqli_query($con,$cart_delete);

        //update the stock in the foods table
        $stock_select=mysqli_query($con,"SELECT food_qty,chef_id FROM tbl_foods WHERE food_id='$foodid'");
        $fetched_qty=mysqli_fetch_array($stock_select);
        $chef_id= $fetched_qty['chef_id'];
        $old_qty=$fetched_qty['food_qty'];
        $newqty=$old_qty-$qty;
        // if($newqty>0){
        $stock_update="UPDATE tbl_foods SET food_qty='$newqty' WHERE food_id='$foodid'";
        $update_res= mysqli_query($con,$stock_update);
        // }
        //insert details into payment table
        $pay_insert=mysqli_query($con,"INSERT INTO tbl_payments(pay_mode,cust_id,chef_id,order_id, 
        paid_amount,pay_status) VALUES ('online','$custid','$chef_id','$odr_id',
        '$amount','pending')");

        $amt=$amount;
        $odrid=$odr_id;
        header("Location:razor_pay.php?amount=$amt&&odr_id=$odrid");
         
    }
    
?>