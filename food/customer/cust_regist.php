<!DOCTYPE html>
<html lang="en">

<head>
    <?php session_start();
    include("conn.php");
    include('head.php'); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/login.css" rel="stylesheet">

    <title>Customer Registration</title>
<<<<<<< HEAD
    <style>
        .err{
            color: red;
=======
    <script>
        var pwd_expression = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,10}$/;//regex  for password
        var letters = /^[A-Za-z]+$/;
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;//regex for mobile number
        var phoneno = /^\d{10}$/;
        var flag = 0;
        //fname validation

        function validation() {
            if (document.myform.firstname.value.trim() == "") {
                printError("errfn", "Please enter first name");
                document.getElementById("firstname").classList.add("errorClass");
            } else if (!letters.test(document.myform.firstname.value.trim())) {
                printError("errfn", "First name field required only alphabet characters");
                document.getElementById("firstname").classList.add("errorClass");
                flag = 1;
            } else {
                printNoError("errfn", "");
                document.getElementById("firstname").classList.remove("errorClass");
            }

            //lnamevalidation 
            if (document.myform.lastname.value.trim() == "") {
                printError("errln", "Please enter Last name");
                document.getElementById("lastname").classList.add("errorClass");
            } else if (!letters.test(document.myform.lastname.value.trim())) {
                printError("errln", "Last name field required only alphabet characters");
                document.getElementById("lastname").classList.add("errorClass");
                flag = 1;
            } else {
                printNoError("errln", "");
                document.getElementById("lastname").classList.remove("errorClass");
            }

            // email validation 
            if (document.myform.email.value.trim() == "") {
                printError("errem", "Please enter email");
                document.getElementById("email").classList.add("errorClass");
            } else if (!filter.test(document.myform.email.value.trim())) {
                printError("errem", "Please enter valid email id");
                document.getElementById("email").classList.add("errorClass");
                flag = 1;
            } else {
                printError("errem", "");
                document.getElementById("email").classList.remove("errorClass");
            }

            // phone number  vaidation 
            if (document.myform.mob.value.trim() == "") {
                printError("errmo", "Please enter mobile number");
                document.getElementById("mob").classList.add("errorClass");
            } else if (!phoneno.test(document.myform.mob.value.trim())) {
                printError("errmo", "Please enter a valid mobile number");
                document.getElementById("mob").classList.add("errorClass");
            } else {
                printNoError("errmo", "");
                document.getElementById("mob").classList.remove("errorClass");
            }

            //citynamevalidation 
            if (document.myform.city.value.trim() == "") {
                printError("errcity", "Please enter city name");
                document.getElementById("city").classList.add("errorClass");
            } else if (!letters.test(document.myform.city.value.trim())) {
                printError("errcity", "only alphabets are allowed");
                document.getElementById("city").classList.add("errorClass");
                flag = 1;
            } else {
                printNoError("errcity", "");
                document.getElementById("city").classList.remove("errorClass");
            }

            //pincode vaidation 
            if (document.myform.pin.value.trim() == "") {errpin
                printError("errpin", "Please enter pincode");
                document.getElementById("pin").classList.add("errorClass");
            } else if (!phoneno.test(document.myform.pin.value.trim())) {
                printError("errpin", "Please enter a valid pincode");
                document.getElementById("pin").classList.add("errorClass");
            } else {
                printNoError("errpin", "");
                document.getElementById("pin").classList.remove("errorClass");
            }
            
            //unamevalidation 
            if (document.myform.uname.value.trim() == "") {
                printError("errun", "Please enter username");
                document.getElementById("uname").classList.add("errorClass");
            } else {
                printNoError("errun", "");
                document.getElementById("uname").classList.remove("errorClass");
            }

            // password  vaidation
            if (document.getElementById("pwd").value.trim() == "") {
                printError("errpass", "Please enter password");
                document.getElementById("pwd").classList.add("errorClass");
            } else {
                if (!pwd_expression.test(document.getElementById("pwd").value.trim())) {
                    printError("errpass", "Add at least one numeric digit and a special character in password ");
                    document.getElementById("pwd").classList.add("errorClass");
                    flag = 1;
                } else {
                    printNoError("errpass", "");
                    document.getElementById("pwd").classList.remove("errorClass");
                }
            }
            // Confirm password  vaidation 
            if (document.getElementById("cfpwd").value.trim() == "") {
                printError("errcpass", "Please  confirm password");
                document.getElementById("cfpwd").classList.add("errorClass");
            } else {
                if (!pwd_expression.test(document.getElementById("cfpwd").value)) {
                    printError("errcpass", "Add one number and one uppercase and lowercase letter in password ");
                    document.getElementById("cfpwd").classList.add("errorClass");
                    flag = 1;
                } else if (document.getElementById("cfpwd").value.trim() != document.getElementById("pwd").value.trim()) {
                    printError("errcpass", "Password does not match");
                    document.getElementById("cfpwd").classList.add("errorClass");
                } else {
                    printNoError("errcpass", "");
                    document.getElementById("cfpwd").classList.remove("errorClass");
                }
            }
            if (document.myform.fname.value.trim() == "" || flag == 1 || document.myform.lname.value.trim() == "" || document.myform.uname.value.trim() == "" || document.myform.email.value.trim() == "" || document.myform.mob.value.trim() == "" || document.getElementById("pwd").value.trim() == "" || document.getElementById("cpwd").value.trim() == "" || document.getElementById("pwd").value.trim() != document.getElementById("cpwd").value.trim()) {
                return false;
            } else {
                return true;
            }

            function printError(elemId, hintMsg) {
                var elem = document.getElementById(elemId);
                elem.classList.add("error");
                elem.innerHTML = hintMsg;
            }

            function printNoError(elemId, hintMsg) {
                var elem = document.getElementById(elemId);
                elem.classList.remove("error");
                elem.innerHTML = hintMsg;
            }

            function errorMsg(hintMsg) {

                var elem = document.getElementById("emailError");
                elem.classList.add("error")
                elem.innerHTML = hintMsg;
                document.getElementById("email").classList.add("errorSub");
                document.getElementById("pwd").classList.add("errorSub");
            }
>>>>>>> e937fb11643b7fff3d41a5b4399541e176c9e127
        }
    </style>
    <script>
      function validate(){
      var fname=document.myform.firstname.value;
      var lname=document.myform.lastname.value;
      var email=document.myform.email.value;
      var mobile=document.myform.mob.value;
      var city=document.myform.city.value;
      var pincode=document.myform.pin.value;
      var uname=document.myform.uname.value;
      var passwd=document.myform.pwd.value;
      var cfpasswd=document.myform.cfpwd.value;

      if(fname==''){
        document.getElementById("err").innerHTML="enter first name";
        return false;
      }
      if(lname==''){
        document.getElementById("err").innerHTML="enter last name";
        return false;
      }
      if(email==''){
        document.getElementById("err").innerHTML="enter email";
        return false;
      }
      if(mobile==''){
        document.getElementById("err").innerHTML="enter mobile number";
        return false;
      }
      if(city==''){
        document.getElementById("err").innerHTML="enter city";
        return false;
      }
      if(pincode==''){
        document.getElementById("err").innerHTML="enter pincode";
        return false;
      }
      if(uname==''){
        document.getElementById("err").innerHTML="enter username";
        return false;
      }
      if(passwd==''){
        document.getElementById("err").innerHTML="enter password";
        return false;
      }
      if(cfpasswd==''){
        document.getElementById("err").innerHTML="confirm password";
        return false;
      }
      if(passwd!=cfpasswd){
        document.getElementById("err").innerHTML="password does not match";
        return false;
      }else{
        document.getElementById("err").innerHTML="requirements match";
      }
      return true;
    }
    </script>

