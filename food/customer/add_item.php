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
    $status=0;  
    

    $query = "SELECT * FROM tbl_cart WHERE cust_id = '$cus_id' GROUP BY cust_id";
    $result = mysqli_query($con,$query);
    $result_arr = $result -> fetch_array();
    $incart_food = $result_arr["food_id"];
    $incart_chef = $result_arr["chef_id"];
    
    if($result -> num_rows == 0){
        //No item in cart,insert into cart
        $insert_query = "INSERT INTO tbl_cart(food_id, cust_id, chef_id,cart_status,cart_amount, cart_note) 
        VALUES ('$fd_id','$cus_id','$chef_id','$status','$amount','$request')";
        $atc_result = mysqli_query($con,$insert_query);
    }
    else
    {
        if($chef_id==$incart_chef)//Already have items of same chef in cart 
        {
            $chef_item=mysqli_query($con,"SELECT * FROM tbl_cart WHERE chef_id = '$chef_id' AND food_id='$fd_id'");
            $chef_item_result=mysqli_num_rows($chef_item);
            if($chef_item_result==0)
            {
                $insert_query = "INSERT INTO tbl_cart(food_id, cust_id, chef_id,cart_status,cart_amount, cart_note) 
                VALUES ('$fd_id','$cus_id','$chef_id','$status','$amount','$request')";
                $atc_result = mysqli_query($con,$insert_query);//insert into cart if same chef
            }
            else
            {
                $update_query = "UPDATE tbl_cart SET cart_amount='$amount' WHERE food_id='$fd_id'";
                $atc_result = mysqli_query($con,$update_query);//same chef update
            }
        }
        else
        {
            $delete_query="DELETE FROM tbl_cart WHERE cust_id='$cus_id'";//different chef->delete all items of current chef
            $delete_result = mysqli_query($con,$delete_query);
            if($delete_result)//insert items of new chef
            {
                $insert_query = "INSERT INTO tbl_cart(food_id, cust_id, chef_id,cart_status,cart_amount, cart_note) 
                VALUES ('$fd_id','$cus_id','$chef_id','$status','$amount','$request')";
                $atc_result = mysqli_query($con,$insert_query);
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