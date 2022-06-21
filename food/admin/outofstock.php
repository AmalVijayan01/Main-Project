<html>
<?php
    include 'db/connection.php';
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
    <title>HomeFoodi - Admin Dashboard</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        .fdopr {}

        .fdsearch {
            float: right;
            margin-bottom: 10px;

        }

        .fdsearch input {
            border-top: none;
            border-right: none;
            border-left: none;
            border-color: blue;
        }

        .fdsearch:input-placeholder {
            font-style: italic;
        }

        .fdsort {
            float: left;
            margin-bottom: 10px;
        }

        .fdsort select {
            border-top: none;
            border-right: none;
            border-left: none;
            border-color: blue;
        }
    </style>
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

                        <!-- Search -->
                        <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search here"> <a class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li>
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
                                    <li><a href="db/logout.php"><i class="fa fa-power-off"></i> LogOut</a></li>
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
                        <li class="nav-label">Admin Panel</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Home</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="dashboard.php">Dashboard</a></li>

                            </ul>
                        </li>
                        <li class="nav-label">Options</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"> <span><i class="fa fa-user f-s-20 "></i></span><span class="hide-menu">Users</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="customers.php">Customers</a></li>
                                <li><a href="chefs.php">Chefs</a></li>
                                <li><a href="agents.php">Delivery Agents</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-archive f-s-20 color-warning"></i><span class="hide-menu">Food Items</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="allitems.php">All items</a></li>
                                <!-- <li><a href="recentlyadded.php">Recently added</a></li> -->
                                <li><a href="outofstock.php">Out of Stock</a></li>

                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cutlery" aria-hidden="true"></i><span class="hide-menu">Categories</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="categories.php">All Categories</a></li>
                                <li><a href="addcategories.php">Add New</a></li>
                            </ul>
                        </li>

                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-archive f-s-20 color-warning"></i><span class="hide-menu">Orders</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="allorders.php">All orders</a></li>
                                <!-- <li><a href="recentorders.php">Recently ordered</a></li> -->
                                <!-- <li><a href="orderchef.php">order for chefs</a></li> -->

                            </ul>
                        </li>

                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-archive f-s-20 color-warning"></i><span class="hide-menu">Delivery</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="delivery.php">Delivery</a></li>
                                <!-- <li><a href="recentdelivery.php">Recently Deliverd</a></li> -->
                                <li><a href="agentreq.php">Add Agent</a></li>
                                <!-- <li><a href="pendingdelivery.php">Pending</a></li> -->
                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-archive f-s-20 color-warning"></i><span class="hide-menu">Messages</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="allfeedbacks.php">Feedbacks</a></li>
                                <!-- <li><a href="allcomplaints.php">Complaints</a></li>
                                <li><a href="deliveryreport.php">Delivery reports</a></li> -->
                            </ul>
                        </li>
                        <!-- <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-archive f-s-20 color-warning"></i><span class="hide-menu">Payments</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="payments.php">Payment details</a></li>
                                <li><a href="pendingpayments.php">Pending Payments</a></li>
                            </ul>
                        </li> -->
                        <!-- <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-shopping-cart"
                                    aria-hidden="true"></i><span class="hide-menu">Orders</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="all_orders.php">All Orders</a></li>

                            </ul>
                        </li> -->

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Menu</h3>
                </div>

            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Out of stock items</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>

                                <div class="table-responsive m-t-40">
                                    <div class="fdopr">
                                        <!-- <div class="fdsort">
                                            <select name="fdsort">
                                                <option value="">Name ascending</option>
                                                <option value="">Added date ascending</option>
                                                <option value="">Added date descending</option>
                                                <option value="">More frequently ordered</option>
                                                <option value="">less frequently ordered</option>
                                            </select>
                                        </div> -->
                                        <!-- <div class="fdsearch">
                                            <input type="search" placeholder="search food items...">
                                        </div> -->
                                    </div>
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>SiNo</th>
                                                <th>Dish Name</th>
                                                <th>Image</th>
                                                <th>Category</th>
                                                <th>Price</th>
                                                <th>Added By</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $myqry2 = "select tbl_foods.food_name,tbl_foods.food_id,tbl_foods.food_image,tbl_foods.cat_id,tbl_foods.food_unitprice,tbl_foods.food_status,tbl_chefs.chef_fname,tbl_chefs.chef_id from tbl_foods,tbl_chefs where tbl_foods.chef_id = tbl_chefs.chef_id  and food_status = 1 ORDER BY food_id DESC";
                                            $res3 = mysqli_query($con, $myqry2);

                                            if ($reslts1 = mysqli_fetch_array($res3)) {
                                                $imageurl = "foodimages/" . $reslts1['food_image'];
                                            ?>
                                                <tr>
                                                    <td>1</td>
                                                    <td><?php echo $reslts1['food_name']; ?></td>
                                                    <td><img style="width:100px; height:100px;" src="<?php echo $imageurl ?>"></td>
                                                    <td><?php echo $reslts1['cat_id']; ?></td>
                                                    <td><?php echo $reslts1['food_unitprice']; ?></td>
                                                    <td> Chef <?php echo $reslts1['chef_fname']; ?></td>
                                                    <!-- <td><a href="update_menu.php" class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5">View</a> -->
                                                       <td> <a href="outofstockcontact.php?pid=<?php echo $reslts1['food_id'] ?>" class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5">Contact Chef</a>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
    <footer class="footer"> © 2022 All rights reserved. Made with &#x1F49C; by <b><a href="https://www.youtube.com/channel/UC4_6-VSWBw_QHMyjrDDEvVQ"> GPW</a></b> Team. </footer>
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