<?php
$chak=false;
include '../user/connect.php';
if($_SERVER["REQUEST_METHOD"]=='POST')
{
    $email=$_POST["u_n"];
    $sql="select * from add_manager where Email='$email'";
    $result=mysqli_query($conn,$sql);
    $count1=mysqli_num_rows($result);
    if($count1>0)
    {
        session_start();
        $_SESSION['u_n_1']=$email;
        header("location: forgt2.php");
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
<p>Email</p>
<input type="text" id="un" name="u_n" placeholder="Enter Email" autocomplete="off" required >
<?php
        if($chak)
        {
                        
             echo ' <h5 style="color:red;margin-left: 14px;">Invalid Email</h5>';
                        
         }
 ?>
<button type="submit" id="sub" name="subt"required>Login</button>
</form>
</div>
</body>
</html>