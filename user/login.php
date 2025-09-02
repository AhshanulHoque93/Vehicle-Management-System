<?php
$login1=true;
include 'connect.php';
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
            header("location: loghome.php");
        }
    }
    else
    {

        $login1=false;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car Parking Management System</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="full-page">
        <div class="navbar">
            <div class="imgad">
                <img src="p5.jpg" alt="">
                <a>Car Parking<br> Management System</a>
            </div>
            <nav>
                <ul id='MenuItems'>
                    <li><a href='index.php'>Home</a></li>
                    <li><a href='about.php'>About Us</a></li>
                    <li><a href='contact.php'>Contact</a></li> 
                    <li><a href='user_register.php'>Registration</a></li>
                    <li><a href='login.php'>Login</a></li>
                </ul>
            </nav>
        </div>

        <div class="full_login">
            <div class="head">
                <h2>Login</h2>
            </div>
            <div class="loarea">
                <form id="f1" action="login.php" method="post">
                    <input type="text" name="u_n" placeholder="Username"><br>
                    <input type="password" name="pa" placeholder="Password"><br>
                    <?php
                    if(!$login1)
                        {
                        
                        echo ' <h5 style="color:red;margin-left: 14px;"> Login Failed !! plz try again</h5>';
                        
                        }
                        ?>
                    <br>
                    <a href="forgatpassword.php" style="font-size: 15px; color:white; margin-left: 11px;">Forgot Your Password?</a>
                    <br>
                    <button  type="submit" id="but">Login</button>
                    
                   
                </form>
            </div>
        </div>
        
        
         

        
        

    </div>
</body>
</html>