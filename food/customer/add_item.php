<?php
    include('conn.php');

    session_start();
        if(!isset($_SESSION["ses_id"])){
            header("location: restricted.php");
            exit(1);
        }

    $fd_id = $_POST["fd_id"];
    $chef_id = $_POST["chef_id"];
    $cus_id = $_POST["cus_id"];
    $amount = $_POST["amount"];
    $request = $_POST["request"];
    $status=0;  
    

    $query = "SELECT * FROM tbl_cart WHERE cust_id = '$cus_id' GROUP BY cust_id";
    $result = mysqli_query($con,$query);

    

    if($result -> num_rows == 0){
        //No item in cart
        $insert_query = "INSERT INTO tbl_cart(food_id, cust_id, chef_id,cart_status,cart_amount, cart_note) 
        VALUES ('$fd_id','$cus_id','$chef_id','$status','$amount','$request')";
        $atc_result = mysqli_query($con,$insert_query);
    }else{
        //Already have item in cart
        $result_arr = $result -> fetch_array();
        $incart_chef = $result_arr["chef_id"];
        if($incart_chef == $chef_id){
            //Same chef
            $cartsearch = "SELECT cart_amount FROM tbl_cart WHERE cust_id = '$cus_id' AND food_id = '$fd_id' AND chef_id='$chef_id'";
            $cartsearch_result = mysqli_query($con,$cartsearch);
            $cartsearch_row = $cartsearch_result -> num_rows;
            if($cartsearch_row == 0){
                //No this item in cart yet
                $insert_query = "INSERT INTO tbl_cart (food_id, Cust_id, chef_id,cart_status,cart_amount,cart_note) 
                VALUES ('$fd_id','$cus_id','$chef_id','$status','$amount','$request')";
                $atc_result = mysqli_query($con,$insert_query);
            }else{
                //Already have item in cart with same chef
                $cartsearch_arr = $cartsearch_result -> fetch_array();
                $incart_amount = $cartsearch_arr["cart_amount"];
                $new_amount = $incart_amount + $amount;
                $update_query = "UPDATE tbl_cart SET cart_amount = '$new_amount' WHERE cust_id = '$cus_id' AND food_id = '$fd_id' AND chef_id = '$chef_id'";
                $atc_result = mysqli_query($con,$update_query);
            }
        }
        else{

            $delelte_query = "DELETE FROM tbl_cart WHERE cust_id = '$cust_id'";
            $delete_result = mysqli_query($con,$delelte_query);
            if($delete_result){
                //Insert new item to cart of other chef
                $insert_query = "INSERT INTO tbl_cart (food_id, Cust_id, chef_id,cart_status,cart_amount,cart_note) 
                VALUES ('$fd_id','$cus_id','$chef_id','$status','$amount','$request')";
                $atc_result =mysqli_query($con,$insert_query);
            }else{
                $atc_result = false;
            }
        }
    }
    if($atc_result){
        header("location: food_items.php?s_id={$cus_id}&atc=1");
        exit(1);
    }else{
        header("location: food_items.php?s_id={$cus_id}&atc=0");
        exit(1);
    }
?>