<?php
    include('conn.php');

    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    $query = "SELECT login_id,uname,passwd FROM tbl_login WHERE
    uname = '$username' and status in('1','0') and role in('chef','user');";
    $result =mysqli_query($con,$query);
    if(mysqli_num_rows($result)>0){
        $rowfetch=mysqli_fetch_assoc($result);
        $verifypass=password_verify($pwd,$rowfetch['passwd']);
        if($verifypass==1){
            session_start();
            $_SESSION["ses_id"] = $rowfetch['login_id'];
            header("location:dashboard.php");
            exit(1);
        }
        else
        {
        ?>
        <script>alert("invalid password")</script>
        
        <?php
            header("location:cust_login.php");
        }
    }
    else
    {
        echo "<script>alert('Invalid credentials')</script>";
    }
?>