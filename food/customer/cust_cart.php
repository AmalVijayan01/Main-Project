<?php
session_start();
include("conn.php");
include('head.php');
if (!isset($_SESSION["ses_id"])) {
    header("location: restricted.php");
    exit(1);
}
include("conn.php");
include('head.php');
include('navbar.php');
$cusid = $_SESSION["ses_id"]; //loginid
$cust_select = "SELECT cust_id FROM tbl_customer WHERE login_id='$_SESSION[ses_id]'";
$cust_result = mysqli_query($con, $cust_select);
$cust_fetch = mysqli_fetch_array($cust_result);
$custid = $cust_fetch['cust_id']; //customer id
$total_price = 0;

?>
<!DOCTYPE html>

<html>

<head>
<<<<<<< HEAD

    <title>Shopping Cart</title>

    <link rel="stylesheet" type="text/css" href="style/cart.css">

    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

=======
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
>>>>>>> e937fb11643b7fff3d41a5b4399541e176c9e127
</head>

<body>

<<<<<<< HEAD


    <div class="container">

        <h1>Shopping Cart</h1>
        <div class="cart">

            <div class="products">
                <?php
                $temp = 0;
                $ct_qty = 0;
                $cart_check_empty = "SELECT cust_id FROM tbl_cart WHERE cust_id='$custid'";
                $cart_check_res = mysqli_query($con, $cart_check_empty);
                if (mysqli_num_rows($cart_check_res) > 0) {
                    $cart_item_select = "SELECT ct.cart_id,ct.food_id,ct.cust_id,ct.chef_id,ct.cart_status,
                ct.cart_amount,ct.cart_note,fd.food_name,fd.food_image,fd.food_unitprice,fd.food_qty,tf.chef_id,tf.chef_fname,tf.chef_lname 
                FROM tbl_cart ct,tbl_foods fd,tbl_chefs tf WHERE ct.food_id=fd.food_id AND 
                ct.chef_id=tf.chef_id AND ct.cust_id=$custid";
                    $item_select = mysqli_query($con, $cart_item_select);
                    while ($item_fetched = mysqli_fetch_array($item_select)) {
                        $imgurl = "../chefs/images/foods/" . $item_fetched['food_image'];
                        $cart_amount = $item_fetched['cart_amount'];
                        $food_price = $item_fetched['food_unitprice'];
                        $cart_total = $food_price * $cart_amount;
                        $cart_sum = $cart_total;
                        $temp = $temp + $cart_sum;
                        $ct_qty=$ct_qty+$cart_amount;

                        $food_id = $item_fetched['food_id'];
                ?>
                        <div class="product">

                            <img src="../chefs/images/foods/<?php echo "$item_fetched[food_image]" ?>">

                            <div class="product-info">

                                <h5 class="product-name"><?php echo "$item_fetched[food_name]" ?></h5>

                                <h6 class="product-price">₹<?php echo $cart_total ?>&nbsp;(₹ <?php echo "$item_fetched[food_unitprice]" ?> each)</h6>

                                <h6 class="product-offer">From:Chef <?php echo "$item_fetched[chef_fname]&nbsp;$item_fetched[chef_lname]" ?></h6>


                                <div class="upd-cart">
                                    <p class="product-quantity">Quantity:
                                        <a href="cart_rmv.php?<?php echo "ct_id=" . $item_fetched['cart_id'] . "&updt_val=" . $item_fetched['cart_amount'] ?>">-</a>
                                        <input type="number" min="1" readonly  max="<?php  $item_fetched['food_qty']?>" value="<?php echo "$item_fetched[cart_amount]" ?>">
                                        <a href="cart_upgrd.php?<?php echo "ct_id=" . $item_fetched['cart_id'] . "&updt_val=" . $item_fetched['cart_amount'] ?>">+</a>
                                </div>
                                <p class="product-remove">

                                    <i class="fa fa-trash" aria-hidden="true"></i>

                                    <a href="cart_remove.php?<?php echo "ct_id=" . $item_fetched['cart_id'] . "&cust_id=" . $custid ?>" class="remove">Remove</a>

                                </p>

                            </div>

                        </div>

                    <?php
                    } ?>
            </div>

            <div class="cart-total">

                <h4>Delivery details</h4><br>
                <form action="action_place_order.php" method="post">
                <label>Name:</label>
                <input type="text" name="del_name" autocomplete="off"><br>
                <label>Address:</label>
                <input type="text" name="addr" autocomplete="off"><br>
                <label>Mobile:</label>
                <input type="text" name="mob" autocomplete="off"><br>
                <label>city:</label>
                <input type="text" name="city" autocomplete="off"><br>
                <label>Pincode:</label>
                <input type="text" name="pincode" autocomplete="off"><br>
                <label>Amount:</label>
                <input type="text" readonly name="amnt"  value="<?php echo $temp?>"><br>
                <label>Quantity:</label>
                <input type="text" readonly name="qty" value="<?php echo $ct_qty?>" ><br>
                <input type="hidden" name="custid" value="<?php echo $custid?>">
                <input type="hidden" name="foodid" value="<?php echo $food_id?>">
                <input type="submit" class="sub-btn" name="submit" value="Proceed to payment">
                </form>
            </div>
        <?php
                } else {
                    echo "Cart empty";
                }
        ?>

        </div>

    </div>



=======
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
>>>>>>> e937fb11643b7fff3d41a5b4399541e176c9e127
</body>


</html>