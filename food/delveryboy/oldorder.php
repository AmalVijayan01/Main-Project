<?php
$db=mysqli_connect('localhost','root','','homefoodi');

$ss = "SELECT tba.agent_id,tbd.*,tbo.* FROM tbl_agent tba,tbl_login tbl,tbl_delivery tbd,tbl_orders tbo WHERE 
tba.login_id=tbl.login_id AND tba.agent_id=tbd.agent_id AND tba.login_id=tbl.login_id AND tbd.order_id=tbo.order_id AND 
tbl.login_id='$logid' AND tbo.order_status='delivered'";
$sql1=mysqli_query($db,$ss);
$db_data=array();
if($sql1){
    while($row = mysqli_fetch_array($sql1)){
        $db_data[]=$row;
    }
    echo json_encode($db_data);
}
?>