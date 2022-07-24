<?php 

$db=mysqli_connect('localhost','root','','homefoodi');

@$username = $_POST['urname'];
@$password=$_POST['pswd'];
$db_data=array();
$sql = "SELECT * FROM `tbl_login` where uname='$username' AND passwd='$password'";
//$sql = "SELECT * FROM `pro_login` where username='ani' AND password='ani12'";
$result = mysqli_query($db,$sql);
$count=mysqli_num_rows($result);

if($count == 1){

while($row = mysqli_fetch_array($result)){
    $db_data['login_id']=$row['login_id'];
    $db_data['status']=$row['status'];

    // $db_data[]=$row['Lg_id'];
    echo json_encode($db_data);
}

}
else {
    $db_data='error';  
    echo json_encode($db_data);
}
?>