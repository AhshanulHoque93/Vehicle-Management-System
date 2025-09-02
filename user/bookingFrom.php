<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || ($_SESSION['loggedin']!=true))
    {
        header("location: login.php");
        exit;
    }
?>

<?php
    $showalert=false;
    $showalert1=false;
    include 'connect.php';
    if($_SERVER["REQUEST_METHOD"]=='POST')
    {
        $user_n=$_SESSION['u_na'];
        $phone=$_SESSION['p_n'];
        $v_cat=$_POST["cats"];
        $pa_zo=$_POST["zones"];
        $v_na=$_POST["v_n"];
        $r_na=$_POST["r_n"];
        $date=$_POST["dat"];
        $time=$_POST["tim"];
        $data="select * from `pa_lo` where parking_area='$pa_zo'";
        $result2=mysqli_query($conn,$data);
        $numr=mysqli_fetch_assoc($result2);
        $space= $numr['vacant_space'];


        $data1="select * from `chk_in` where Parking_zoon='$pa_zo'";
        $result1=mysqli_query($conn,$data1);
        $numrows=mysqli_num_rows($result1);
        if($space!=$numrows)
        {

        $sql="INSERT INTO `booking_info` (`User_name`,`Phone_number`,`vechil_category`, `parking_zone`, `vechil_name`, `reg_num`, `date`, `time`) VALUES ('$user_n','$phone','$v_cat', '$pa_zo', '$v_na', '$r_na', '$date', '$time')";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            $showalert=true;
        }
        }
        else
        {
            $showalert1=true;
        }
    }

?>
<?php
                            
     $sql1="select parking_area from pa_lo";
     $result=mysqli_query($conn,$sql1);
                           
                        
 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car Parking Management System</title>
    <link rel="stylesheet" href="syyle1.css">
    
    
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
                    <li><a href='bookingFrom.php'>Home</a></li>
                    <li><a href='about.php'>About Us</a></li>
                    <li><a href='contact.php'>Contact</a></li>
                    <li><a href='bookingFrom.php'>Booking</a></li>
                    <li><a href='logout.php'>Logout</a></li>
                </ul>
            </nav>
        </div>
        <div class="main">
            <div class="head">
                <h2><b>Park before arriving</b></h2>
                <p>The most efficient and secure method for parking your valuable automobile</p>
            </div>
           


            <div class="fromarea">
                <form id="f1" method="post">
                    <select id="cat" name="cats" onchange="fetchemp()">
                      <option disabled selected>Select vehicl category</option>
                       <?php
                           $data="SELECT id,parking_area,vechile_category from pa_lo";
                           $result=mysqli_query($conn,$data);
                             while($arr=mysqli_fetch_assoc($result))
                             {
                             
                        ?>
                    

                        <option value="<?php echo $arr["id"];?>"><?php echo $arr["vechile_category"];?></option>

                        <?php
                             }
                        ?>
                        
                   
                   <input type="text" id="zones" name="zones" placeholder="Vehicl Name">
                  <br>
                  <input type="text" id=""name="v_n" placeholder="Vehicl Name" required>
                  
                  <input type="text" id="" name="r_n"  placeholder="Registation Number" required>
                  <br>
                  <input type="date" id="dat" name="dat"  placeholder="Date" required>
                  <input type="time" id="tim" name="tim" value="" placeholder="time" required>
                  <br>
                  <?php
                        if($showalert1)
                        {
                            echo ' <h5 style="color:red;margin-left: 14px;">Sorry !! Do not have any vacent space</h5>';
                        }
                  ?>
                  <button  type="submit" id="but">submit</button>
                </form>
                
            </div>
        </div>
        

    </div>
    <script src="jq/jque.js"></script>
    <script src="script.js"></script>
     <script src="scropt3.js"></script>
    <?php 
    if($showalert==true)
    {

?>
    <script>
        swal({
        title: "Good job!",
        text: "Data Add Successfully",
        icon: "success",
        button: "OK",
});

    </script>
    <?php
    }

?>
</body>
</html>
