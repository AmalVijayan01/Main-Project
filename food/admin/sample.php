<html>

<head>
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="css/style.css">

  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>

  <title>User Registration</title>
</head>

  <section class="tab">

    <div class="clearfix secondary-nav" style="margin-left:627px;margin-top:65px;">
      <ul class="list">
        <li><a class="logintab" href="login.php">Login</a></li>
        <li><a style="text-decoration : underline;color: #16a085;" class="rtab" href="uregister.php">Register</a></li>
      </ul>
    </div>
  </section>

  <section class="home loginpage" id="home">

    <div class="loginimage" align="center">
      <img src="image/mobile-login-animate.svg" alt="">
    </div>

    <div class="main" id="main1" align="center" style="
    height: 612px;">
      <a class="doctorregister" href="doctorregister.php">Are you a Doctor?Click Here to Register</a>
      <p class="sign" align="center">Register</p>

      <form name="form1" class="form1" method="POST" onsubmit="return validate()">
      <div class="id" id="emailExistsError"></div>
        <input name="fn" class="un " type="text" id="fn" align="center" placeholder="First Name">
        <div class="id" id="fname"></div>
        <input name="ln" class="un " type="text" id="ln" align="center" placeholder="Last Name">
        <div class="id" id="lname"></div>
        <select name="gender" name="gender" id="gender" class="un" align="center" value="gender">
          <option class="un " value="">Select Gender</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
        <div class="id" id="genderErr"></div>
        <input name="email" class="un" type="email" id="email"  align="center" placeholder="email" >
        <div class="id" id="emailError"></div>
        <input name="pass" class="pass" id="pass1" type="text" align="center" placeholder="password">
        <div class="id" id="passError1"></div>
        <input name="conpass" class="pass" id="pass2" type="password" align="center" placeholder="Confirm Password">
        <div class="id" id="passError2"></div>
        <input type="submit" name="submit" class="submit" value="Register">
      </form>
    </div>

  </section>
  <script>
    
    function validate() {
      var pwd_expression = /^(?=.\d)(?=.[a-z])(?=.*[A-Z]).{8,}/;
      var letters = /^[A-Za-z]+$/;
      var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      var phoneno = /^\d{10}$/;
      var flag=0;
      if (document.form1.fn.value.trim() == "") {
        printError("fname", "Please enter first name");
        document.getElementById("fn").classList.add("errorClass");
      } else if (!letters.test(document.form1.fn.value.trim())) {
        printError("fname", "First name field required only alphabet characters");
        document.getElementById("fn").classList.add("errorClass");
        flag=1;
      }  else {
        printNoError("fname", "");
        document.getElementById("fn").classList.remove("errorClass");
      }

      if (document.form1.ln.value.trim() == "") {
        printError("lname", "Please enter Last name");
        document.getElementById("ln").classList.add("errorClass");
      }  else if (!letters.test(document.form1.ln.value.trim())) {
        printError("lname", "Last name field required only alphabet characters");
        document.getElementById("ln").classList.add("errorClass");
        flag=1;
      } 
      else {
        printNoError("lname", "");
        document.getElementById("ln").classList.remove("errorClass");
      }
      if (document.form1.gender.value.trim() == "") {
        printError("genderErr", "Please enter gender");
        document.getElementById("gender").classList.add("errorClass");
      } else {
        printNoError("genderErr", "");
        document.getElementById("gender").classList.remove("errorClass");
      }

      if (document.getElementById("pass1").value.trim() == "") {
        printError("passError1", "Please enter password");
        document.getElementById("pass1").classList.add("errorClass");
      } 
      else {
        if (document.getElementById("pass1").value.length <= 8) {
          printError("passError1", "password length is less than 8");
          document.getElementById("pass1").classList.add("errorClass");
        } else if (!pwd_expression.test(document.getElementById("pass1").value)) {
                printError("passError1", "Add at least one numeric digit and a special character in password ");
                 document.getElementById("pass1").classList.add("errorClass");
                 flag=1;
            } 
        
        else {
          printNoError("passError1", "");
          document.getElementById("pass1").classList.remove("errorClass");
        }
      }

      if (document.getElementById("pass2").value.trim() == "") {
        printError("passError2", "Please enter confirm password");
        document.getElementById("pass2").classList.add("errorClass");
      } else {
        if (document.getElementById("pass2").value.length <= 8) {
          printError("passError2", "password length is less than 8");
          document.getElementById("pass2").classList.add("errorClass");
        } else if (!pwd_expression.test(document.getElementById("pass2").value)) {
                printError("passError2", "Add one number and one uppercase and lowercase letter in password ");
                 document.getElementById("pass2").classList.add("errorClass");
                 flag=1;
            } else if (document.getElementById("pass1").value.trim() != document.getElementById("pass2").value.trim()) {
          printError("passError2", "Password does not match");
          document.getElementById("pass2").classList.add("errorClass");
        } else {
          printNoError("passError2", "");
          document.getElementById("pass2").classList.remove("errorClass");
        }
      }

      if (document.form1.email.value.trim() == "") {
        printError("emailError", "Please enter email");
        document.getElementById("email").classList.add("errorClass");
      } else if (!filter.test(document.form1.email.value.trim())) {
        printError("emailError", "Please enter valid email id");
        document.getElementById("email").classList.add("errorClass");
        flag=1;
       } 
      var email=  document.getElementById("email").value;
      if(email !==""){
       $.ajax({
        url   : "../dis/emailcheck.php",
        type  : "POST",
        async : false,
        data  : {
          "emailId" : email
                   },
        success: function(data)
        {
           if(data==-1){
        printNoError("emailError", "");
        document.getElementById("email").classList.remove("errorClass");
        	}	else
    	    {
            printError("emailError", "Email Exists already");
            document.getElementById("email").classList.add("errorClass");
    	    }
        }
    });
  }


      if (document.form1.fn.value.trim() == "" || flag==1 || document.form1.ln.value.trim() == "" || document.form1.email.value.trim() == "" || document.form1.gender.value.trim() == "" || document.getElementById("pass2").value.trim() == "" || document.getElementById("pass1").value.trim() == "" || document.getElementById("pass1").value.trim() != document.getElementById("pass2").value.trim() || document.getElementById("emailError").innerHTML === "Email Exists already") {
        return false;
      } else {
        return true; 
       }
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
    function errorMsg(hintMsg){
      
      var elem = document.getElementById("emailError");
      elem.classList.add("error")
      elem.innerHTML = hintMsg;
      document.getElementById("email").classList.add("errorSub");
      document.getElementById("pass").classList.add("errorSub");
      
    }
  </script>

</body>

</html>



<script type="text/javascript">
        function validate() {
            // var fname = document.myform.fname.value;
            var lname = document.myform.lname.value;
            var usrname = document.myform.uname.value;
            var email = document.myform.email.value;
            var mobile = document.myform.mob.value;
            var pwd = document.myform.pwd.value;
            var cpwd = document.myform.cpwd.value;
            var address = document.myform.address.value;

            var pwd_expression = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,10}$/;
            var letters = /^[A-Za-z]+$/;
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            var phoneno = /^\d{10}$/;


            if (document.myform.fname.value.trim() == "") {
                printerror("fnameer",'Please enter your first name');
                document.getElementById("fname").classList.add("errorclass");
            } 
            else if (!letters.test(fname)) {
                printerror("fnameer",'Only alphabets are allowed');
                document.getElementById("fname").classList.add("errorclass");
            } else if (lname == '') {
                alert('Please enter your last name');
                
            } else if (!letters.test(lname)) {
                alert('Name must contain alphabet characters only');
                
            } else if (usrname == '') {
                alert('Please enter the username.');
                
            } else if (email == '') {
                alert('Please enter your user email id');
                
            } else if (!filter.test(email)) {
                alert('Invalid email');
                
            } else if (mobile == '') {
                alert('Please enter the mobile number.');
                
            } else if (!phoneno.test(mobile)) {
                alert('Invalid Phoneno');
                
            } else if (pwd == '') {
                alert('Please enter your Password');
                
            } else if (!pwd_expression.test(pwd)) {
                alert('password must contain characters 6-10 characters consist of numeric digit and a special character');
                
            } else if (cpwd == '') {
                alert('Enter Confirm Password');
                
            } else if (pwd != cpwd) {
                alert('Password not Matched');
                
            } else if (address == '') {
                alert('Please enter your address');
                
            } else {
                alert('Registration Sucessfully');
            }
            return (true);

        }

        function fileValidation() {
            var fileInput = document.myform.photo;
            var fileInput = document.myform.idproof;
            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg|\.png|\.jpeg)$/i;

            if (!allowedExtensions.exec(filePath)) {
                alert('Invalid file type.Only .jpeg, .jpg, .png extensions are allowed');
                fileInput.value = '';
                return false;
            }
        }
        function printerror(elemId,hintMsg) {
            var elem=document.getElementById(elemId);
            elem.classList.add("error");
            elem.innerHTML=hintMsg;
        }
        function printNoError(elemId, hintMsg) {
      var elem = document.getElementById(elemId);
      elem.classList.remove("error");
      elem.innerHTML = hintMsg;
      

    }
        
        function errorMsg(hintMsg){
      
      
      elem.innerHTML = hintMsg;
      document.getElementById("fname").classList.add("errorSub");
      document.getElementById("pass").classList.add("errorSub");
      
    }
    </script>