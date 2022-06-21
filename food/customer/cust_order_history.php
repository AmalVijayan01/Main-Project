<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start();
    include("conn.php");
    include('head.php');
    if (!isset($_SESSION["ses_id"])) {
        header("location: restricted.php");
        exit(1);
        $cusid=$_SESSION["ses_id"];
    }
    include('navbar.php');
    $no_order = false;
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/main.css" rel="stylesheet">
    <link href="style/menu.css" rel="stylesheet">
    <title>My Cart | SaiCafe</title>
    <style>
       .cartimg img {
            height:100px;
            width:100px;
        }
        .carttbl{
            display: flex;
            box-sizing: border-box;
            border-color: black;
            background-color: beige;
            width: 50%;
            height: 20%;
            padding:10px 10px 10px 10px;
            margin-bottom: 5px;
        }
        .carttext{
            margin-left: 2%;
        }
        .cartdiv{
            box-shadow: 2px;
            display: flex;
            margin-right: 10%;;
        }
 
    </style>
</head>

<body class="d-flex flex-column h-100">

    <div class="container px-5 py-4" id="cart-body">
        <div class="row my-4">
            <a class="nav nav-item text-decoration-none text-muted mb-2" href="#" onclick="history.back();">
                <i class="bi bi-arrow-left-square me-2"></i>Go back
            </a>
            <h2 class="py-3 display-6 border-bottom">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </svg> My Orders
            </h2>
        </div>
        <?php
        $sqle="SELECT * FROM tbl_customer WHERE login_id ='". $_SESSION["ses_id"]."'";
        $resc= mysqli_query($con,$sqle);
        if($rese = mysqli_fetch_array($resc))
        {
            $cusid=$rese['cust_id'];       
        }
        $cartselect="SELECT * FROM tbl_orders,tbl_foods WHERE tbl_foods.food_id=tbl_orders.food_id AND tbl_orders.cust_id='$cusid'";
            $cartres=mysqli_query($con,$cartselect);
            while($cartres1 = mysqli_fetch_array($cartres))
            {
               $foodname=$cartres1['food_name'];
               $orderdate=$cartres1['order_date'];
               $orderqty=$cartres1['order_qty'];
               $orderprice=$cartres1['order_price'];
               $total=$orderqty*$orderprice;
               $cartres1['order_status'];
            ?>
            <div class="cartdiv">
                <div class="carttbl">
                    <div class="carttext">
                        <label>Item Name:</label>&nbsp;<h4><?php echo $foodname; ?></h4>
                        <label>Ordered date:</label>&nbsp;<h4><?php echo $orderdate; ?></h4>
                        <label>Order quantity:</label>&nbsp;<h4><?php echo $orderqty; ?></h4>
                        <label>Order amount:</label>&nbsp;<h4><?php echo $total; ?></h4>
                        <label>Order status:</label>&nbsp;
                        <?php if($cartres1['order_status']=="ordered"){ ?>
                                <div class="card-header bg-info text-dark justify-content-between">
                                    <small class="me-auto d-flex" style="font-weight: 500;">Placed your order</small>
                                </div>
                                <?php }else if($cartres1['order_status']=="accept"){?>
                                <div class="card-header bg-warning justify-content-between">
                                    <small class="me-auto d-flex" style="font-weight: 500;">Accepted your order</small>
                                </div>
                                <?php }else if($cartres1['order_status']=="prep"){?>
                                <div class="card-header bg-primary text-white justify-content-between">
                                    <small class="me-auto d-flex" style="font-weight: 500;">Preparing your Order</small>
                                </div>
                                <?php }else if($cartres1['order_status']=="rfpu"){?>
                                <div class="card-header bg-primary text-white justify-content-between">
                                    <small class="me-auto d-flex" style="font-weight: 500;">Order ready for pickup</small>
                                </div>
                                <?php }else{?>
                                <div class="card-header bg-success text-white justify-content-between">
                                    <small class="me-auto d-flex" style="font-weight: 500;">Order Finished</small>
                                </div>
                                <?php } ?>
                    </div>
                </div>
            </div>
            <?php 
        }?>
        <!--copyright -->
            <div class="text-center p-2 p-2 mb-1 bg-dark text-white">
                <p class="text-white">© 2022 Copyright : Home-Foodi</p>
                <p class="text-white">Developed by :&nbsp; Amal Vijayan</p>
            </div>
            <!-- Copyright -->
        </footer>
</body>

<!-- Apply class to omise payment button -->
<script type="text/javascript">
    var pay_btn = document.getElementsByClassName("omise-checkout-button");
    pay_btn[0].classList.add("w-100", "btn", "btn-primary");
</script>

</html>