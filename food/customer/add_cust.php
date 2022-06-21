<?php
    include('conn.php');
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $mobile = $_POST["mob"];
        $city = $_POST["city"];
        $pincode = $_POST["pin"];
        $username = $_POST["uname"];
        $crole = "user";
        $cust_status="0";
        $login_status="0";
        //username check
        $query = "SELECT uname FROM tbl_login WHERE uname = '$username';";
        $result = mysqli_query($con,$query);
        if($result -> num_rows ==0){

            $qry="INSERT INTO tbl_login (uname,passwd,role,status) VALUES ('$username','$pwd','$crole','$login_status');";
            $res=mysqli_query($con,$qry);

            $qry1 = "select * from tbl_login where uname='$username' ";
            $res1 = mysqli_query($con, $qry1);
            $row = mysqli_fetch_array($res1);
            $usr = $row['login_id'];

            $query1 = "INSERT INTO tbl_customer (cust_fname,cust_lname,cust_email,cust_mob,cust_city,cust_pincode,cust_status,login_id)
            VALUES ('$firstname','$lastname','$email','$mobile','$city','$pincode','$cust_status','$usr');";
            $result1 = mysqli_query($con,$query1);
            // header('location:login.php');
            
        }else{
            ?>
            <script>
                alert('Your username is already taken!');
                history.back();
            </script>
            <?php 
        }
        $result -> free_result();
        
        if($result ){
            header("location: cust_regist_success.php");
        }else{
            header("location: cust_regist_fail.php?err={$mysqli -> errno}");
        }
?>
