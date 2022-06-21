<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
    session_start();
    if(!isset($_SESSION["cid"])){
        exit(1);
    }
    include("conn.php");
    
    include("navbar.php");
    if(isset($_POST["upd_item"])){
        //Update button pressed
        $updtcust_id = $_POST["cust_id"];
        $updtfood_id = $_POST["fd_id"];
        $newamount = $_POST["amount"];
        $newrequest = $_POST["request"];
        $cartupdate_query = "UPDATE tbl_cart SET cart_amount = '$newamount', cart_note = '$newrequest' 
        WHERE cust_id = '$updtcust_id' AND food_id = '$updtfood_id'";
        $cartupdate_result = mysqli_query($con,$cartupdate_query);
        if($cartupdate_result){
            header("location: cust_cart.php?up_crt=1");
        }else{
            header("location: cust_cart.php?up_crt=0");
        }
        exit(1);
    }
    include("head.php");
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/main.css" rel="stylesheet">
    <link href="style/menu.css" rel="stylesheet">
    <script type="text/javascript" src="js/input_number.js"></script>
    <title>Food Item | Home-foodi</title>
</head>

<body class="d-flex flex-column h-100">
    <?php 
        $cust_id = $_GET["cust_id"];
        $fd_id = $_GET["fd_id"];
        $query = "SELECT * FROM tbl_foods WHERE food_id = '$fd_id' LIMIT 0,1";
        $result = mysqli_query($con,$query);
        $food_row = $result -> fetch_array();
    ?>

    <div class="container px-5 py-4" id="shop-body">
    <div class="row my-4">
            <a class="nav nav-item text-decoration-none text-muted mb-2" href="#" onclick="history.back();">
                <i class="bi bi-arrow-left-square me-2"></i>Go back
            </a>
        </div>
        <div class="row row-cols-1 row-cols-md-2 mb-5">
            <div class="col mb-3 mb-md-0">
                <img 
                    <?php
                        if(is_null($food_row["food_image"])){echo "src='img/default.png'";}
                        else{echo "src=\"foodimgs/{$food_row['food_image']}\"";}
                    ?> 
                    class="img-fluid rounded-25 float-start" 
                    alt="<?php echo $food_row["food_name"]?>">
            </div>
            <div class="col text-wrap">
                <h1 class="fw-light"><?php echo $food_row["food_name"]?></h1>
                <h3 class="fw-light"><?php echo $food_row["food_unitprice"]?> Rs.</h3>

                <?php
                    $ci_query = "SELECT cart_amount,cart_note FROM tbl_cart WHERE cust_id = '$cust_id' AND food_id = '$fd_id'";
                    $ci_arr = mysqli_query($con,$ci_query) -> fetch_array();
                ?>

                <div class="form-amount">
                    <form class="mt-3" method="POST" action="cust_update_cart.php">
                        <div class="input-group mb-3">
                            <button id="sub_btn" class="btn btn-outline-secondary" type="button" title="subtract amount"
                                onclick="sub_amt('amount')">
                                <i class="bi bi-dash-lg"></i>
                            </button>
                            <input type="number" class="form-control text-center border-secondary" id="amount"
                                name="amount" value="<?php echo $ci_arr["cart_amount"]?>" min="1" max="20">
                            <button id="add_btn" class="btn btn-outline-secondary" type="button" title="add amount"
                                onclick="add_amt('amount')">
                                <i class="bi bi-plus-lg"></i>
                            </button>
                        </div>
                        <input type="hidden" name="cust_id" value="<?php echo $cust_id?>">
                        <input type="hidden" name="fd_id" value="<?php echo $fd_id?>">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="addrequest" name="request" value="<?php echo $ci_arr["cart_note"]?>" placeholder=" ">
                            <label for="addrequest" class="d-inline-text">Additional Request (if any)</label>
                            <div id="addrequest_helptext" class="form-text">
                                Such as Veggie.
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-block">
                            <button class="btn btn-success" type="submit" title="Update item" name="upd_item" value="upd">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-cart" viewBox="0 0 16 16">
                                    <path
                                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </svg> Update item
                            </button>
                            <button class="btn btn-outline-danger" type="submit" formaction="remove_cart_item.php?rmv=1&s_id=<?php echo $cust_id?>&f_id=<?php echo $fd_id?>" value="rmv" title="remove from cart" name="rmv_item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-cart-x" viewBox="0 0 16 16">
                                    <path
                                        d="M7.354 5.646a.5.5 0 1 0-.708.708L7.793 7.5 6.646 8.646a.5.5 0 1 0 .708.708L8.5 8.207l1.146 1.147a.5.5 0 0 0 .708-.708L9.207 7.5l1.147-1.146a.5.5 0 0 0-.708-.708L8.5 6.793 7.354 5.646z" />
                                    <path
                                        d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                </svg> Remove item
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>
    <footer class="text-center text-white">
  <!-- Copyright -->
  <div class="text-center p-2 p-2 mb-1 bg-dark text-white">
    <p class="text-white">© 2022 Copyright : Home-foodi</p>
    <p class="text-white">Developed by :&nbsp;Amal Vijayan</p>
  </div>
  <!-- Copyright -->
</footer>
</body>

</html>