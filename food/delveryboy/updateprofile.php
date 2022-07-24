<?php

$db = mysqli_connect('localhost','root','','homefoodi');

$rid = $_POST['lg_id'];
$status = $_POST['sts'];

if($status==1){
$password = $_POST['pswd'];
$sql = mysqli_query($db,"UPDATE `tbl_login` SET `passwd`='$password' WHERE login_id='$rid'");
//$sql = mysqli_query($db,"UPDATE `login_tbl` SET `password`='$password' WHERE `role_id`='$rid'");
if($sql){
       echo json_encode('Success');
}else{
       echo json_encode('Can\'t change');
}
}elseif ($status==2) {

    @$name = $_POST['urname'];
    @$address = $_POST['uraddress'];
    @$email = $_POST['uremail'];
    @$phno = $_POST['urphno'];
    @$pin = $_POST['urpin'];
    //@$username = $_POST['uruname'];
   
    $db_data=array();
    $sql1=mysqli_query($db,"UPDATE `tbl_agent` SET `agent-name`='$name',`agent_addr`='$address',`agent_email`='$email',`agent_mob`='$phno' WHERE  login_id='$rid'");
    if($sql1){
        echo json_encode('Success');
 }else{
        echo json_encode('error');
 }
    
}else{
        echo json_encode('error');
}
