<?php 
$db=mysqli_connect('localhost','root','','snackhack');

@$username = $_POST['uname'];
@$email=$_POST['email'];
$db_data=array();
$sql = "SELECT * FROM `login_tb` where username='$username'";
$result = mysqli_query($db,$sql);
$count=mysqli_num_rows($result);
if($count == 1){
    $db_data='sucess';  
    echo json_encode($db_data);
    header("location:mail?eml=$email&un=$username");
}else{
    $db_data='fail';  
    echo json_encode($db_data);
}

?>