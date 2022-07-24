<?php
    session_start();
    session_destroy();
    header("location:../chefs/logout.php");
?>