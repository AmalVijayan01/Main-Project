<?php
    include 'conn.php';
    session_start();

    if(isset($_POST['submit'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $mob = $_POST['mobile'];
        $city = $_POST['city'];
        $pin = $_POST['pincode'];
        $uname = $_POST['uname'];
        $pass = $_POST['passwd'];
        $cpass = $_POST['cfpasswd'];
        $status=0;
        $role="chef";
        $pass_hash=password_hash($cpass,PASSWORD_DEFAULT);//encrypting password
        //photo upload
        $filename=$_FILES["uploadphoto"] ["name"];
        $tempfile=$_FILES["uploadphoto"]["tmp_name"];
<<<<<<< HEAD
        $folder="images/chef_imgs/".$filename;
        //idproof upload
        $idproof=$_FILES["idproof"] ["name1"];
        $tempfile1=$_FILES["idproof"]["tmp_name1"];
        $folder1="images/chef_idproof/".$idproof;
=======
        $folder="images/chef_imgs".$filename;
        //idproof upload
        $idproof=$_FILES["idproof"] ["name1"];
        $tempfile1=$_FILES["idproof"]["tmp_name1"];
        $folder="images/chef_idproof".$idproof;
>>>>>>> e937fb11643b7fff3d41a5b4399541e176c9e127
        //db fetch user exists
        $select_query="SELECT uname FROM tbl_login WHERE uname = '$uname'";
        $select_result = mysqli_query($con,$select_query);
        $result_nums=mysqli_num_rows($select_result);

        if($result_nums==0){
            //insert if user doesnot exists
            $insert_login="INSERT INTO tbl_login(uname,passwd,role,status)VALUES('$uname','$pass_hash','$role','$status')";
            $login_result=mysqli_query($con,$insert_login);

            //login id fetch
            $idselect_query="SELECT login_id FROM tbl_login WHERE uname='$uname'";
            $idselect_result=mysqli_query($con,$idselect_query);
            $result_fetch=mysqli_fetch_array($idselect_result);
            $login_id=$result_fetch['login_id'];
            
            //insertion into chef table
            $insert_query="INSERT INTO tbl_chefs(chef_fname,chef_lname,chef_email,chef_mob, 
            chef_city,chef_pincode,chef_photo, chef_idproof,chef_status,login_id) 
            VALUES ('$fname','$lname','$email','$mob','$city','$pin','$photo','$idproof','$status','$login_id')" ;
            $insert_result = mysqli_query($con,$insert_query);
<<<<<<< HEAD
            move_uploaded_file($tempfile,$folder);
            move_uploaded_file($tempfile1,$folder1);
=======
>>>>>>> e937fb11643b7fff3d41a5b4399541e176c9e127
            header("Location:chef_login.php");
        }
        else{
            echo "<script>alert('Username alresdy exists') </script>";
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
<<<<<<< HEAD
    <script>
      function validate(){
      var fname=document.myform.fname.value;
      var lname=document.myform.lname.value;
      var email=document.myform.email.value;
      var mobile=document.myform.mobile.value;
      var city=document.myform.city.value;
      var pincode=document.myform.pincode.value;
      var uname=document.myform.uname.value;
      var passwd=document.myform.passwd.value;
      var cfpasswd=document.myform.cfpasswd.value;

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
=======
>>>>>>> e937fb11643b7fff3d41a5b4399541e176c9e127
    <style>
        .input-files{
            border: none;
        }
        .files{
            padding: 3rem 5rem 1rem 2rem;
            border: none;
            border-radius: 2rem;
            background: #eee;
            font-weight: 600;
            width: 48%;
        }
        .files input{
            border: none;
            width: 300px;
            height: 30px;
        }
        .file-name input{
            position: absolute;
<<<<<<< HEAD
        }.error{
          color: red;
=======
>>>>>>> e937fb11643b7fff3d41a5b4399541e176c9e127
        }
    </style>
</head>
<body>
  <div class="container">
    <main class="signup-container">
      <h1 class="heading-primary">Create New Account<span class="dot">.</span></h1>
      <p class="text-mute">Already A Member? <a href="chef_login.php">Login</a></p>
<<<<<<< HEAD
      <form action="#" method="post" class="signup-form" name="myform" onsubmit="return (validate())">
        <div class="f-row input-wrapper">
          <label for="" class="inp">
            <input type="text" class="input-text"  placeholder="&nbsp;" name="fname" autocomplete="off">
=======
      <form action="#" method="post" class="signup-form" name=""myform>
        <div class="f-row input-wrapper">
          <label for="" class="inp">
            <input type="text" class="input-text"  placeholder="&nbsp;" name="fname">
>>>>>>> e937fb11643b7fff3d41a5b4399541e176c9e127
            <span class="label">First Name</span>
            <span class="input-icon"><i class="fa-solid fa-address-card"></i></span>
          </label>
          <label for="" class="inp">
<<<<<<< HEAD
            <input type="text" class="input-text" placeholder="&nbsp;" name="lname" autocomplete="off">
=======
            <input type="text" class="input-text" placeholder="&nbsp;" name="lname">
>>>>>>> e937fb11643b7fff3d41a5b4399541e176c9e127
            <span class="label">Last Name</span>
            <span class="input-icon"><i class="fa-solid fa-address-card"></i></span>
          </label>
        </div>
        <label for="" class="inp">
<<<<<<< HEAD
          <input type="Email" class="input-text" placeholder="&nbsp;" name="email" autocomplete="off">
=======
          <input type="Email" class="input-text" placeholder="&nbsp;" name="email">
>>>>>>> e937fb11643b7fff3d41a5b4399541e176c9e127
          <span class="label">Email</span>
          <span class="input-icon"><i class="fa-solid fa-envelope"></i></span>
        </label>
        <label for="" class="inp">
<<<<<<< HEAD
          <input type="text" class="input-text" placeholder="&nbsp;" name="mobile" autocomplete="off">
=======
          <input type="text" class="input-text" placeholder="&nbsp;" name="mobile">
>>>>>>> e937fb11643b7fff3d41a5b4399541e176c9e127
          <span class="label">Mobile</span>
          <span class="input-icon"><i class="fa-solid fa-envelope"></i></span>
        </label>
        <div class="f-row input-wrapper">
          <label for="" class="inp">
<<<<<<< HEAD
            <input type="text" class="input-text" placeholder="&nbsp;"name="city" autocomplete="off">
=======
            <input type="text" class="input-text" placeholder="&nbsp;"name="city">
>>>>>>> e937fb11643b7fff3d41a5b4399541e176c9e127
            <span class="label">City</span>
            <span class="input-icon"><i class="fa-solid fa-address-card"></i></span>
          </label>
          <label for="" class="inp">
<<<<<<< HEAD
            <input type="text" class="input-text" placeholder="&nbsp;" name="pincode" autocomplete="off">
=======
            <input type="text" class="input-text" placeholder="&nbsp;" name="pincode">
>>>>>>> e937fb11643b7fff3d41a5b4399541e176c9e127
            <span class="label">Pincode</span>
            <span class="input-icon"><i class="fa-solid fa-address-card"></i></span>
          </label>
        </div>
        <div class="f-row input-wrapper">
            <div class="files">
                <label for="">
<<<<<<< HEAD
                    <input type="file" class="input-files" placeholder="&nbsp;" name="uploadphoto" required>
=======
                    <input type="file" class="input-files" placeholder="&nbsp;" name="uploadphoto">
>>>>>>> e937fb11643b7fff3d41a5b4399541e176c9e127
                </label>
            </div>
            <div class="files">
                <label for="">
<<<<<<< HEAD
                    <input type="file" class="input-files" placeholder="&nbsp;" name="idproof" required>
=======
                    <input type="file" class="input-files" placeholder="&nbsp;" name="idproof">
>>>>>>> e937fb11643b7fff3d41a5b4399541e176c9e127
                </label>
            </div>
        </div>
        <label for="" class="inp">
<<<<<<< HEAD
          <input type="text" class="input-text" placeholder="&nbsp;" name="uname" autocomplete="off">
=======
          <input type="text" class="input-text" placeholder="&nbsp;" name="uname">
>>>>>>> e937fb11643b7fff3d41a5b4399541e176c9e127
          <span class="label">Username</span>
          <span class="input-icon"><i class="fa-solid fa-envelope"></i></span>
        </label>
        <div class="f-row input-wrapper">
          <label for="" class="inp">
<<<<<<< HEAD
            <input type="password" class="input-text" placeholder="&nbsp;" name="passwd" autocomplete="off">
=======
            <input type="password" class="input-text" placeholder="&nbsp;" name="passwd">
>>>>>>> e937fb11643b7fff3d41a5b4399541e176c9e127
            <span class="label">Password</span>
            <span class="input-icon"><i class="fa-solid fa-address-card"></i></span>
          </label>
          <label for="" class="inp">
<<<<<<< HEAD
            <input type="password" class="input-text" placeholder="&nbsp;"name="cfpasswd" autocomplete="off">
=======
            <input type="password" class="input-text" placeholder="&nbsp;"name="cfpasswd">
>>>>>>> e937fb11643b7fff3d41a5b4399541e176c9e127
            <span class="label">Confirm Password</span>
            <span class="input-icon"><i class="fa-solid fa-address-card"></i></span>
          </label>
        </div>
<<<<<<< HEAD
        <div class="error" id="err"></div>
=======
>>>>>>> e937fb11643b7fff3d41a5b4399541e176c9e127
        <input type="submit" name="submit" value="Create Account" class="btn btn-signup">
      </form>
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
<<<<<<< HEAD
    }

    
=======
    };
>>>>>>> e937fb11643b7fff3d41a5b4399541e176c9e127
  </script>
</body>
</html>
