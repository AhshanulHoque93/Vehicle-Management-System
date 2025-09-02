<?php
 $chak=false;
 include 'connect.php';
 if($_SERVER["REQUEST_METHOD"]=='POST')
 {
    $em=$_POST["e_y_e"];
    $sql="select * from add_manager where Email='$em'";
    $result=mysqli_query($conn,$sql);
    $count1=mysqli_num_rows($result);
    if($count1>0)
    {
        session_start();
        $_SESSION['u_n']=$em;
        header("location: forget2.php");
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
                
                <form id="f1" action="forgatpassword.php" method="post">
                    <input type="text" name="e_y_e" placeholder="Enter Your Email" required><br>
                    <?php
                    if($chak)
                        {
                        
                        echo ' <h5 style="color:red;margin-left: 14px;">Invalid Email</h5>';
                        
                        }
                ?>
                    <button  type="submit" id="but">Login</button>
                </form>
            </div>
        </div>
        

    </div>
</body>
</html>