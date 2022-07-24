<?php
$db=mysqli_connect('localhost','root','','snackhack');

@$bid = $_POST['email'];
@$Uname =  $_POST['uname'];
// $bid = 'jomeesh111@gmail.com';
// $Uname='cv';

// SELECT * FROM `registration_tb` join login_tb on login_tb.Lg_id = registraion_tb.Lg_id where registraion_tb.email = 'jmj1@gmail.com' AND login_tb.username='cv'
$ap1 = mysqli_query($db, "SELECT * FROM `registration_tb1` join login_tb on login_tb.Lg_id = registraion_tb.Lg_id where registraion_tb.email = '$bid' AND login_tb.username='$Uname'");
while ($row = mysqli_fetch_array($ap1)) {
  $username = $row['username'];
  $name = $row['name'];
  $pswd = $row['password'];
}

// Import PHPMailer classes into the global namespace 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer;

$mail->isSMTP();                      // Set mailer to use SMTP 
$mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers 
$mail->SMTPAuth = true;               // Enable SMTP authentication 
$mail->Username = 'hacksnack55@gmail.com';   // SMTP username 
$mail->Password = 'hzqqyrjcojoytjau';   // SMTP password 
$mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
$mail->Port = 587;                    // TCP port to connects to 

// Sender info 
$mail->setFrom('sender@snackhack.com', 'Snackhack');
$mail->addReplyTo('reply@snackhack.com', 'Snackhack');
// Add a recipient 
$mail->addAddress($bid);

//$mail->addCC('cc@example.com'); 
//$mail->addBCC('bcc@example.com'); 

// Set email format to HTML 
$mail->isHTML(true);

// Mail subject 
$mail->Subject = 'Email from Snackhack';

// Mail body content 
$bodyContent .= '<html>
<head>
<meta charset="utf-8">
</head>

<body background="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS4hVvyxHSVWVWGu8Uqq1bOi0x7KAhUG22svA&usqp=CAU" style="background-size: cover;">
    <center>
<h1 style="margin-top: 50px;">Welcome to Snackhack Supporting Community</h1>
<p>Hai,' . $name . '</p>
<p>Your Username and Password is sharing below. Keep safe this.</p>
Don\'t share the Login credentials to anyone. Enjoy using our website..<br>
<table style="margin-top:30px">
  <tr>
    <th scope="row">Mail From</th>
    <td>Snackhack Admin</td>
  </tr>
  <tr>
    <th scope="row">Username</th>
    <td>' . $username . '</td>
  </tr>
  <tr>
    <th scope="row">Password</th>
    <td>' . $pswd . '</td>
  </tr>
</table>
<div style="margin-top:30px">
Explore from here--->> <a href="http://localhost/Snackhackv2/employee/docs/page-login.php">Snackhack</a></div>
</center>
</body>
</html>';
$mail->Body    = $bodyContent;

// Send email 
if (!$mail->send()) {
  echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
} else {
  echo 'Message has been sent.';
}


?>