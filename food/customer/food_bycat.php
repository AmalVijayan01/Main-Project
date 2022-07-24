<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
        session_start();
        if(!isset($_SESSION["ses_id"])){
            header("location: restricted.php");
            exit(1);
        }
        $cid=$_GET["f_id"];
        include("conn.php");
        include('head.php');
        include('navbar.php');
    ?>
    
<style>
    .displaycard{
        background-color:white;
        box-shadow: 1px 1px 1px 1px;
        padding: 10px;
        margin-bottom: 10px;
    }.displaycard img{
        width: 225px;
        height: 200px;
    }.displaycard img:hover{
        transform:scale(1.1)
    }.displaycard h3{
        margin-top:5px;
    }.custom-link{
        padding:5px 10px 5px 10px;
        background-color: #26dad1;
        text-align: center;
        border-radius:3px;
        color: white;
    }.custom-link:hover{
        box-shadow: 1px 1px 1px 1px;
    }
</style>
</head>

<body class="d-flex flex-column h-100">
    <?php

        $query2 = "SELECT cust_id FROM tbl_customer WHERE login_id=$_SESSION[ses_id]";
        $result3 = mysqli_query($con,$query2);
        $shop_row1 = $result3 -> fetch_array();
    ?>
    <div class="container px-5 py-4" id="shop-body">
        <a class="nav nav-item text-decoration-none text-muted mb-3" href="#" onclick="history.back();">
            <i class="bi bi-arrow-left-square me-2"></i>Go back</a>
        <?php 
            if(isset($_GET["atc"])){
                if($_GET["atc"]==1){
                    ?>
                    <!-- START SUCCESSFULLY ADD TO CART -->
                    <div class="row row-cols-1 notibar pb-3">
                        <div class="col mt-2 ms-2 p-2 bg-success text-white rounded text-start">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-check-circle ms-2" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path
                                    d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                            </svg>
                            <span class="ms-2 mt-2">Add item to your cart successfully!</span>
                            <span class="me-2 float-end"><a class="text-decoration-none link-light" href="shop_menu.php?s_id=<?php echo $s_id;?>">X</a></span>
                        </div>
                    </div>
                    <!-- END SUCCESSFULLY ADD TO CART -->
            <?php }else{ ?>
                    <!-- START FAILED ADD TO CART -->
                    <div class="row row-cols-1 notibar">
                        <div class="col mt-2 ms-2 p-2 bg-danger text-white rounded text-start">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-x-circle ms-2" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path
                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                            </svg><span class="ms-2 mt-2">Failed to add item to your cart.</span>
                            <span class="me-2 float-end"><a class="text-decoration-none link-light" 
                            href="food_items.php">X</a></span>
                        </div>
                    </div>
                    <!-- END FAILED ADD TO CART -->
            <?php }
                } ?>
        <!-- GRID MENUS SELECTION -->
        <h3 class="border-top py-3 mt-2">Menu</h3>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 align-items-stretch mb-1">

        <?php
            $query = "SELECT * FROM tbl_foods WHERE food_status=0 AND cat_id='$cid' AND food_qty>0";
            $result = mysqli_query($con,$query);
            if($result ->num_rows > 0){
                while($food_row = $result->fetch_array()){
                    
        ?>
            <div class="fddisplay">
                    <div class="displaycard">
                        <div class="displaytext">
                        <img src= "../chefs/images/foods/<?php echo $food_row["food_image"]?>">
                            <h3><?php echo $food_row["food_name"]?></h3>
                            <h5><?php echo $food_row["food_description"]?></h5>
                            <p>₹<?php echo $food_row["food_unitprice"]?></p>
                            <p><?php echo $food_row['food_qty'];?>&nbsp;<?php if($food_row['food_status']==0)
                            {
                                echo "Instock";
                            }else{
                                echo "out of stock";
                            }
                                ?></p>
                             <a href="food_item.php?<?php echo "f_id=".$food_row["food_id"]."&c_id=".$food_row["chef_id"]."&cus_id=".$shop_row1["cust_id"]?>" class="custom-link">View details</a>   
                        </div>
                    </div>
                    
                </div>
            <?php
                    }   
                }
            ?>
            <!-- END GRID EACH SHOPS -->

        </div>
        <!-- END GRID SHOPS SELECTION -->

    </div>
    <footer class="text-center text-white">
  <!-- Copyright -->
  <div class="text-center p-2 p-2 mb-1 bg-dark text-white">
    <p class="text-white">© 2022 Copyright : Home-foodi</p>
    <p class="text-white">Developed by :</p>
    <p class="text-white">&nbsp;Amal Vijayan</p>
  </div>
  <!-- Copyright -->
</footer>
</body>

</html>
