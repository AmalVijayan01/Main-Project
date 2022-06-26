<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start();
    include("conn.php");
    include('head.php');
    $cusid = $_SESSION["ses_id"];
    if (!isset($_SESSION["ses_id"])) {
        header("location: restricted.php");
        exit(1);
        
    }
    include("conn.php");
    include('head.php');
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
            height: 100px;
            width: 100px;
        }

        .carttbl {
            display: flex;
            box-sizing: border-box;
            border-color: black;
            background-color: beige;
            width: 50%;
            height: 20%;
            padding: 10px 10px 10px 10px;
            margin-bottom: 5px;
        }

        .carttext {
            margin-left: 2%;
        }

        .cartdiv {
            box-shadow: 2px;
            display: flex;
            margin-right: 10%;
            ;
        }

        .userdetail {
            width: 50%;
            float: right;
            background-color: azure;
            margin-left: 20%;
            margin-top: -15%;
            padding: 5px 5px 10px 10px;
        }

        .pickup {
            border-bottom: black 5px;

        }

        .pickup form label {
            width: 150px;
            display: inline-block;
        }

        .pickup form input {
            margin-top: 15px;
        }

        .pickup form button {
            width: 300px;
            display: inline-block;
        }

        .pickup form input {
            width: 300px;
            display: inline-block;
        }.cartcontainer{
            height: 500px;
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
                </svg> My Cart
            </h2>
        </div>
        
        <?php
        $sqle = "SELECT * FROM tbl_customer WHERE login_id ='$cusid'";
        $resc = mysqli_query($con, $sqle);
        if ($rese = mysqli_fetch_array($resc)) {
            $cusid = $rese['cust_id'];
        }
        $cartselect = "SELECT * FROM tbl_foods,tbl_cart WHERE tbl_foods.food_id=tbl_cart.food_id AND tbl_cart.cust_id='$cusid'";
        $cartres = mysqli_query($con, $cartselect);
        while ($cartres1 = mysqli_fetch_array($cartres)) {
            $unitprice = $cartres1['food_unitprice'];
            $cartno = $cartres1['cart_amount'];
            $total = $unitprice * $cartno;
        ?>
            <div class="cartcontainer">
                <div class="cartdiv">
                    <div class="carttbl">
                        <div class="cartimg">
                            <img src="<?php echo $cartres1['food_image'] ?>">
                        </div>
                        <div class="carttext">
                            <h3><?php echo $cartres1['cart_amount'] ?>x&nbsp;<?php echo $cartres1['food_name'] ?></h3>
                            <text><?php echo $total ?>&nbsp;(<?php echo $cartres1['food_unitprice'] ?>&nbsp;Rs. each)</text><br><br>
                            <a href="cust_update_cart.php?<?php echo "fd_id=" . $cartres1['food_id'] . "&cust_id=" . $cartres1['cust_id'] ?>">Edit Item</a>
                        </div>
                    </div>
                </div>
                <?php
                } ?>
                <div class="userdetail">
                    <div class="pickup">
                        <h4>Pickup Details</h4>
                        <form>
                            <label>Name:</label>&nbsp;<input type="text" name="delivery_name"><br>
                            <label>Address:</label>&nbsp;<input type="text" name="delivery_address"><br>
                            <label>Pincode:</label>&nbsp;<input type="text" name="delivery_address"><br>
                            <label>City:</label>&nbsp;<input type="text" name="delivery_address"><br>
                            <label>Mobile:</label>&nbsp;<input type="text" name="delivery_address"><br>
                            <button type="submit" name="submit" class="btn btn-success w-100">Proceed With Payment</button>
                        </form>
                    </div>
                </div>
            </div>
            <footer class="text-center text-white">
                <!-- Copyright -->
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