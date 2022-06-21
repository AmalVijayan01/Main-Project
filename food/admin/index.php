<?php
include 'db/connection.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/admin-login.css">
  <title>Home-foodi-admin-login</title>
</head>
<?php
if (isset($_POST['submit'])) {
  $uname = $_POST['username'];
  $pass = $_POST['password'];

  $sql = "SELECT * FROM tbl_login where uname='$uname' and passwd='$pass'";
  $result = mysqli_query($con, $sql);
  $count = mysqli_num_rows($result);

  while ($row = mysqli_fetch_array($result)) {
    $adminname = $row['username'];
  }
  if ($count > 0) {
    $_SESSION['username'] = $adminname;
    header("location:home.php");
  } else {
?>
    <script>
      alert("Invalid username or password");
    </script>
<?php
  }
  mysqli_close($con);
}
?>

<body>
  <div class="login-wrapper">
    <form method="POST" action="#" class="form">
      <img src="img/avatar.png" alt="">
      <h2>Welcome Admin</h2>
      <div class="input-group">
        <input type="text" name="username" required autocomplete="off">
        <label for="loginUser">User Name</label>
      </div>
      <div class="input-group">
        <input type="password" name="password" required autocomplete="off">
        <label for="loginPassword">Password</label>
      </div>
      <input type="submit" name="submit" value="Login" class="submit-btn">
      <!-- <a href="#forgot-pw" class="forgot-pw">Forgot Password?</a> -->
    </form>

    <div id="forgot-pw">
      <form action="" class="form">
        <a href="#" class="close">&times;</a>
        <h2>Reset Password</h2>
        <div class="input-group">
          <input type="email" name="email" id="email" required>
          <label for="email">Email</label>
        </div>
        <input type="submit" value="Submit" name="submit" class="submit-btn">
      </form>
    </div>
  </div>
</body>
</html>