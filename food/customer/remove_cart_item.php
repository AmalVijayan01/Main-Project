<?php
    session_start();
    include('conn.php');
    {
        $target_cid= $_GET["s_id"];
        $target_fid= $_GET["f_id"];
        //$cartdelete_query = "DELETE FROM tbl_cart WHERE cust_id = '$target_cid' AND 'food_id' = '$target_fid'";
        $cartdelete_query="DELETE FROM `tbl_cart` WHERE cust_id='$target_cid' and food_id='$target_fid'";
        $cartdelete_result = mysqli_query($con,$cartdelete_query);
        if($cartdelete_result){
            header("location: cust_cart.php?rmv_crt=1");
        }else{
            header("location: cust_cart.php?rmv_crt=0");
        }
        exit(1);
    }
?>