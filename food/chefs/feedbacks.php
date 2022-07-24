<?php
session_start();
if (!isset($_SESSION["ses_id"])) {
    header("location: chef_login.php");
    exit(1);
}
include 'sidebar.php';
include 'conn.php';
$orderid=$_GET['oid'];

$feedback_id="SELECT order_id FROM `tbl_feedback` WHERE order_id=63";
$result_id=mysqli_query($con,$feedback_id);
$num=mysqli_num_rows($result_id);
if ($num==0) {
    echo "Feedback not yet added";
}else{
    $feedback="SELECT tbfk.order_id,tbfk.message,tbfk.rating,tbfk.feedback_date,tbfk.cust_id,
    tbc.cust_fname,tbc.cust_lname FROM tbl_feedback tbfk,tbl_customer tbc WHERE tbfk.order_id='$orderid' AND
    tbfk.cust_id=tbc.cust_id";
    $feedback_result=mysqli_query($con,$feedback);
    $feedback_fetch=mysqli_fetch_array($feedback_result);
}
// $fetched=mysqli_fetch_array($result);

?>
<!-- Page wrapper  -->
<div class="page-wrapper" style="height:1200px;">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Home-Foodie</h3>
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
                        <h4 class="card-title">Feedbacks</h4>
                        
                    </div>
                </div>
                <?php 
                echo $feedback_fetch['message'];
                echo $feedback_fetch['rating'];
                echo $feedback_fetch['feedback_date'];
                echo $feedback_fetch['cust_fname'];
                echo $feedback_fetch['cust_lname'];

                ?>
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