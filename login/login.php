<?php
$login1=true;
include '../user/connect.php';
if($_SERVER["REQUEST_METHOD"]=='POST')
{
    $User_name=$_POST["u_n"];
    $password=$_POST["pa"];
    
    $sql="select * from add_manager where username='$User_name' AND password='$password'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    $arr=mysqli_fetch_assoc($result);
    if($num>0)
    {
        session_start();
        if($arr['User_type']=='Manager')
        {
            $_SESSION['loggedin']=true; 
            $_SESSION['pho_to']=$arr['photo'];
            $_SESSION['p_area']=$arr['parking_zoon'];
            header("location: ../manager/managerdb.php");
        }
        elseif($arr['User_type']=='Admin')
        {
            $_SESSION['loggedin']=true;
            header('location: ../admin/dashboard.php');
        }
        else
        {
            $_SESSION['loggedin']=true;
            $_SESSION['n_a']=$arr['first_name'];
            $_SESSION['p_n']=$arr['phone_number'];
            $_SESSION['u_na']=$User_name;
            header("location: ../user/loghome.php");
        }
        
        
       
    }
    else
    {

        $login1=false;
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
<h1>Login Here</h1>
<form method="post">
<p>Username</p>
<input type="text" id="un" name="u_n" placeholder="Enter Username" autocomplete="off" required >
<p>Password</p>
<input type="password" id="pp" name="pa" placeholder="Enter Password" autocomplete="off" required>
<?php
    if(!$login1)
    {
                        
    echo ' <h5 style="color:red;margin-left: 14px;"> Login Failed !! plz try again</h5>';
                        
     }
    ?>
<button type="submit" id="sub" name="subt"required>Login</button>
<a href="forgt1.php"> Forget Password?</a><br>
</form>
</div>
</body>
</html>