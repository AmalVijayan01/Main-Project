<?php
session_start();
include("conn.php");
if (!isset($_SESSION["ses_id"])) {
    header("location: restricted.php");
    exit(1);
}
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

    <title>Shopping Cart</title>

    <link rel="stylesheet" type="text/css" href="style/cart.css">

    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/main.css" rel="stylesheet">
    <link href="style/menu.css" rel="stylesheet">
    <link href="style/cart.css" rel="stylesheet">
    <title>My Cart | SaiCafe</title>
    <style>
        .sub-btn{
            text-align: center;
            margin:10px 0 0 75px ;
            width: 100%;
            border: none;
            background-color:#8bc34a;
            padding-top: 5px;
            padding-bottom: 5px;
            border-radius: 5px;
            color: ;
        }.err{
            color: red;
        }
    </style>
</head>

<body>

    <body class="d-flex flex-column h-100">
        <div class="container px-5 py-4" id="shop-body">
            <a class="nav nav-item text-decoration-none text-muted mb-3" href="#" onclick="history.back();">
                <i class="bi bi-arrow-left-square me-2"></i>Go back</a>
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
                                $chef_id = $item_fetched['chef_id'];
                                $cart_total = $food_price * $cart_amount;
                                $cart_sum = $cart_total;
                                $temp = $temp + $cart_sum;//cart amount sum
                                $ct_qty = $ct_qty + $cart_amount;//cart qty sum

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
                                                <input type="number" min="1" readonly max="<?php $item_fetched['food_qty'] ?>" value="<?php echo "$item_fetched[cart_amount]" ?>">
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
                        <div class="err" id="err"></div>
                        <form action="action_place_order.php" name="myform" method="post" onsubmit="return (validate())">
                            <label>Name:</label>
                            <input type="text" name="del_name" autocomplete="off" required><br>
                            <label>Address:</label>
                            <input type="text" name="addr" autocomplete="off" required><br>
                            <label>Mobile:</label>
                            <input type="text" name="mob" autocomplete="off" required><br>
                            <label>city:</label>
                            <input type="text" name="city" autocomplete="off" required><br>
                            <label>Pincode:</label>
                            <input type="text" name="pincode" autocomplete="off" required><br>
                            <label>Amount:</label>
                            <input type="text" readonly name="amnt" readonly value="<?php echo $temp ?>"><br>
                            <label>Quantity:</label>
                            <input type="text" readonly name="qty" readonly value="<?php echo $ct_qty ?>"><br>
                            <input type="hidden" name="custid" value="<?php echo $custid ?>">
                            <input type="hidden" name="foodid" value="<?php echo $food_id ?>">
                            <input type="hidden" name="chefid" value="<?php echo $chef_id ?>">
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

            </footer>
    </body>
<script>
    function validate(){
        var name=document.myform.del_name.value;
        var addr=document.myform.addr.value;
        var mob=document.myform.mob.value;
        var city=document.myform.city.value;
        var pin=document.myform.pincode.value;

        if(name==''){
            document.getElementById("error").innerHTML="Enter your name";
            return false;
        }else if(addr==''){
            document.getElementById("error").innerHTML="Enter your address";
            return false;
        }else if(mob==''){
            document.getElementById("error").innerHTML="Enter your mobile";
            return false;
        }else if(city==''){
            document.getElementById("error").innerHTML="Enter your city";
            return false;
        }else if(pin==''){
            document.getElementById("error").innerHTML="Enter your pincode";
            return false;
        }
    }
</script>
</html>