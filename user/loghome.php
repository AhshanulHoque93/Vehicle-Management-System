<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || ($_SESSION['loggedin']!=true))
    {
        header("location: login.php");
        exit;
    }
    include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car Parking Management System</title>
    <link rel="stylesheet" href="style.css">
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
                    <li><a href='loghome.php'>Home</a></li>
                    <li><a href='about.php'>About Us</a></li>
                    <li><a href='contact.php'>Contact</a></li>
                    <li><a href='bookingFrom.php'>Booking</a></li>
                    <li><a href='logout.php'>Logout</a></li>
                </ul>
            </nav>
        </div>


        <div class="hero_area">
            <div class="hero_left">
                <h2 style="color:white;font-size: 35px;">welcome - <?php echo $_SESSION['n_a'] ?></h2>
                <h3>Park before arriving</h3>
                <p>The most efficient and secure method for parking your valuable automobile</p>
            </div>
            <div class="hero_right">

                
            </div>
        </div>
        

    </div>
</body>
</html>