<html>
<?php
include 'conn.php';
session_start();
if (!isset($_SESSION["ses_id"])) {
    header("location: chef_login.php");
    exit(1);
    

    
}
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/foodpicky.png">
    <title>Home-Foodi</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/dash.css" rel="stylesheet">
</head>

<body class="fix-header">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="home.php">
                        <!-- Logo icon -->
                        <b><img src="images/foodpicky.png" alt="homepage" class="dark-logo" width="25px" /></b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span><b>HomeFoodi</b></span>
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>

                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- Comment -->
                        <li class="nav-item dropdown">

                            <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>

                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all
                                                notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- End Comment -->

                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/users/5.jpg" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="logout.php"><i class="fa fa-power-off"></i> LogOut</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Chef-Dashboard</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Home</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="chef_dashboard.php">Dashboard</a></li>

                            </ul>
                        </li>
                        <li class="nav-label">Options</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"> <span><i class="fa fa-user f-s-20 "></i></span><span class="hide-menu">Food items</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="items_all.php">All items</a></li>
                                <li><a href="items_byme.php">My items</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-archive f-s-20 color-warning"></i><span class="hide-menu">Add Items</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="items_newlyadded.php">Add new items</a></li>
                                <li><a href="items_recentlyadded.php">Recently added</a></li>

                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cutlery" aria-hidden="true"></i><span class="hide-menu">Orders</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="orders_recent.php">Recent Orders</a></li>
                                <li><a href="orders_accepted.php">Accepted orders</a></li>
                                <li><a href="orders_processing.php">Processing orders</a></li>
                                <li><a href="orders_outfordel.php">Out for Delivery</a></li>
                            </ul>
                        </li>

                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-archive f-s-20 color-warning"></i><span class="hide-menu">Delivery</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="del_recent.php">Recently Deliverd</a></li>
                                <li><a href="del_agents.php">Delivery Agents</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-archive f-s-20 color-warning"></i><span class="hide-menu">Messages</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <!-- <li><a href="feedbacks.php">Feedbacks</a></li> -->
                                <li><a href="complaints.php">Complaints</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-archive f-s-20 color-warning"></i><span class="hide-menu">Payments</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="payment_details.php">Payment details</a></li>
                                <li><a href="payment_pending.php">Pending Payments</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper" style="height:1200px;">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Welcome to dashboard</h3>
                </div>

            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->

        
                <?php 
                $login_id=$_SESSION["ses_id"];//login_id
                $chef_select="SELECT chef_id FROM tbl_chefs WHERE login_id='$login_id'";
                $chef_result=mysqli_query($con,$chef_select);
                $chef_fetch=mysqli_fetch_array($chef_result);
                $chefid=$chef_fetch['chef_id'];//chefid
            
                $order_select="SELECT COUNT(chef_id) as total_orders FROM `tbl_placeorder` WHERE chef_id='$chefid' ";
                $order_result=mysqli_query($con,$order_select);
                $order_result=mysqli_fetch_assoc($order_result);
                $odr_count=$order_result['total_orders'];
                
                $food_count=mysqli_query($con,"SELECT COUNT(food_name) AS food_count FROM `tbl_foods` WHERE chef_id='$chefid'");
                $fd_count=mysqli_fetch_assoc($food_count);

                $payment_select=mysqli_query($con,"SELECT SUM(paid_amount) AS revenue,COUNT(cust_id) AS cust FROM tbl_payments WHERE chef_id='$chefid'");
                $payment_fetch=mysqli_fetch_array($payment_select);
                ?>

                <div class="row">
                    <div class="container-fluid">

                        <!-- ========================= Main ==================== -->
                        <div class="main">
                            <div class="topbar">
                                <div class="toggle">
                                    <ion-icon name="menu-outline"></ion-icon>
                                </div>

                                <div class="user">
                                    <img src="assets/imgs/customer01.jpg" alt="">
                                </div>
                            </div>

                            <!-- ======================= Cards ================== -->
                            <?php
                            
                            ?>
                            <div class="cardBox">
                                <div class="card">
                                    <div>
                                        <div class="numbers"><?php echo $odr_count ?></div>
                                        <div class="cardName">Total orders</div>
                                    </div>

                                    <div class="iconBx">
                                        <ion-icon name="eye-outline"></ion-icon>
                                    </div>
                                </div>

                                <div class="card">
                                    <div>
                                        <div class="numbers"><?php echo $fd_count['food_count'];?></div>
                                        <div class="cardName">Total food items</div>
                                    </div>

                                    <div class="iconBx">
                                        <ion-icon name="cart-outline"></ion-icon>
                                    </div>
                                </div>

                                <div class="card">
                                    <div>
                                        <div class="numbers"><?php echo $payment_fetch['revenue'];?></div>
                                        <div class="cardName">Total earnings</div>
                                    </div>

                                    <div class="iconBx">
                                        <ion-icon name="chatbubbles-outline"></ion-icon>
                                    </div>
                                </div>

                                <div class="card">
                                    <div>
                                        <div class="numbers"><?php echo $payment_fetch['cust'];?></div>
                                        <div class="cardName">Customers</div>
                                    </div>

                                    <div class="iconBx">
                                        <ion-icon name="cash-outline"></ion-icon>
                                    </div>
                                </div>
                            </div>

                            <!-- ================ Order Details List ================= -->
                            <?php
                            $details_select=mysqli_query($con,"SELECT tbo.order_price,tbo.order_status,
                            tbp.chef_id,tbc.cust_fname,tbc.cust_lname,tbpy.pay_status FROM tbl_orders tbo,
                            tbl_placeorder tbp,tbl_customer tbc,tbl_payments tbpy WHERE tbp.order_id=
                            tbo.order_id AND tbp.chef_id='$chefid' AND tbo.cust_id=tbc.cust_id AND tbo.order_id=
                            tbpy.order_id");
                            if(mysqli_num_rows($details_select)==0)
                            {
                                echo "You have'nt  any orders";
                            }
                            else{
                            
                            ?>
                            <div class="details">
                                <div class="recentOrders">
                                    <div class="cardHeader">
                                        <h2>Recent Orders</h2>
                                        <a href="#" class="btn">View All</a>
                                    </div>

                                    <table>
                                        <thead>
                                            <tr>
                                                <td>Name</td>
                                                <td>Price</td>
                                                <td>Payment</td>
                                                <td>Status</td>
                                            </tr>
                                        </thead>

                                        <tbody>
                                       <?php
                                        While($odr_dtls=mysqli_fetch_array($details_select)){
                                            ?>
                                            <tr>
                                                <td><?php echo $odr_dtls['cust_fname'],$odr_dtls['cust_lname']?></td>
                                                <td><?php echo $odr_dtls['order_price']?></td>
                                                <td><?php echo $odr_dtls['pay_status']?></td>
                                                <td><?php echo $odr_dtls['order_status']?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- ================= New Customers ================ -->
                                <div class="recentCustomers">
                                    <div class="cardHeader">
                                        <h2>Recent Food items</h2>
                                    </div>

                                    <table>
                                        <?php 
                                       $recent_foods=mysqli_query($con,"SELECT `food_name`,`food_image`,`food_unitprice` FROM `tbl_foods` WHERE chef_id='$chefid' ORDER BY food_id DESC LIMIT 10");
                                       if(mysqli_num_rows($recent_foods)==0){
                                        echo "You have no item yet";
                                       } else{
                                        while($recent_fdfetch= mysqli_fetch_array($recent_foods)){
                                            ?>
                                            <tr>
                                                <td width="60px">
                                                    <div class="imgBx"><img src="images/foods/<?php echo $recent_fdfetch['food_image'];?>" alt="<?php echo $recent_fdfetch['food_image'];?>"></div>
                                                </td>
                                                <td>
                                                    <h4><?php echo $recent_fdfetch['food_name'];?><br> <span><?php echo $recent_fdfetch['food_unitprice'];?></span></h4>
                                                </td>
                                            </tr>
                                            <?php }
                                       }
                                       ?>
                                        </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End PAge Content -->
        </div>
        <!-- End Container fluid  -->
        <!-- footer -->
        <!-- <footer class="footer"> © 2022 All rights reserved. Made with &#x1F49C; by <b><a
                        href="https://www.youtube.com/channel/UC4_6-VSWBw_QHMyjrDDEvVQ"> GPW</a></b> Team. </footer> -->
        <!-- End footer -->
    </div>
    <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>

</body>

</html>