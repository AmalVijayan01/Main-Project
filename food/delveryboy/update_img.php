<?php

$db = mysqli_connect('localhost','root','','snackhack');
$id = $_POST['l_id'];
$image = $_FILES['image']['name'];

$imgPath = 'profile/'.$image;
$tmp_name = $_FILES['image']['tmp_name'];

move_uploaded_file($tmp_name, $imgPath);
$sql = mysqli_query($db,"UPDATE `registration_tb1` SET `image`='$image' WHERE Lg_id='$id'")
// $sql = mysqli_query($db,"INSERT INTO `about`(`about`) VALUES ('$image')");
?>