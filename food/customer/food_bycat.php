<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
        session_start();
        $ses_id=$_SESSION["ses_id"];
        // $_SESSION["role"] = "user";
        $cid=$_GET["f_id"];
        include("../assets/db/conn.php");
        include('../assets/includes/head.php');
        include('navbar.php');
    ?>
    

</head>

<body class="d-flex flex-column h-100">
    <?php
        $query = "SELECT * FROM tbl_foods WHERE cat_id =$cid";
        $result = mysqli_query($con,$query);
        $shop_row = $result -> fetch_array();
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
                            <span class="me-2 float-end"><a class="text-decoration-none link-light" href="shop_menu.php?s_id=<?php echo $s_id;?>">X</a></span>
                        </div>
                    </div>
                    <!-- END FAILED ADD TO CART -->
            <?php }
                } ?>
        <!-- GRID MENUS SELECTION -->
        <h3 class="border-top py-3 mt-2">Menu</h3>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 align-items-stretch mb-1">

        <?php
            $query = "SELECT * FROM tbl_foods WHERE cat_id=$cid";
            $result = mysqli_query($con,$query);
            if($result ->num_rows > 0){
                while($food_row = $result->fetch_array()){
                    $imgurl = "foodimgs/".$food_row['food_image'];
        ?>
            <!-- GRID EACH MENU -->
            <div class="col">
                <div class="card rounded-25 mb-4">
                    
                        <div class="card-img-top">
                            <img src="<?php echo $imgurl ?>"
                                style="width:100%; height:150px; object-fit:cover;"
                                class="img-fluid" alt="<?php echo $food_row["food_name"]?>">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fs-5"><?php echo $food_row["food_name"]?></h5>
                            <p class="card-text"><?php echo $food_row["food_description"]?></p>
                            <p class="card-text"><?php echo $food_row["food_unitprice"]?> Rs. </p>
                            <a href="food_item.php?<?php echo "f_id=".$food_row["food_id"]."&c_id=".$food_row["chef_id"]."&cus_id=".$ses_id?>" class="btn btn-sm mt-3 btn-outline-secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-cart-plus" viewBox="0 0 16 16">
                                    <path
                                        d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z" />
                                    <path
                                        d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 
                                        0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.
                                        621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 
                                        0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                </svg> Add to cart 
                            </a>
                        </div>
                    </a>
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
