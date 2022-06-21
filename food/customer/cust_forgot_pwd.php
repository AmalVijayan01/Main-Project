<!DOCTYPE html>
<html lang="en">
<?php
     session_start(); 
     include("conn.php"); 
     include('out_side_nav.php');
     include('head.php');
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/login.css" rel="stylesheet">
    <title>Forgot Password | Home-Foodi</title>
</head>

<body class="d-flex flex-column h-100">

    <div class="container form-signin mt-auto">
        <a class="nav nav-item text-decoration-none text-muted" href="#" onclick="history.back();">
            <i class="bi bi-arrow-left-square me-2"></i>Go back 
        </a>
        <form method="POST" action="cust_reset_pwd.php" class="form-floating">
            <h2 class="mt-4 mb-3 fw-normal text-bold"><i class="bi bi-key me-2"></i>Forgot Password?</h2>
            <p class="mt-4 mb-3 fw-normal">Enter your information below.</p>
            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="fp_username" placeholder="Username" name="fp_username" required>
                <label for="fp_username">Username</label>
            </div>
            <div class="form-floating mb-2">
                <input type="email" class="form-control" id="fp_email" placeholder="Email" name="fp_email" required>
                <label for="fp_email">Email</label>
            </div>
            <button class="w-100 btn btn-success mb-3" type="submit">Next</button>
        </form>
    </div>

    <footer class="text-center text-white">
  <!-- Copyright -->
  <div class="text-center p-2 p-2 mb-1 bg-dark text-white">
    <p class="text-white">© 2022 Copyright : Sairam Group</p>
    <p class="text-white">Developed by :&nbsp; Amal Vijayan</p>
  </div>
  <!-- Copyright -->
</footer>
</body>

</html>
