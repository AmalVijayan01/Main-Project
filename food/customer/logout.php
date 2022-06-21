<?php
    session_start();
    session_destroy();
    header("location:cust_login.php");
?>