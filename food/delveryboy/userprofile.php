<?php 

$db=mysqli_connect('localhost','root','','homefoodi');

@$lid = $_POST['lg_id'];
// @$password=$_POST['pswd'];
$db_data=array();
$sql = "SELECT * FROM `tbl_agent` join tbl_login on tbl_agent.login_id = tbl_login.login_id 
where tbl_login.login_id='$lid'";
$result = mysqli_query($db,$sql);
$count=mysqli_num_rows($result);

if($count == 1){

while($row = mysqli_fetch_array($result)){
    $db_data['login_id']=$row['login_id'];
    $db_data['agent_name']=$row['agent_name'];
    $db_data['agent_email']=$row['agent_email'];
    $db_data['agent_addr']=$row['agent_addr'];
    $db_data['agent_mob']=$row['agent_mob'];
    $db_data['agent_status']=$row['agent_status'];
    $db_data['uname']=$row['uname'];
    $db_data['passwd']=$row['passwd'];
    // $db_data['simage']=$row['image'];

    // $db_data[]=$row['Lg_id'];
 $db_data[]=array_push($db_data,'Sucess');
}
   echo json_encode($db_data);
}
else {
    $db_data='error';  
    echo json_encode($db_data);
}
?>