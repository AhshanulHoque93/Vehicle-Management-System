<?php
include 'conect.php';
$uname=$_REQUEST['un'];
$sql="DELETE FROM `chk_out` WHERE Reg_number='$uname'";
mysqli_query($conn,$sql);
header('location:ph.php');
?>