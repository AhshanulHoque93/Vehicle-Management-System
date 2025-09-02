<?php
session_start();
 $chak=false;
 include 'connect.php';

 if($_SERVER["REQUEST_METHOD"]=='POST')
 {
    $np=$_POST["n_p"];
    $cp=$_POST["c_p"];
    $emi=$_SESSION['u_n'];
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car Parking Management System</title>
    <link rel="stylesheet" href="forget1.css">
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
                <h2>Forgot Password </h2>
            </div>
            <div class="loarea">
            
                <form id="f1" action="forget2.php" method="post">
                    <input type="password" name="n_p" placeholder="New Password" required><br>
                    <input type="password" name="c_p" placeholder="Confirm Password" required><br>
                    <?php
                    if($chak)
                        {
                        
                        echo ' <h5 style="color:red;margin-left: 14px;">Password and Confirm Password does not match</h5>';
                        
                        }
                    ?>
                    <button  type="submit" id="but">Login</button>
                </form>
            </div>
        </div>
        

    </div>
</body>
</html>