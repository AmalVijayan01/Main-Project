<?php
$db=mysqli_connect('localhost','root','','homefoodi');

@$name = $_POST['urname'];
@$address = $_POST['uraddress'];
@$email = $_POST['uremail'];
@$phno = $_POST['urphno'];
@$username = $_POST['uruname'];
@$password = $_POST['pswd'];
$db_data=array();
$sql=mysqli_query($db,"INSERT INTO `tbl_login`(`uname`, `passwd`, `role`, `status`) 
VALUES ('$username','$password','agent','0')");
$logid=mysqli_insert_id($db);
$sql1=mysqli_query($db,"INSERT INTO `tbl_agent`(`agent_name`,`agent_email`,`agent_addr`, 
`agent_mob`,`login_id`,`agent_status`) VALUES ('$name','$email','$address','$phno','$logid','0')");

if($sql1){
    $db_data='Success';
echo json_encode($db_data);
}else{
    $db_data='error';  
    echo json_encode($db_data);
}

?>