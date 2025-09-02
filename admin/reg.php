<?php
include 'conect.php';
if(isset($_POST['subt']))
{
$Photo=$_POST["ima"];
$User_name=$_POST["uname"];
$password=$_POST["pass"];

$existsql="select * from `admin` where username='$User_name'";
$result=mysqli_query($conn,$existsql);
$numrows=mysqli_num_rows($result);
if($numrows > 0)
{
 echo "This user name already have!!!";
}
else
{
$sql="INSERT INTO `admin` (`username`, `password`,`photo`) VALUES ('$User_name', '$password','$Photo')";
$result1=mysqli_query($conn,$sql);
if($result1)
{
    header('location:login.php');
}
}
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="regstyle.css">
<title>Registration</title>
</head>
<body>
<body>
<div class="loginbox">
    <h2 style="text-align:center; margin-bottom:5px;">Registration Form</h2>
<form method="post">
<p>Upload Photo</p>
<input type="file" id="im" name="ima" placeholder="Enter Username" autocomplete="off" required >
<p>Username</p>
<input type="text" id="un" name="uname" placeholder="Enter Username" autocomplete="off" required >
<p>Password</p>
<input type="password" id="pp" name="pass" placeholder="Enter Password" autocomplete="off" required>
<button type="submit" id="sub" name="subt"required>Submit</button>
</form>
</div>
</body>
</html>