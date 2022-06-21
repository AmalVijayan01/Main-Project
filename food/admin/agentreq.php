<?php
include 'db/connection.php';
?>
<html>

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        .errorclass {
            border: 1px red solid !important;
            margin-bottom: 0px !important;
        }

        .error {
            color: red;
            font-size: 100%;
            margin-bottom: 12px !important;
        }
    </style>

    <script>
        var pwd_expression = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,10}$/;
        var letters = /^[A-Za-z]+$/;
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var phoneno = /^\d{10}$/;
        var allowedExtensions = /(\.jpg|\.png|\.jpeg)$/i;
        var flag = 0;
        //fname validation

        function fnamevalidation() {
            if (document.myform.fname.value.trim() == "") {
                printError("errfn", "Please enter first name");
                document.getElementById("fname").classList.add("errorClass");
            } else if (!letters.test(document.myform.fname.value.trim())) {
                printError("errfn", "First name field required only alphabet characters");
                document.getElementById("fname").classList.add("errorClass");
                flag = 1;
            } else {
                printNoError("errfn", "");
                document.getElementById("fname").classList.remove("errorClass");
            }
        }
        //lnamevalidation 
        function lnamevalidation() {
            if (document.myform.lname.value.trim() == "") {
                printError("errln", "Please enter Last name");
                document.getElementById("lname").classList.add("errorClass");
            } else if (!letters.test(document.myform.lname.value.trim())) {
                printError("errln", "Last name field required only alphabet characters");
                document.getElementById("lname").classList.add("errorClass");
                flag = 1;
            } else {
                printNoError("errln", "");
                document.getElementById("lname").classList.remove("errorClass");
            }
        }
        //unamevalidation 
        function unamevalidation() {
            if (document.myform.uname.value.trim() == "") {
                printError("errun", "Please enter username");
                document.getElementById("uname").classList.add("errorClass");
            } else {
                printNoError("errun", "");
                document.getElementById("uname").classList.remove("errorClass");
            }
        }
        // email validation 
        function emailvalidation() {
            if (document.myform.email.value.trim() == "") {
                printError("errem", "Please enter email");
                document.getElementById("email").classList.add("errorClass");
            } else if (!filter.test(document.myform.email.value.trim())) {
                printError("errem", "Please enter valid email id");
                document.getElementById("email").classList.add("errorClass");
                flag = 1;
            } else {
                printError("errem", "");
                document.getElementById("email").classList.remove("errorClass");
            }
        }
        // phone number  vaidation 
        function phonenovalidation() {
            if (document.myform.mob.value.trim() == "") {
                printError("errmo", "Please enter mobile number");
                document.getElementById("mob").classList.add("errorClass");
            } else if (!phoneno.test(document.myform.mob.value.trim())) {
                printError("errmo", "Please enter a valid mobile number");
                document.getElementById("mob").classList.add("errorClass");
            } else {
                printNoError("errmo", "");
                document.getElementById("mob").classList.remove("errorClass");
            }
        }
        // password  vaidation
        function passwordvalidation() {
            if (document.getElementById("pwd").value.trim() == "") {
                printError("errpass", "Please enter password");
                document.getElementById("pwd").classList.add("errorClass");
            } else {
                if (!pwd_expression.test(document.getElementById("pwd").value.trim())) {
                    printError("errpass", "Add at least one numeric digit and a special character in password ");
                    document.getElementById("pwd").classList.add("errorClass");
                    flag = 1;
                } else {
                    printNoError("errpass", "");
                    document.getElementById("pwd").classList.remove("errorClass");
                }
            }
        }
        // Confirm password  vaidation 
        function confirmpasswordvalidation() {
            if (document.getElementById("cpwd").value.trim() == "") {
                printError("errcpass", "Please  confirm password");
                document.getElementById("cpwd").classList.add("errorClass");
            } else {
                if (!pwd_expression.test(document.getElementById("cpwd").value)) {
                    printError("errcpass", "Add one number and one uppercase and lowercase letter in password ");
                    document.getElementById("cpwd").classList.add("errorClass");
                    flag = 1;
                } else if (document.getElementById("cpwd").value.trim() != document.getElementById("pwd").value.trim()) {
                    printError("errcpass", "Password does not match");
                    document.getElementById("cpwd").classList.add("errorClass");
                } else {
                    printNoError("errcpass", "");
                    document.getElementById("cpwd").classList.remove("errorClass");
                }
            }
        }
        // photo  vaidation
        function photovalidation() {
            if (document.getElementById("photo").value.trim == "") {
                printError("errph", "Please upload your photo");
                document.getElementById("photo").classList.add("errorClass");
            } else if (!allowedExtensions.exec("photo")) {
                printError("errph", "Please upload your photo in .jpg or .jpeg or .png format");
                document.getElementById("photo").classList.add("errorClass");
            } else {
                printNoError("errph", "");
                document.getElementById("photo").classList.remove("errorClass");
            }
        }
        // idproof  vaidation starts
        function idproofvalidation() {
            if (document.getElementById("idproof").value.trim == "") {
                printError("errip", "Please upload your id proof");
                document.getElementById("idproof").classList.add("errorClass");
            } else if (!allowedExtensions.exec("idproof")) {
                printError("errip", "Please upload your id proof in .jpg or .jpeg or .png format");
                document.getElementById("idproof").classList.add("errorClass");
            } else {
                printNoError("errip", "");
                document.getElementById("idproof").classList.remove("errorClass");
            }
        }

        function validate() {
            if (document.myform.fname.value.trim() == "" || flag == 1 || document.myform.lname.value.trim() == "" || document.myform.uname.value.trim() == "" || document.myform.email.value.trim() == "" || document.myform.mob.value.trim() == "" || document.getElementById("pwd").value.trim() == "" || document.getElementById("cpwd").value.trim() == "" || document.getElementById("pwd").value.trim() != document.getElementById("cpwd").value.trim()) {
                return false;
            } else {
                return true;
            }
        }

        function printError(elemId, hintMsg) {
            var elem = document.getElementById(elemId);
            elem.classList.add("error");
            elem.innerHTML = hintMsg;

        }

        function printNoError(elemId, hintMsg) {
            var elem = document.getElementById(elemId);
            elem.classList.remove("error");
            elem.innerHTML = hintMsg;


        }

        function errorMsg(hintMsg) {

            var elem = document.getElementById("emailError");
            elem.classList.add("error")
            elem.innerHTML = hintMsg;
            document.getElementById("email").classList.add("errorSub");
            document.getElementById("pass").classList.add("errorSub");

        }
    </script>

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
        <div class="page-wrapper" style="height:1200px;">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Add delivery agents</h3>
                </div>

            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">


                    <div class="container-fluid">
                        <!-- Start Page Content -->
                        <div class="col-lg-12">
                            <div class="card card-outline-primary">
                                <div class="card-header">
                                    <h4 class="m-b-0 text-white">Add Delivery Agents</h4>
                                </div>
                                <div class="card-body">
                                    <form action='#' method='POST' enctype="multipart/form-data" name="myform" onsubmit="return validate()">
                                        <div class="form-body">

                                            <hr>
                                            <div class="row p-t-20">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">First Name</label>
                                                        <input type="text" name="fname" id="fname" class="form-control" placeholder="First name" autocomplete="off" onblur="return fnamevalidation()">
                                                        <div class="id" id="errfn"></div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group has-danger">
                                                        <label class="control-label">Last Name</label>
                                                        <input type="text" name="lname" id="lname" class="form-control" placeholder="Last name" placeholder="Last name" autocomplete="off" onblur="return lnamevalidation()">
                                                        <div class="id" id="errln"></div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row p-t-20">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">User Name</label>
                                                        <input type="text" name="uname" id="uname" class="form-control" placeholder="Username" autocomplete="off" onblur="return unamevalidation()">
                                                        <div class="id" id="errun"></div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group has-danger">
                                                        <label class="control-label">Email</label>
                                                        <input type="text" name="email" id="email" class="form-control form-control-danger" placeholder="email" autocomplete="off" onblur="return emailvalidation()">
                                                        <div class="id" id="errem"></div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Mobile</label>
                                                        <input type="text" name="mob" id="mob" class="form-control form-control-danger" placeholder="Mobile" autocomplete="off" onblur="return phonenovalidation()">
                                                        <div class="id" id="errmo"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Password</label>
                                                        <input type="password" name="pwd" id="pwd" class="form-control form-control-danger" placeholder="password" autocomplete="off" onblur="return passwordvalidation()">
                                                        <div class="id" id="errpass"></div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group has-danger">
                                                        <label class="control-label">Confirm password</label>
                                                        <input type="password" name="cpwd" id="cpwd" class="form-control form-control-danger" placeholder="confirm password" autocomplete="off" onblur="return confirmpasswordvalidation()">
                                                        <div class="id" id="errcpass"></div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Photo</label>
                                                    <input type="file" name="photo" id="photo" class="form-control form-control-danger" autocomplete="off" onblur="return photovalidation()">
                                                    <div class="id" id="errph"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Id Proof</label>
                                                    <input type="file" name="idproof" id="idproof" class="form-control form-control-danger" autocomplete="off" onblur="return idproofvalidation()">
                                                    <div class="id" id="errip"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <h3 class="box-title m-t-40"> Address</h3>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <textarea name="address" id="address" type="text" style="height:100px;" class="form-control" autocomplete="off"></textarea>
                                                    <div class="id" id="erradd"></div>
                                                </div>
                                            </div>
                                            <div class="id" id="erruname"></div>
                                        </div>
                                        <!--/span-->
                                </div>
                            </div>
                            <div class="form-actions">
                                <input type="submit" name="submit" class="btn btn-success" value="Add">
                                <a href="dashboard.php" class="btn btn-inverse">Cancel</a>
                            </div>
                            </form>
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
<?php
if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $cuname = $_POST['uname'];
    $cemail = $_POST['email'];
    $cmob = $_POST['mob'];
    $cpasswd = $_POST['pwd'];
    $caddr = $_POST['address'];
    // $agentcity = $_POST['agentcity'];
    // $agent_pincode = $_POST['agent_pincode'];
    $role = "agent";
    $status = 0;
    $filename = $_FILES["photo"]["name"];
    $tempfile = $_FILES["photo"]["tmp_name"];
    $folder = "regimg/" . $filename;

    $filename1 = $_FILES["idproof"]["name"];
    $tempfile = $_FILES["idproof"]["tmp_name"];
    $folder = "userimages/" . $filename;
    //$regimgf=$_POST["uploadfile"];

    $sqla = "SELECT * from tbl_login where uname = '$cuname'";
    $result5 = mysqli_query($con, $sqla);
    $num1 = mysqli_num_rows($result5);

    if ($num1 == 0) {
        $reslt = "INSERT INTO tbl_login(uname,passwd,role) VALUES ('$cuname','$cpasswd','$role')";
        mysqli_query($con, $reslt);

        $query5 = "SELECT * FROM tbl_login WHERE uname = '$cuname'";
        $reslt1 = mysqli_query($con, $query5);
        $row = mysqli_fetch_array($reslt1);
        $usr = $row['login_id'];
        $sqlc = "INSERT INTO tbl_agents(agent_fname,agent_lname,agent_email,agent_mob,agent_addr,agent_photo,agent_idproof,agent_status,login_id) VALUES ('$fname','$lname','$cemail','$cmob','$caddr','$filename','$filename1','$status','$usr')";
        mysqli_query($con, $sqlc);
        move_uploaded_file($tempfile, $folder);
        header('location:agents.php');
    } else {
        echo "<script>alert('Username already exists') </script>";
    }
}
?>