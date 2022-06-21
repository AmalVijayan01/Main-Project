<html>
<?php
include("conn.php");
include('head.php');
session_start();
if(!isset($_SESSION["ses_id"])){
    header("location: restricted.php");
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
    <title>HomeFoodi - Admin Dashboard</title>
    <!-- Bootstrap Core CSS -->
    <link href="../admin/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../admin/css/helper.css" rel="stylesheet">
    <link href="../admin/css/style.css" rel="stylesheet">
    <link href="../admin/css/dash.css" rel="stylesheet">
    <style>
        .pageheader {
            background-color: white;
            height: 8%;
            box-shadow: 0px 0px 8px 0px;
            padding-bottom: 5%;
        }

        .navitems {
            margin: 1% 5% 0% 30%;
            float: right;
        }

        .navitems ul {
            text-align: center;
            text-decoration: none;
            list-style: none;
        }

        .navitems ul li {
            display: inline-block;
            padding-right: 20px;
            font-size: 18px;
        }

        li a,
        .dropbtn {
            display: inline-block;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover,
        .dropdown:hover .dropbtn {
            background-color: orangered;

        }

        li.dropdown {
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            min-width: 160px;
            z-index: 1;
            margin-top:2%
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
        .pagebanner {
            margin-top:0.5%;
            width: 100%;
            height: 40%;
            opacity: 0.7;
            background-image: url(../assets/includes/img/home-banner-2.jpg)
            
        }
        .pagelogo{
            float:  left;
            text-align: center;
            position: relative;
            width: 30%;
            margin-left: -15%;
        }
        .pagelogo img{
            width: 100px;
            position: absolute;
        }
        .pagelogo h3{
            font-weight: bold;
            font-size: x-large;
            font-family: Georgia, 'Times New Roman', Times, serif;
            text-align: content;
            position: absolute;
            margin-left: 66%;
            margin-top:4%;
            color: orange;
    
        }
    </style>
</head>

<body class="fix-header">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="pageheader">
        <div class="pagelogo">
            <img src="../assets/includes/img/home-foodi-logo.png"></img>
            <h3>Home-Foodi</h3>
        </div>
        <div class="navitems">
            <ul>
                <li><a href="#">Home</a></li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">Foods</a>
                    <div class="dropdown-content">
                        <a href="food_items.php">Menu</a>
                        <a href="food_allcat.php">Categories</a>
                        <a href="food_allchef.php">Chefs</a>
                    </div>
                </li>
                <li><a href="cust_cart.php">Cart</a></li>
                <li><a href="cust_order_history.php">Orders</a></li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">Account</a>
                    <div class="dropdown-content">
                        <a href="cust_profile.php">Profile</a>
                        <!-- <a href="home.php">Payments</a> -->
                        <a href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="pagebanner">
    </div>
</body>
</html>