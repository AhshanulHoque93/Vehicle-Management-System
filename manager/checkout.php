<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || ($_SESSION['loggedin']!=true))
    {
        header("location: ../login/login.php");
        exit;
    }
    $photo=$_SESSION['pho_to'];
    $pa_area=$_SESSION['p_area'];
?>
<?php
    include '../user/connect.php';

?>
<?php
$showalert=false;
if($_SERVER["REQUEST_METHOD"]=='POST')
{
   
    $reg_n=$_POST["cats"];
    $usr=$_POST["lname"];
    $pho_num=$_POST["p2"];
    $park_z=$_POST["p4"];
    $vechi_n=$_POST["p5"];
    $time_in=$_POST["esince1"];
    $time_out=$_POST["esince2"];
    $sql="INSERT INTO `chk_out` (`Reg_number`, `User_name`, `Phone_number`, `Parking_zoon`, `vechile_name`, `ch_in`,`ch_out`) VALUES ('$reg_n', '$usr', '$pho_num', '$park_z', '$vechi_n', '$time_in','$time_out')";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        $sql="DELETE FROM `chk_in` WHERE User_name='$usr'";
        mysqli_query($conn,$sql);
        $sql1="DELETE FROM `booking_info` WHERE User_name='$usr'";
        mysqli_query($conn,$sql1);
        session_start();
        $_SESSION['u_nam']=$usr;
        $_SESSION['p_zoone']=$park_z;
        $_SESSION['reg_no']=$reg_n;

        header("location: amount.php");
        $showalert=true;
    }
}

?>





<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="ch_out.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@600;700&display=swap">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>
        Admin Dashboard
    </title>
</head>

<body>
    <section id="sidebar">
        <div class="sidebar-brand">
            <h2>Apps</h2>
        </div>
        <div class="sidebar-menu">
            <div class="menu">
                <div class="item"><a href="managerdb.php"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
                </div>
                <div class="item">
                    <a class="sub-btn"><i class="fa fa-user"></i><span>Check-in/Check-out</span><i
                            class="fa fa-angle-right dropdown"></i></a>
                    <div class="sub-menu">
                        <a href="checkin.php" class="sub-item">Check-in</a>
                        <a href="checkout.php" class="sub-item">Check-out</a>
                    </div>
                </div>
                <div class="item">
                    <a class="sub-btn"><i class="fa fa-car"></i><span>Manage User</span><i
                            class="fa fa-angle-right dropdown"></i></a>
                    <div class="sub-menu">
                        <a href="adduser.php" class="sub-item">Add User</a>
                        <a href="manageuser.php" class="sub-item">Manage User</a>
                    </div>
                </div>
                <div class="item"><a href="phmanager.php"><i class="fa fa-history"></i><span>Park History</span></a></div>
                <div class="item"><a href="feedback.php"><i class="fa fa-comment"></i><span>Feedback</span></a></div>
                <div class="item"><a href="logout.php"><i class="fa fa-sign-out"></i><span>Logout</span></a></div>
            </div>
        </div>
    </section>
    <section id="main-content">
        <header class="main-header">
            <div class="header-left1">
                <h2></i> Check-out </h2>
            </div>
            <div class="header-center">
                <h3>Vehicle Parking Management System</h3>
            </div>
            <div class="header-left">
            <img style=" width:46px; height: 46px;" src="../admin/images/<?php echo $photo ?>" class="img-responsive" />
                <p>Manager</p>
            </div>
            <div class="clear"></div>
        </header>
        <form method="post">
        <div class="ddd" style="padding:10px;">
            <div>
             <label>Registraton Number</label><br>
                <select id="cat" name="cats" onchange="fetchemp2()">
                      <option disabled selected>Select Registraton Number</option>
                       <?php
                            $data="select * from `chk_in` where Parking_zoon='$pa_area'";
                            $result=mysqli_query($conn,$data);
                             while($arr=mysqli_fetch_assoc($result))
                             {
                             
                        ?>
                    

                        <option value="<?php echo $arr["Reg_number"];?>"> <?php echo $arr["Reg_number"];?></option>

                        <?php
                                }
                             
                        ?>
            </div>
            <div>
                <label>User Number</label><br>
                <input type= "text" id="lname" name="lname" placeholder="User Name" required >
            </div>
            <div>
                <label>Phone Number</label><br>
                <input type="text" id="p2" name="p2" placeholder="Phone Number" required>
            </div>
            <div>
                <label>Fields Area</label><br>
                <input type="text" id="p4" name="p4" placeholder="Fields Area" required>
            </div>
            <div>
                <label>Vehicle Name</label><br>
                <input type="text" id="p5" name="p5" placeholder="Vehicle Name" required>
            </div>
            <div>
                <label>Check_in Time</label><br>
                <input type="datetime-local" id="esince1" name="esince1" required>
            </div>
            <div>
            <?php 
            date_default_timezone_set("Asia/Dhaka");
            $date = date('Y-m-d\TH:i');
             ?>
                <label>Check_out Time</label><br>
                <input type="datetime-local" id="esince2" name="esince2" value="<?= $date ?>" required>
            </div>
            <div>
                <button type="submit" id="subt" name="subt1" required>Submit</button>
            </div>
        </div>
</form>
        <div class="clear"></div>
    </section>
    <script src="jque.js"></script>
    <script src="1234.js"></script>
    <script src="scrip2.js"></script>
    
</body>

</html>