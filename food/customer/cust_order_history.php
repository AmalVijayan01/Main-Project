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
    $cusid = $_SESSION["ses_id"]; //loginid
    $cust_select = "SELECT cust_id FROM tbl_customer WHERE login_id='$_SESSION[ses_id]'";
    $cust_result = mysqli_query($con, $cust_select);
    $cust_fetch = mysqli_fetch_array($cust_result);
    $custid = $cust_fetch['cust_id']; //customer id
    include('navbar.php');
    $no_order = false;
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="style/main.css" rel="stylesheet"> -->
    <link href="style/menu.css" rel="stylesheet">
    <title>My Cart | Home-Foodie</title>
    <style>
        .cartimg img {
            height: 100px;
            width: 100px;
        }

        .carttbl {

            box-sizing: border-box;
            border-color: black;
            background-color: beige;
            width: 100%;
            height: 100%;
            padding: 10px 10px 10px 10px;
            margin-bottom: 5px;
            margin-right: 20px;
        }

        .cards {
            position: relative;
            width: 100%;
            padding: 1rem 3rem;
            display: grid;
            grid-template-columns: repeat(2, 0.5fr);
            grid-gap: -10px;
        }

        .carttext {
            margin-left: 2%;
            width: 100%;

        }

        .cartdiv {
            box-shadow: 2px;
            border: 1px solid black;
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
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active px-4" id="ongoing-tab" data-bs-toggle="tab" data-bs-target="#nav-ongoing"
                    type="button" role="tab" aria-controls="nav-ongoing"
                    aria-selected="true">&nbsp;Ongoing&nbsp;</button>
                <button class="nav-link px-4" id="completed-tab" data-bs-toggle="tab" data-bs-target="#nav-completed"
                    type="button" role="tab" aria-controls="nav-completed" aria-selected="false">Completed</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <!-- ONGOING ORDERS TAB -->
            <div class="tab-pane fade show active p-3" id="nav-ongoing" role="tabpanel" aria-labelledby="ongoing-tab">
                <?php 
                $ongoing_orders_select = "SELECT * FROM tbl_orders WHERE cust_id = '$custid'";
                $ongoing_result = mysqli_query($con,$ongoing_orders_select);
                $ongoing_num = mysqli_num_rows($ongoing_result);
                $result=mysqli_fetch_array($ongoing_result);
                // $chefid=$result['chef_id'];
                if($ongoing_num>0){
            ?>
                <div class="row row-cols-1 row-cols-md-3">
                    <!-- order detail starts -->
                    <?php while($og_row = $ongoing_result -> fetch_array()){ ?>
                    <div class="col">
                        <a href="cust_order_invoice.php?orh_id=<?php echo $og_row["order_id"]?>"
                            class="text-dark text-decoration-none">
                            <div class="card mb-3">
                                <?php if($og_row["order_status"]=="accepted"){ ?>
                                <div class="card-header bg-info text-dark justify-content-between">
                                    <small class="me-auto d-flex" style="font-weight: 500;">Order accepted</small>
                                </div>
                                <?php }else if($og_row["order_status"]=="prep"){?>
                                <div class="card-header bg-warning justify-content-between">
                                    <small class="me-auto d-flex" style="font-weight: 500;">Preparing order</small>
                                </div>
                                <?php }else if($og_row["order_status"]=="dispatched"){?>
                                <div class="card-header bg-primary text-white justify-content-between">
                                    <small class="me-auto d-flex" style="font-weight: 500;">Order dispatched</small>
                                </div>
                                <?php }else{?>
                                <div class="card-header bg-success text-white justify-content-between">
                                    <small class="me-auto d-flex" style="font-weight: 500;">Order placed</small>
                                </div>
                                <?php } ?>
                                <div class="card-body">
                                    <div class="card-text row row-cols-1 small">
                                        <div class="col">Order Id#<?php echo $og_row["order_id"];?></div>
                                        <div class="col mb-2">From
                                            <?php
                                            $shop_query = "SELECT * FROM tbl_chefs WHERE chef_id = '1'";
                                            $shop_arr = mysqli_query($con,$shop_query) ;
                                            $shop_res=mysqli_fetch_array($shop_arr);
                                            // echo $shop_res["chef_fname"];
                                        ?>
                                        </div>
                                        <?php 
                                        $ord_query = "SELECT * FROM tbl_orders WHERE order_id = '{$og_row['order_id']}' ";
                                        $ord_arr = mysqli_query($con,$ord_query) -> fetch_array();
                                    ?>
                                        <div class="col pt-2 border-top"><?php echo $ord_arr["order_qty"]?> item(s)</div>
                                        <div class="col mt-1 mb-2"><strong class="h5"><?php echo $ord_arr["order_price"]?>
                                                Rs.</strong></div>
                                        <div class="col text-end">
                                            <a href="cust_order_invoice.php?orh_id=<?php echo $og_row["order_id"]?>"
                                                class="text-dark text-decoration-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-arrow-right-square"
                                                    viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                        d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm4.5 5.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                                                </svg> More Detail
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                    <!-- END EACH ORDERS DETAIL -->
                </div>
                <?php }else{ ?>
                <!-- IN CASE NO ORDER -->
                <div class="row row-cols-1">
                    <div class="col pt-3 px-3 bg-danger text-white rounded text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                            class="bi bi-x-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path
                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                        </svg>
                        <p class="ms-2 mt-2">You don't have any order yet.</p>
                    </div>
                </div>
                <!-- END CASE NO ORDERS -->
                <?php } ?>
            </div>


            <!-- COMPLETED ORDERS TAB -->
            <div class="tab-pane fade p-3" id="nav-completed" role="tabpanel" aria-labelledby="completed-tab">
            <?php 
                $odr_id=$result["order_id"];
                $ongoing_query = "SELECT * FROM tbl_orders WHERE cust_id = '$custid' AND order_status='delivered' ORDER BY order_id DESC";
                $ongoing_result = mysqli_query($con,$ongoing_query);
                $ongoing_num = mysqli_num_rows($ongoing_result);
                if($ongoing_num>0){
            ?>
                <div class="row row-cols-1 row-cols-md-3">
                    <!-- each order details -->
                    <?php while($og_row = $ongoing_result -> fetch_array()){ ?>
                    <div class="col">
                        <a href="cust_order_invoice.php?orh_id=<?php echo $og_row["order_id"]?>"
                            class="text-dark text-decoration-none">
                            <div class="card mb-3">
                                <?php if($og_row["order_status"]=="delivered"){ ?>
                                <div class="card-header bg-success text-white justify-content-between">
                                    <small class="me-auto d-flex" style="font-weight: 500;">Delivered</small>
                                </div>
                                <?php } ?>
                                <div class="card-body">
                                    <div class="card-text row row-cols-1 small">
                                        <div class="col">Order #<?php echo $og_row["order_id"];?></div>
                                        <div class="col mb-2">From
                                            <?php
                                            $shop_query = "SELECT chef_fname FROM tbl_chefs  WHERE chef_id = 1;";
                                            $shop_arr = mysqli_query($con,$shop_query) -> fetch_array();
                                            echo $shop_arr["chef_fname"];
                                        ?>
                                        </div>
                                        <?php 
                                        $ord_query = "SELECT * FROM tbl_orders
                                        WHERE order_id = {$og_row['order_id']}";
                                        $ordr_arr = mysqli_query($con,$ord_query);
                                        $ord_arr=mysqli_fetch_array($ordr_arr);
                                    ?>
                                        <div class="col pt-2 border-top"><?php echo $ord_arr["order_qty"]?> item(s)</div>
                                        <div class="col mt-1 mb-2"><strong class="h5"><?php echo $ord_arr["order_price"]?>
                                                Rs.</strong></div>
                                        <div class="col text-end">
                                            <a href="cust_order_invoice.php?orh_id=<?php echo $og_row["order_id"]?>"
                                                class="text-dark text-decoration-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-arrow-right-square"
                                                    viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                        d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm4.5 5.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                                                </svg> More Detail
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                    <!-- END EACH ORDERS DETAIL -->
                </div>
                <?php }else{ ?>
                <!-- IN CASE NO ORDER -->
                <div class="row row-cols-1">
                    <div class="col pt-3 px-3 bg-danger text-white rounded text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                            class="bi bi-x-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path
                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                        </svg>
                        <p class="ms-2 mt-2">You don't have any order yet.</p>
                    </div>
                </div>
                <!-- END CASE NO ORDER -->
                <?php } ?>
            </div>
        </div>
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