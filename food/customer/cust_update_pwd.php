
<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
        session_start(); 
        include("conn.php"); 
        include("head.php"); 
        if(!isset($_SESSION["ses_id"])){
            header("location: restricted.php");
            exit(1);
        }
        
        $ses_id=($_SESSION["ses_id"]);
        if(isset($_POST["rst_confirm"])){
            $oldpwd = $_POST["old_pwd"];
            $newpwd = $_POST["new_pwd"];
            $newcfpwd = $_POST["new_cfpwd"];

        
                $query = "SELECT passwd FROM tbl_login WHERE login_id = $ses_id";
                $result = mysqli_query($con,$query);
                $row = $result -> fetch_array();
                $verify=password_verify($oldpwd,$row["passwd"]);
                
                if($verify == 1){
                    $pass_hash=password_hash($newpwd,PASSWORD_DEFAULT);
                    $query = "UPDATE tbl_login SET passwd = '$pass_hash' WHERE login_id = $ses_id";
                    $result = mysqli_query($con,$query);
                    if($result){
                        header("location: cust_profile.php?up_pwd=1");
                    }else{
                        header("location: cust_profile.php?up_pwd=0");
                    }
                }else{
                    ?>
                    <script>
                        alert('Your old password is not match.\nPlease re-enter again.');
                        history.back();
                    </script>
                    <?php
                    exit(1);
                }
            }
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <title>Update password | Home-Foodi</title>
</head>

<body class="d-flex flex-column h-100">
    <?php include('navbar.php')?>

    <div class="container form-signin mt-auto w-50">
        <a class="nav nav-item text-decoration-none text-muted" href="#" onclick="history.back();">
            <i class="bi bi-arrow-left-square me-2"></i>Go back
        </a>
        <form method="POST" action="cust_update_pwd.php" class="form-floating">
            <h2 class="mt-4 mb-3 fw-normal text-bold"><i class="bi bi-key me-2"></i>Update Password</h2>
            <div class="form-floating mb-2">
                <input type="password" class="form-control" id="old_pwd" minlength="6" maxlength="45" placeholder="Old Password" name="old_pwd"
                    required>
                <label for="old_pwd">Old Password</label>
            </div>
            <div class="form-floating mb-2">
                <input type="password" class="form-control" id="rst_pwd" minlength="6" maxlength="45" placeholder="New Password" name="new_pwd"
                    required>
                <label for="rst_pwd">New Password</label>
            </div>
            <div class="form-floating mb-2">
                <input type="password" class="form-control" id="rst_cfpwd" minlength="6" maxlength="45" placeholder="Confirm New Password"
                    name="new_cfpwd" required>
                <label for="rst_cfpwd">Confirm New Password</label>
                <div id="passwordHelpBlock" class="form-text smaller-font">
                    Your password must be at least 8 characters long.
                </div>
            </div>
            <button class="w-100 btn btn-success my-3" name="rst_confirm" type="submit" onclick="return confirm('Do you want to update your password?');" >Update Password</button>
        </form>
    </div>

    <footer class="text-center text-white">
  <!-- Copyright -->
  <div class="text-center p-2 p-2 mb-1 bg-dark text-white">
    <p class="text-white">?? 2022 Copyright : Home-Foodi</p>
    <p class="text-white">Developed by :&nbsp;Amal Vijayan</p>
  </div>
  <!-- Copyright -->
</footer>
</body>

</html>