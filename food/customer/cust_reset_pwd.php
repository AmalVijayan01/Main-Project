<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
        session_start(); 
        include("conn.php");
        include("head.php");
        if(isset($_POST["rst_confirm"])){
            $cust_id = $_POST['cust_id'];
            $newpwd = $_POST['new_pwd'];
            $newcfpwd = $_POST['new_cfpwd'];
            if($newpwd==$newcfpwd){
                $query = "UPDATE tbl_login SET passwd = '$newpwd' WHERE login_id='$cust_id'";
                $result = mysqli_query($con,$query);
                if($result) {
                    header("location: cust_reset_success.php");
                }else{
                    header("location: cust_reset_fail.php?err={$mysqli->errno}");
                }
                exit();
            }else{
            ?>
                <script>
                    alert("Your new password is not match. \nPlease enter it again.");
                    history.back();
                </script>
            <?php
            }
        }else{
        $cust_un = $_POST["fp_username"];
        $cust_em = $_POST["fp_email"];
        $query = "SELECT tbl_login.uname,tbl_login.login_id,tbl_customer.cust_email,tbl_customer.cust_fname,tbl_customer.cust_lname FROM tbl_login,tbl_customer WHERE
         tbl_login.uname='$cust_un' AND tbl_customer.cust_email='$cust_em'";
        $result = mysqli_query($con,$query);
        if ($result->num_rows == 0){
        ?>
            <script>
                alert("There is no account associated with this username and Email");
                history.back();
            </script>
        <?php
            exit(1);
        }else{
            $row = $result -> fetch_array();
            $uname = $row["uname"];
            $login_id = $row["login_id"];
            $cust_fn = $row["cust_fname"];
            $cust_ln = $row["cust_lname"];
        }
    }
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/login.css" rel="stylesheet">
    <link href="style/main.css" rel="stylesheet">

    <title>Reset Password | Home-Foodi</title>
</head>

<body class="d-flex flex-column h-100">
    <header class="navbar navbar-light fixed-top bg-light shadow-sm mb-auto">
        <div class="container-fluid mx-4">
            <a href="index.php">
                <img src="img/LOGO_BLACK.png" width="70" class="me-2" alt="Sai Cafe Logo">
            </a>
        </div>
    </header>

    <div class="container form-signin mt-auto">
        <a class="nav nav-item text-decoration-none text-muted" href="#" onclick="history.back();">
            <i class="bi bi-arrow-left-square me-2"></i>Go back
        </a>
        <form method="POST" action="cust_reset_pwd.php" class="form-floating">
            <h2 class="mt-4 mb-3 fw-normal text-bold"><i class="bi bi-key me-2"></i>Reset Password</h2>
            <p class="mt-4 fw-normal">Enter your information below.<br/>
            This is an account of <?php echo $cust_fn." ".$cust_ln;?></p>
            <div class="form-floating mb-2">
                <input type="password" class="form-control" id="rst_pwd" minlength="8" maxlength="45" placeholder="New Password" name="new_pwd"
                    required>
                <label for="fp_username">New Password</label>
            </div>
            <div class="form-floating mb-2">
                <input type="password" class="form-control" id="rst_pwd" minlength="8" maxlength="45" placeholder="Confirm New Password"
                    name="new_cfpwd" required>
                <label for="fp_email">Confirm New Password</label>
            </div>
            <input type="hidden" name="cust_id" value="<?=$login_id?>">
            <button class="w-100 btn btn-success mb-3" name="rst_confirm" type="submit">Reset Password</button>
        </form>
    </div>

    <footer class="text-center text-white">
  <!-- Copyright -->
  <div class="text-center p-2 p-2 mb-1 bg-dark text-white">
    <p class="text-white">© 2022 Copyright : Home-Foodi</p>
    <p class="text-white">Developed by :&nbsp; Amal Vijayan</p>
  </div>
  <!-- Copyright -->
</footer>
</body>

</html>