</head>

<body class="d-flex flex-column">
    <header class="navbar navbar-light fixed-top bg-light shadow-sm mb-auto">
        <div class="container-fluid mx-4">
            <a href="index.php">
                <img src="img/LOGO_BLACK.png" width="75" class="me-2">
            </a>
        </div>
    </header>
    <div class="container mt-4"></div>
    <div class="container form-signin mt-auto">
        <a class="nav nav-item text-decoration-none text-muted" href="#" onclick="history.back();">
            <i class="bi bi-arrow-left-square me-2"></i>Go back
        </a>
<<<<<<< HEAD
        <form method="POST" action="#" class="form-floating" name="myform" onsubmit="return (validate())">
=======
        <form method="POST" action="#" class="form-floating" name="myform">
>>>>>>> e937fb11643b7fff3d41a5b4399541e176c9e127
            <h2 class="mt-4 mb-3 fw-normal text-bold"><i class="bi bi-person-plus me-2"></i>Sign Up</h2>
            
            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="firstname" placeholder="First Name" name="firstname"  autocomplete="off">
                <label for="firstname">First Name</label>
            </div>

            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="lastname" placeholder="Last Name" name="lastname"  autocomplete="off">
                <label for="lastname">Last Name</label>

            </div>

            <div class="form-floating mb-2">
                <input type="email" class="form-control" id="email" placeholder="E-mail" name="email"  autocomplete="off">
                <label for="email">E-mail</label>

            </div>

            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="mob" placeholder="Mobile" name="mob" minlength="10" maxlength="10"  autocomplete="off">
                <label for="Mobile">Mobile</label>

            </div>

            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="city" placeholder="City" name="city"  autocomplete="off">
                <label for="city">City</label>

            </div>

            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="pin" placeholder="Pincode" name="pin" minlength="6" maxlength="6"  autocomplete="off">
                <label for="city">Pincode</label>

            </div>

            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="uname" placeholder="Username" name="uname"  autocomplete="off">
                <label for="uname">Username</label>

            </div>

            <div class="form-floating mb-2">
