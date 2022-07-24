 <?php
session_start();
if (!isset($_SESSION["ses_id"])) {
    header("location: chef_login.php");
    exit(1);
}
include 'sidebar.php';
include 'conn.php';
// include 'head.php';
$login_id=$_SESSION["ses_id"];
?>

<style>
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
    }.imgs{
        width: 100px;
        height: 100px;
    }
</style>
</head>
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
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Menu Collection</h4>
                    <a class="nav nav-item text-decoration-none text-muted mb-3" href="#" onclick="history.back();">
                <i class="bi bi-arrow-left-square me-2"></i>Go back</a>
            <div class="container">

                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Order id</th>
                                    <th>Food image</th>
                                    <th>Food name</th>
                                    <th>Quantity</th>
                                    <th>Amount</th>
                                    <th>payment status</th>
                                    <th>payment method</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $odr_id=$_GET['oid'];
                                $food_select="SELECT tbp.food_id,tbp.ordfd_qty,tbf.food_name,tbf.food_image,
                                tbf.food_unitprice,tbpy.pay_mode,pay_status FROM tbl_placeorder tbp,tbl_foods tbf,tbl_payments tbpy WHERE  tbp.order_id='$odr_id' 
                                AND tbf.food_id=tbp.food_id AND tbpy.order_id='$odr_id'";
                                $food_result = mysqli_query($con,$food_select);

                                while ($fetch_result = mysqli_fetch_array($food_result)) {
                                    $imageurl = "images/foods/" . $fetch_result['food_image'];
                                ?>
                                    <tr>
                                        <td><?php echo $odr_id ?></td>
                                        <td><img src="images/foods/<?php echo $fetch_result['food_image'];?>" class="imgs"></td>
                                        <td><?php echo $fetch_result['food_name']; ?></td>
                                        
                                        <td><?php echo $fetch_result['ordfd_qty']; ?></td>
                                        <td><?php echo $fetch_result['food_unitprice']; ?></td>
                                        <td><?php echo $fetch_result['pay_status'] ?></td>
                                        <td><?php echo $fetch_result['pay_mode'] ?></td>
                                        <td>
                                            <?php 
                                                $stat_select="SELECT order_status FROM tbl_orders WHERE order_id='$odr_id'";
                                                $stat_result=mysqli_query($con,$stat_select);
                                                $stat_fetc=mysqli_fetch_array($stat_result);
                                                $stat=$stat_fetc['order_status'];

                                                if($stat=='ordered')
                                                {
                                            ?>
                                            <a href="action_accept_order.php?<?php echo "oid=".$odr_id ?>" class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5">Accept</a>
                                            <?php
                                                }
                                                else{
                                                   ?>
                                                        <text>Already accepted</text>
                                                   <?php
                                                }
                                                ?>
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


<script src="js/lib/datatables/datatables.min.js"></script>
<script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<script src="js/lib/datatables/datatables-init.js"></script>

</body>

</html>