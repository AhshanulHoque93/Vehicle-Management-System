<?php
include 'conect.php';
$uname=$_REQUEST['un'];
$sql="DELETE FROM `add_manager` WHERE username='$uname'";
mysqli_query($conn,$sql);
header('location:managem.php');
?>