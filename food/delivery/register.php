<?php
$db=mysqli_connect('localhost','root','homefoodi');

@$name=$_POST['dname'];
@$email=$_POST['demail'];
@$mob=$_POST['dmob'];
@$uname=$_POST['duname'];
@$pass=$_POST['dpass'];
$role='agent';
$status=0;
$db_data=array();
$insert_query=mysqli_query($db,"INSERT INTO `tbl_login`(`uname`, `passwd`, `role`, `status`) VALUES ('$uname','$pass','$role','$status')");
$id=mysqli_insert_id($db);
$insert_agent=mysqli_query($db,"INSERT INTO `tbl_agent`(`agent_name`, `agent_email`, `agent_mob`, `login_id`) VALUES ('$name','$email','$mob','$id')");
if(insert_agent){
	$db_data='Sucess';
	echo json_encode($db_data);
}else{
	$db_data='error';
	echo json_encode($db_data);
}
?>