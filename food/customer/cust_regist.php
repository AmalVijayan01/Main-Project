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
    <script>
        var pwd_expression = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,10}$/;
        var letters = /^[A-Za-z]+$/;
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
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
        <form method="POST" action="add_cust.php" class="form-floating" name="myform">
            <h2 class="mt-4 mb-3 fw-normal text-bold"><i class="bi bi-person-plus me-2"></i>Sign Up</h2>

            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="firstname" placeholder="First Name" name="firstname" required autocomplete="off">
                <label for="firstname">First Name</label>

            </div>

            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="lastname" placeholder="Last Name" name="lastname" required autocomplete="off">
                <label for="lastname">Last Name</label>

            </div>

            <div class="form-floating mb-2">
                <input type="email" class="form-control" id="email" placeholder="E-mail" name="email" required autocomplete="off">
                <label for="email">E-mail</label>

            </div>

            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="mob" placeholder="Mobile" name="mob" minlength="10" maxlength="10" required autocomplete="off">
                <label for="Mobile">Mobile</label>

            </div>

            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="city" placeholder="City" name="city" required autocomplete="off">
                <label for="city">City</label>

            </div>

            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="pin" placeholder="Pincode" name="pin" minlength="6" maxlength="6" required autocomplete="off">
                <label for="city">Pincode</label>

            </div>

            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="uname" placeholder="Username" name="uname" required autocomplete="off">
                <label for="uname">Username</label>

            </div>

            <div class="form-floating mb-2">
                <input type="password" class="form-control" id="pwd" placeholder="Password" name="pwd" minlength="6" maxlength="8" required autocomplete="off">
                <label for="pwd">Password</label>

            </div>

            <div class="form-floating mb-2">
                <input type="password" class="form-control" id="cfpwd" placeholder="Confirm Password" name="cfpwd" minlength="6" maxlength="8" required autocomplete="off">
                <label for="cfpwd">Confirm Password</label>
                
            </div>

            <div class="form-floating">
                <div class="mb-2 form-check">
                    <input type="checkbox" class="form-check-input " id="tandc" name="tandc" required>
                    <label class="form-check-label small" for="tandc">I agree to the terms and conditions
                        and the privacy policy</label>

                </div>
            </div>
            <button class="w-100 btn btn-success mb-3" type="submit">Sign Up</button>
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