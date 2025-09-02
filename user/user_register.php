<?php
$showalart=false;
$showalart1=true;
include 'connect.php';

if($_SERVER["REQUEST_METHOD"]=='POST')
{
    
   
   $First_name=$_POST["f_n"];
   $Last_name=$_POST["l_n"];
   $Phone_number=$_POST["p_n"];
   $Email=$_POST["em"];
   $User_name=$_POST["u_n"];
   $password=$_POST["pa"];
   $user_type='User';
   $exists=false;
   date_default_timezone_set("Asia/Dhaka");
   $date = date('Y-m-d\TH:i');
   $existsql="select * from `add_manager` where username='$User_name'";
   $result=mysqli_query($conn,$existsql);
   $numrows=mysqli_num_rows($result);
   if($numrows > 0)
   {
    $showalart1=false;
   }
   else
   {
    $sql="INSERT INTO `add_manager` (`first_name`, `last_name`, `phone_number`, `Email`,`add_date`, `username`, `password`,`User_type`) VALUES ('$First_name', '$Last_name', '$Phone_number', '$Email','$date', '$User_name', '$password','$user_type')";
    $result1=mysqli_query($conn,$sql);
    if($result1)
    {
        $showalart=true;
        
    }
    
   }
   
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car Parking Management System</title>
    <link rel="stylesheet" href="register.css">
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
                    <li><a href='login.php'>Login</a></li>
                </ul>
            </nav>
        </div>
    

        <div class="main">
            <div class="head">
                <h1><b>REGISTER</b></h1>
            </div>
            <div class="fromarea">
                <form id="f1" method="post">
                  <input type="text" id="" name="f_n" placeholder="First Name" required>
                  <input type="text" id="" name="l_n" placeholder="Last Name" >
                  <br>
                  <input type="text" id="" name="p_n" placeholder=" Phone NUmber" required>
                  
                  <input type="text" id="" name="em" placeholder="Email" required>
                  <br>
                  <input type="text" id="" name="u_n" placeholder="Username" required>
                  <input type="password" id="" name="pa" placeholder="Password" required>
                  <br>
                  <?php

                if(!$showalart1)
                {
                    echo ' <h5 style="color:red;margin-left: 14px;"> This User Name Already Exist</h5>';
                }
                ?>
                  <button  type="submit" id="but">submit</button>
                </form>
            </div>
        </div>
        

    </div>
    <script src="jq/jque.js"></script>
    <script src="scropt3.js"></script>
    <?php 
    if($showalart==true)
    {

?>
    <script>
        swal({
        title: "Good job!",
        text: "Data Add Successfully ,You Can Login",
        icon: "success",
        button: "OK",
});

    </script>
    <?php
    }

?>


</body>
</html>