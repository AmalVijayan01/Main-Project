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
$odr_id=$_GET['did'];
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
                                    <th>Delivery address</th>
                                    <th>Select Agent</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php
                            $agent_select=mysqli_query($con,"SELECT `del_id`, `del_name`, `del_addr`, `del_pin`, `del_city`, `del_mob`,
                             `order_id`, `agent_id`, `del_status` FROM `tbl_delivery` WHERE order_id='$odr_id'");
                             while($fetch=mysqli_fetch_array($agent_select)){

                             
                            ?>
                            <tbody>
                                <td><?php echo $fetch['order_id']?></td>
                                <td>
                                    Name:&nbsp;<?php echo $fetch['del_name'] ?><br>
                                    Address:&nbsp;<?php echo $fetch['del_addr'] ?><br>
                                    city:&nbsp;<?php echo $fetch['del_city'] ?><br>
                                    Pincode:&nbsp;<?php echo $fetch['del_pin'] ?><br>
                                    Mobile:&nbsp;<?php echo $fetch['del_mob'] ?><br>
                                </td>
                                <td>
                                    <?php
                                    if($fetch['agent_id']==0){
                                    ?>
                                    <select name="selectagent" class="inp-fields"  class="inp-fields" >
                                    <?php
                                        $agents_select="SELECT `agent_id`, `agent_name`, `agent_email`, `agent_addr`,
                                        `agent_mob`, `login_id`, `agent_status` FROM `tbl_agent` WHERE agent_status=0";
                                         $agent_result=mysqli_query($con,$agents_select);
                                         while($cat_res_fetch= mysqli_fetch_array($agent_result)){    
                                         $agentid=$cat_res_fetch['agent_id'];              
                                    ?>
                                <option value="<?php echo $cat_res_fetch['agent_id'];?>"><?php echo $cat_res_fetch['agent_name'];?></option>
                                <?php
                                    }
                                }
                                    else{
                                        echo "Agent assigned";
                                    }
                                ?>
                        </select><br><br>
                                </td>
                                <td>
                                    <?php 
                                    if($fetch['agent_id']==0){
                                    ?>
                                <a href="action_assign_agent.php?<?php echo "did=".$fetch['order_id']. "&agid=".$agentid?>" class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5">Assign Agent</a>
                            
                                <?php
                                }else
                                {
                                    echo "Agent already assigned";

                                 }
                                    ?>
                            </td>
                                
                            </tbody>
                                <?php } ?>
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