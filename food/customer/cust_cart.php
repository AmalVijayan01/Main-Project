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

    <title>Shopping Cart</title>

    <link rel="stylesheet" type="text/css" href="style/cart.css">

    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>



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



</body>


</html>