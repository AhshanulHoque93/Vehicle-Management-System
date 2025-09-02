<?php
include 'conect.php';
$uname=$_REQUEST['un'];
$sql="DELETE FROM `pa_lo` WHERE parking_area='$uname'";
mysqli_query($conn,$sql);
header('location:manpark.php');
?>