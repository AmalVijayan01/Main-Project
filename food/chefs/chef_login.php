<?php
    include 'conn.php';
    if(isset($_POST['submit'])){
      $username = $_POST["uname"];
      $pwd = $_POST["passwd"];

      $query = "SELECT login_id,uname,passwd FROM tbl_login WHERE
      uname = '$username' and status in('1','0') and role in('chef');";
      $result =mysqli_query($con,$query);
      if(mysqli_num_rows($result)>0){
          $rowfetch=mysqli_fetch_assoc($result);
          $verifypass=password_verify($pwd,$rowfetch['passwd']);
          if($verifypass==1){
              session_start();
              $_SESSION["ses_id"] = $rowfetch['login_id'];
              header("location:chef_dashboard.php");
              exit(1);
          }
          else
          {
          ?>
          <script>alert("invalid password")</script>
          <?php
              header("location:chef_login.php");
          }
      }
      else
      {
          echo "<script>alert('Invalid credentials')</script>";
      }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp Page</title>
    <link rel="stylesheet" href="css/form_style.css">
    <script src="https://kit.fontawesome.com/17b6e821ef.js" crossorigin="anonymous"></script>
    <style>
        .allcontainer{
            margin-top: 10%;
            margin-left: 8%;
        }
    </style>
</head>
<body>
  <div class="container">
    <main class="signup-container">
        <div class="allcontainer">
            <h1 class="heading-primary">Login to Home-foodi<span class="dot">.</span></h1>
            <p class="text-mute">New member? <a href="chef_signup.php">Sign up</a></p>
            <form action="#" method="post" class="signup-form" name=""myform>
                <label for="" class="inp">
                <input type="text" class="input-text" placeholder="&nbsp;" name="uname" autocomplete="off" required>
                <span class="label">Username</span>
                <span class="input-icon"><i class="fa-solid fa-envelope"></i></span>
                </label>
                <label for="" class="inp">
                    <input type="password" class="input-text" placeholder="&nbsp;" name="passwd" autocomplete="off" required>
                    <span class="label">Password</span>
                    <span class="input-icon"><i class="fa-solid fa-address-card"></i></span>
                </label>
                <a href="#" onclick="">Forgot your password?</a>
                <input type="submit" name="submit" value="Login" class="btn btn-signup">
            </form>
            
        </div>
    </main>
    <div class="welcome-container">
      <h1 class="heading-secondary">Welcome to <span class="lg">Home-Foodi</span></h1>
      <img src="assets/images/Chef.gif" alt="">
    </div>
  </div>
  <script>
    const eyeClick = document.querySelector("[passwd]");
    const password_elem = document.getElementById("passwd");

    eyeClick.onclick = () => {
      const icon = eyeClick.children[0];
      icon.classList.toggle("fa-eye-slash");
      if(password_elem.type === "passwd"){
        password_elem.type = "text";
      }
      else if (password_elem.type === "text"){
        password_elem.type = "passwds";
      }
    };
  </script>
</body>
</html>