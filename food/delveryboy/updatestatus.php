<?php
$db = mysqli_connect('localhost','root','','homefoodi');

@$id = $_POST['oid'];

$db_data=array();
$sql = mysqli_query($db,"UPDATE `tbl_orders` SET `order_status`='delivered' WHERE order_id='$id'");
if($sql){
    $db_data='Success';
echo json_encode($db_data);
}else{
    $db_data='error';  
    echo json_encode($db_data);
}
 ?>