<?php
include 'connect.php';
if($_SERVER["REQUEST_METHOD"]=='POST')
{
    
   
   $F_name=$_POST["nam"];
   $Gam=$_POST["gam"];
   $F_back=$_POST["fedb"];

    $sql="INSERT INTO `feedback` (`name`, `email`, `message`) VALUES ('$F_name', '$Gam', '$F_back')";
    $result1=mysqli_query($conn,$sql);
    
    
}
   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Contact US Page</title>
    <link rel="stylesheet" type="text/css" href="contactpage.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    
</head>
<body>
    <section class="contact">
        <div class="Content">
            <h2>Contact Us</h2>
            <p>For any query contact with us.</p>
        </div>
        <div class="container">
            <div class="contactinfo">
                <div class="box">
                    <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i> </div>
                    <div class="text">
                        <h3>Adress</h3>
                        <p>DUET Gazipur</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fa fa-phone-square" aria-hidden="true"></i> </div>
                    <div class="text">
                        <h3>Phone</h3>
                        <p>01517-******</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i> </div>
                    <div class="text">
                        <h3>Email</h3>
                        <p>vehiclparking@gmail.com</p>
                    </div>
               </div>  
            </div>
            <div class="contactForm">
                <form method="post">
                    <label for="fname">Full Name:</label><br>
                    <input type="text" name="nam" placeholder="Enter your name Name" required="requrired"><br>
                    <label for="lname">Gmail:</label><br>
                    <input type="text" name="gam" placeholder="Enter your Gmail" required="required"><br><br>
                    <label for="msg">Message</label><br>
                    <textarea cols="20" rows="5" name="fedb" placeholder="Write something.." required="required"></textarea><br>
                    <input type="submit"  value="Submit">
                </form>
        </div>
    </section>
</body>
</html>