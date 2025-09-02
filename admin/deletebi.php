<?php
include 'conect.php';
$uname=$_REQUEST['un'];
$sql="DELETE FROM `booking_info` WHERE reg_num=$uname";
mysqli_query($conn,$sql);
header('location:dashboard.php');
?>