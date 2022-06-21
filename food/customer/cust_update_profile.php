<?php

//error_reporting(0);
ob_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
        session_start(); 
        include("conn.php"); 
        include("head.php"); 
        $cus_id=$_GET["cus_id"];
        if(!isset($_SESSION["ses_id"])){
            header("location: restricted.php");
            exit(1);
        }
        
        $ses_id=($_SESSION["ses_id"]);

        
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <title>Update profile | Home-Foodi</title>
</head>

<body class="d-flex flex-column h-100">
    <?php include('navbar.php')
    ?>

    <div class="container form-signin mt-auto w-50">
        <a class="nav nav-item text-decoration-none text-muted" href="#" onclick="history.back();">
            <i class="bi bi-arrow-left-square me-2"></i>Go back
        </a>
        <?php 
        
            //Select customer record from database
        
        $query5="SELECT * FROM tbl_customer WHERE cust_id='$cus_id'";
            $result5 = mysqli_query($con,$query5);
            $row = $result5 -> fetch_array();
        ?>
        <form method="POST" action="#" class="form-floating">
            <h2 class="mt-4 mb-3 fw-normal text-bold"><i class="bi bi-pencil-square me-2"></i>Update Profile</h2>
            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="firstname" placeholder="First Name" name="firstname"
                value="<?php echo $row["cust_fname"];?>" required>
                <label for="firstname">First Name</label>
            </div>
            
            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="lastname" placeholder="Last Name" 
                value="<?php echo $row["cust_lname"];?>" name="lastname" required>
                <label for="lastname">Last Name</label>
            </div>

            <div class="form-floating mb-2">
                <input type="email" class="form-control" id="email" placeholder="E-mail" name="email" 
                value="<?php echo $row["cust_email"];?>" required readonly onclick = "return change_email();">
                <label for="email">E-mail</label>
            </div>

            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="mob" placeholder="Mobile Number" 
                value="<?php echo $row["cust_mob"];?>" name="mob" required>
                <label for="mob">Mobile</label>
            </div>

            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="city" placeholder="City" 
                value="<?php echo $row["cust_city"];?>" name="city" required>
                <label for="city">City</label>
            </div>

            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="pin" placeholder="Mobile Number" 
                value="<?php echo $row["cust_pincode"];?>" name="pin" required>
                <label for="pin">Pincode</label>
            </div>

            <button class="w-100 btn btn-success mb-3" name="upd_confirm" type="submit">Update</button>
        </form>
    </div>

    <footer class="text-center text-white">
  <!-- Copyright -->
  <div class="text-center p-2 p-2 mb-1 bg-dark text-white">
    <p class="text-white">© 2022 Copyright : Home-Foodi</p>
    <p class="text-white">Developed by :</p>
    <p class="text-white">&nbsp;Amal Vijayan</p>
  </div>
  <!-- Copyright -->
</footer>
</body>
<script>
    function change_email(){
        alert('No provision to update email')
    }
</script>
</html>

<?php 



if(isset($_POST["upd_confirm"])){
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    // $email = $_POST["email"];
    $mobile = $_POST["mob"];
    $city = $_POST["city"];
    $pincode = $_POST["pin"];

    $query = "UPDATE tbl_customer SET cust_fname = '$firstname', cust_lname = '$lastname', 
     cust_mob = '$mobile',cust_city = '$city',cust_pincode = '$pincode' WHERE cust_id = '$cus_id'";
    $result = mysqli_query($con,$query);
    if($result){
        $_SESSION["ses_id"] = $ses_id;
        
        header("location: cust_profile.php?up_prf=1");
        ob_end_flush();
    }else{
        header("location: cust_profile.php?up_prf=0");
    }
    exit(1);
}


?>