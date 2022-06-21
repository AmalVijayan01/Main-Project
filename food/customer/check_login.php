<?php
    include('conn.php');

    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    $query = "SELECT login_id,uname,passwd FROM tbl_login WHERE
    uname = '$username' AND passwd = '$pwd' and status in('1','0') and role in('chef','user');";
    $result =mysqli_query($con,$query);
    if($result -> num_rows == 1){
        $row = $result -> fetch_array();
        session_start();
        $_SESSION["ses_id"] = $row['login_id'];
        $_SESSION["role"] = $row['role'];
        header("location:dashboard.php");
        exit(1);
    }else{
        ?>
        <script>
            alert("incorrect username and/or password!");
            history.back();
        </script>
        <?php
    }
?>
