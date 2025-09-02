<?php

include '../user/connect.php';
$uname=$_REQUEST['un'];
$sql="DELETE FROM `booking_info` WHERE User_name='$uname'";
mysqli_query($conn,$sql);
header('location: managerdb.php');

?>