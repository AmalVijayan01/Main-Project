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
                                    <th>Dish Name</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Quantity</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                // $chef_select="SELECT chef_id FROM tbl_chefs WHERE login_id='$login_id'";
                                // $chef_result=mysqli_query($con,$chef_select);

                                $select_food_query = "SELECT tbl_foods.food_id,tbl_foods.food_name,tbl_foods.food_description,
                                tbl_foods.food_qty,tbl_foods.food_unitprice,tbl_foods.food_image,tbl_foods.chef_id,
                                tbl_foods.cat_id,tbl_foods.food_status,tbl_chefs.chef_fname,tbl_chefs.chef_lname,
                                tbl_category.cat_name FROM tbl_foods,tbl_chefs,tbl_category WHERE tbl_foods.chef_id=tbl_chefs.chef_id AND tbl_foods.cat_id=tbl_category.cat_id AND 
                                tbl_chefs.login_id='$login_id'";
                                $food_select = mysqli_query($con,$select_food_query);

                                while ($fetch_result = mysqli_fetch_array($food_select)) {
<<<<<<< HEAD
                                    $imageurl = "images/foods/" . $fetch_result['food_image'];
=======
                                    $imageurl = "foodimages/" . $fetch_result['food_image'];
>>>>>>> e937fb11643b7fff3d41a5b4399541e176c9e127
                                ?>
                                    <tr>
                                        <td><?php echo $fetch_result['food_name']; ?></td>
                                        <td><?php echo $fetch_result['food_description']; ?></td>
                                        <td><?php echo $fetch_result['cat_name']; ?></td>
<<<<<<< HEAD
                                        <td><?php echo $fetch_result['food_qty']; ?></td>
                                        <td><img style="width:100px; height:100px;" src="<?php echo $imageurl ?>"></td>
                                        <td><?php echo $fetch_result['food_unitprice']; ?></td>
                                        <td><?php

                                            if ($fetch_result['food_status'] == 0) {
                                                echo "Enabled";
                                            } else {
                                                echo "Suspended";
=======
                                        <td><img style="width:100px; height:100px;" src="<?php echo $imageurl ?>"></td>
                                        <td><?php echo $fetch_result['food_unitprice']; ?></td>
                                        <td> Chef <?php echo $fetch_result['chef_fname']; ?></td>
                                        <td><?php

                                            if ($fetch_result['food_status'] == 0) {
                                                echo "Available";
                                            } else {
                                                echo "Not Available";
>>>>>>> e937fb11643b7fff3d41a5b4399541e176c9e127
                                            }
                                            ?></td>

                                        <!-- <td><a href="update_menu.php" class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5">View</a> -->
<<<<<<< HEAD
                                        <td><a href="suspendfoods.php?id=<?php echo $fetch_result['food_id'] ?>" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10">Suspend</a>
                                            <a href="enablefood.php?hid=<?php echo $fetch_result['food_id'] ?>" class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5">Enable</a>
=======
                                        <td><a href="db/suspendfoods.php?id=<?php echo $fetch_result['food_id'] ?>" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10">Suspend</a>
                                            <a href="db/enablefood.php?hid=<?php echo $fetch_result['food_id'] ?>" class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5">Enable</a>
>>>>>>> e937fb11643b7fff3d41a5b4399541e176c9e127
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