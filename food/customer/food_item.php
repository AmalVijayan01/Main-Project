<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
        session_start();
        include("conn.php");
        include('head.php');
        if(!isset($_SESSION["ses_id"])){
            header("location: restricted.php");
            exit(1);
        }
        include('head.php');
        include('conn.php');
        include('navbar.php');
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/main.css" rel="stylesheet">
    <link href="style/menu.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="js/input_number.js"></script>
    <script type="text/javascript">
    </script>
    <title>Food Item | Home-Foodi</title>
    <style>
        .rating span {
            color: #fea500;
        }
    </style>
</head>

<body class="d-flex flex-column h-100">
    <?php 
        $cus_id = $_GET["cus_id"];
        $fd_id = $_GET["f_id"];
        $chef_id = $_GET["c_id"];
        $query = "SELECT * FROM tbl_foods WHERE tbl_foods.food_id='$fd_id' AND tbl_foods.chef_id='$chef_id'";
        $result = mysqli_query($con,$query);
        $food_row = $result -> fetch_array();
    ?>
    <div class="container px-5 py-4" id="shop-body">
        <div class="row my-4">
            <a class="nav nav-item text-decoration-none text-muted mb-2" href="#" onclick="history.back();">
                <i class="bi bi-arrow-left-square me-2"></i>Go back
            </a>
        </div>
        <div class="row row-cols-1 row-cols-md-2 mb-5">
            <div class="col mb-3 mb-md-0">
                <img src="../chefs/images/foods/<?php echo $food_row["food_image"]?>"   
                class="img-fluid rounded-25 float-start" 
                    alt="<?php echo $food_row["food_name"]?>">
            </div>
            <div class="col text-wrap">
                <h1 class="fw-light"><?php echo $food_row["food_name"]?></h1>
                <h3 class="fw-light"><?php echo $food_row["food_description"]?></h3>
                <h3 class="fw-light"><?php echo $food_row["food_unitprice"]?> Rs.</h3>
                <ul class="list-unstyled mb-3 mb-md-0">
                    <li class="my-2">
                        <?php if($food_row["food_status"]==0 && $food_row["food_qty"] !=0){ ?>
                        <span class="badge rounded-pill bg-success">Available</span>
                        <?php }else{ ?>
                        <span class="badge rounded-pill bg-danger">Out of Order</span>
                        <?php }?>
                    </li>
                </ul>
               <div class="rating">
                <?php 
                $rating="SELECT tbf.rating,tbpo.food_id FROM tbl_feedback tbf,tbl_placeorder 
                tbpo,tbl_foods tbfd WHERE tbf.order_id=tbpo.order_id AND tbpo.food_id=tbfd.food_id 
                AND tbfd.food_id='$fd_id'";
                $rating_result=mysqli_query($con,$rating);
                $fetch=mysqli_num_rows($rating_result);
                if($fetch>0){
                    $fetched=mysqli_fetch_array($rating_result);
                    $rvalue=$fetched['rating'];
                    if($rvalue==1){
                       ?> <span class="fa fa-star checked"></span><?php
                    }
                    else if($rvalue==2){
                        ?> 
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <?php
                    }
                    else if($rvalue==3){
                        ?> 
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <?php
                    }else if($rvalue==4){
                        ?> 
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <?php
                    }else if($rvalue==5){
                        ?> 
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <?php
                    }
                }else{
                    echo"No rating yet";
                }
                
                ?>
               </div>
                <div class="form-amount">
                    <form class="mt-3" method="POST" action="add_item.php">
                        <div class="input-group mb-3">
                            <button id="sub_btn" class="btn btn-outline-secondary" type="button" title="subtract amount" onclick="sub_amt('amount')">
                                <i class="bi bi-dash-lg"></i>
                            </button>
                            <input type="number" class="form-control text-center border-secondary" id="amount"
                                name="amount" value="1" min="1" max="99">
                            <button id="add_btn" class="btn btn-outline-secondary" type="button" title="add amount" onclick="add_amt('amount')">
                                <i class="bi bi-plus-lg"></i>
                            </button>
                        </div>
                        <input type="hidden" name="chef_id" value="<?php echo $chef_id?>">
                        <input type="hidden" name="fd_id" value="<?php echo $fd_id?>">
                        <input type="hidden" name="cus_id" value="<?php echo $cus_id?>">
                        <button class="btn btn-success w-100" type="submit" title="add to cart" name="addtocart"
 >
                            <svg xmlns='http://www.w3.org/2000/svg\\' width='16' height='16' fill='currentColor'
                                class='bi bi-cart-plus' viewBox='0 0 16 16'>
                                <path
                                    d='M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z' />
                                <path
                                    d='M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z' />
                            </svg> Add to cart
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php $result -> free_result();?>
    </div>
    <footer class="text-center text-white">
  <!-- Copyright -->
  <div class="text-center p-2 p-2 mb-1 bg-dark text-white">
    <p class="text-white">© 2022 Copyright : Home-Foodi</p>
    <p class="text-white">Developed by :&nbsp;Amal Vijayan</p>
  </div>
  <!-- Copyright -->
</footer>
</body>

</html>