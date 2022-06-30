<?php
<<<<<<< HEAD
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
    }.custombtn{
        margin-top: 3px;
        width: 200px;
        background-color:blue;
        color: white;
        border: none;
        border-radius:10px;
    }.custombtn:hover{
        color: greenyellow;
    }.custselect{
        border: none;
        border-bottom: 1px;
        width: 200px;
        height: 30px;
        margin-bottom: 5px;
        border-radius:10px;
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
                                    <th>Food name</th>
                                    <th>Food image</th>
                                    <th>Quantity</th>
                                    <th>Ordered date</th>
                                    <th>Amount</th>
                                    <th>Update status</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $chef_select="SELECT chef_id FROM tbl_chefs WHERE login_id='$login_id'";
                                $chef_result=mysqli_query($con,$chef_select);
                                $chef_fetch=mysqli_fetch_array($chef_result);
                                $chefid=$chef_fetch['chef_id'];
                                $select_food_query = "SELECT tbl_orders.order_id,tbl_orders.order_date,
                                                    tbl_orders.order_qty,tbl_orders.order_price,tbl_orders.cust_id,
                                                    tbl_orders.chef_id, tbl_orders.food_id,tbl_orders.order_status,
                                                    tbl_foods.food_name,tbl_foods.food_image FROM tbl_orders,
                                                    tbl_foods WHERE tbl_orders.food_id=tbl_foods.food_id AND 
                                                    tbl_orders.chef_id='$chefid' AND tbl_orders.order_status='outfordel'";
                                $food_select = mysqli_query($con,$select_food_query);

                                while ($fetch_result = mysqli_fetch_array($food_select)) {
                                    $imageurl = "images/foods/" . $fetch_result['food_image'];
                                ?>
                                    <tr>
                                        <td><?php echo $fetch_result['order_id']; ?></td>
                                        <td><?php echo $fetch_result['food_name']; ?></td>
                                        <td><img style="width:100px; height:100px;" src="<?php echo $imageurl ?>"></td>
                                        <td><?php echo $fetch_result['order_qty']; ?></td>
                                        <td><?php echo $fetch_result['order_date']; ?></td>
                                        <td> Chef <?php echo $fetch_result['order_price']; ?></td>
                                        <td>Waiting for pick up</td>
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
=======
    session_start();
    if(!isset($_SESSION["ses_id"])){
        header("location: chef_login.php");
        exit(1);
    }
    include 'sidebar.php';
    include 'conn.php';
?>
>>>>>>> e937fb11643b7fff3d41a5b4399541e176c9e127