<<<<<<< HEAD
                <input type="password" class="form-control" id="pwd" placeholder="Password" name="pwd"   autocomplete="off">
=======
                <input type="password" class="form-control" id="pwd" placeholder="Password" name="pwd"  required autocomplete="off">
>>>>>>> e937fb11643b7fff3d41a5b4399541e176c9e127
                <label for="pwd">Password</label>

            </div>

            <div class="form-floating mb-2">
<<<<<<< HEAD
                <input type="password" class="form-control" id="cfpwd" placeholder="Confirm Password" name="cfpwd"  autocomplete="off">
=======
                <input type="password" class="form-control" id="cfpwd" placeholder="Confirm Password" name="cfpwd" required autocomplete="off">
>>>>>>> e937fb11643b7fff3d41a5b4399541e176c9e127
                <label for="cfpwd">Confirm Password</label>
            </div>
            <div class="err" id="err"></div>
            <div class="form-floating">
                <div class="mb-2 form-check">
                    <input type="checkbox" class="form-check-input " id="tandc" name="tandc" required>
                    <label class="form-check-label small" for="tandc">I agree to the terms and conditions
                        and the privacy policy</label>

                </div>
            </div>
            <button class="w-100 btn btn-success mb-3" type="submit" name="submit">Sign Up</button>
        </form>
    </div>
    <div class="container mt-4"></div>
    <footer class="text-center text-white">
        <!-- Copyright -->
        <div class="text-center p-2 p-2 mb-1 bg-dark text-white">
            <p class="text-white">© 2022 Copyright : Home Foodi</p>
            <p class="text-white">Developed by :</p>
            <p class="text-white">&nbsp;Amal Vijayan</p>
        </div>
        <!-- Copyright -->
    </footer>
</body>

</html>

<?php 
    if(isset($_POST['submit']))
    {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $cmob = $_POST['mob'];
        $city = $_POST['city'];
        $pincode = $_POST['pin'];
        $username = $_POST['uname'];
        $passwd = $_POST['pwd'];
        $cpasswd = $_POST['cfpwd'];
        $role = "user";
        $status =0;
        $pass_hash=password_hash($cpasswd,PASSWORD_DEFAULT);

        $sqla = "SELECT uname from tbl_login where uname = '$username'";
        $result5 = mysqli_query($con,$sqla);
        $num1 = mysqli_num_rows($result5);

        if($num1 == 0)
        {
            $reslt = "INSERT INTO tbl_login(uname,passwd,role,status) VALUES ('$username','$pass_hash','$role','$status')";
            mysqli_query($con,$reslt);

            $query5 = "SELECT * FROM tbl_login WHERE uname = '$username'";
            $reslt1 = mysqli_query($con,$query5);
            $row = mysqli_fetch_array($reslt1);
            $usr = $row['login_id'];

            $sqlc = "INSERT INTO tbl_customer(cust_fname,cust_lname,cust_email,cust_mob,cust_city,cust_pincode,cust_status,login_id) 
                                      VALUES ('$firstname','$lastname','$email','$cmob','$city','$pincode','$status','$usr')";
            mysqli_query($con,$sqlc);
<<<<<<< HEAD
            header('location:cust_login.php');
=======
            // header('location:cust_login.php');
>>>>>>> e937fb11643b7fff3d41a5b4399541e176c9e127
            echo "<script>alert('Sucessfully registered') </script>";

        }
        else
        {
            echo "<script>alert('Username already exists') </script>";
        }
        ob_end_flush();
    }
?>