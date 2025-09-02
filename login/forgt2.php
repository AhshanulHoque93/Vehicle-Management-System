<?php
$chak=false;
session_start();
include '../user/connect.php';
if($_SERVER["REQUEST_METHOD"]=='POST')
{
   $np=$_POST["n_p"];
   $cp=$_POST["c_p"];
   $emi=$_SESSION['u_n_1'];
   if($np==$cp)
   {
       $sql="UPDATE `add_manager` SET `password` = '$np' WHERE  Email= '$emi'";
       $result1=mysqli_query($conn,$sql);
       session_unset();
       session_destroy();
       header("location: login.php");
   }
   else
   {
       $chak=true;
   }

}
?>






<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="logstyle.css">
<title>Vehicle Parking Management System</title>
</head>
<body>
<body>
<div class="loginbox">
<img src="images.png" id="images">
<form method="post">
<p>New Password</p>
<input type="text" id="un" name="n_p" placeholder="New Password" required >
<p>Confirm Password</p>
<input type="text" id="un" name="c_p" placeholder="Confirm Email" autocomplete="off" required >
<?php
if($chak)
  {
                        
 echo ' <h5 style="color:red;margin-left: 14px;">Password and Confirm Password does not match</h5>';
                        
    }
?>
<button type="submit" id="sub" name="subt"required>Submit</button>
</form>
</div>
</body>
</html>