<?php
session_start();
if (!isset($_SESSION["ses_id"])) {
    header("location: chef_login.php");
    exit(1);
}
include 'sidebar.php';
include 'conn.php';
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
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Order id</th>
                                    <th>Quantity</th>
                                    <th>Ordered date</th>
                                    <th>Amount</th>
                                    <th>Order status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $chef_select="SELECT chef_id FROM tbl_chefs WHERE login_id='$login_id'";
                                $chef_result=mysqli_query($con,$chef_select);
                                $chef_fetch=mysqli_fetch_array($chef_result);
                                $chefid=$chef_fetch['chef_id'];

                                $ordid="SELECT order_id FROM tbl_placeorder WHERE chef_id='$chefid'";
                                $ordid_result=mysqli_query($con,$ordid);
                                $fetched_ordrid=mysqli_fetch_array($ordid_result);
                                $crnt_orderid=$fetched_ordrid['order_id'];

                                $select_food_query = "SELECT tbo.order_id,tbo.order_date,tbo.order_qty,
                                tbo.order_price,tbo.cust_id,tbo.order_status FROM tbl_orders tbo 
                                WHERE tbo.chef_id='$chefid' AND tbo.order_status!='delivered' GROUP BY tbo.order_id DESC ";
                                $food_select = mysqli_query($con,$select_food_query);

                                while ($fetch_result = mysqli_fetch_array($food_select)) {
                                ?>
                                    <tr>
                                        <td><?php echo $fetch_result['order_id']; ?></td>
                                        <td><?php echo $fetch_result['order_qty']; ?></td>
                                        <td><?php echo $fetch_result['order_date']; ?></td>
                                        <td><?php echo $fetch_result['order_price']; ?></td>
                                        <td><?php echo $fetch_result['order_status']; ?></td>

                                        <!-- <td><a href="update_menu.php" class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5">View</a> -->
                                        <td>
                                            <a href="orders_view.php?oid=<?php echo $fetch_result['order_id'] ?>" class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5">View details</a>
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