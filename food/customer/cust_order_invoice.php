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
        $cusid = $_SESSION["ses_id"];
    }
    include('assets/TCPDF/tcpdf.php');
    $cusid = $_SESSION["ses_id"]; //loginid
    $cust_select = "SELECT cust_id FROM tbl_customer WHERE login_id='$_SESSION[ses_id]'";
    $cust_result = mysqli_query($con, $cust_select);
    $cust_fetch = mysqli_fetch_array($cust_result);
    $custid = $cust_fetch['cust_id']; //customer id
    include('navbar.php');
    $odr_id=$_GET["orh_id"];

    
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/main.css" rel="stylesheet">
    <link href="style/menu.css" rel="stylesheet">
    <link href="style/invoice.css" rel="stylesheet">
    <title>My Cart | Home-Foodi</title>
    <style>
        .ord-inv-cont{
            margin-left: 25%;
            
}
.inv-body{
 background-color: white;
 box-shadow: 1px 1px 1px 1px;
 width: 60%;
 margin-bottom: 20px;

}
.inv-dtls{
    text-align: center;
}
.inv-dtls h2{
    padding-top:4%;
    font-style: bold;
    color:black;
}
.inv-dtls p{
    font-size: 12px;
    font-style: italic;
    margin-top:-5px;
}
.inv-conts{
    margin: 40px;
}
.inv-head{
}
.inv-head h5{
    margin-bottom: 20px;
}
.inv-addr{
    margin-left: 8%;
    margin-bottom: 10%;
}
.inv-tbl table{
   width: 100%;
}
table th{
    background-color:#d5efee;
}
table td{
    text-align: left;
    margin-top: 2px;
    border-bottom: 1px;
}
.inv-tot{
    margin-top: 20px;
}
.inv-tot text{
    float: left;
    text-align: inline;
}
.inv-pay-stat{
   
}
.pay-stat{
    margin-top: 40px;
    width: 100%;
    background-color: #5cf78d;
    height: 5px;
    color: black;
    text-align: center;
    margin-bottom: 10px;
}
.ord-stat{
    width: 70%;
    background-color: #2cf56c;
    height: 30px;
    margin-left: 60px;
    color: black;
    text-align: center;
    margin-bottom: 30px;
}
.inv-footer{
    margin-top:15px;
    padding-bottom: 10px;
    text-align: center;
}
.inv-btn{
    border: none;
    border-radius:6px;
    background-color:#57d7fa;
    color: black;
    margin: 1% 0 5% 40%;
}
.inv-btn:hover{
    border: none;
    border-radius:6px;
    background-color:#51ad89;
    color: black;
}.rating{
    border: none;
    border-radius:6px;
    background-color:#57d7fa;
    color: black;
    margin: 0 0 5% -40%;
    padding: 2px;
}.pay-stat{
    width: 100%;
    height: 30px;
}.pay-stat text{

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
                </svg> Order Invoice of order id # &nbsp;<?php echo $odr_id ?> 
            </h2>
        </div>
        <div class="ord-inv-cont">
            <?php 
                $select_odr="SELECT tbo.order_date,tbo.order_qty,tbo.order_price,tbd.del_name,tbd.del_addr,tbd.del_city,tbd.del_pin 
                FROM tbl_orders tbo,tbl_delivery tbd WHERE tbo.order_id='$odr_id'AND tbd.order_id='$odr_id'";
                $odr_result=mysqli_query($con,$select_odr);
                $odr_res=mysqli_fetch_array($odr_result);
                $odrdate=$odr_res['order_date'];
                //$date=$odrdate->format('Y-m-d');
            ?>
            <div class="inv-body" id="invoice">
                <div class="inv-dtls">
                    <h2>Home-Foodie</h2>
                    <p>Homeli food ordering</p>
                </div>
                <div class="inv-conts">
                    <div class="inv-head">
                    <h5>Order id:&nbsp;<?php echo $odr_id ?></h5>
                    <h5>Date:&nbsp; <?php echo $odrdate ?></h5>
                    </div>
                    <h6>Delivery Address:</h6>
                    <div class="inv-addr">
                        <text><?php echo $odr_res['del_name'];?></text><br>
                        <text><?php echo $odr_res['del_addr'];?></text>,&nbsp;<?php echo $odr_res['del_city'];?></text><br>
                        <number><?php echo $odr_res['del_pin'];?></number>
                    </div>
                    <div class="inv-tbl">
                       <?php
                       $details_select="SELECT tbp.food_id,tbp.ordfd_qty,tbo.order_id,tbo.order_status,tbf.food_name,
                       tbf.food_unitprice FROM tbl_placeorder tbp,tbl_orders tbo,tbl_foods tbf WHERE 
                       tbo.order_id='$odr_id' AND tbo.order_id=tbp.order_id AND tbp.food_id=tbf.food_id;";
                       $details_result=mysqli_query($con,$details_select);
                       ?>
                        <table>
                            <tr>
                                <th>Items</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                        <?php
                        While($details= mysqli_fetch_array($details_result))
                        {
                         
                        ?>
                            <tr>
                                <td><?php echo $details['food_name']?></td>
                                <td><?php echo $details['ordfd_qty']?></td>
                                <td><?php echo $details['food_unitprice']?></td>
                            </tr>
                            <?php }?>
                        </table>
                    </div>
                    <div class="inv-tot">
                        <text>Total amount: <?php echo $odr_res['order_price'];?></text><br>
                        <text>Total Quantity: <?php echo $odr_res['order_qty'];?></text>
                    </div>
                    <?php 
                    $payment_select="SELECT tbl_payments.pay_status,tbl_orders.order_status FROM tbl_payments,tbl_orders WHERE tbl_orders.order_id='$odr_id' AND tbl_payments.order_id='$odr_id'";
                    $payment_result=mysqli_query($con,$payment_select);
                    $pay_result=mysqli_fetch_array($payment_result);
                    ?>
                    <div class="inv-pay-stat">
                        <div class="pay-stat">
                            <text><?php echo $pay_result['pay_status']?></text>
                        </div>
                    <div class="inv-footer">
                        <text>Thank you for purchasing with Home-foodie</text>
                    </div>
                </div>
                
            </div>
            <?php
            $stat_select="SELECT order_status FROM tbl_orders WHERE order_id='$odr_id' AND cust_id ='$custid'";
        $stat_result=mysqli_query($con,$stat_select);
        $stat=mysqli_fetch_array($stat_result);
        $odr_stat= $stat['order_status'];
        ?>
        </div>
        <?php 
        if($odr_stat=="delivered")
        {
        ?>
        <button class="inv-btn" onclick="printDiv('invoice')">Download Invoice</button>
        <?php 
        }
        
        $feedback_select="SELECT message FROM tbl_feedback WHERE order_id='$odr_id'";
        $feedback_result=mysqli_query($con,$feedback_select);
        $feedback_numm=mysqli_num_rows($feedback_result);

        if($odr_stat=="delivered" AND $feedback_numm==0){
           ?>
           <a href="order_rating.php?<?php echo "odrid=".$odr_id ?>" class="rating">Review your order</a> 
        <?php }
        ?>
        </div>

        <div class="text-center p-2 p-2 mb-1 bg-dark text-white">
            <p class="text-white">© 2022 Copyright : Home-Foodi</p>
            <p class="text-white">Developed by :&nbsp; Amal Vijayan</p>

        </footer>
</body>

<script type="text/javascript">
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     window.print();
     document.body.innerHTML = originalContents;
}

</script>

</html>