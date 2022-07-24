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
        }.btn-signup{
          padding: 15px;
          border-radius: 10px;
          background-color: #7fffe6;
          border: none;
        }
    </style>
</head>
<body>
  <div class="container">
    <main class="signup-container">
        <div class="allcontainer">
            <h1 class="heading-primary">Reset your password<span class="dot">.</span></h1>
            <form action="#" method="post" class="signup-form" name="myform">
                <label for="" class="inp">
                <input type="text" class="input-text" placeholder="&nbsp;" name="uname" autocomplete="off" required>
                <span class="label">Username</span>
                <span class="input-icon"><i class="fa-solid fa-envelope"></i></span>
                </label>
                <label for="" class="inp">
                    <input type="text" class="input-text" placeholder="&nbsp;" name="passwd" autocomplete="off" required>
                    <span class="label">Email</span>
                    <span class="input-icon"><i class="fa-solid fa-address-card"></i></span>
                </label>
                <input type="submit" name="submit" value="Reset" class="btn-signup">
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